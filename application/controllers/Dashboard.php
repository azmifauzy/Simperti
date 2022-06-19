<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->form_validation->set_rules('kehadiran', 'Kehadiran', 'required', 
												array(
													'required' 	=> 'Pilih kehadiranmu.',
												)
											);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		if( $this->form_validation->run() == false ) {

			$session_id = $this->session->userdata('id');

			// MENGHITUNG JUMLAH KEHADIRAN KARYAWAN YANG LOGIN
			$data["jumlah_hadir"] = count($this->db->get_where('absensi', ["id_karyawan" => $session_id, "status_absen" => "hadir"])->result_array());
			$data["jumlah_izin"] = count($this->db->get_where('absensi', ["id_karyawan" => $session_id, "status_absen" => "izin"])->result_array());
			$data["jumlah_sakit"] = count($this->db->get_where('absensi', ["id_karyawan" => $session_id, "status_absen" => "sakit"])->result_array());

			// STATUS KEHADIRAN KARYAWAN YANG LOGIN
			$data["status_kehadiran_hari_ini"] = $this->db->get_where('absensi', ["id_karyawan" => $session_id, "tgl_absen" => date("Y-m-d")])->row_array();

			// MENGHITUNG SEMUA JUMLAH KARYAWAN
			$data["jumlah_karyawan"] = count($this->db->get('karyawan')->result_array());

			// MENGHITUNG SEMUA JUMLAH KARYAWAN YANG HADIR HARI INI
			$data["hadir_hari_ini"] = count($this->db->get_where('absensi', ["tgl_absen" => date("Y-m-d")])->result_array());

			// MENGHITUNG SEMUA JUMLAH JABATAN
			$data["jumlah_jabatan"] = count($this->db->get('jabatan')->result_array());

			// MENGHITUNG JUMLAH CUTI
			$data["jumlah_cuti"] = count($this->db->get('cuti')->result_array());

			// PERMINTAAN CUTI PENDING
			$data["cuti_pending"] = $this->db->get_where('cuti', ["status" => "pending"])->result_array();

			// PERMOHONAN CUTI KARYAWAN
			$data["cuti_karyawan"] = $this->db->get_where('cuti', ["id_karyawan" => $session_id])->result_array();

			// LAPORAN PERSETUJUAN CUTI
			$this->db->order_by('id', 'desc');
			$data["cuti_warn"] = $this->db->get_where('cuti', ["id_karyawan" => $session_id])->row_array();



			$data["title"] = "Dashboard";
			$this->load->view('template/header', $data);
			$this->load->view('dashboard/index', $data);
			$this->load->view('template/footer');


		} else {

			$keterangan = $this->input->post('keterangan');

			if($this->input->post('kehadiran') === "hadir")
			{
				$keterangan = "hadir";
			}

			$data = 
			[
				"id" => "",
				"id_karyawan" => $this->session->userdata('id'),
				"tgl_absen" => date("Y-m-d"),
				"status_absen" => $this->input->post('kehadiran'),
				"keterangan" => $keterangan
			];

			$this->db->insert('absensi', $data);
			$this->session->set_flashdata('berhasil', '');
			redirect(base_url(''));
		}
	}
}
