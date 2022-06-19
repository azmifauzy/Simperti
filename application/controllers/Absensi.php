<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index()
	{
		$data["title"] = "Data Absensi";
		$data["i"] = 1;
		$data["absensi"] =  $this->db->get('absensi')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/absensi/absensi', $data);
		$this->load->view('template/footer');
	}

	public function detail($id = "")
	{
		$data["title"] = "Detail Absensi";
		$data["detail_absensi"] =  $this->db->get_where('absensi', ["id" => $id])->row_array();
		if (!$data["detail_absensi"]) { redirect(base_url('absensi')); }
		$data["nama_karyawan"] = $this->db->get_where('karyawan', ["id" => $data["detail_absensi"]["id_karyawan"]])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/absensi/detail', $data);
		$this->load->view('template/footer');
	}
}
