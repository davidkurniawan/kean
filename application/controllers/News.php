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

		$viewData['left'] = $this->GlobalModel->getData('news',array('featured'=>1));
		$viewData['center'] = $this->GlobalModel->getData('news',array('featured'=>2));
		$viewData['right'] = $this->GlobalModel->getData('news',array('featured'=>3));
		$viewData['non'] = $this->GlobalModel->getData('news',array('featured'=>4));

		$this->load->view('components/header',$data);
		$this->load->view('news/view',$viewData);
		$this->load->view('components/footer');

	}

	public function detail($value='')
	{
		$viewData['post'] = $this->GlobalModel->getDataRow('news',array('url'=>$value));

		$this->load->view('components/header');
		$this->load->view('news/detail',$viewData);
		$this->load->view('components/footer');
	}

}