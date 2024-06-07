<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brands extends CI_Controller {

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
		$viewData['brand'] = $this->GlobalModel->getData('administrator',array('flag_admin'=>2));
		$this->load->view('components/header',$data);
		$this->load->view('brand/brand',$viewData);
		$this->load->view('components/footer');
	}

	public function catalog($value='')
	{
		$viewData['brandcatalog'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator adm ON p.id_administrator=adm.id_administrator WHERE adm.brand_name="'.$value.'" ');
		$viewData['brand'] = $this->GlobalModel->getDataRow('administrator',array('brand_name'=>$value));

		$data = [

			"title" => $viewData['brand']['brand_name'].' Online Shop' ,

			"metaDescription" => "Beauty Tips",

			"navbar" => "blue"

		];

		$this->load->view('components/header',$data);
		$this->load->view('brand/brand-catalog',$viewData);
		$this->load->view('components/footer');

	}
}