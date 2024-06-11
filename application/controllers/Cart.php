<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Xendit\Xendit;

class Cart extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index($value='')
	{
		$data = [

			"title" => "Beauty Tips",

			"metaDescription" => "Beauty Tips",

			"navbar" => "white"

		];

		$this->load->view('components/header',$data);
		$this->load->view('cart');
		$this->load->view('components/footer');

	}
	public function addtocart()
	{
		$post = $this->input->post();

		$item 	= $this->GlobalModel->getDataRow('product_item',array('product_item_id '=>$post['prodItem']));
		$product = $this->GlobalModel->getDataRow('product',array('id_product '=>$item['id_product']));

		if ($post['qty'] >= $item['qty_item']) {
			$reponse = array(
				'message'	=>	'Quantity tidak ada',
				'error'		=>	TRUE,
				'code'		=>  400,
			);
		} elseif (empty($post['prodItem'])) {
			$reponse = array(
				'message'	=>	'Pastikan anda memilih Size product terlebih dahulu!',
				'error'		=>	TRUE,
				'code'		=>  400,
			);
		} else {
			if ($post['qty'] == 0) {
				$reponse = array(
					'message'	=>	'Pastikan anda memilih Qty product terlebih dahulu!',
					'error'		=>	TRUE,
					'code'		=>  400,
				);
			} else {
				$insertData = array(
		            'id'   	=> $post['prodItem'],
		            'sku'	=> $item['sku_item_product'],
		            'qty'    	=> $post['totalVal'],
		            'size'		=>	$item['size'],
		            'price'    	=> $product['harga_product'],
		            'name'    	=> $varianItem['nama_jenis_product'],
		            'image' 	=> $item['image_varian'],
		            'maxQty'	=> $item['qty_item'],
		            'diskon'	=> $product['diskon']
		        );
		    	$this->cart->insert($insertData);
			    $reponse = array(
					'message'	=>	'Item berhasil di masukan ke cart',
					'error'		=>	FALSE,
					'code'		=>  200,
				);
			}
		}
		echo json_encode($reponse);
	}

	public function buynow($value='')
	{
		$post = $this->input->post();

		$item 	= $this->GlobalModel->getDataRow('product_item',array('product_item_id '=>$post['prodItem']));
		$product = $this->GlobalModel->getDataRow('product',array('id_product '=>$item['id_product']));

		$insertData = array(
        	'id'   	=> $item['product_item_id'],
        	'sku'	=> $item['sku'],
        	'qty'    	=> $post['qty'],
        	'size'    	=> $item['size'],
        	'price'    	=> $item['harga'],
        	'name'    	=> $product['nama_product'],
        	'image' 	=> $product['product_image_front'],
        	'maxQty'	=> $item['qty_item'],
			'diskon'	=> $product['diskon']
        );

        $insertCart = array(
        	'id_customer'	=>	$this->session->userdata('idAdmin'),
        	'id_product_item'	=>	$item['product_item_id'],
        	'qty'	=>	$post['qty'],
        	'harga'	=>	$item['harga'],
        	'status'	=>	1,
        	'created_date'	=>	date('Y-m-d H:i:s'),
        );

        $this->GlobalModel->insertData('cart_product',$insertCart);

    	$this->cart->insert($insertData);

    	$reponse = array(
			'message'	=>	BASEURL.'cart',
			'error'		=>	FALSE,
			'code'		=>  200,
		);

		echo json_encode($reponse);
	}

	public function updateshopingcart($value='')
	{
		$post = $this->input->post();
		if ($post['action'] == "plus") {
			$data = array(
				'rowid'	=>$post['rowid'],
	            'id' => $post['rowid'], 
	            'qty' => $post['qty'] + 1, 
	        );
		} else {
			$data = array(
				'rowid'	=>$post['rowid'],
	            'id' => $post['rowid'], 
	            'qty' => $post['qty'] - 1, 
	        );
		}
		$this->GlobalModel->updateData('cart_product',array('id_product_item'=>$post['id'],'id_customer'=>$this->session->userdata('idAdmin')),array('qty'=>$data['qty'],'update_date'=>date('Y-m-d H:i:s'),'status'=>1));
	    $this->cart->update($data);
	    $response = array(
	    	"totalharga"	=>	"IDR ".number_format(round($this->cart->total())),
	    );
	    $mergeResponse = array_merge($response,$data);
        	echo json_encode($mergeResponse); 
	}

	public function deleteshopingcart($value='')
	{
		$post = $this->input->post();
		$data = array(
			'rowid'	=>$post['rowid'],
			'id' => $post['rowid'], 
			'qty' => 0, 
		);
	    $this->cart->update($data);

	}

	public function shoopingcart($value='')
	{
		$viewData['cartDb'] = $this->GlobalModel->getData('cart_product',array('id_customer'=>$this->session->userdata('idAdmin')));
		$viewData['cart'] = $this->cart->contents();
		$this->load->view('components/header');
		$this->load->view('cart',$viewData);
		$this->load->view('components/footer');
	}

	public function showcart($value='')
	{
		sessionLogin();

		$output = '';
        $no = 0;
        $output .= '<h3>Your Cart</h3>
					<div class="cart-table-warp" >
					<table class="table-cart">
				<thead>
					<tr>
						<th class="product-th">Product</th>
						<th class="quy-th text-center">Quantity</th>
						<th class="size-th">SizeSize</th>
						<th class="total-th">Price</th>
					</tr>
				</thead>
				<tbody>';
					foreach ($this->cart->contents() as $key => $shop){
				$output	.='<tr>
						<td class="product-col">
							<img src="'.BACKBASEURL.'images/product/'.$shop['image'].'" alt="">
							<div class="pc-title">
								<h4>'.$shop['name'].'</h4>
								<p>Rp. '.number_format($shop['price']).'</p>
							</div>
						</td>
						<td class="quy-col ">
                        	<input type="number" value="'.$shop['qty'].'" min="1" max="'.$shop['maxQty'].'"  data-rowid="'.$key.'" name="productQty" class="quantity text-center" />
						</td>
						<td class="size-col"><h4>'.$shop['size'].'</h4></td>
						<td class="total-col"><h4>'.number_format($shop['price']).'</h4></td>
					</tr>';
					}
			$output .= '</tbody>
			</table>
			</div>
			<div class="total-cost">
				<h6>Total <span>Rp. '.number_format($this->cart->total()).'</span></h6>
			</div>';

		return $output;
	}

	public function proceedtocheckout($value='')
	{
		sessionLogin();

		$viewData['cart'] = $this->cart->contents();
		$viewData['province'] = json_decode(getProvinceOngkir(),TRUE);
		$this->load->view('global/header');
		$this->load->view('checkout',$viewData);
		$this->load->view('global/footer');
	}
	public function checkoutPayment($value='')
	{
		sessionLogin();

		$post = $this->input->post();
		$dataUser = $this->GlobalModel->getDataRow('user_customer',array('id_user_customer'=>$this->session->userdata('idAdmin')));
		$dataAlamat = $this->GlobalModel->getDataRow('address_user',array('id_user_customer'=>$this->session->userdata('idAdmin'),"status_address"=>1));
		$getDataCabang = $this->GlobalModel->getDataRow('administrator',array('id_administrator'=>$post['pilihCabang']));
		$signature = generateReferenceNumber();
		$eventDiary = $this->GlobalModel->getDataRow('event_diary',array('id_event_diary'=>1));
		$today = date("Y-m-d H:i:s");
		$tanggalExp = strtotime('+1 days', strtotime( $today ));
		$transID = date('Ymd').'-'.$signature;

		if (empty($this->cart->contents())) {
			redirect(BASEURL.'produk');
		}
		if (isset($post['opsiPengiriman'])) {
			$explodOpsiPengiriman = explode("|",$post['opsiPengiriman']);
			$serviceName = $explodOpsiPengiriman[0];
			$servicePrice = isset($explodOpsiPengiriman[1])?$explodOpsiPengiriman[1]:0;
			if ($servicePrice == 0) {
				if ($post['pilihPengiriman'] == 'jne') {
					$this->session->set_flashdata('msg','Opsi Service Pengiriman kosong');
					redirect(BASEURL.'address');
				} else if($post['pilihPengiriman'] == 'sicepat') {
					$this->session->set_flashdata('msg','Opsi Service Pengiriman kosong');
					redirect(BASEURL.'address');
				} else if ($post['pilihPengiriman'] == 'AmbilSendiri') {
					if ($dataUser['status_user_karyawan'] != 1) {
						if ($eventDiary['status_event_diary'] == 1 && $dataUser['status_event'] == 0) {
							$this->session->set_flashdata('msg','Opsi Pengiriman Khusus Event Tertentu');
							redirect(BASEURL.'address');
						}
					} 
					// pre($eventDiary);
				} else {
					$serviceName = null;
					$servicePrice = 0;
				}
			}
		} else {
			if ($post['opsiPengiriman'] == 'jne') {
				$this->session->set_flashdata('msg','Opsi Service Pengiriman kosong');
				redirect(BASEURL.'address');
			} else if($post['opsiPengiriman'] == 'sicepat') {
				$this->session->set_flashdata('msg','Opsi Service Pengiriman kosong');
				redirect(BASEURL.'address');
			} else {
				$serviceName = null;
				$servicePrice = 0;
			}

		}

		if ($post['pilihPengiriman'] == "TimDiary") {
			$getDataAdmin = $this->GlobalModel->getDataRow('administrator',array('id_destination'=>$post['pilihCabang']));
			if ($getDataAdmin['kode_post'] == $post['kodePos']) {
			} else {
				$this->session->set_flashdata('msg','Mohon maaf Kode Pos Anda tidak sama dengan Tim Diary');
				redirect(BASEURL.'address');
			}
		}

		//ganti status referral code dan kupon diskon
		if ($post['claimCodeReferral']) {
			$searchReferralCode = $this->GlobalModel->getDataRow('referral_code_voucher',array('id_user_customer'=>$this->session->userdata('idAdmin'),'kode_voucher'=>$post['claimCodeReferral'],'status_voucher'=>1));
			$searchKupon = $this->GlobalModel->getDataRow('promo_product',array('id_user_customer'=>$this->session->userdata('idAdmin'),'code_promo'=>$post['claimCodeReferral'],'promo_status'=>1));
			if (!empty($searchReferralCode)) {
				$this->GlobalModel->updateData('referral_code_voucher',array('id_user_customer'=>$this->session->userdata('idAdmin'),'id_referral_code_voucher'=>$searchReferralCode['id_referral_code_voucher'],'kode_voucher'=>$post['claimCodeReferral']),array('status_voucher'=>2));
			} elseif (!empty($searchKupon)) {
				$this->GlobalModel->updateData('promo_product',array('id_user_customer'=>$this->session->userdata('idAdmin'),'promo_product_id'=>$searchKupon['promo_product_id'],'code_promo'=>$post['claimCodeReferral']),array('promo_status'=>2));
			}
			

		}

		if (!empty($post['kategoriPotongan'])) {
			if ($post['kategoriPotongan'] == "potongan") {
				$calculateTotal = $this->cart->total() - $post['valuePotongan'];
				$potongan = $post['valuePotongan'];
			} else {
				$calculateTotal = $this->cart->total();
				$potongan = null;
			}
		} else {
			$calculateTotal = $this->cart->total();
			$potongan = null;
		}

		if ($post['paymentGateway'] == "manual") {
			$paymentGatewayTitle = 'TF BCA-4882020111';
		} else if ($post['paymentGateway'] == "xendit") {
			$paymentGatewayTitle = "xendit";
		}

		if (date("H:i:s") > strtotime("12:00:00")) {
			$tanggalExp = strtotime('+2 days', strtotime( $today ));
			$tanggalDelivery = date('Y-m-d', $tanggalExp);
		} else {
			$tanggalExp = strtotime('+1 days', strtotime( $today ));
			$tanggalDelivery = date('Y-m-d', $tanggalExp);
		}

		$dataKeranjang = array(
			"id_user_customer"	=>	$this->session->userdata('idAdmin'),
			"shipping_amount" => $servicePrice,
			"transaction_id" => date('Ymd').'-'.$signature,
			"total_harga"	=>	$this->cart->total(),
			"transaction_status"	=>	1,
			"id_address_user"	=>	$dataAlamat['id_address_user'],
			"payment_method"	=>	$paymentGatewayTitle,
			"user_phone" => $dataUser['phone'],
			"user_email" => $dataUser['email'],
			"user_name" => $dataUser['nama'],
			"user_provinsi" => $dataAlamat['provinsi'],
			"user_kota" => $dataAlamat['kota'],
			"user_alamat" => $dataAlamat['alamat_lengkap'],
			"user_kode_pos"	=>	$dataAlamat['kodepos'],
			"user_kurir" => $post['pilihPengiriman'],
			"potongan_product"	=> $potongan,
			"ekspedisi_service"	=> $serviceName,
			"user_nik"	=>	$this->session->userdata('sessNikUser'),
			"user_description" => $post['catatan'],
			"date_created" => date('Y-m-d H:i:s'),
			"date_expired"	=>	date('Y-m-d H:i:s', $tanggalExp),
			"bukti_pembayaran"	=>	null,
			"total_qty"	=>	count($this->cart->contents()),
			"id_administrator"	=>	$post['pilihCabang'],
			"pajak"			=>	getPajak(),
			'delivery_date'	=>	$tanggalDelivery,
	    	'delivery_time'	=>	"15:00",
		);
		$this->GlobalModel->insertData("transaction_order",$dataKeranjang);

		foreach ($this->cart->contents() as $key => $cart) {
			$dataItem = array(
				"id_user_customer"	=>	$this->session->userdata('idAdmin'),
				"transaction_id"	=>	date('Ymd').'-'.$signature,
				"product_item_id"	=>	$cart['id'],
				"name" => $cart['name'],
			    	"qty" => $cart['qty'],
			    	"price" => $cart['price'],
			    	"image_product"	=>	$cart['image'],
			    	"created_date"	=>	date("Y-m-d H:i:s")
			);
			$this->GlobalModel->insertData("transaction_order_child",$dataItem);
		}
		
		$viewData['dataOrder'] = $this->GlobalModel->getDataRow('transaction_order',array('transaction_id'=>$transID));
		$viewData['cart'] = $this->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product JOIN transaction_order_child toc ON pi.product_item_id=toc.product_item_id WHERE pi.kategori_item_product ="2" AND toc.transaction_id="'.$transID.'" ');
		$email = $this->load->view('email/confirm-pembayaran',$viewData,TRUE);

		sendEmail($dataUser['email'],"Invoice#".date('Ymd').'-'.$signature." Tagihan ",$email);
		
		if ($post['paymentGateway'] == "xendit") {
			$xenditCheckout = $this->xenditCheckout($transID,$calculateTotal,$servicePrice,$dataUser,$dataAlamat,$getDataCabang);
		}

		if ($post['pilihPengiriman'] == "jne" || $post['pilihPengiriman'] == "sicepat" || $post['pilihPengiriman'] == "sap" || $post['pilihPengiriman'] == "anteraja") {
			$this->OrderbiteShip($dataAlamat,$getDataCabang,$dataKeranjang,$post);
		} 
		

		$this->cart->destroy();

		if ($post['paymentGateway'] == "manual") {
			redirect(BASEURL.'cart/paymentstatus/'.$dataKeranjang['transaction_id']);
		} else if ($post['paymentGateway'] == "xendit") {
			redirect($xenditCheckout['invoice_url']);
		}
	}

	private function xenditCheckout($transID='',$calculateTotal="",$servicePrice="",$dataUser="",$dataAlamat="",$getDataCabang="")
	{
		Xendit::setApiKey(APIKEYXENDIT);
		$params = [
			'external_id' => 'pembayaran_'.$transID,
			'payer_email' => $dataUser['email'],
		    'description' => 'Pembayaran Code Transaksi #'.$transID,
			'amount' => $calculateTotal + $servicePrice,
			// 'for-user-id' => $getDataCabang['user_id_xendit'],
			'payment_methods'	=>	["BNI", "BSI", "BRI", "MANDIRI", "PERMATA","DANA","QRIS"],
		    	'customer' => [
			        'given_names' => $dataUser['nama'],
			        'surname' => $dataUser['nama'],
			        'email' => $dataUser['email'],
			        'mobile_number' => $dataUser['phone'],
			        'addresses' => [
			            [
			                'city' => $dataAlamat['kota'],
			                'country' => 'Indonesia',
			                'postal_code' => $dataAlamat['kodepos'],
			                'state' => $dataAlamat['alamat_lengkap'],
			                'street_line1' => $dataAlamat['alamat_lengkap'],
			                'street_line2' => $dataAlamat['alamat_lengkap'],
			            ]
			        ]
			    ],
		    'success_redirect_url' => 'https://diaryofficial.id/payment/success',
		   	'failure_redirect_url' => 'https://diaryofficial.id/payment/failed',
		    'currency' => 'IDR',
		];

		foreach ($this->cart->contents() as $key => $cart) {
			$items['items'][] = array(
				'name' => $cart['name'],
				'quantity' => $cart['qty'],
				'price' => $cart['price'],
				'category' => 'Produk Kencantikan',
			);
		}

		$request = array_merge($params,$items);
		$createInvoice = \Xendit\Invoice::create($request);

		$this->GlobalModel->updateData("transaction_order",array('transaction_id'=>$transID),array("id_xendit"=>$createInvoice['id'],"user_id_xendit"=>$createInvoice['user_id']));
		return $createInvoice;
	}

	public function OrderbiteShip($dataCustomer="",$dataCabang="",$dataTransaksi="",$dataPost="")
	{
		$today = date("Y-m-d H:i:s");
		if (date("H:i:s") > strtotime("14:00:00")) {
			$tanggalExp = strtotime('+1 days', strtotime( $today ));
			$tanggalDelivery = date('Y-m-d', $tanggalExp);
		} else {
			$tanggalExp = strtotime( $today );
			$tanggalDelivery = date('Y-m-d', $tanggalExp);
		}
		$dataBitship = array(
		    "origin_contact_name"=> "Diary Cabang ".$dataCabang['nama'],
		    "origin_contact_phone"=> $dataCabang['no_telepon'],
		    "origin_address"=> $dataCabang['alamat_lengkap'],
		    "origin_postal_code"=> $dataCabang['kode_post'],
		    "destination_contact_name"=> $dataCustomer['nama'],
		    "destination_contact_phone"=> $dataCustomer['telepon'],
		    "destination_address"=> $dataCustomer['alamat_lengkap'].', '.$dataCustomer['destination_name'],
		    "destination_postal_code"=> $dataCustomer['kodepos'],
		    "courier_company"=> $dataPost['pilihPengiriman'],
		    "courier_type"=> $dataPost['serviceCode'],
		    "delivery_type"=> "later",
		    "delivery_date"=> $tanggalDelivery,
		    "delivery_time"=> "15:00",
		    "payment_type" => "online",
		);

		foreach ($this->cart->contents() as $key => $cart) {
		$produkItem = $this->GlobalModel->getDataRow('product_item',array('product_item_id'=>$cart['id']));
		$produkSpec = $this->GlobalModel->getDataRow('product',array('id_product'=>$produkItem['id_product']));
        	$arrayItem['items'][] = array(
                    "name"		=> $cart['name'],
                    "description"	=> $cart['id'],
                    "length"		=> $produkSpec['length'],
                    "width"			=> $produkSpec['width'],
                    "height"		=> $produkSpec['height'],
                    "weight"		=> $produkSpec['weight'],
                    "quantity"		=> $cart['qty'],
                    "value"		=> $cart['subtotal']
                );
        }
	    $paramMerge = array_merge($dataBitship,$arrayItem);
	    $arrayToJsonParam = json_encode($paramMerge);

	    $responseBiteShip = json_decode(orderBiteShipApi($arrayToJsonParam),TRUE);
	    // pre($responseBiteShip);
	    $updateData = array(
	    	'delivery_date'	=>	$dataBitship['delivery_date'],
	    	'delivery_time'	=>	"15:00",
	    	'id_order_biteship'	=>	$responseBiteShip['id'],
	    );
	    $this->GlobalModel->updateData('transaction_order',array('transaction_id'=>$dataTransaksi['transaction_id']),$updateData);
	}	

	public function paymentstatus($value='')
	{
		sessionLogin();
		
		$viewData['trans'] = $this->GlobalModel->getDataRow('transaction_order',array('transaction_id'=>$value));
		$viewData['cart'] = $this->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product JOIN transaction_order_child toc ON pi.product_item_id=toc.product_item_id WHERE pi.kategori_item_product ="2" AND toc.transaction_id="'.$value.'" ');
		$this->cart->destroy();
		$this->load->view('components/header');
		$this->load->view('bukti-transfer',$viewData);
		$this->load->view('components/footer');

	}
	public function paymentConfirmation($value='')
	{
		$viewData['dataPayment'] = $this->input->get();
		pre($viewData);

		$this->load->view('global/header');
		$this->load->view('showpayment',$viewData);
		$this->load->view('global/footer');	
	}

	public function paymentListener($value='')
	{
		$json = file_get_contents('php://input',true); 
		if (empty($json)) {
			echo "FALSE";
		} else {
			$insertData = array(
				'description'	=> $json,
				'created_date'	=>	date('Y-m-d H:i:s')
			);
			$this->GlobalModel->insertData('paymentstatus',$insertData);
			echo "ACCEPTED";

		}
	}
	public function getDestination()
	{
		$post = $this->input->post();
		$destination = $post['destination'];
		$destinationRess = json_decode(getDestination($destination),TRUE);
		$html = '';
			$html .= '<div class="option-destination">Choose Address</div>';
		foreach ($destinationRess['areas'] as $key => $value) {
			$html .= '<div class="option-destination" data-iddesti="'.$value['id'].'" data-provinsi="'.$value['administrative_division_level_1_name'].'" data-kota="'.$value['administrative_division_level_2_name'].'" data-kecamatan="'.$value['administrative_division_level_3_name'].'" data-kodepos="'.$value['postal_code'].'" >'.$value['name'].'</div> ';
		}

		echo $html;
	}
	public function getCost($value='')
	{
		$post = $this->input->post();
		$dataCost = json_decode(apiCostOngkir('457',$post['city'],1000,$post['kurir']),TRUE);
		$html = '';
							
			$html .= '<option>Choose Cost</option>';
		foreach ($dataCost['rajaongkir']['results'][0]['costs'] as $key => $value) {
			$html .='<option value="'.$value['cost'][0]['value'].'">'.$value['cost'][0]['value'].' - '. $value['description'].' - Estimasi '.$value['cost'][0]['etd'].' Days </option>';
		}
		
		echo $html;
	}

	public function buktitrans($value='')
	{
		$config['upload_path']          = './assets/img/buktitransfer/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $post = $this->input->post();
	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('buktiTF'))
	        {
                $error = array('error' => $this->upload->display_errors());

                pre($error);
	        }
	        else
	        {
                $this->GlobalModel->updateData('transaction_order',array('transaction_id'=>$post['transID']),array('bukti_pembayaran'=>'assets/img/buktitransfer/'.$this->upload->data('file_name')));
                redirect(BASEURL.'cart/paymentstatus/'.$post['transID']);
	        }
	}

	public function addCartPaketBestie($value='')
	{
		$product = $this->GlobalModel->getDataRow("product",array("id_product"=>89));
		$insertData = array(
	            'id'   	=> 89,
	            'sku'	=> "89PAKETBESTIE",
	            'qty'    	=> 1,
	            'price'    	=> $product['harga_product'],
	            'name'    	=> $product['nama_product'],
	            'image' 	=> $product['product_image_front'],
		);
		$this->cart->insert($insertData);
		redirect(BASEURL."cart");
	}

	public function pilihopsipengiriman($value='')
	{
		$post = $this->input->post();
		$customerDestination = $this->GlobalModel->getDataRow("address_user",array('id_user_customer'=>$this->session->userdata("idAdmin"),"status_address"=>1));
		
			$insertParam = array(
	            "origin_area_id"		=> $post['idCabang'],
	            "destination_area_id"	=> $customerDestination['id_destination'],
	            "couriers"				=> $post['idEkspedisi'],
	        );

	        foreach ($this->cart->contents() as $key => $cart) {
	        	$produkItem = $this->GlobalModel->getDataRow('product_item',array('product_item_id'=>$cart['id']));
				$produkSpec = $this->GlobalModel->getDataRow('product',array('id_product'=>$produkItem['id_product']));
		        	$arrayItem['items'][] = array(
		                    "name"		=> $cart['name'],
		                    "description"	=> $cart['id'],
		                    "length"		=> $produkSpec['length'],
		                    "width"			=> $produkSpec['width'],
		                    "height"		=> $produkSpec['height'],
		                    "weight"		=> $produkSpec['weight'],
		                    "quantity"		=> $cart['qty'],
		                    "value"		=> $cart['subtotal']
		                );
	        }
	       	$paramMerge = array_merge($insertParam,$arrayItem);
	       	$arrayToJsonParam = json_encode($paramMerge);
	       	
	       	$jsonToArrayResponse = json_decode(getOptionShipping($arrayToJsonParam),TRUE);
	       	$html = '';
	      	if ($jsonToArrayResponse['success'] == TRUE) {
		    	$html = '<option>Pilih Ekpedisi Service</option>';
	      	} else {
		    	$html = '<option>Ambil dicabang tertera</option>';
	      	}

            if ($this->cart->total() >= 500000){
            $html .= '<option data-price="0" data-total="0" value="TimDiary">Tim Diary</option>';
            }
	       	foreach ($jsonToArrayResponse['pricing'] as $key => $pricing) {
	       		$html .= "<option data-price='".($pricing['price'])."' data-total='".number_format($this->cart->total() + $pricing['price'])."' data-servicecode='".$pricing['courier_service_code']."' value='".$pricing['courier_service_name']."  (".$pricing['duration'].")|".($pricing['price'])."'>".$pricing['courier_service_name']."  (".$pricing['duration'].") ".number_format($pricing['price'])." IDR </option>";
	       	}
	       	echo $html;
	}

	public function getCodeVoucher($value='')
	{
		$post = $this->input->post();
		$checkKodeUser = $this->GlobalModel->getDataRow('user_customer',array('ref_code'=>$post['codeReferral'],'id_user_customer'=>$this->session->userdata('idAdmin')));
		$getReferralCode = $this->GlobalModel->getDataRow('user_customer',array('ref_code'=>$post['codeReferral']));
		if (!empty($checkKodeUser)) {
			$dataReturn = array(
				'code'	=>	400,
				'result'	=>	'Referral code Anda masukan tidak terdaftar',
				'error'	=> true,
			);
			echo json_encode($dataReturn);
		} else {
			if (!empty($getReferralCode)) {

				$searchReferralCode = $this->GlobalModel->getDataRow('referral_code_voucher',array('submit_id_user_customer'=>$this->session->userdata('idAdmin'),'id_user_customer'=>$getReferralCode['id_user_customer'],'kode_voucher'=>$post['codeReferral']));
				if (empty($searchReferralCode)) {
					$this->GlobalModel->insertData('referral_code_voucher',array('id_user_customer'=>$getReferralCode['id_user_customer'],'submit_id_user_customer'=>$this->session->userdata('idAdmin'),'kode_voucher'=>$post['codeReferral'],'value_voucher'=>10000,'status_voucher'=>1,'kategori_voucher'=>'user_customer'));
						$dataReturn = array(
							'code'	=>	200,
							'result'=> 'Referral code anda berhasil di tambahkan',
							'error'	=> false,
						);
						echo json_encode($dataReturn);
				} else {
					$dataReturn = array(
						'code'	=>	400,
						'result'	=>	'Referral code ini sudah pernah Anda gunakan',
						'error'	=> true,
					);
					echo json_encode($dataReturn);
				}

			}
		}

		
		
	}

	public function claimCodeReferral($value='')
	{
		$post = $this->input->post();
		$searchReferralCode = $this->GlobalModel->getDataRow('referral_code_voucher',array('id_user_customer'=>$this->session->userdata('idAdmin'),'kode_voucher'=>$post['claimCodeReferral'],'status_voucher'=>1));
		$searchKupon = $this->GlobalModel->getDataRow('promo_product',array('id_user_customer'=>$this->session->userdata('idAdmin'),'code_promo'=>$post['claimCodeReferral'],'promo_status'=>1));
		if (!empty($searchKupon)) {
			$hargaDiskon = ($this->cart->total() * $searchKupon['promo_product_discount']) / 100;
			$response = array(
				'value'	=>	$hargaDiskon,
				'titleVal'	=>	'IDR '.number_format($this->cart->total() - $hargaDiskon),
				'response'	=>	'Berhasil di claim',
				'error'	=>	false,
				'code'	=>	200
			);
			echo json_encode($response);
		} else if ($this->cart->total() >= 50000 && !empty($searchReferralCode)) {
			if (!empty($searchReferralCode)) {
				$response = array(
					'value'	=>	$searchReferralCode['value_voucher'],
					'titleVal'	=>	'IDR '.number_format($this->cart->total() - $searchReferralCode['value_voucher']),
					'response'	=>	'Berhasil di claim',
					'error'	=>	false,
					'code'	=>	200
				);
				echo json_encode($response);
			} else {
				$response = array(
					'value'	=>	0,
					'titleVal'	=>	'IDR '.number_format($this->cart->total()),
					'response'	=>	'Gagal di claim, kode referral ini sudah tidak active',
					'error'	=>	true,
					'code'	=>	400
				);
				echo json_encode($response);
			}
		}
	}
}