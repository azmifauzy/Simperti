<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function index()
	{
		$data["title"] = "Data Cuti";
		$data["i"] = 1;
		$data["cuti"] = $this->db->get('cuti')->result_array();
		$this->load->view('template/header', $data);
		$this->load->view('dashboard/cuti/cuti', $data);
		$this->load->view('template/footer');
	}

	public function permohonan()
	{
		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required', 
												array(
													'required' 	=> 'Nama Karyawan Wajib di isi.'
												)
											);
		$this->form_validation->set_rules('tgl_awal_cuti', 'Tanggal Awal Cuti', 'required|trim', 
												array(
													'required' 	=> 'Masukkan Tanggal Awal Cuti anda.'
												)
											);
		$this->form_validation->set_rules('jumlah_cuti', 'Jumlah Cuti', 'required|trim', 
												array(
													'required' 	=> 'Masukkan Jumlah Cuti yang anda butuhkan.'
												)
											);
		$this->form_validation->set_rules('subjek_cuti', 'Subject Cuti', 'required|trim|max_length[30]', 
												array(
													'required' 	=> 'Masukkan Subject Cuti anda.',
													'max_length'=> 'Subject terlalu panjang.'
												)
											);
		$this->form_validation->set_rules('keterangan_cuti', 'Keterangan Cuti', 'required|trim', 
												array(
													'required' 	=> 'Mohon Jelaskan permohonan cuti anda.'
												)
											);
		if( $this->form_validation->run() == false ) {

			$data["title"] = "Kirim Permohonan Cuti";
			$this->load->view('template/header', $data);
			$this->load->view('dashboard/cuti/tambah');
			$this->load->view('template/footer');
		} else {

			$select_karyawan = $this->db->get_where('karyawan', ["id" => $this->session->userdata('id')])->row_array();

			if($this->input->post('jumlah_cuti') > $select_karyawan["jatah_cuti"]) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"><b>Anda hanya mempunyai sisa cuti ' . $select_karyawan["jatah_cuti"] . ' Hari.</b></div>');
				redirect(base_url('cuti/permohonan'));
			}

			$data = 
			[
				"id" => "",
				"id_karyawan" => $this->session->userdata('id'),
				"tgl_awal_cuti" => $this->input->post('tgl_awal_cuti'),
				"jumlah_cuti" => $this->input->post('jumlah_cuti'),
				"subjek_cuti" => $this->input->post('subjek_cuti'),
				"keterangan_cuti" => $this->input->post('keterangan_cuti'),
				"status" => "pending"
			];

			$this->db->insert('cuti', $data);

			$session_id = $this->session->userdata('id');
			$id_cuti = $this->db->get_where('cuti', ["id_karyawan" => $session_id, "tgl_awal_cuti" => $data["tgl_awal_cuti"]])->row_array();

			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Permohonan Cuti Anda telah dikirim.</b></div>');
			redirect(base_url('cuti/detail/' . $id_cuti["id"]));

		}
	}

	public function detail($id = "")
	{
		$data["title"] = "Detail Cuti";
		$data["cuti"] = $this->db->get_where('cuti', ["id" => $id])->row_array();
		if(!$data["cuti"]) { redirect(base_url('cuti')); }
		$data["karyawan"] = $this->db->get_where('karyawan', ["id" => $data["cuti"]["id_karyawan"]])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('dashboard/cuti/detail', $data);
		$this->load->view('template/footer');
	}

	public function terima($id)
	{
		if ($this->session->userdata('jabatan') !== "Leader") {
			redirect(base_url(''));
		}

		$select_cuti = $this->db->get_where('cuti', ["id" => $id])->row_array();
		if(!$select_cuti) { redirect(base_url('cuti')); }

		$this->db->set('status', "approved");
		$this->db->where('id', $id);
		$this->db->update('cuti');

		// UPDATE JUMLAH JATAH CUTI KARYAWAN
		$select_karyawan = $this->db->get_where('karyawan', ["id" => $select_cuti["id_karyawan"]])->row_array();

		$jatah_cuti = $select_karyawan["jatah_cuti"] - $select_cuti["jumlah_cuti"];
		$this->db->set('jatah_cuti', $jatah_cuti);
		$this->db->where('id', $select_karyawan["id"]);
		$this->db->update('karyawan');

		$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Permohonan Cuti telah diterima.</b></div>');
		redirect(base_url('cuti/detail/' . $id));
	}

	public function tolak($id)
	{
		if ($this->session->userdata('jabatan') !== "Leader") {
			redirect(base_url(''));
		}
		
		$select_cuti = $this->db->get_where('cuti', ["id" => $id])->row_array();
		if(!$select_cuti) { redirect(base_url('cuti')); }

		$this->db->set('status', "rejected");
		$this->db->where('id', $id);
		$this->db->update('cuti');

		$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Permohonan Cuti telah ditolak.</b></div>');
		redirect(base_url('cuti/detail/' . $id));
	}
}
