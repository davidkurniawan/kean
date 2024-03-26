<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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

		$this->load->view('components/header',$data);
		$this->load->view('product/product-detail',$viewData);
		$this->load->view('components/footer');
		
	}

	public function detail($productUrl='',$page="")
	{
		$this->session->set_userdata('page_session',$page);
		
		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];


		$viewData['product'] = $this->GlobalModel->queryManualRow('SELECT pc.name as kategori, pct.name as sub_kategori, p.gender_product, p.diskon, p.created_date, p.id_administrator, a.nama as namabrand ,p.nama_product , p.status_product, p.id_product FROM product p JOIN product_category pc ON p.id_product_category=pc.id_product_category JOIN productsub_category pct ON p.id_productsub_category=pct.id_productsub_category JOIN administrator a ON p.id_administrator=a.id_administrator WHERE p.url_product="'.$productUrl.'"');

		$viewData['productfirst'] = $this->GlobalModel->getDataRow('product',array('url_product'=>$productUrl));
		$viewData['imageProduct'] = $this->GlobalModel->getData('image_product',array('id_product'=>$viewData['productfirst']['id_product']));
		$viewData['productItem'] = $this->GlobalModel->getData('product_item',array('id_product'=>$viewData['productfirst']['id_product']));
		
		$this->load->view('components/header',$data);
		$this->load->view('product/product-detail',$viewData);
		$this->load->view('components/footer');
	}

	public function searchProductSize($value='')
	{
		$post = $this->input->post();

		$data = $this->GlobalModel->getData('product_item',array('id_product'=>$post['dataidProd'],'slug_color'=>$post['slugColor']));

		$html = "";
		$html .="<option>Choose Size</option>";
		foreach ($data as $key => $proditem) {
			$html .= '<option value="'.$proditem['product_item_id'].'">'.$proditem['size'].'</option>';
		}

		echo $html;
	}

	public function getProductItem($value='')
	{
		$post = $this->input->post();

		$data = $this->GlobalModel->getDataRow('product_item',array('product_item_id'=>$post['dataidProdItem']));

		$html = "Tersisa ".$data['qty_item']." Buah";

		$response = array(
			'result' 	=> "Tersisa ".$data['qty_item']." Buah",
			'qty'		=> $data['qty_item'],
			'idProductItem'	=>	$data['product_item_id']
		);

		echo json_encode($response);
	}
}
