<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latest extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{

		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];

		$viewData['banner'] = $this->GlobalModel->getDataRow('banner',array('id_banner_category'=>4));
		$this->load->view('components/header',$data);
		$this->load->view('latest',$viewData);
		$this->load->view('components/footer');
		
	}

}