<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$viewData['showallproduct'] = $this->GlobalModel->getData('product',array('status_product'=>0));
		$viewData['paketBestie'] = $this->GlobalModel->getDataRow('product',array('id_product'=>89));
		$viewData['banner']	= $this->GlobalModel->getData("banner",array("page"=>"home"));
		$viewData['instagram']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"instagram"));
		$viewData['tiktok']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"tiktok"));
		$this->load->view('components/header');
		$this->load->view('home',$viewData);
		$this->load->view('components/footer');
	}
}
