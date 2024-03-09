<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listener extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function invoicestatus($value='')
	{
		$rawRequestInput = file_get_contents("php://input");
		$arrRequestInput = json_decode($rawRequestInput, true);
		
		$xenditXCallbackToken = 'PgkqGcUWJV4KMtw64Ejqtwe1BzWUH3FjnFVtbfIhv86M12VG';
		$checkID = $this->GlobalModel->getDataRow('transaction_order',array('id_xendit'=>$arrRequestInput['id']));
		$reqHeaders = getallheaders();
		$xIncomingCallbackTokenHeader = isset($reqHeaders['X-CALLBACK-TOKEN']) ? $reqHeaders['X-CALLBACK-TOKEN'] : "";
		//Jika status transaksi pending
		if ($checkID['transaction_status'] == 1) {
			// code...
			if($xIncomingCallbackTokenHeader === $xenditXCallbackToken){
			  
			  
			  $_id = $arrRequestInput['id'];
			  $_externalId = $arrRequestInput['external_id'];
			  $_userId = $arrRequestInput['user_id'];
			  $_status = $arrRequestInput['status'];
			  $_paidAmount = $arrRequestInput['paid_amount'];
			  $_paidAt = $arrRequestInput['paid_at'];
			  $_paymentChannel = $arrRequestInput['payment_channel'];
			  $_paymentDestination = $arrRequestInput['payment_destination'];
			  if(empty($checkID)){
			  	http_response_code(405);
			  } else {
			  	if ($_status == "EXPIRED") {
				  	$this->GlobalModel->updateData('transaction_order',array('id_xendit'=>$arrRequestInput['id']),array("transaction_status"=>"3",'update_trans_date'=>date('Y-m-d H:i:s')));
			  	} else if ($_status == "PAID") {

			  		$getDataUser = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$checkID['id_user_customer']));
					$poinCalculate = (($_paidAmount - $checkID['shipping_amount'] - $checkID['potongan_product']) / 1000) / 100;
					$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$getDataUser['id_user_customer']),array('poin'=> $getDataUser['poin'] + $poinCalculate));
				  	$this->GlobalModel->updateData('transaction_order',array('id_xendit'=>$arrRequestInput['id']),array("transaction_status"=>"2",'update_trans_date'=>date('Y-m-d H:i:s'),'payment_code'=>$_paymentChannel));

				  	$responseConfirmBiteShip = json_decode(confirmBiteShipApi($checkID['id_order_biteship']),TRUE);
				  	$updateEkpedisi = array(
				  		'ekspedisi_status'	=> 2,
				  		'id_tracking_biteship'	=>	$responseConfirmBiteShip['courier']['tracking_id'],
				  		'nomer_resi'	=>	$responseConfirmBiteShip['courier']['waybill_id'],
				  	);

				  	$this->GlobalModel->updateData('transaction_order',array('id_xendit'=>$arrRequestInput['id']),$updateEkpedisi);
			  	}
			  	$jsonArray = array(
			  		$_externalId => $arrRequestInput['external_id'],
					$_userId => $arrRequestInput['user_id'],
					$_status => $arrRequestInput['status'],
					$_paidAmount => $arrRequestInput['paid_amount'],
					$_paidAt => $arrRequestInput['paid_at'],
					$_paymentChannel => $arrRequestInput['payment_channel'],
					$_paymentDestination => $arrRequestInput['payment_destination'],
			  	);
			  	$insertData = array(
			  		'title_pembayaran'	=>	$_id,
			  		'description'	=>	json_encode($jsonArray),
			  		'created_date'	=>	date('Y-m-d H:i:s')
			  	);
			  	$this->GlobalModel->insertData('history_pembayaran',$insertData);
			  	http_response_code(200);
			  }
			  // You can then retrieve the information from the object array and use it for your application requirement checking
			    
			}else{

			  http_response_code(403);
			}
		} else {

			$checkRedeem = $this->GlobalModel->getDataRow('redeem_poin',array('id_xendit'=>$arrRequestInput['id']));
			$_id = $arrRequestInput['id'];
			$_status = $arrRequestInput['status'];

			//jika status transaksi yang lain selain pending di tolak
			if ($checkRedeem['status_redeem_poin'] == 1) {
				if($xIncomingCallbackTokenHeader === $xenditXCallbackToken){
					
					if ($_status == "PAID") {

						$checkProdukPoin = $this->GlobalModel->getDataRow('produk_poin',array('id_produk_poin'=>$checkRedeem['id_produk_poin']));
						$getDataPoinUser = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$checkRedeem['id_user_customer']));
						$insertData = array(
							'id_user_customer'	=>	$checkRedeem['id_user_customer'],
							'history_title'	=>	$checkProdukPoin['produk_poin_title'].'-'.$checkProdukPoin['id_produk_poin'],
							'history_kategori'	=>	'claim produk poin',
							'poin'	=>	'-'.$checkProdukPoin['poin'],
							'history_desc'	=>	'pengurangan poin '.$checkProdukPoin['poin'].', penukaran '.$checkProdukPoin['produk_poin_title']
						);
						$this->GlobalModel->insertData('history_poin',$insertData);
						$this->GlobalModel->updateData('user_customer',array('id_user_customer'=>$checkRedeem['id_user_customer']),array('poin'=>$getDataPoinUser['poin'] - $checkProdukPoin['poin']));
						$this->GlobalModel->updateData('redeem_poin',array('id_xendit'=>$_id),array('status_redeem_poin'=>2));

					} else if($_status == "EXPIRED") {

						$this->GlobalModel->deleteData('redeem_poin',array('id_xendit'=>$_id));

					}
				} else {

					//token tidak sesuai
			  		http_response_code(403);

				}

			} else {

				//transaksi tidak pending
			  http_response_code(403);

			}

		}
	}
}