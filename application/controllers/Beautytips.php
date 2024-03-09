<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beautytips extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = [

			"title" => "Beauty Tips",

			"metaDescription" => "Beauty Tips",

			"navbar" => "blue"

		];
		$viewData['beautytips'] = $this->GlobalModel->getData('beautytips',null);

		$this->load->view('components/header',$data);
		$this->load->view('beauty-tips',$viewData);
		$this->load->view('components/footer');
	}

	public function readmore($value='')
	{
		$data = [

			"title" => "Beauty Tips Detail",

			"metaDescription" => "Beauty Tips Detail",

			"navbar" => "blue"

		];
		$url = $this->uri->segment(3);
		$viewData['post'] = $this->GlobalModel->getDataRow('beautytips',array("url_title"=>$url));

		$viewData['beautytips'] = $this->GlobalModel->getDataSortLimit('beautytips',null,'url_title','desc','4');
 	
		$this->load->view('components/header',$data);
		$this->load->view('beauty-tips-detail',$viewData);
		$this->load->view('components/footer');		
	}
}
