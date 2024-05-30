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
		$viewData['paketBestie'] = $this->GlobalModel->getDataRow('product',array('id_product'=>89));
		$viewData['banner']	= $this->GlobalModel->getData("banner",array("id_banner_category"=>"1"));
		$viewData['bannerRight']	= $this->GlobalModel->getData("banner",array("id_banner_category"=>"2"));
		$viewData['instagram']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"instagram"));
		$viewData['tiktok']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"tiktok"));
		$this->load->view('components/header');
		$this->load->view('home',$viewData);
		$this->load->view('components/footer');
	}
}
