<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$data = [

			"title" => "Beauty Tips",

			"metaDescription" => "Beauty Tips",

			"navbar" => "white"

		];
		// pre(confirmBiteShipApi("638f5c900de0f8507fbbc91a"));
		$this->load->view('components/header',$data);
		$this->load->view('news/view');
		$this->load->view('components/footer');

	}

}