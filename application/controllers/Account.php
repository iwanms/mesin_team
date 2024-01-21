<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    function _template($data)
	{
		$this->load->view('template/main',$data);	
	}

	public function index()
	{
		if(empty($this->session->userdata('is_login')))
        {
			redirect('auth');
		}else{
			$data["page"] = "Account";
			$data["title"] = "Account";
			$ajax=$this->input->get_post("ajax");
			if($ajax=="yes")
			{
				$this->load->view('account/index',$data);
			}else{
				$data['konten']="account/index";
				$this->_template($data);
			}
		}
	}
}
