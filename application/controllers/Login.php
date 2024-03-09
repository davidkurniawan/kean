<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth($value='')
	{
		$post = $this->input->post();
		$dataAdmin = $this->GlobalModel->getDataRow('user_customer',array('email'=>$post['email']));
		if (!empty($post['g-recaptcha-response'])) {
			if (password_verify($post['password'], $dataAdmin['password']) == TRUE) {
				$dataSess = array(
					'sessUser' 		=> 	TRUE,
					'sessNamaUser'		=>	$dataAdmin['nama'],
					'idAdmin'			=>	$dataAdmin['id_user_customer'],
					'ippublic'			=>	$_SERVER['REMOTE_ADDR'],
					'sessNikUser'		=>	$dataAdmin['user_nik']
				);
				$this->session->set_userdata($dataSess);
			    redirect(BASEURL.'reseller');
			} else {
				$this->session->set_flashdata('msg','Mohon maaf email dan password anda salah');
			    redirect(BASEURL.'login');
			}
		} else {
			$this->session->set_flashdata('msg','Pastikan captcha sudah Anda Ceklis!');
			redirect(BASEURL.'login');
		}
		
	}

	public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect(BASEURL.'reseller');
	}

}
