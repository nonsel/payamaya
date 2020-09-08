<?php namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
    $session = session();
		if($session->get('isLogged')==TRUE){
			header('Location: '.base_url()."/Dashboard");
			exit();
		}
		return view('login_view');
	}

  public function auth(){

    $request = service('request');

		$username = $request->getPost('username');
		$password = md5($request->getPost('password'));

		$db = db_connect();
		$sql = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
		$query = $db->query($sql, [$username, $password]);
		$result = $query->getResult();

		if(count($result)>0){
			$data['message'] = "Succesfully Login";
			$data['error'] = 0;

			//SET SESSION
			foreach ($result as $value) {

				$session = session();

				$newdata = [
					'id' => $value->id,
					'username' => $value->username,
					'password' => $value->password,
					'isLogged' => TRUE
				];

				$session->set($newdata);

				$json['message'] = "Succesfully Login";
				$json['authenticate'] = 1;

			}//END :: FOREACH

		}else{
			$data['message'] = "Invalid Username or Password";
			$data['error'] = 1;
      // $data['a'] = $sql;
		}

		return $this->response->setJSON($data);
  }//END:: AUTH

  public function logout(){

    $session = session();
    $session->remove('id');
    $session->remove('username');
    $session->remove('password');
    $session->remove('isLogged');

    header('Location: '.base_url()."/Login");
    exit();
  }

}
