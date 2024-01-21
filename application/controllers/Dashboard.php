<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			$data["page"] = "Dashboard";
			$ajax=$this->input->get_post("ajax");
			if($ajax=="yes")
			{
				$this->load->view('dashboard',$data);
			}else{
				$data['konten']="dashboard";
				$this->_template($data);
			}
		}
	}
}
