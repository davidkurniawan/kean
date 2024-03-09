<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		if ($viewData['productfirst']['id_product'] == 89) {
			$this->load->view('components/header',$data);
			$this->load->view('product',$viewData);
			$this->load->view('components/footer');
		} else {
			if (sessionData('sessUser') == TRUE) {
				if (cekPaketBestie() == FALSE) {
					redirect(BASEURL.'reseller');
				}
			}
			$this->load->view('components/header',$data);
			$this->load->view('product',$viewData);
			$this->load->view('components/footer');
		}

		
	}

	public function detail($value='',$page="")
	{
		$this->session->set_userdata('page_session',$page);
		
		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];

		$viewData['showallproduct'] = $this->GlobalModel->getData('product',array('status_product'=>0));
		$viewData['productfirst'] = $this->GlobalModel->getDataRow('product',array('url_product'=>$value));
		$viewData['imageProduct'] = $this->GlobalModel->getData('image_product',array('id_product'=>$viewData['productfirst']['id_product']));
		$viewData['productVarian'] = $this->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product WHERE pi.kategori_item_product =2 AND pi.id_product ='.$viewData['productfirst']['id_product'].' ');
		$viewData['productRelated'] = $this->GlobalModel->getDataSortLimit('product',array('status_product'=>0),'nama_product','DESC',4);

		if ($viewData['productfirst']['id_product'] == 89) {
			if (cekPaketBestie() == TRUE) {
				redirect(BASEURL.'reseller');
			} 
			$this->load->view('components/header',$data);
			$this->load->view('product-detail',$viewData);
			$this->load->view('components/footer');
		} else {
			if (sessionData('sessUser') == TRUE) {
				if (cekPaketBestie() == FALSE) {
					redirect(BASEURL.'reseller');
				} 	

			}
			$this->load->view('components/header',$data);
			$this->load->view('product-detail',$viewData);
			$this->load->view('components/footer');
		}
	}
}
