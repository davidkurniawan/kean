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
		
		$viewData['showallproduct'] = $this->GlobalModel->getData('product',array('status_product'=>0));
		$viewData['productfirst'] = $this->GlobalModel->getDataRow('product',array('id_product'=>84));
		$viewData['imageProduct'] = $this->GlobalModel->getData('image_product',array('id_product'=>84));
		$viewData['productRelated'] = $this->GlobalModel->getDataSortLimit('product',array('status_product'=>0),'nama_product','DESC',4);
		// pre($viewData);

		$this->load->view('components/header',$data);
		$this->load->view('latest',$viewData);
		$this->load->view('components/footer');
		
	}

}