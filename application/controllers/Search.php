<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$data = [

			"title" => "Search",

			"metaDescription" => "Search",

			"navbar" => "blue"

		];

		$keyword = $this->input->get('keyword');
		$searchKeywordFull = $this->GlobalModel->getDataRow('search_keyword',array('keyword'=>$keyword));
		if (empty($searchKeywordFull)) {
			$this->GlobalModel->insertData('search_keyword',array('full_keyword'=>$keyword,'keyword'=>$keyword,'created_date'=>date('Y-m-d H:i:s')));
		}

		$explodeKeyword = explode(' ', $keyword);

		$sqlKeyword = '';
		foreach ($explodeKeyword as $key => $value) {
			$searchKeyword = $this->GlobalModel->getDataRow('search_keyword',array('keyword'=>$value));
			if (empty($searchKeyword)) {
				$this->GlobalModel->insertData('search_keyword',array('full_keyword'=>$keyword,'keyword'=>$value,'created_date'=>date('Y-m-d H:i:s')));
			}
			if (!empty($value)) {
				if ($key == 0) {
					$sqlKeyword .= 'AND p.nama_product LIKE "%'.$value.'%" ';
				} else {
					$sqlKeyword .= 'OR p.nama_product LIKE "%'.$value.'%" ';
				}
			}
		}

		$viewData['result'] = $this->GlobalModel->queryManual('SELECT * FROM product p JOIN administrator b ON p.id_administrator=b.id_administrator WHERE status_product="0" '.$sqlKeyword.' ORDER BY p.created_date DESC');
		$viewData['count'] = count($viewData['result']);
		$viewData['keyword'] = $keyword;

		$this->load->view('components/header',$data);
		$this->load->view('search-view',$viewData);
		$this->load->view('components/footer');
	}

	public function keyword()
	{
		
		$keyword = $this->input->post('keyword');
		$searchKeywordFull = $this->GlobalModel->getDataRow('search_keyword',array('keyword'=>$keyword));
		if (empty($searchKeywordFull)) {
			$this->GlobalModel->insertData('search_keyword',array('full_keyword'=>$keyword,'keyword'=>$keyword,'created_date'=>date('Y-m-d H:i:s')));
		}

		$explodeKeyword = explode(' ', $keyword);

		$sqlKeyword = '';
		foreach ($explodeKeyword as $key => $value) {
			$searchKeyword = $this->GlobalModel->getDataRow('search_keyword',array('keyword'=>$value));
			if (empty($searchKeyword)) {
				$this->GlobalModel->insertData('search_keyword',array('full_keyword'=>$keyword,'keyword'=>$value,'created_date'=>date('Y-m-d H:i:s')));
			}
			if (!empty($value)) {
				if ($key == 0) {
					$sqlKeyword .= 'AND p.nama_product LIKE "%'.$value.'%" ';
				} else {
					$sqlKeyword .= 'OR p.nama_product LIKE "%'.$value.'%" ';
				}
			}
		}

		echo BASEURL.'search?keyword='.urlencode($keyword);
	}
}
