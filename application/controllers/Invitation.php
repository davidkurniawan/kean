<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitation extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = $this->GlobalModel->getData('invitation',null);

		foreach ($data as $key => $value) {
			$this->GlobalModel->updateData('invitation',array('id_invitation'=>$value['id_invitation']),
				array('url'=>'https://by.inv-galipatstory.com/ayu-david-2/?to='.urlencode(Ucfirst($value['nama']))));
		}
	}

	public function data($value='')
	{
		$viewData['data'] = $this->GlobalModel->getData('invitation',null);
	
		$this->load->view('invitation',$viewData);
	}
}