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
		$ref_number = $order_id."".uniqid();

		$totalAmount = array(
	      	"value" => $amount,
	      	"currency" => "PHP",
	      	"details" => array(
	         	"discount" => 0,
	         	"serviceCharge" => 0,
	         	"shippingFee" => 0,
	         	"tax" => 0,
	         	"subtotal" => $amount
	      	)
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
		  	"requestReferenceNumber" => $ref_number
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
						'date_created'  => strtotime('now')
		];

		$builder->insert($data);

		return $this->response->setJSON($server_output);
	}//END:: request_payment

	function success(){

	}

	function failure(){

	}

	function cancel(){
		
	}

}
