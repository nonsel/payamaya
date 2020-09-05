<?php namespace App\Controllers;

class Paymaya extends BaseController
{
	public function index()
	{
		return view('paymaya_view');
	}

	public function request_payment(){
		$url = 'https://pg-sandbox.paymaya.com/checkout/v1/checkouts';

		// echo json_encode($_POST);
		$totalAmount = array(
	      	"value" => 100,
	      	"currency" => "PHP",
	      	"details" => array(
	         	"discount" => 0,
	         	"serviceCharge" => 0,
	         	"shippingFee" => 0,
	         	"tax" => 0,
	         	"subtotal" => 100
	      	)
		);

		$itemList = array(
	      	"name"=> "Payment for order number #123",
	      	"quantity"=> 1,
	      	"code"=> "CVG-096732",
	      	"description"=> "Shoes",
	      	"amount"=> array(
	        	"value" => 100,
	        	"details" => array(
			        "discount" => 0,
			        "serviceCharge" => 0,
			        "shippingFee" => 0,
			        "tax" => 0,
			        "subtotal" => 100
			    )
        	),
	      	"totalAmount" => $totalAmount
		);

		$data = array(
			"totalAmount" => $totalAmount,
		   	"items" => array($itemList),
		  	"requestReferenceNumber" => "1551191039"
		);

		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = 'Authorization: Basic cGstWjBPU3pMdkljT0kyVUl2RGhkVEdWVmZSU1NlaUdTdG5jZXF3VUU3bjBBaDo=';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);

		curl_close ($ch);

		echo json_encode($server_output);
	}
}
