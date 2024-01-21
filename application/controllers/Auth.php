<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function _template($data)
	{
		$this->load->view('template/main',$data);	
	}

	public function index()
	{
		if(empty($this->session->userdata('is_login')))
        {
			$this->load->view('auth/login');
		}else{
			redirect('dashboard');
		}
	}

	public function proses_login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->db->where("username", $username);
		$cekUser = $this->db->get("users")->row();

		if($cekUser == null){
			echo json_encode(['error'=>"Username tidak terdaftar."]);
		}else{
			if(md5($password) != $cekUser->password){
				
				echo json_encode(['error'=>"Password salah."]);
			}else{
				$name_role = get_role_name($cekUser->kode_role);
				$this->session->set_userdata('id',$cekUser->id);
				$this->session->set_userdata('kode_user',$cekUser->kode_user);
				$this->session->set_userdata('username',$cekUser->username);
				$this->session->set_userdata('full_name',$cekUser->full_name);
				$this->session->set_userdata('email',$cekUser->email);
				$this->session->set_userdata('no_hp',$cekUser->no_hp);
				$this->session->set_userdata('role',$name_role);
				$this->session->set_userdata('kode_role',$cekUser->kode_role);
				$this->session->set_userdata('is_login',TRUE);
				$this->session->set_userdata('create_date',$cekUser->create_date);
				echo json_encode(['success'=>"Login berhasil."]);
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('kode_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('email');
		$this->session->set_userdata('no_hp');
		$this->session->set_userdata('kode_role');
		$this->session->set_userdata('is_login');
		$this->session->set_userdata('create_date');
		redirect('auth');
	}
}
