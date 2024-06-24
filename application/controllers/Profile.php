<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		sessionLogin();

		$data = [
			"title" => "Profile",

			"metaDescription" => "Profile",

			"navbar" => "white"

		];
		
		$viewData['profile']	= $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')));
		$viewData['productpoin']	= $this->GlobalModel->getData("produk_poin",null);
		$viewData['voucher']	= $this->GlobalModel->getData("voucher",null);

		$this->load->view('components/header',$data);
		$this->load->view('profile',$viewData);
		$this->load->view('components/footer');
	}

	public function biodataUpdate($value='')
	{
		sessionLogin();

		$post = $this->input->post();
		$dataEmail = $this->GlobalModel->getDataRow('user_customer',array('email'=>$post['email']));
		if (empty($dataEmail)) {
			$insertData = array(
				'id_user_customer'	=>	$this->session->userdata('idAdmin'),
				'nama'	=>	$post['nama'],
				'email'	=>	$post['email'],
				'telepon'	=>	$post['telepon'],
			);

			$this->GlobalModel->insertData('user_biodata',$insertData);
			$updateData = array(
				'nama'	=>	$post['nama'],
				'email'	=>	$post['email'],
				'phone'	=>	$post['telepon'],
			);
			$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')),$updateData);
		} else {
			$updateData = array(
				'nama'	=>	$post['nama'],
				'phone'	=>	$post['telepon'],
			);
			$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')),$updateData);
			$this->session->set_flashdata('msgbiodata','Maaf Email Anda sudah terpakai!');
		}
		redirect(BASEURL."profile");
	}

	public function passwordChange($value='')
	{
		sessionLogin();
		
		$post = $this->input->post();
		$data = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata("idAdmin")));

		if (password_verify($post['currenPassword'], $data['password'])) {
			if ($post['newPassword'] == $post['confirmPassword']) {
				$insertData = array(
					'password'	=>	password_hash($post['newPassword'], PASSWORD_DEFAULT),
					'update_date'	=>	date("Y-m-d H:i:s")
				);
				$this->session->set_flashdata('msg','Password Anda telah berhasil dirubah!');
				$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$this->session->userdata("idAdmin")),$insertData);
			} else {
				$this->session->set_flashdata('msg','New Password dan Confirm Password Anda tidak cocok!');
			}
		} else {
			$this->session->set_flashdata('msg','Current Password Anda tidak cocok!');
		}

		redirect(BASEURL."profile");
		
	}

	public function photoProfile($value='')
	{
		$post = $this->input->post();
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = '*';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('photo')) {
			$idUser = $this->session->userdata('idAdmin');
			$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$idUser),array('user_profile'=>'assets/img/profile/'.$this->upload->data('file_name')));
			echo "Berhasil di upload";
		} else {
			echo $this->upload->display_errors();
		}

	}

	public function generateReferralCode($value='')
	{
		$post = $this->input->post();
		$getDataReferral = $this->GlobalModel->getData('referral_code_voucher',array('id_user_customer'=>$this->session->userdata("idAdmin"),'status_voucher'=>1));
		$countDataReferral = count($getDataReferral);
		if ($countDataReferral >= $post['jumlahVoucher']) {
			$totalValue = 0;
			foreach ($getDataReferral as $key => $ref) {
				if ($key <= $post['jumlahVoucher']) {
					$totalValue += $ref['value_voucher'];
					$this->GlobalModel->deleteData('referral_code_voucher',array('id_user_customer'=>$this->session->userdata("idAdmin"),'status_voucher'=>1));
				}
			}
				$this->GlobalModel->insertData('referral_code_voucher',array('id_user_customer'=>$this->session->userdata('idAdmin'),'submit_id_user_customer'=>$this->session->userdata('idAdmin'),'kode_voucher'=>$getDataReferral[0]['kode_voucher'],'value_voucher'=>$totalValue,'status_voucher'=>1,'kategori_voucher'=>'generate'));
			$this->session->set_flashdata('msgGenerateReferral',"Referral Code Anda berhasil di generate");
			redirect(BASEURL.'profile');
		} else {
			$this->session->set_flashdata('msgGenerateReferral',"Referral Code Anda Gagal di generate");
			redirect(BASEURL.'profile');
		}
	}

	public function claimreferral($value='')
	{
		$post = $this->input->post();
		$getDataReferral = $this->GlobalModel->getDataRow('referral_code_voucher',array('id_user_customer'=>$this->session->userdata("idAdmin"),'id_referral_code_voucher'=>$value));
		$this->GlobalModel->updateData('referral_code_voucher',array('id_user_customer'=>$this->session->userdata("idAdmin"),'id_referral_code_voucher'=>$value),array('status_voucher'=>3,'kategori_voucher'=>'claim_duit'));
		$this->session->set_flashdata('msgClaimDuit',"Referral Code Anda sedang di ajukan claim oleh admin");
		redirect(BASEURL.'profile');
	}

	private function xenditCheckout($dataUser='',$signature='')
	{
		Xendit::setApiKey(APIKEYXENDIT);
		$params = [
			'external_id' => 'ongkir_prod_poin'.$signature,
			'payer_email' => $dataUser['email'],
		    'description' => 'Pembayaran Produk Poin ongkir #'.$signature,
			'amount' => '10000',
		    'success_redirect_url' => 'https://diaryofficial.id/payment/successpoin',
		   	'failure_redirect_url' => 'https://diaryofficial.id/payment/failedpoin',
		    'currency' => 'IDR',
		];

		$createInvoice = \Xendit\Invoice::create($params);

		return $createInvoice;
	}


	public function profileRedeemProdPoin($value='')
	{
		$post = $this->input->post();
		$getDataPoinUser = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata("idAdmin")));
		$checkProdukPoin = $this->GlobalModel->getDataRow('produk_poin',array('id_produk_poin'=>$post['idProdPoin']));
		$signature = generateReferenceNumber();

		if ($getDataPoinUser['poin'] >= $checkProdukPoin['poin']) {

			if ($checkProdukPoin['status_poin'] == 'produk' || $checkProdukPoin['status_poin'] == 'item') {
				// $responseXendit = $this->xenditCheckout($getDataPoinUser,$signature);
				$redirectURLRes = array(
					// 'redirectUrl'=>	$responseXendit['invoice_url'],
					'alert'		=>	'Produk poin berhasil di claim refresh dan cek history anda untuk memastikan',
				);
				$insertDataRedeem = array(
					'id_user_customer'	=>	$this->session->userdata("idAdmin"),
					'id_produk_poin'	=>	$post['idProdPoin'],
					'status_redeem_poin'=>	1,
					'created_date'		=>	date('Y-m-d H:i:s'),
					'signature'			=>	$signature,
					// 'id_xendit'			=>	$responseXendit['id'],
					// 'user_id_xendit'	=>	$responseXendit['user_id']
				);
			} else if ($checkProdukPoin['status_poin'] == 'discount') {
				$responseXendit = array(
					'id'	=>	'',
					'user_id'=>	''
				);
				$redirectURLRes = array(
					'redirectUrl'=>	'',
					'alert'		=>	'Produk poin berhasil di claim refresh, cek Table Voucher Code Anda dan Claim pada Cart di kolom Kode Referral',
				);
				$dataVoucher = array(
					'id_user_customer'=>$this->session->userdata("idAdmin"),
					'code_promo'	=> generateReferenceNumber(),
					'promo_product_discount'	=>	$checkProdukPoin['value'],
					'created_date'	=>	date('Y-m-d H:i:s'),
					'promo_status'	=>	1,
				);
				$insertDataVoucher = $this->GlobalModel->insertData('promo_product',$dataVoucher);
				$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')),array('poin'=>$getDataPoinUser['poin'] - $checkProdukPoin['poin']));

				$insertDataRedeem = array(
					'id_user_customer'	=>	$this->session->userdata("idAdmin"),
					'id_produk_poin'	=>	$post['idProdPoin'],
					'status_redeem_poin'=>	1,
					'created_date'		=>	date('Y-m-d H:i:s'),
					'signature'			=>	$signature,
					// 'id_xendit'			=>	$responseXendit['id'],
					// 'user_id_xendit'	=>	$responseXendit['user_id'],
					'status_redeem_poin'=>	4
				);
			}

			$responseOne = array(
				'status'	=> 'success',
				'kategori'	=>	$checkProdukPoin['status_poin'],
				'code'		=>	200,
			);
			$response = array_merge($responseOne,$redirectURLRes);
			
			
			$this->GlobalModel->insertData('redeem_poin',$insertDataRedeem);
				
		} else {
			$response = array(
				'status'	=> 'failed',
				'kategori'	=>	'failed',
				'code'		=>	400,
				'alert'		=>	'Produk poin gagal di claim, poin tidak mencukupi '
			);
		}
		echo json_encode($response);
	}
	
}
