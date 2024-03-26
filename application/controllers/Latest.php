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
		
		$viewData['showallproduct'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator ORDER BY p.created_date DESC');

		$this->load->view('components/header',$data);
		$this->load->view('latest',$viewData);
		$this->load->view('components/footer');
		
	}

}