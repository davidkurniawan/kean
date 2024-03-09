<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;

class Payment extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function success($value='')
	{
		$data = [

			"title" => "Payment Success",

			"metaDescription" => "Payment Success",

			"navbar" => "white"

		];

		$this->load->view('components/header',$data);
		$this->load->view('success');
		$this->load->view('components/footer');
	}

	public function successpoin($value='')
	{
		$data = [

			"title" => "Payment Success",

			"metaDescription" => "Payment Success",

			"navbar" => "white"

		];

		$this->load->view('components/header',$data);
		$this->load->view('success');
		$this->load->view('components/footer');
	}
}