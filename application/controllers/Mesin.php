<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Mesin_model", "mdl");
		$this->load->library('form_validation');
	}

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

	public function get_data_mesin(){
		$list = $this->mdl->get_data_mesin();
		$data = array();
		$no = $_POST['start'];
		$no = $no + 1;
		foreach ($list as $dataDB) {

			$id = isset($dataDB->id) ? ($dataDB->id) : '';
			$rank = isset($dataDB->rank) ? ($dataDB->rank) : '';
			$machine_name = isset($dataDB->machine_name) ? ($dataDB->machine_name) : '';
			$section = isset($dataDB->section) ? ($dataDB->section) : '';
			$equip_no = isset($dataDB->equip_no) ? ($dataDB->equip_no) : '';
			$cycle = isset($dataDB->cycle) ? ($dataDB->cycle)." Month" : '';

			$tombol = '
				<button type="button" onclick="edit(`' . $id . '`)" class="btn bg-info text-white" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
				<button type="button" onclick="del(`' . $id . '`,`' . $machine_name . '`)" class="btn bg-danger text-white"><i class="fa fa-trash"></i></button>
				<button type="button" onclick="penilaian(`' . $id . '`)" class="btn bg-success text-white" data-toggle="modal" data-target="#modal-penilaian"><i class="fa fa-file-powerpoint-o"></i></button>
			';
			$row = array();
			$row[] = "<span class='size' >" . $no++ . "</span>";
			$row[] = "<span class='size' >" . $rank . "</span>";
			$row[] = "<span class='size' >" . $machine_name . "</span>";
			$row[] = "<span class='size' >" . $section . "</span>";
			$row[] = "<span class='size' >" . $equip_no . "</span>";
			$row[] = "<span class='size' >" . $cycle . "</span>";
			$row[] = $tombol;

			//add html for action
			$data[] = $row;
		}

		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mdl->count_all_mesin(),
            "recordsFiltered" => $this->mdl->count_filtered_mesin(),
            "data" => $data,
        );
		//output to json format
		echo json_encode($output);
	}

	public function	add_mesin(){
		$this->form_validation->set_rules('rank', 'Rank', 'required');
		$this->form_validation->set_rules('machine_name', 'Machine Name', 'required|is_unique[machine.machine_name]');
        $this->form_validation->set_rules('section', 'Section', 'required');
        $this->form_validation->set_rules('equip_no', 'Equip No', 'required|is_unique[machine.equip_no]');
        $this->form_validation->set_rules('cycle', 'Cycle', 'required');

		$this->form_validation->set_message('required', ' %s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', ' %s minimal 5 karakter, silahkan isi');
		$this->form_validation->set_message('is_unique', ' %s sudah dipakai');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
			$this->mdl->insert();
           	echo json_encode(['success'=>'Simpan data berhasil.']);
        }
	}

	function delete(){
		$id = $this->input->post("id");
		$this->db->where("id", $id);
		$this->db->delete("machine");
		echo json_encode(['success'=>'Hapus data berhasil.']);
	}

	function edit(){
		$id = $this->input->post("id");
		$data["user"] = $this->mdl->get_mesin_by_id($id);
		echo json_encode($this->load->view("mesin/edit", $data, true));
	}

	public function	update_mesin(){
		$this->form_validation->set_rules('rank', 'Rank', 'required');
		$this->form_validation->set_rules('machine_name', 'Nama Mesin', 'required');
        $this->form_validation->set_rules('section', 'Section', 'required|min_length[5]');
        $this->form_validation->set_rules('equip_no', 'Equip No', 'required');
        $this->form_validation->set_rules('cycle', 'Cycle', 'required');

		$this->form_validation->set_message('required', ' %s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', ' %s minimal 5 karakter, silahkan isi');
		$this->form_validation->set_message('is_unique', ' %s sudah dipakai');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
			$id = $this->input->post("id");
			$machine_name = $this->input->post("machine_name");
			$machine_name_lama = $this->input->post("machine_name_lama");
			$equip_no = $this->input->post("equip_no");
			$equip_no_lama = $this->input->post("equip_no_lama");

			$cek_machine_name_exist = null;
			if($machine_name != $machine_name_lama){
				$cek_machine_name_exist = $this->mdl->cek_machine_name_exist($machine_name, $machine_name_lama);
			}

			$cek_equip_no_exist = null;
			if($equip_no != $equip_no_lama){
				$cek_equip_no_exist = $this->mdl->cek_equip_no_exist($equip_no, $equip_no_lama);
			}
			
			if($cek_machine_name_exist != null){
				echo json_encode(['error'=>"Nama Mesin sudah dipakai."]);
			}else if($cek_equip_no_exist != null){
				echo json_encode(['error'=>"Equip No sudah dipakai."]);
			}
			else{
				$this->mdl->update($id);
				   echo json_encode(['success'=>'Update data berhasil.']);
			}
        }
	}

	function penilaian(){
		$data["penilaian"] = $this->get_penilaian_variable();
		echo json_encode($this->load->view("mesin/penilaian", $data, true));
	}

	function get_penilaian_variable(){
        $var = $this->db->get("master_penilaian")->result();
        return $var;
	}
}
