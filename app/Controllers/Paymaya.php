<?php namespace App\Controllers;

class Paymaya extends BaseController
{
	public function index(){
		return view('paymaya/index');
	}

	public function request_payment(){
		$url = getenv('paymaya.url').'/checkout/v1/checkouts';

		$request = service('request');

		$order_id = $request->getPost('order-id');
		$firstname = $request->getPost('firstname');
		$lastname = $request->getPost('lastname');
		$amount = $request->getPost('amount');
		$phone_number = $request->getPost('phone-number');
		$email_address = $request->getPost('email-address');
		$ref_number = $this->generateReference();

		$totalAmount = array(
	      	"value" => $amount,
	      	"currency" => "PHP",
	      	"details" => array(
	         	// "discount" => 0,
	         	// "serviceCharge" => 0,
	         	// "shippingFee" => 0,
	         	// "tax" => 0,
	         	"subtotal" => $amount
	      	)
		);

		$buyer = array(
			'firstName' => $firstname,
			'lastName' => $lastname,
			"contact" => array(
		      "phone" => "+63".$phone_number,
		      "email" => $email_address
		    )
		);

		// $itemList = array(
	 //      	"name"=> "Payment for order number #123",
	 //      	"quantity"=> 1,
	 //      	"code"=> "CVG-096732",
	 //      	"description"=> "Shoes",
	 //      	"amount"=> array(
	 //      		"value" => 100,
	 //      		"details" => array(
	 //      			"discount" => 0,
	 //      			"serviceCharge" => 0,
	 //      			"shippingFee" => 0,
	 //      			"tax" => 0,
	 //      			"subtotal" => 100
	 //      		)
	 //      	),
	 //      	"totalAmount" => $totalAmount
	 //    );

		$data = array(
				"totalAmount" => $totalAmount,
		   	// "items" => array($itemList),
				"buyer" => $buyer,
		  		"requestReferenceNumber" => $ref_number,
				"redirectUrl" => array(
				'success' => base_url("/Paymaya/payment/{$ref_number}"),
				'failure' => base_url("/Paymaya/payment/{$ref_number}"),
				'cancel' => base_url("/Paymaya/payment/{$ref_number}")
			)
		);

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic '.base64_encode(getenv('paymaya.public_key'));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);

		$server_output = json_decode($server_output);

		$db = db_connect();
		$builder = $db->table('checkouts');

		$data = [
			'order_id' => $order_id,
			'requestReferenceNumber' => $ref_number,
			'checkoutId' => $server_output->checkoutId,
			'redirectUrl'	=> $server_output->redirectUrl,
			'first_name'  => $firstname,
			'last_name'  => $lastname,
			'amount'  => $amount,
			'phone_number' => $phone_number,
			'email_address' => $email_address,
			'payment_channel' => "PAYMAYA",
			'date_created'  => strtotime('now')
		];

		$builder->insert($data);

		return $this->response->setJSON($server_output);
	}

	public function payment($ref_number){
		$checkoutId = $this->checkRefNum($ref_number);

		$url = getenv('paymaya.url')."/checkout/v1/checkouts/".$checkoutId;

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic '.base64_encode(getenv('paymaya.secret_key'));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		if ($server_output === false){
			$server_output = curl_error($ch);
			// redirect to 404 page
			return view('errors/html/error_404');
		}
		else{
			$server_output = json_decode($server_output);
			if(isset($server_output->paymentStatus)){

				$db = db_connect();
				$builder = $db->table('checkouts');
				$builder->set('paymentStatus', $server_output->paymentStatus);
				$builder->where('checkoutId', $server_output->id);
				$builder->update();

				return view('paymaya/landing', $this->result_data($server_output->paymentStatus));
			}
			else{
				// redirect to 404 page
				return view('errors/html/error_404');
			}
		}
		curl_close ($ch);
	}

	public function webhook(){
		return $this->response->setStatusCode(200);
	}

	private function generateReference(){
		helper('text');
		$ref_number = strtoupper(random_string('alnum', 10));

		$db = db_connect();
		$builder = $db->table('checkouts');

		$builder->selectCount('checkoutId');
		$builder->where('requestReferenceNumber', $ref_number);
		$query = $builder->countAllResults();

		if($query > 0){
			$this->generateReference();		}
		else{
			return $ref_number;
		}
	}

	private function result_data($status){
		// valid status
		// ['PAYMENT_SUCCESS','PAYMENT_FAILED','PAYMENT_EXPIRED']

		$info = array();
		$info['status'] = $status;

		if($status == 'PAYMENT_SUCCESS'){
			$info['title'] = 'Payment Successful';
			$info['message'] = 'Your payment has been processed successfully and confirmed';
			$info['image'] = 'image/success.png';
			$info['return_url'] = 'https://www.lindenteakfurniture.com/';
		}
		else if(in_array($status, ['PAYMENT_FAILED','AUTH_FAILED'])){
			$info['title'] = 'Payment Failed';
			$info['message'] = 'Please try again.';
			$info['image'] = 'image/error.png';
			$info['return_url'] = 'https://pay.lindenteakfurniture.com/';
		}
		else if($status == 'PAYMENT_EXPIRED'){
			$info['title'] = 'Invalid Request';
			$info['message'] = 'The link you\'re trying to access is invalid or has already expired.';
			$info['image'] = 'image/error.png';
			$info['return_url'] = 'https://pay.lindenteakfurniture.com/';
		}

		return $info;
	}

	private function checkRefNum($ref_number){
		$db = db_connect();
		$builder = $db->table('checkouts');

		$builder->select('checkoutId');
		$builder->where('requestReferenceNumber', $ref_number);
		$query = $builder->get();

		$checkoutId = 0;
		foreach ($query->getResult() as $row){
    		$checkoutId =  $row->checkoutId;
		}

		return $checkoutId;
	}

	private function generate_auth($key){
		return base64_encode($key.":");
	}

}
