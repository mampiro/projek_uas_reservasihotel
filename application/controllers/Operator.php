<?php 
 
class Operator extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "loginoperator"){
			$alert=$this->session->set_flashdata('alert', 'Anda belum Login');
			redirect(base_url());
		}
	}
 
	function index(){

		$data['kamar'] = $this->m_hotel->kamarkosong()->result();
		$data['reservasi'] = $this->db->query('select a.*, c.* from reservasi a 
	 
	 	left join pendaftar c on a.id_pendaftar=c.id_pendaftar 



	 	order by a.id_reservasi desc

	 	')->result();
		$this->load->view('operator/overview.php', $data);
	}


	function ganti_password(){

		$this->load->view('operator/ganti_password.php');
	}

	function ganti_password_aksi(){


		$password_baru = $this->input->post('password_baru');
		$password_ulang = $this->input->post('password_ulang');

		$this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
		$this->form_validation->set_rules('password_ulang','Ulangi Password','required');

		if($this->form_validation->run()!=false){
			

			$where = $this->db->get_where('user', ['nama_user' => $this->session->userdata('nama_user')], ['status' => $this->session->userdata('status')])->row_array();

			$data = array('password_user' => md5($password_baru));

			// var_dump($where,$data,'user');
			// die;
			 $this->m_hotel->update_data($where,$data,'user');
			$this->session->set_flashdata('in','OK');
			redirect(base_url().'operator/ganti_password/?alert=sukses');

		}else{
			redirect(base_url().'operator/ganti_password');
		}
	}

	function new_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*, c.*,
		
		(select count(*) from  reservasi_detail x where a.id_reservasi=x.id_reservasi) as jumlah_kamar
		
		
		from reservasi a 
	 
	 	left join pendaftar c on a.id_pendaftar=c.id_pendaftar 



	 	order by a.id_reservasi desc

	 	')->result();

		$this->load->view('operator/reservasi', $data);
	}



	function reservasi_detail(){
		$data['reservasi'] = $this->db->query("select a.*, b.*,
		 
		
		(select count(*) from  reservasi_detail x where a.id_reservasi=x.id_reservasi) as jumlah_kamar
		
		
		from reservasi a

		 left join pendaftar b on a.id_pendaftar=b.id_pendaftar
		 where a.id_reservasi='".$this->uri->segment(3)."' ")->result();


		 $data['reservasi_detail'] = $this->db->query("select a.*, b.no_kamar,c.status_pembayaran
		
		 
		 
		 from reservasi_detail a

		 left join kamar b on a.id_kamar=b.id_kamar
		 left join reservasi c on a.id_reservasi=c.id_reservasi
		 
		 where a.id_reservasi='".$this->uri->segment(3)."' ")->result();




		$this->load->view('operator/reservasi_detail', $data);
	}

	

	function all_reservasi(){
		$data['reservasi'] = $this->db->query('select a.*,b.*,c.* from reservasi a 
	 	join kamar b on a.id_kamar=b.id_kamar join reservasi_pembayaran c on a.id_reservasi=c.id_reservasi where a.status_reservasi=2 order by a.status_reservasi desc')->result();

		$this->load->view('operator/all_reservasi', $data);
	}
 

	public function pembayaran_reservasi($id_reservasi)
	{
		

		$reservasi=$this->db->query("select * from reservasi_detail where id_reservasi='$id_reservasi'	")->result();

		foreach($reservasi as $r)
		{
			$id_kamar=$r->id_kamar;
			$this->db->query("update kamar  set status_kamar =1 where id_kamar='$id_kamar' ");

		}




		$proses=$this->db->query("update reservasi  set status_pembayaran=1 where id_reservasi='$id_reservasi' ");

		if($proses)
		{
		redirect('operator/reservasi_detail/'.$id_reservasi);
		}

	}



	public function proses_checkin($id_reservasi_detail, $id_reservasi)
	{
		

		$proses=$this->db->query("update reservasi_detail  set status_reservasi=1 where id_reservasi_detail='$id_reservasi_detail' ");

		if($proses)
		{
		redirect('operator/reservasi_detail/'.$id_reservasi);
		}

	}


	
	public function proses_checkout($id_reservasi_detail, $id_reservasi, $id_kamar)
	{
		

		$this->db->query("update kamar  set status_kamar=0 where id_kamar='$id_kamar' ");



		$proses=$this->db->query("update reservasi_detail  set status_reservasi=2 where id_reservasi_detail='$id_reservasi_detail' ");

		if($proses)
		{
		redirect('operator/reservasi_detail/'.$id_reservasi);
		}

	}





	function reservasi_selesai(){
		
		 $data['reservasi_selesai'] = $this->db->query("select a.*, b.no_kamar,c.status_pembayaran
		
		 
		 
		 from reservasi_detail a

		 left join kamar b on a.id_kamar=b.id_kamar
		 left join reservasi c on a.id_reservasi=c.id_reservasi
		 
		 where a.status_reservasi=2



		 ")->result();




		$this->load->view('operator/reservasi_selesai', $data);
	}





	
}