<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		// pre($this->cart->contents());
		checkCartRedirect();

		$data = [

			"title" => "Reseller",

			"metaDescription" => "Reseller",

			"navbar" => "blue"

		];
		$viewData['addressAdmin'] = $this->GlobalModel->getData('administrator',null);
		$viewData['user'] = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')));
		$viewData['event']	=	$this->GlobalModel->getDataRow('event_diary',array('id_event_diary'=>1));
		$this->load->view('components/header',$data);
		$this->load->view('address',$viewData);
		$this->load->view('components/footer');
	}

	public function addressSubmit($value='')
	{
		$post = $this->input->post();
		$dataAlamat = $this->GlobalModel->getDataRow('address_user',array('id_user_customer'=>$this->session->userdata('idAdmin')));
		if (empty($dataAlamat)) {
			$insertData = array(
				'id_user_customer'	=>	$this->session->userdata("idAdmin"),
				'email'	=>	$post['email'],
				'nama'	=>	$post['nama'],
				'telepon'	=>	$post['telepon'],
				'simpan_alamat'	=>	$post['simpanAlamat'],
				'alamat_lengkap'	=>	$post['alamatLengkap'],
				'id_destination'	=>	$post['idDestination'],
				'destination_name'	=>	$post['selectAlamat'],
				'provinsi'	=>	$post['provinsi'],
				'kota'	=>	$post['kota'],
				'kecamatan'	=>	$post['kecamatan'],
				'kodepos'	=>	$post['kodePos'],
				'created_date'	=>	date("Y-m-d H:i:s"),
				'status_address'	=>	1,
			);
			$this->GlobalModel->insertData("address_user",$insertData);
		} else {
			$insertData = array(
				'id_user_customer'	=>	$this->session->userdata("idAdmin"),
				'email'	=>	$post['email'],
				'nama'	=>	$post['nama'],
				'telepon'	=>	$post['telepon'],
				'simpan_alamat'	=>	$post['simpanAlamat'],
				'alamat_lengkap'	=>	$post['alamatLengkap'],
				'id_destination'	=>	$post['idDestination'],
				'destination_name'	=>	$post['selectAlamat'],
				'provinsi'	=>	$post['provinsi'],
				'kota'	=>	$post['kota'],
				'kecamatan'	=>	$post['kecamatan'],
				'kodepos'	=>	$post['kodePos'],
				'created_date'	=>	date("Y-m-d H:i:s"),
				'status_address'	=>	0,
			);
			$this->GlobalModel->insertData("address_user",$insertData);
		}
		redirect(BASEURL."address");
	}

	public function pilihalamat($value='')
	{
		$post = $this->input->post();
		$this->GlobalModel->updateData("address_user",array('id_user_customer'=>$this->session->userdata("idAdmin")),array("status_address"=>0));
		$this->GlobalModel->updateData("address_user",array('id_address_user'=>$post['addressID']),array("status_address"=>1));
	}

	public function alamatcabang($value='')
	{
		$post = $this->input->post();
		$data = $this->GlobalModel->getDataRow('administrator',array('id_destination'=>$post['iddes']));
		echo json_encode($data);
	}

	public function cekpengiriman($value='')
	{
		$post = $this->input->post();
		$responseBiteShip = json_decode(cekorderBiteShipApi($post['idorder']),TRUE);
		$viewData['dataKurir'] = $responseBiteShip['courier'];
		echo $this->load->view('components/cekpengiriman',$viewData,true);
	}
	
}