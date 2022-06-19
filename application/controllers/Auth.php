<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('username'))
		{
			redirect(base_url(''));
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim',
											array(
													'required' 	=> 'Anda harus mengisi username.',
												)
											);
		$this->form_validation->set_rules('password', 'Password', 'required|trim',
											array(
													'required' 	=> 'Anda harus mengisi password.',
												)
											);
		if($this->form_validation->run() == false ) {

			$data["title"] = "SIMPER - Login";
			$this->load->view('auth/login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$select_karyawan = $this->db->get_where('karyawan', ["username" => $username])->row_array();
			
			if(password_verify($password, $select_karyawan["password"]))
			{

				$data = 
				[
					"id" 		=> $select_karyawan["id"],
					"username" 	=> $select_karyawan["username"],
					"nama" 		=> $select_karyawan["nama"],
					"jabatan" 		=> $select_karyawan["jabatan"],
					"timelog" 	=> date('h:i:s')
				];
				$this->session->set_userdata($data);
				redirect(base_url(''));
			} else {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert"><b>Username atau Password anda salah.</b></div>');
				redirect(base_url('login'));
			}
		}
	}

	public function logout()
	{
		session_destroy();
		session_unset();
		redirect(base_url('login'));
	}
}
