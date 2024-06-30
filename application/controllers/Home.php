<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('user_agent');
	}

	public function index()
	{
		$viewData['showallproduct'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator');
		$viewData['popularproduct'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator ORDER BY p.view DESC');
		$viewData['banner']	= $this->GlobalModel->getData("banner",array("id_banner_category"=>"1"));
		$viewData['bannerRight'] = $this->GlobalModel->getData("banner",array("id_banner_category"=>"2"));
		$viewData['productpoin'] = $this->GlobalModel->getData("produk_poin",null);
		$viewData['newsL'] = $this->GlobalModel->queryManual('SELECT * FROM news WHERE NOT featured=4 limit 4');
		$viewData['bannerTwoUtama']	= $this->GlobalModel->getData("banner",array("id_banner_category"=>"6"));
		$viewData['bannerTwoSecond'] = $this->GlobalModel->getData("banner",array("id_banner_category"=>"7"));
		$viewData['bannerTwoThird']	= $this->GlobalModel->getData("banner",array("id_banner_category"=>"8"));
		$viewData['katalog'] = $this->GlobalModel->queryManual('SELECT * FROM product_catalog limit 4');
		
		$this->load->view('components/header');
		$this->load->view('home',$viewData);
		$this->load->view('components/footer');
	}
}
