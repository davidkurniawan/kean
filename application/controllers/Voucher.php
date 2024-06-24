<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voucher extends CI_Controller {

	function __construct() {
		parent::__construct();
		sessionLogin();
	}
	
	public function detail($value='')
	{

		$data = [

			"title" => "Voucher",

			"metaDescription" => "Voucher",

			"navbar" => "blue"

		];
		
		$viewData['vo'] = $this->GlobalModel->getDataRow('voucher',array('voucher_slug'=>$value));
		$this->load->view('components/header',$data);
		$this->load->view('components/voucher-detail',$viewData);
		$this->load->view('components/footer');
	}
}