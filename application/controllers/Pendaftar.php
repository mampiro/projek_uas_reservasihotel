<?php 
 
class Pendaftar extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        if(!$this->session->userdata('id_pendaftar')){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
 
	function index(){


		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['kamar'] 		    = $this->m_tamu->kamarall();
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('pendaftar/welcome_message', $data);
	}



	public function cari(){

		$id = $this->input->post('id_kelas_kamar');
		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();

  		 $data['kamar'] = $this->m_tamu->kamarallkelas($id);
  		 $data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar');
        $this->load->view('pendaftar/welcome_message', $data);

	}


    public function kamardetail()
	{
		$id = $this->uri->segment(3);
		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();

		$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
		$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('pendaftar/kamar_detail', $data);
	}


	public function update_user() 
	{


			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$new_name = time().$_FILES["foto"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			
			$datafoto=$this->upload->data();
					
			//GD
			$this->load->library('image_lib');
			$configer =  array(
				'image_library'   => 'gd2',
				'source_image'    =>  $datafoto['full_path'],
				'maintain_ratio'  =>  TRUE,
				'width'           =>  250,
				'height'          =>  250,
			);
			$this->image_lib->clear();
			$this->image_lib->initialize($configer);
			$this->image_lib->resize();
			
			

			if($_FILES["foto"]['name']=="")
			{
				$nama_photo=$_POST['hidden_foto'];
			}
			else
			{
				
				$nama_photo=$datafoto['file_name'];

				unlink("./uploads/".$_POST['hidden_foto']);
			}



				
			$input = array(
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'ktp' => $this->input->post('ktp'),
				'foto' => $nama_photo,
				);

				$where=array('id_pendaftar'=> $this->session->userdata('id_pendaftar'));

				$proses=$this->db->update('pendaftar',$input, $where);

	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('pendaftar');
			}

		


	} 


	function reservasi_cart()
	{
        $input = array(
            'id_kamar' => $this->input->post('id_kamar'),
            'tgl_reservasi_masuk' => tgl_luar($this->input->post('tgl_reservasi_masuk')),
            'tgl_reservasi_keluar' => tgl_luar($this->input->post('tgl_reservasi_keluar')),
 			'id_pendaftar' =>$this->session->userdata('id_pendaftar'),

        );
		$proses=$this->db->insert('temp_reservasi',$input);
        $this->session->set_flashdata('data', 'Data kamar telah ditambahkan , silahkan lakukan checkout');
        redirect("pendaftar/reservasi?proses=sukses");
	}



	function hapus_temp()
	{
     //echo rand();
	 $this->load->view('pendaftar/hapus_temp');
	}




	function reservasi()
	{


		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['cek_temp'] 	= $this->m_tamu->cek_temp();

		$this->load->view('pendaftar/reservasi', $data);
	}



	function checkout()
	{


		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['cek_temp'] 	= $this->m_tamu->cek_temp();

		$this->load->view('pendaftar/checkout', $data);
	}





	function profil(){


		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$this->load->view('pendaftar/profil', $data);
	}


	function konfirm_bayar()
	{



		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['cek_temp'] 	= $this->m_tamu->cek_temp();

		$this->load->view('pendaftar/reservasi', $data);
	}



	function histori_transaksi()
	{



		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();
		$data['histori_transaksi'] 	= $this->m_tamu->histori_transaksi();

		$this->load->view('pendaftar/histori_transaksi', $data);
	}


	

	function reservasi_detail(){

		$data['cek_pendaftar'] 	= $this->m_tamu->cek_pendaftar();



		$data['reservasi'] = $this->db->query("select a.*,
		 
		
		(select count(*) from  reservasi_detail x where a.id_reservasi=x.id_reservasi) as jumlah_kamar
		
		
		from reservasi a

		 where a.id_reservasi='".$this->uri->segment(3)."'");


		 $data['reservasi_detail'] = $this->db->query("select a.*, b.no_kamar,c.status_pembayaran
		
		 
		 
		 from reservasi_detail a

		 left join kamar b on a.id_kamar=b.id_kamar
		 left join reservasi c on a.id_reservasi=c.id_reservasi
		 
		 where a.id_reservasi='".$this->uri->segment(3)."' ")->result();




		$this->load->view('pendaftar/reservasi_detail', $data);
	}







}