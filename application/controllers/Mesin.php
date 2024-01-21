<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {

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
			$data["page"] = "Master Mesin";
			$data["title"] = "Mesin";
			$ajax=$this->input->get_post("ajax");
			if($ajax=="yes")
			{
				$this->load->view('mesin/index',$data);
			}else{
				$data['konten']="mesin/index";
				$this->_template($data);
			}
		}
	}
}
