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

		$this->load->view('components/header',$data);
		$this->load->view('latest');
		$this->load->view('components/footer');
		
	}

}