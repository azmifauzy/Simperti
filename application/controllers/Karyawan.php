<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();

		if(!$this->session->userdata('username'))
		{
			redirect(base_url('login'));
		}
	}

	public function index()
	{

		$data['i'] = 1;
		$data["karyawan"] = $this->db->get('karyawan')->result_array();

		$data["title"] = "Data Karyawan";
		$this->load->view('template/header', $data);
		$this->load->view('dashboard/karyawan/karyawan', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		if($this->session->userdata('jabatan') !== "Leader")
		{
			redirect(base_url('karyawan'));
		}

		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]|is_unique[karyawan.nik]', 
												array(
													'required' 	=> 'NIK Wajib Di isi',
													'min_length'=> "Minimal 16 Digit, Periksa kembali.",
													'max_length'=> "Maximal 16 Digit, Periksa kembali",
													'is_unique'	=> "NIK sudah dipakai."
												)
											);
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required|trim|min_length[5]|max_length[30]', 
												array(
													'required' 	=> 'Nama Karyawan Wajib Di isi',
													'min_length'=> "Minimal 5 Huruf, Coba lagi.",
													'max_length'=> "Maximal 30 Huruf, Coba lagi."
												)
											);
		$this->form_validation->set_rules('status', 'Status Karyawan', 'required|trim');
		$this->form_validation->set_rules('jabatan', 'Jabatan Karyawan', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[30]|is_unique[karyawan.username]', 
												array(
													'required' 	=> 'Username Wajib Di isi',
													'min_length'=> "Minimal 5 Huruf, Coba lagi.",
													'max_length'=> "Maximal 30 Huruf, Coba lagi.",
													'is_unique'	=> "Username sudah dipakai."
												)
											);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]', 
												array(
													'required' 	=> 'Password Wajib Di isi',
													'min_length'=> "Minimal Password 5 Huruf, Coba lagi.",
												)
											);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password]', 
												array(
													'required' 	=> 'Konfirmasi Password Wajib Di isi',
													'matches' 	=> "Konfirmasi Password Tidak Sama",
												)
											);

		if($this->form_validation->run() == false ) {

			$data["jabatan"] = $this->db->get('jabatan')->result_array();
			$this->load->view('template/header');
			$this->load->view('dashboard/karyawan/tambah', $data);
			$this->load->view('template/footer');
		} else {

			$data = [
				"id" 			=> "",
				"nik" 			=> $this->input->post('nik'),
				"nama" 			=> $this->input->post('nama'),
				"username" 		=> $this->input->post('username'),
				"password" 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				"jabatan" 		=> $this->input->post('jabatan'),
				"status" 		=> $this->input->post('status'),
				"jatah_cuti" 	=> 10,
				"tgl_masuk" 	=> date('Y-m-d')
			];

			$this->db->insert("karyawan", $data);
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil menambah karyawan.</b></div>');
			redirect(base_url('karyawan'));
		}
	}

	public function detail($id = "")
	{

		$select_karyawan = $this->db->get_where('karyawan', ["id" => $id])->row_array();
		if(empty($select_karyawan)) {
			redirect(base_url('karyawan'));
		}
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[16]|max_length[16]', 
												array(
													'required' 	=> 'NIK Wajib Di isi',
													'min_length'=> "Minimal 16 Digit, Periksa kembali.",
													'max_length'=> "Maximal 16 Digit, Periksa kembali"
												)
											);
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required|trim|min_length[5]|max_length[30]', 
												array(
													'required' 	=> 'Nama Karyawan Wajib Di isi',
													'min_length'=> "Minimal 5 Huruf, Coba lagi.",
													'max_length'=> "Maximal 30 Huruf, Coba lagi."
												)
											);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[30]|is_unique[karyawan.username]', 
												array(
													'required' 	=> 'Username Wajib Di isi',
													'min_length'=> "Minimal 5 Huruf, Coba lagi.",
													'max_length'=> "Maximal 30 Huruf, Coba lagi.",
													'is_unique'=> "Username telah terpakai."
												)
											);

		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]', 
												array(
													'required' 	=> 'Password Wajib Di isi',
													'min_length'=> "Minimal Password 5 Huruf, Coba lagi.",
												)
											);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|matches[password]', 
												array(
													'required' 	=> 'Konfirmasi Password Wajib Di isi',
													'matches' 	=> "Konfirmasi Password Tidak Sama",
												)
											);

		if( $this->form_validation->run() == false ) {


			// MENGHITUNG JUMLAH KEHADIRAN KARYAWAN
			$data["jumlah_hadir"] = count($this->db->get_where('absensi', ["id_karyawan" => $id, "status_absen" => "hadir"])->result_array());
			$data["jumlah_izin"] = count($this->db->get_where('absensi', ["id_karyawan" => $id, "status_absen" => "izin"])->result_array());
			$data["jumlah_sakit"] = count($this->db->get_where('absensi', ["id_karyawan" => $id, "status_absen" => "sakit"])->result_array());

			// MENGHITUNG JUMLAH CUTI KARYAWAN
			$data["jumlah_cuti"] = count($this->db->get_where('cuti', ["id_karyawan" => $id])->result_array());

			// GET ALL ABSENSI KARYAWAN
			$data["absensi_karyawan"] = $this->db->get_where('absensi', ["id_karyawan" => $id])->result_array();

			// GET ALL CUTI KARYAWAN
			$data["cuti_karyawan"] = $this->db->get_where('cuti', ["id_karyawan" => $id])->result_array();

			$data["karyawan"] = $this->db->get_where('karyawan', ["id" => $id])->row_array();

			$data["title"] = "Detail Karyawan";
			$this->load->view('template/header', $data);
			$this->load->view('dashboard/karyawan/detail', $data);
			$this->load->view('template/footer');



		} else {

			if($this->input->post('password') !== "") {
				$new_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
				$this->db->set('password', $new_password);
			}
			$this->db->set('nik', $this->input->post('nik'));
			$this->db->set('nama', $this->input->post('nama'));
			$this->db->set('username', $this->input->post('username'));

			$this->db->where('id', $id);
			$this->db->update('karyawan');
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil mengupdate data karyawan.</b></div>');
			redirect(base_url('karyawan/detail/' . $id));
		}
	}

	public function hapus($id)
	{
		if($this->session->userdata('jabatan') !== "Leader")
		{
			redirect(base_url('karyawan'));
		}
		
		$select_karyawan = $this->db->get_where('karyawan', ["id" => $id])->row_array();
		if(empty($select_karyawan)) {
			redirect(base_url('karyawan'));
		}

		$this->db->where('id', $id);
		$this->db->delete('karyawan');
		$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil menghapus karyawan.</b></div>');
			redirect(base_url('karyawan/'));
	}
}
