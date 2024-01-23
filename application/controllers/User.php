<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("User_model", "mdl");
		$this->load->library('form_validation');
	}

	function get_level(){
		$this->db->select("*");
		$this->db->from("role_user");
		$level = $this->db->get()->result();
		return $level;
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
			$data["page"] = "Kelola Data User";
			$data["level"] = $this->get_level();

			$ajax=$this->input->get_post("ajax");
			if($ajax=="yes")
			{
				$this->load->view('user/index', $data);
			}else{
				$data['konten']="user/index";
				$this->_template($data);
			}
		}
	}

	public function	add_user(){
		$this->form_validation->set_rules('kode_user', 'Kode User', 'required|is_unique[users.kode_user]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');

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

	public function get_data_user(){
		$list = $this->mdl->get_data_user();
		$data = array();
		$no = $_POST['start'];
		$no = $no + 1;
		foreach ($list as $dataDB) {

			$id = isset($dataDB->id) ? ($dataDB->id) : '';
			$kode_user = isset($dataDB->kode_user) ? ($dataDB->kode_user) : '';
			$username = isset($dataDB->username) ? ($dataDB->username) : '';
			$password = isset($dataDB->password) ? ($dataDB->password) : '';
			$full_name = isset($dataDB->full_name) ? ($dataDB->full_name) : '';
			$email = isset($dataDB->email) ? ($dataDB->email) : '';
			$kode_role = isset($dataDB->kode_role) ? ($dataDB->kode_role) : '';
			$no_hp = isset($dataDB->no_hp) ? ($dataDB->no_hp) : '';

			//get name role
			$role = get_role_name($kode_role); 

			$tombol = '
				<button type="button" onclick="edit(`' . $id . '`)" class="btn bg-info text-white" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
				<button type="button" onclick="del(`' . $id . '`,`' . $full_name . '`)" class="btn bg-danger text-white"><i class="fa fa-trash"></i></button>
			';
			$row = array();
			$row[] = "<span class='size' >" . $no++ . "</span>";
			$row[] = "<span class='size' >" . $kode_user . "</span>";
			$row[] = "<span class='size' >" . $username . "</span>";
			$row[] = "<span class='size' >" . $full_name . "</span>";
			$row[] = "<span class='size' >" . $no_hp . "</span>";
			$row[] = "<span class='size' >" . $email . "</span>";
			$row[] = "<span class='size' >" . $role . "</span>";
			$row[] = $tombol;

			//add html for action
			$data[] = $row;
		}

		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->mdl->count_all_user(),
            "recordsFiltered" => $this->mdl->count_filtered_user(),
            "data" => $data,
        );
		//output to json format
		echo json_encode($output);
	}

	function edit(){
		$id = $this->input->post("id");
		$data["user"] = $this->mdl->get_user_by_id($id);
		$data["role"] = $this->get_level();
		echo json_encode($this->load->view("user/edit", $data, true));
	}

	public function	update_user(){
		$this->form_validation->set_rules('kode_user', 'Kode User', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[5]');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('kode_role', 'Kode Role', 'required');

		$this->form_validation->set_message('required', ' %s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', ' %s minimal 5 karakter, silahkan isi');
		$this->form_validation->set_message('is_unique', ' %s sudah dipakai');

        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
			$id = $this->input->post("id");
			$kode_user = $this->input->post("kode_user");
			$kode_user_lama = $this->input->post("kode_user_lama");
			$username = $this->input->post("username");
			$username_lama = $this->input->post("username_lama");

			$cek_username_exist = null;
			if($username != $username_lama){
				$cek_username_exist = $this->mdl->cek_username_exist($username, $username_lama);
			}

			$cek_kode_user_exist = null;
			if($kode_user != $kode_user_lama){
				$cek_kode_user_exist = $this->mdl->cek_kode_user_exist($kode_user, $kode_user_lama);
			}
			
			if($cek_username_exist != null){
				echo json_encode(['error'=>"Username sudah dipakai."]);
			}else if($cek_kode_user_exist != null){
				echo json_encode(['error'=>'Kode User sudah dipakai.']);
			}else{
				$this->mdl->update($id);
				   echo json_encode(['success'=>'Update data berhasil.']);
			}
        }
	}

	function delete(){
		$id = $this->input->post("id");
		$this->db->where("id", $id);
		$this->db->delete("users");
		echo json_encode(['success'=>'Hapus data berhasil.']);
	}

	function do_upload(){
		$id = $this->input->post("id");
		$kode_user = $this->input->post("kode_user");
		$username = $this->input->post("username");
		$no_hp = $this->input->post("no_hp");
		$email = $this->input->post("email");
		$file = $this->input->post("file");
		if($file != "default.png"){
			$check_photo = get_photo_user($id);
			
			if($check_photo != null){
				if($check_photo != "default.png"){
					$target_file = "./assets/upload/profile/".$check_photo->photo;
					unlink($target_file);
				}
			}
		}

        $config['upload_path']="./assets/upload/profile";
        $config['allowed_types']='gif|jpg|png|jpeg';

		if($file != "default.png"){
			$photo= explode(".",$_FILES['file']['name']);
			$ext = end($photo);
			$photo_name = $kode_user."_".$username.".".$ext;

			// var_dump($photo_name);die;
			$config['file_name'] = $photo_name;
         
			$this->load->library('upload',$config);
			if($this->upload->do_upload("file")){
				$data = array('upload_data' => $this->upload->data());
			}
		}else{
			$photo_name = "default.png";
		}
		$result= $this->mdl->save_upload($id,$photo_name,$kode_user,$no_hp,$email);
		echo json_encode(['success'=>'Simpan data berhasil.']);
	}

	// function get_image_user($kode_user){
	// 	$this->db->where("kode_user",$kode_user);
	// 	$user = $this->db->get("users")->row();
	// 	return $user;
	// }

	

}
