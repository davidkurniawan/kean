<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function pembayaran($value="")
	{
		$viewData['trans'] = $this->GlobalModel->getDataRow('transaction_order',array('transaction_id'=>$value,'id_user_customer'=>$this->session->userdata('idAdmin')));
		$this->load->view('components/header');
		$this->load->view('bukti-transfer',$viewData);
		$this->load->view('components/footer');
	}

	public function upload($value='')
	{
		$post = $this->input->post();
		$config['upload_path']          = './assets/img/buktipembayaran/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';

        $this->load->library('upload', $config);

        $this->upload->do_upload('buktitf');
        $insertData = array(
        	'bukti_pembayaran'	=>	"assets/img/buktipembayaran/".$this->upload->data('file_name'),
        	'transaction_status'	=>	6,
        );
        $this->GlobalModel->updateData('transaction_order',array('transaction_id'=>$post['transID']),$insertData);
        redirect(BASEURL."profile");

	}

}