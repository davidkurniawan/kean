<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function pre($data, $next = 0){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if(!$next){ exit; }
}

function language($lang)
{
    if ($lang == 'en') {
        return 'english';
    } else {
        return 'indonesia';
    }
}

function kategori($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->getData('product_category',null);
    return $data;
}

function subkategori($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->getData('productsub_category',array('id_product_category'=>$value));
    return $data;
}

function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
}

function shoopingcart($value='')
{
    $CI =& get_instance();
    return $CI->cart->contents();
}

function generateReferenceNumber(){
    $string = date('YmdH:i')."92308929082709240974029784207420720472094720626282754725781";
    $encryptedPaymentCode = hexdec(crc32($string));
    $returnValue = substr(str_shuffle(str_repeat($encryptedPaymentCode, 6)), 0, 6);
    return $returnValue;
}

function kategoriBanner($value='')
{
    if ($value == 1) {
        return 'Utama';
    } else if($value == 2) {
        return 'Pop-up';
    }
}

function sessionLogin()
{
    $CI =& get_instance();
    $userSess = $CI->session->userdata('sessUser');
    if ($userSess == FALSE) {
        $CI->session->sess_destroy();
        redirect(BASEURL.'login');
    }
}

function productCART($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->queryManualRow('SELECT * FROM product_item pi JOIN product pt ON pi.id_product=pt.id_product WHERE pi.product_item_id="'.$value.'"');
    return $data;
}

function sessionData($value='')
{
    $CI =& get_instance();
	return $CI->session->userdata($value);
}

function urisegment($value='')
{
    $CI =& get_instance();
	return $CI->uri->segment($value);
}

function loadview($value='')
{
    $CI =& get_instance();
	return $CI->load->view($value);
}
function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}

function addresUser($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->getData('address_user',array('id_user_customer'=>$CI->session->userdata('idAdmin')));
}

function activeAddressUser($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->getDataRow('address_user',array('id_user_customer'=>$CI->session->userdata('idAdmin'),'status_address'=>1));
}

function confirmBiteShipApi($orderId="") {

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.biteship.com/v1/orders/'.$orderId.'/confirm',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
      'Authorization: '.APIKEYBITESHIP.''
    ),
  ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

  curl_close($curl);


    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function getDestination($lokasi="") {

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.biteship.com/v1/maps/areas?countries=ID&input='.$lokasi.'&type=single',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 50,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: '.APIKEYBITESHIP.''
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function orderBiteShipApi($data=""){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.biteship.com/v1/orders',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 50,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$data,
    CURLOPT_HTTPHEADER => array(
    'Authorization:'.APIKEYBITESHIP.'',
    'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function cekorderBiteShipApi($orderId='')
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.biteship.com/v1/orders/'.$orderId,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization:'.APIKEYBITESHIP.'',
      ),
    ));

   $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function getOptionShipping($param="") {

    
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.biteship.com/v1/rates/couriers',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 50,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $param,
      CURLOPT_HTTPHEADER => array(
        'Authorization: '.APIKEYBITESHIP,
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      return $response;
    }
}

function addressList($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->getData('address_user',array('id_user_customer'=>$CI->session->userdata('idAdmin')));
}

function biodataUser($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->getDataRow("user_biodata",array("id_user_customer"=>$CI->session->userdata("idAdmin")));
}

function getDataUser($value=""){
    $CI =& get_instance();
    return $CI->GlobalModel->getDataRow("user_customer",array("id_user_customer"=>$CI->session->userdata("idAdmin")));
}

function cekSubmitKodeReferral($value='')
{
    $CI =& get_instance();
    $cart = $CI->cart->contents();
    foreach ($cart as $key => $c) {
        if ($c['id'] == 82) {
            return TRUE;
        }
    }
}

