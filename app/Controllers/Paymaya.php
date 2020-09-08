<?php namespace App\Controllers;

class Paymaya extends BaseController
{
	public function index()
	{
		return view('paymaya_view');
	}

	public function request_payment(){
		$url = 'https://pg-sandbox.paymaya.com/checkout/v1/checkouts';

		$request = service('request');

		$order_id = $request->getPost('order-id');
		$firstname = $request->getPost('firstname');
		$lastname = $request->getPost('lastname');
		$amount = $request->getPost('amount');
		$phone_number = $request->getPost('phone-number');
		$email_address = $request->getPost('email-address');
		$ref_number = $order_id."".uniqid()."".strtotime('now');

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
											'lastName' => $lastname
									);

		// $itemList = array(
	  //     	"name"=> "Payment for order number #123",
	  //     	"quantity"=> 1,
	  //     	"code"=> "CVG-096732",
	  //     	"description"=> "Shoes",
	  //     	"amount"=> array(
	  //       	"value" => 100,
	  //       	"details" => array(
		// 	        "discount" => 0,
		// 	        "serviceCharge" => 0,
		// 	        "shippingFee" => 0,
		// 	        "tax" => 0,
		// 	        "subtotal" => 100
		// 	    )
    //     	),
	  //     	"totalAmount" => $totalAmount
		// );

		$data = array(
				"totalAmount" => $totalAmount,
		   	// "items" => array($itemList),
				"buyer" => $buyer,
		  	"requestReferenceNumber" => $ref_number,
				"redirectUrl" => array(
																	'success' => base_url("/Paymaya/Success?ref_number={$ref_number}"),
																	'failure' => base_url("/Paymaya/Failure?ref_number={$ref_number}"),
																	'cancel' => base_url("/Paymaya/Cancel?ref_number={$ref_number}")
															)

		);

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic cGstWjBPU3pMdkljT0kyVUl2RGhkVEdWVmZSU1NlaUdTdG5jZXF3VUU3bjBBaDo=';

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

		//SAVE Checkout Information
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
						'date_created'  => strtotime('now')
		];

		$builder->insert($data);

		return $this->response->setJSON($server_output);
	}//END:: request_payment

	function Success(){

		$checkoutId = $this->checkRefNum();

		$url = "https://pg-sandbox.paymaya.com/checkout/v1/checkouts/".$checkoutId;

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic c2stWDhxb2xZank2MmtJekVicjBRUksxaDRiNEtEVkhhTmN3TVlrMzlqSW5TbDo=';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		if ($server_output === false){
			$server_output = curl_error($ch);
			return view('error_view');
		}else{
			$server_output = json_decode($server_output);

			if(isset($server_output->paymentStatus)){

				// Update Checkout
				$db = db_connect();
				$builder = $db->table('checkouts');
				$builder->set('paymentStatus', $server_output->paymentStatus);
				$builder->where('checkoutId', $server_output->id);
				$builder->update();

				return view('success_view');

			}else{
				//Invalid ref number
				return view('failure_view');
			}

		}//END:: ELSE

		// echo stripslashes($server_output);

		curl_close ($ch);

	}//END:: SUCCESS

	function Failure(){

		$checkoutId = $this->checkRefNum();

		$url = "https://pg-sandbox.paymaya.com/checkout/v1/checkouts/".$checkoutId;

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic c2stWDhxb2xZank2MmtJekVicjBRUksxaDRiNEtEVkhhTmN3TVlrMzlqSW5TbDo=';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		if ($server_output === false){
			$server_output = curl_error($ch);
		}else{
			$server_output = json_decode($server_output);

			if(isset($server_output->paymentStatus)){
				// Update Checkout
				$db = db_connect();
				$builder = $db->table('checkouts');
				$builder->set('paymentStatus', $server_output->paymentStatus);
				$builder->where('checkoutId', $server_output->id);
				$builder->update();
			}
		}//END:: ELSE

		curl_close ($ch);

		return view('failure_view');
	}

	function Cancel(){

	}

	private function checkRefNum(){
		$request = service('request');
		$ref_number = $request->getGet('ref_number');

		$db = db_connect();
		$builder = $db->table('checkouts');

		$builder->select('checkoutId');
		$builder->where('requestReferenceNumber', $ref_number);
		$query = $builder->get();

		$checkoutId = 0;
		foreach ($query->getResult() as $row)
		{
    	$checkoutId =  $row->checkoutId;
		}

		return $checkoutId;

	}

}
