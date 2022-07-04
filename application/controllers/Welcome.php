<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['kamar'] 			= $this->m_tamu->kamarall();
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('welcome_message', $data);
	}

	public function cari(){

		$id = $this->input->post('id_kelas_kamar');
  		 $data['kamar'] = $this->m_tamu->kamarallkelas($id);
  		 $data['kelas_kamar'] = $this->m_hotel->get_data('kelas_kamar');
  		 $this->load->view('welcome_message', $data);

	}

	public function kamardetail()
	{
		$id = $this->uri->segment(3);
		$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
		$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
		$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
		$this->load->view('kamar_detail', $data);
	}

	public function saran()
	{
		$this->load->view('saran');
	}

	public function saran_aksi(){
		$nama_saran = $this->input->post('nama_saran');
		$email_saran = $this->input->post('email_saran');
		$tlp_saran = $this->input->post('tlp_saran');
		$isi_saran = $this->input->post('isi_saran');

		$data = array(
			'nama_saran' => $nama_saran,
			'email_saran' => $email_saran,
			'tlp_saran' => $tlp_saran,
			'isi_saran' => $isi_saran
			
			
		);

		$this->m_hotel->insert_data($data,'saran');

		// mengalihkan halaman ke halaman data anggota
		$this->session->set_flashdata('data', 'Pesan anda sudah terkirim silahkan...');
		redirect(base_url().'welcome/saran');
	}

	public function reservasi(){
			$this->form_validation->set_rules('tgl_reservasi_masuk','Tanggal Masuk','required');
			$this->form_validation->set_rules('tgl_reservasi_keluar','Tanggal Keluar','required');
			$this->form_validation->set_rules('nama_reservasi','Nama','required');
			$this->form_validation->set_rules('tlp_reservasi','Tlp','required');
			$this->form_validation->set_rules('alamat_reservasi','Alamat','required');

					if ($this->form_validation->run()==FALSE) {
						$id = $this->input->post('id_kamar');
						$data['kamar'] 			= $this->m_tamu->KamarDetail($id);
						$data['kamar_gambar'] 	= $this->m_tamu->KamarGambarId($id);
						$data['kelas_kamar'] 	= $this->m_hotel->get_data('kelas_kamar');
						redirect(base_url().'welcome/kamardetail/'.$id);
					}
					else{
			
					$tgl_reservasi_masuk 	= $this->input->post('tgl_reservasi_masuk');
					$tgl_reservasi_keluar 	= $this->input->post('tgl_reservasi_keluar');
					$id_kamar 				= $this->input->post('id_kamar');
					$nama_reservasi 		= $this->input->post('nama_reservasi');
					$tlp_reservasi			= $this->input->post('tlp_reservasi');
					$alamat_reservasi 		= $this->input->post('alamat_reservasi');
					
					
					$data = array(
						'tgl_reservasi_masuk' => tgl_luar($tgl_reservasi_masuk),
						'tgl_reservasi_keluar' => tgl_luar($tgl_reservasi_keluar),
						'id_kamar' => $id_kamar,
						'nama_reservasi' => $nama_reservasi,
						'tlp_reservasi' => $tlp_reservasi,
						'alamat_reservasi' => $alamat_reservasi,
						'status_reservasi' 		=> 0
						
					);
							
					$this->m_tamu->insert_data($data, 'reservasi');
							
					$this->session->set_flashdata('berhasil','OK');
					$id = $this->input->post('id_kamar');
					redirect(base_url().'welcome/kamardetail/'.$id);
				}
	}



	public function pendaftaran()
	{
		$this->load->view('pendaftaran');
	}


	public function login()
	{
		$this->load->view('login_pendaftar');
	}




	public function proses_daftar()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),


        );
        $proses = $this->m_login->proses_daftar($data);
        $this->session->set_flashdata('data', 'Akun telah terdaftar, silahkan login ....');
        redirect("welcome/pendaftaran?proses=sukses");
    }





	
    public function proses_login()
    {

            $cek = $this->m_login->proses_login_pendaftar();

            foreach ($cek->result_array() as $a) {

                $session_data['nama'] = $a['nama'];
                $session_data['id_pendaftar'] = $a['id_pendaftar'];

                $this->session->set_userdata($session_data);
            }

            if ($cek->num_rows() >= 1) 
			{


				if($_POST['id_kamar']=="")
				{
                	redirect('pendaftar');
				}
				else
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



            } 
			else 
			{
			?>
                <script language="javascript">
                    alert("Maaf user dan password anda salah klik OK untuk kembali");
                    history.back();
                </script>

            <?php
            }
			
    }

	public function reservasi_login()
	{
		$this->load->view('reservasi_login');
	}







	function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }

	
}
