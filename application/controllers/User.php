<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function daftar()
	{
		$post = $this->input->post();
		if ($post['password'] == $post['repeatPassword']) {
			$checkEmail = $this->GlobalModel->getDataRow('user_customer',array('email'=>$post['email']));
			if (empty($checkEmail)) {
					$insertData = array(
						'nama_lengkap'	=>	$post['namaLengkap'],
						'username'		=>	$post['username'],
						'phone'			=>	$post['telepon'],
						'email'			=>	$post['email'],
						'password'		=>	password_hash($post['password'], PASSWORD_DEFAULT),
						'created_date'	=>	date('Y-m-d H:i:s'),
						'ip_public'		=>	$_SERVER['REMOTE_ADDR'],
					);
					$this->GlobalModel->insertData('user_customer',$insertData);
		        	$this->session->set_flashdata('msg',"Selamat!, Register akun Anda berhasil, silakan login.");
					redirect(BASEURL.'login');
			} else {
				$this->session->set_flashdata('msg',"Mohon Maaf email Anda sudah terdaftar!");
				redirect(BASEURL.'login');
			}
		}
	}

	public function ubahpassword($value='')
	{
		$this->load->view('password/ubah-password');
	}

	public function ubahpasswordAct($value='')
	{
		$post = $this->input->post();
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$email = $this->GlobalModel->getDataRow('user_customer',array('email'=>$post['email']));

		if (!empty($email)) {
			$this->session->set_flashdata('msg','Anda akan menerima kode untuk memverifikasi di sini agar Anda dapat mengatur ulang kata sandi akun Anda.');
			$this->session->set_flashdata('msg','Jika Anda tidak melihat email tersebut, periksa di tempat lain, misalnya folder sampah, spam, sosial, atau folder lainnya.');

			$kodeVer = generateReferenceNumber();
			$arrayKode = array(
				'kode_verifikasi'	=> $kodeVer,
				'email'				=> $email['email']
			);
			$this->cache->save($kodeVer, $arrayKode, 300);

			$foo['foo'] = $this->cache->get($kodeVer);
			$htmlView = $this->load->view('password/body-html-verifikasi',$foo,TRUE);
			sendEmail($email['email'],'Permintaan mengatur ulang kata sandi',$htmlView,$foo);

			redirect(BASEURL.'user/accountverifikasi');
		} else {
			$this->session->set_flashdata('msg','Email anda tidak terdaftar!');
			redirect(BASEURL.'user/ubahpassword');

		}
	}

	public function accountverifikasi($value='')
	{
		$this->load->view('password/accountverifikasi');
	}

	public function accountverifikasiAct($value='')
	{
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$post = $this->input->post();
		if ( ! $foo = $this->cache->get($post['kodeVer']))
		{
			$this->session->set_flashdata('msg','Mohon maaf kode verifikasi Anda tidak cocok');
			redirect(BASEURL.'forgetpassword/accountverifikasi');
		       
		} else {
			$foo = $this->cache->get($post['kodeVer']);

			$viewData['userData'] = $this->cache->get($post['kodeVer']);
			$this->load->view('password/changepassword',$viewData);
		}
		
	}

	public function changepasswordAct($value='')
	{
		$post = $this->input->post();
		// pre($post);
		unlink(APPPATH.'cache/'.$post['kode_verifikasi']);
		$this->GlobalModel->updateData('user_customer',array('email'=>$post['email']),array('password'=>password_hash($post['password'], PASSWORD_DEFAULT)));
		$this->session->set_flashdata('msg','Silakan login menggunakan username/email Anda');
		redirect(BASEURL.'login');
	}

	public function emailtemplate($value='')
	{
		$this->load->view('password/body-html-verifikasi');
	}
}
