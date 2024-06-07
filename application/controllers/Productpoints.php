<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productpoints extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{

		$data = [

			"title" => "Product Points - Shop",

			"metaDescription" => "Products Points",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];

		$viewData['product'] = $this->GlobalModel->getData('produk_poin',null);
		$viewData['banner'] = $this->GlobalModel->getDataRow('banner',array('id_banner_category'=>5));

		$this->load->view('components/header',$data);
		$this->load->view('productpoints/product-poin-view',$viewData);
		$this->load->view('components/footer');
	}

	public function detail($value='')
	{
		$data = [

			"title" => "Items Product Points - Shop",

			"metaDescription" => "Products Points",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];

		$viewData['product'] = $this->GlobalModel->getDataRow('produk_poin',array('slug'=>$value));

		$this->load->view('components/header',$data);
		$this->load->view('productpoints/product-poin-detail',$viewData);
		$this->load->view('components/footer');
	}

}