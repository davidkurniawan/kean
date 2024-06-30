<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscribe extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function submit($value='')
	{
		$post = $this->input->post();

		$insertData = array(
			'full_name'	=>	$post['name'],
			'email'		=>	$post['email']
		);
		$cekData =  $this->GlobalModel->getDataRow('suscribe',array('email'=>$post['email']));
		if (!empty($cekData)) {
			$this->GlobalModel->insertData('suscribe',$insertData);
			echo 200;
		} else {
			echo 404;
		}
	}

}