<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		checkCartRedirect();

		$data = [

			"title" => "Billing",

			"metaDescription" => "Billing",

			"navbar" => "blue"

		];
		
		$viewData['addressAdmin'] = $this->GlobalModel->getData('administrator',null);
		$viewData['user'] = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')));
		$viewData['event']	=	$this->GlobalModel->getDataRow('event_diary',array('id_event_diary'=>1));
		$this->load->view('components/header',$data);
		$this->load->view('address',$viewData);
		$this->load->view('components/footer');
	}
}