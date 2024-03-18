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
		$viewData['productVarian'] = $this->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product WHERE pi.kategori_item_product =2 AND pi.id_product=84 ');
		$viewData['productRelated'] = $this->GlobalModel->getDataSortLimit('product',array('status_product'=>0),'nama_product','DESC',4);
		// pre($viewData);

		$this->load->view('components/header',$data);
		$this->load->view('latest',$viewData);
		$this->load->view('components/footer');
		
	}

}