<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function show($param='',$paramTwo='')
	{

		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => (($this->session->userdata('page_session') == "reseller")?"":"blue")

		];

		if (empty($paramTwo)) {
			$viewData['pageKategori'] = $this->GlobalModel->getDataRow('product_category',array('slug'=>$param));
		} else {
			$viewData['pageKategori'] = $this->GlobalModel->getDataRow('productsub_category',array('slug'=>$paramTwo));
		}

		$this->load->view('components/header',$data);
		$this->load->view('product/product-show',$viewData);
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


		$viewData['product'] = $this->GlobalModel->queryManualRow('SELECT pc.name as kategori, pct.name as sub_kategori, p.gender_product, p.diskon, p.created_date, p.id_administrator, a.nama as namabrand ,p.nama_product , p.status_product, p.id_product, pct.size_chart FROM product p JOIN product_category pc ON p.id_product_category=pc.id_product_category JOIN productsub_category pct ON p.id_productsub_category=pct.id_productsub_category JOIN administrator a ON p.id_administrator=a.id_administrator WHERE p.url_product="'.$productUrl.'"');

		$viewData['productfirst'] = $this->GlobalModel->getDataRow('product',array('url_product'=>$productUrl));
		$viewData['imageProduct'] = $this->GlobalModel->getData('image_product',array('id_product'=>$viewData['productfirst']['id_product']));
		$viewData['productItem'] = $this->GlobalModel->getData('product_item',array('id_product'=>$viewData['productfirst']['id_product']));

		insertdataview('product',$viewData['productfirst']['id_product'],$viewData['productfirst']['view'],$this->session->userdata('userIdvi'));
		
		$this->load->view('components/header',$data);
		$this->load->view('product/product-detail',$viewData);
		$this->load->view('components/footer');
	}

	public function catalog($value='')
	{
		// code...
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
			'harga'		=>	number_format($data['harga']),
			'idProductItem'	=>	$data['product_item_id']
		);

		echo json_encode($response);
	}

	public function infiniteData($value='')
	{
		$limit = $this->input->post('limit');
		$start = $this->input->post('start');

		$kategori = $this->db->escape_str($this->input->post('category',TRUE));
		$subkategori = $this->db->escape_str($this->input->post('subcategory',TRUE));
		$sort = $this->db->escape_str($this->input->post('sort',TRUE));

		$kategoriArr = $this->GlobalModel->getDataRow('product_category',array('slug'=>$kategori));
		$subkategoriArr = $this->GlobalModel->getDataRow('productsub_category',array('slug'=>$subkategori));

		$kategoriInfinite = '';
		if (!empty($kategori)) {
			$kategoriInfinite .= 'AND id_product_category="'.$kategoriArr['id_product_category'].'" ';
		}
		if (!empty($kategori)) {
			$kategoriInfinite .= 'AND id_productsub_category="'.$subkategoriArr['id_productsub_category'].'"';
		}

		$sortSql ='';
		if (!empty($sort) && $sort == 'newstock') {
			$sortSql .= 'ORDER BY p.created_date DESC';
		} else if (!empty($sort) && $sort == 'popular') {
			$sortSql .= 'ORDER BY p.view DESC';
		} else if (!empty($sort) && $sort == 'highest') {
			$sortSql .= 'ORDER BY p.harga DESC';
		} else if (!empty($sort) && $sort == 'lowest') {
			$sortSql .= 'ORDER BY p.harga ASC';
		} else {
			$sortSql .= 'ORDER BY p.created_date DESC';
		}

		$countData =  $this->GlobalModel->queryManual('SELECT COUNT(*) as count FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator WHERE p.status_product="0" '.$kategoriInfinite.' ORDER BY p.created_date DESC ');

		if ($limit <= $countData[0]['count']) {
			$result['code'] = '200';
		} else {
			$result['code'] = '400';
		}

		$viewData['showallproduct'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator WHERE p.status_product="0" '.$kategoriInfinite.' '.$sortSql.' limit '.$start.','.$limit.' ');
		$result['html'] = $this->load->view('product/product-list',$viewData,TRUE);
		echo json_encode($result);
	}

}
