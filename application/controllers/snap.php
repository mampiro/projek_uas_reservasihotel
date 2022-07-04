<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,OPTIONS');

class Snap extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-nqRxEH1D_huuRhjN3nRHD-xU', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {

		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['cek_temp'] 	= $this->m_tamu->cek_temp();

		$this->load->view('pendaftar/checkout', $data);

    	//$this->load->view('pendaftar/checkout_snap');
    }

    public function token()
    {
		



		$total_harga=$_GET['total_harga'];
    	$admin_fee=5000;

    	$total_harga_plus_admin=$total_harga+$admin_fee;


		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $total_harga_plus_admin, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $total_harga,
		  'quantity' => 1,
		  'name' => "Total Pembayaran"
		);

		// Optional
		$item2_details = array(
		  'id' => 'a2',
		  'price' => $admin_fee,
		  'quantity' => 1,
		  'name' => "Admin Fee"
		);

		// Optional
		$item_details = array ($item1_details, $item2_details);

		// Optional
		$billing_address = array(
		  //'first_name'    => "Andri",
		  //'last_name'     => "Litani",
		  //'address'       => "Mangga 20",
		  //'city'          => "Jakarta",
		  //'postal_code'   => "16602",
		  //'phone'         => "081122334455",
		  //'country_code'  => 'IDN'
		);

		// Optional

		/*
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);
		*/

		// Optional
		$customer_details = array(
		  'first_name'    => $_GET['nama'],
		  //'last_name'     => "Litani",
		  'email'         => $_GET['email'],
		  'phone'         => $_GET['no_hp'],
		  'billing_address'  => $billing_address,
		  //'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }


    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'),true);
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre><br>' ;



    	if($result['payment_type']=="bank_transfer")

    	{

			foreach ($result['va_numbers'] as $key ) 
			{
				$bank=$key['bank'];
				$va_number=$key['va_number'];
			}

    	}
    	elseif($result['payment_type']=="cstore")
    	{
    		$bank='';
			$va_number=$key['payment_code'];
    	}

    	else
    	{
    		foreach ($result['va_numbers'] as $key ) 
			{
				$bank=$key['bank'];
				$va_number=$key['va_number'];
			}

    	}

		
    




		$input_midtrans=array(

		'status_code'=>$result['status_code'],
		'status_message'=>$result['status_message'],
		'transaction_id'=>$result['transaction_id'],
		'order_id'=>$result['order_id'],
		'gross_amount'=>$result['gross_amount'],
		'payment_type'=>$result['payment_type'],
		'transaction_time'=>$result['transaction_time'],
		'transaction_status'=>$result['transaction_status'],
		'va_numbers_bank'=>$bank,
		'va_numbers_va_number'=>$va_number,
		'fraud_status'=>$result['fraud_status'],
		'pdf_url'=>$result['status_message'],
		'finish_redirect_url'=>$result['status_message'],
		'id_pendaftar'=>$this->session->userdata('id_pendaftar'),
		);	



		$this->db->insert('output_mitrans',$input_midtrans);


		$input=array(

		'id_pendaftar'=>$this->session->userdata('id_pendaftar'),
		'total_harga'=>$_POST['total_harga'],
		);	



		$this->db->insert('reservasi',$input);


		$id_reservasi = $this->db->insert_id();

		//date_default_timezone_set('Asia/Jakarta');

		//$tgl_entry=date("Y-m-d");





		$nm = $_POST['id_temp_reservasi'];



		foreach($nm as $key => $val)
		{

			$id_temp_reservasi=$_POST['id_temp_reservasi'][$key];


			$input2= array( 

		  	"id_reservasi" => $id_reservasi,


			"tgl_reservasi_masuk" => $_POST['tgl_reservasi_masuk'][$key],

		  	"tgl_reservasi_keluar" => $_POST['tgl_reservasi_keluar'][$key],	


		  	"id_kamar " => $_POST['id_kamar'][$key],

		  	"harga_plus_hari" => $_POST['harga_plus_hari'][$key],

			);

			$proses=$this->db->insert('reservasi_detail',$input2);


			$this->db->query("delete from temp_reservasi where 	id_temp_reservasi='".$id_temp_reservasi."'");	

		}


		if($proses)
		{

			$this->session->set_flashdata('data','Terima kasih Anda sudah melakukan transaksi');
			redirect('pendaftar/konfirm_bayar');

		}

	

    }

}
