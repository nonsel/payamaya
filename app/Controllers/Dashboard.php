<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
    $session = session();
		if($session->get('isLogged')==FALSE){
			header('Location: '.base_url()."/Login");
			exit();
		}
		return view('dashboard_view');
	}

  public function getCheckouts(){

    $sql = "SELECT *,DATE_FORMAT(FROM_UNIXTIME(date_created), '%b/%d/%Y') as date_created FROM checkouts ORDER BY id DESC";
    $db = db_connect();
    if ($query = $db->query($sql))
    {
      $result = $query->getResult();
      $data['data'] = $result;
      $data['error'] = 0;
    }else{
      $data['error'] = 1;
      // $data['db_error'] = $db->error();
    }//END:: IF

    return $this->response->setJSON($data);

  }//END:: getCheckouts


}//END:: class
