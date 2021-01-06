<?php namespace App\Controllers;

class Gcash extends BaseController
{
	public function index(){
		return view('gcash/index');
	}

	public function how_to(){
		return view('gcash/how-to-pay');
	}

	public function request_payment(){
		$request = service('request');

		$firstname = $request->getPost('firstname');
		$lastname = $request->getPost('lastname');
		$email_address = $request->getPost('email-address');
		$ref_number = $this->generateReference();

		$db = db_connect();
		$builder = $db->table('checkouts');

		$data = [
			'order_id' => 1123,
			'requestReferenceNumber' => $ref_number,
			'checkoutId' => '',
			'redirectUrl'	=> '',
			'first_name'  => $firstname,
			'last_name'  => $lastname,
			'amount'  => 0,
			'phone_number' => "09150000000",
			'email_address' => $email_address,
			'payment_channel' => "GCASH",
			'paymentStatus' => "FOR_CHECKING",
			'date_created'  => strtotime('now')
		];

		$builder->insert($data);

		// return $this->response->setJSON($server_output);
		return json_encode($request->getPost('firstname'));
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
}