function cekPaketBestie($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->getData("transaction_order_child",array("id_user_customer"=>$CI->session->userdata("idAdmin"),"product_item_id"=>82));
    foreach ($data as $key => $d) {
        $checkBestie = $CI->GlobalModel->getDataRow('transaction_order',array("id_user_customer"=>$CI->session->userdata("idAdmin"),'transaction_id'=>$d['transaction_id'],'transaction_status'=>2));
        // pre($checkBestie);
        if (!empty($checkBestie)) {
            if (!empty($checkBestie)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}

function sendEmail($emailTo='',$subjectEmail='',$htmlView='')

{

    $CI =& get_instance();
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp-relay.sendinblue.com',
        'smtp_user' => 'admin@bradrobber.com',  // Email gmail
        'smtp_pass'   => 'jHkTh7pg6GtVSR1s',  // Password gmail
        'smtp_crypto' => 'tls',
        'smtp_port'   => 587,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    // Load library email dan konfigurasinya
    $CI->load->library('email', $config);

    // Email dan nama pengirim
    $CI->email->from('admin@diaryofficial.id', 'Diary Administrator');

    // Email penerima
    $CI->email->to($emailTo); // Ganti dengan email tujuan

    // Subject email
    $CI->email->subject($subjectEmail);

    $CI->email->message($htmlView);

    if ($CI->email->send()) {

        // echo 'Email sent.';
        return true;

    } else {

        // show_error($CI->email->print_debugger());
        return false;

    }

} 

function cekAddressUser($value='')
{
    $CI =& get_instance();
    $dataAddress = $CI->GlobalModel->getDataRow('address_user',array('id_user_customer'=>$CI->session->userdata('idAdmin'),"status_address"=>1));
    if (empty($dataAddress)) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function showChildTransUser($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->queryManual('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product JOIN transaction_order_child toc ON pi.product_item_id=toc.product_item_id WHERE pi.kategori_item_product ="2" AND toc.transaction_id="'.$value.'" ');
    
}
function showChildTransUserRow($value='')
{
    $CI =& get_instance();
    return $CI->GlobalModel->queryManualRow('SELECT * FROM product_item pi JOIN product p ON pi.id_product=p.id_product JOIN jenis_product jp ON pi.nama_item_product=jp.id_jenis_product JOIN transaction_order_child toc ON pi.product_item_id=toc.product_item_id WHERE pi.kategori_item_product ="2" AND toc.transaction_id="'.$value.'" ');
    
}

function getPajak($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->getDataRow('setting_page',array('id_setting_page'=>1));
    return $data['pajak'];
}

function getDataProdukPoin($value='')
{
    $CI =& get_instance();
    $data = $CI->GlobalModel->getDataSort('produk_poin',null,'id_produk_poin','ASC');
    return $data;
}

function checkCartRedirect($value='')
{
    $CI =& get_instance();
    if (empty($CI->cart->contents())) {
        redirect(BASEURL.'reseller');
    }
}

function cekTurnPayment($value='')
{
    $CI =& get_instance();
    $cekTurn = $CI->GlobalModel->getDataRow('turn_payment',array('id_turn_payment'=>1));
    return $cekTurn['status_turn_payment'];
}

function insertdataview($title='',$idPost='',$totView='',$userId='')
{
    $CI =& get_instance();
    $userId = GetIp();
    $getHistory = $CI->GlobalModel->getDataRow('get_view_history',array('id_user'=>$userId,'flag'=>$title,'id_flag'=>$idPost));
    if (empty($getHistory)) {
        $userId = (empty($userId)) ? GetIp():$userId;
        $CI->GlobalModel->insertData('get_view_history',array('id_user'=>$userId,'flag'=>$title,'id_flag'=>$idPost,'created_date'=>date('Y-m-d H:i:s')));
        $toView = $totView+1;
        if ($title == "product") {
            $getPost = $CI->GlobalModel->updateData('product',array('id_product'=>$idPost),array('view'=>$toView));
        } else if ($title == 'news') {
            $getPost = $CI->GlobalModel->updateData('news',array('news'=>$idPost),array('view'=>$toView));
        }
    }
}

function GetIp(){
//IP ADDRESS
   $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    $AgentIp = $ipaddress;
    return $AgentIp;
}
?>