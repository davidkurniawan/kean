<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => "blue"

		];

		$viewData['showallproduct'] = $this->GlobalModel->getData('product',array('status_product'=>0));
		$viewData['paketBestie'] = $this->GlobalModel->getDataRow('product',array('id_product'=>89));
		$viewData['banner']	= $this->GlobalModel->getData("banner",array("page"=>"reseller"));
		$viewData['beautytips'] = $this->GlobalModel->getData('beautytips',null);
		$viewData['instagram']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"instagram"));
		$viewData['tiktok']	= $this->GlobalModel->getData("media_social_post",array("kategori_media_social"=>"tiktok"));

		$this->load->view('components/header',$data);
		$this->load->view('home',$viewData);
		$this->load->view('components/footer');
	}
}
