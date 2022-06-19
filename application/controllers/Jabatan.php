<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();

		if(!$this->session->userdata('username'))
		{
			
			redirect(base_url('login'));
		}

		if($this->session->userdata('jabatan') !== "Leader")
		{
			redirect(base_url('login'));
		}
	}

	public function index()
	{

		$this->form_validation->set_rules('id_jabatan', 'ID Jabatan', 'trim');
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim', 
												array(
													'required' 	=> 'Nama Jabatan Wajib Di isi',
												)
											);
		if($this->form_validation->run() == false ) {


			$data["jabatan"] = $this->db->get('jabatan')->result_array();

			$data["title"] = "Data Jabatan";
			$this->load->view('template/header', $data);
			$this->load->view('dashboard/jabatan/jabatan', $data);
			$this->load->view('template/footer');
		} else {

			$id = $this->input->post('id_jabatan');
			$nama_jabatan = $this->input->post('nama_jabatan');

			if(empty($id)) {

				// JIKA TIDAK ADA ID, MAU CREATE JABATAN
				$data = 
				[
					"id" => "",
					"jabatan" => $nama_jabatan
				];

				$this->db->insert('jabatan', $data);
				$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil menambah jabatan baru.</b></div>');
				redirect(base_url('jabatan'));

			} else {

				// JIKA ADA ID, MAU EDIT/UPDATE JABATAN
				$this->db->set('jabatan', $nama_jabatan);
				$this->db->where('id', $id);
				$this->db->update('jabatan');

				$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil mengupdate data jabatan.</b></div>');
				redirect(base_url('jabatan'));
			}

		}

	}

	public function hapus($id)
	{
		$select_jabatan = $this->db->get_where('jabatan', ["id" => $id])->row_array();
		if(empty($select_jabatan)) {
			redirect(base_url('jabatan'));
		}

		$this->db->where('id', $id);
		$this->db->delete('jabatan');
		$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert"><b>Berhasil menghapus jabatan.</b></div>');
			redirect(base_url('jabatan/'));
	}
}
