<?php
class User_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function get_data_user()
	{
		$this->_get_datatables_user();
		if ($this->input->post("length") != -1)
		$this->db->limit($this->input->post("length"), $this->input->post("start"));
        $this->db->where("kode_user !=", $this->session->userdata("kode_user"));
        $query = $this->db->get();
        return $query->result();
	}
	public function _get_datatables_user()
	{
		// $f1=$this->input->post('f1');
		// if($f1){
		// 	$this->db->where('id',$f1); 
		// }
		$column_order = array('username','full_name');
    	$column_search = array('username','full_name');
		$order = array('kode_user' => 'desc');
		$this->db->from("users");

		$i = 0;
        foreach ($column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($column_search) - 1 == $i) 
                $this->db->group_end(); 
            }
            $i++;
        }
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($order))
        {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
	}
	function count_filtered_user()
    {
        $this->_get_datatables_user();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_user()
    {
        $this->db->from("users");
        return $this->db->count_all_results();
    }

    public function insert()
	{
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

		$data["kode_user"] = $this->input->post("kode_user");
		$data["username"] = $this->input->post("username");
		$data["password"] = md5($this->input->post("password"));
		$data["full_name"] = $this->input->post("full_name");
		$data["email"] = $this->input->post("email");
		$data["no_hp"] = $this->input->post("no_hp");
		$data["kode_role"] = $this->input->post("role");
		$data["create_date"] = $now;

        $this->db->insert('users',$data);
        return true;
	}

    public function get_user_by_id($id){
        $this->db->where("id",$id);
        $user = $this->db->get("users")->row();
        return $user;
    }

    public function update($id)
	{
        $data["kode_user"] = $this->input->post("kode_user");
		$data["username"] = $this->input->post("username");
		$data["full_name"] = $this->input->post("full_name");
		$data["no_hp"] = $this->input->post("no_hp");
		$data["email"] = $this->input->post("email");
		$data["password"] = md5($this->input->post("password"));
		$data["kode_role"] = $this->input->post("kode_role");

        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update('users');
        return true;
	}

    public function cek_username_exist($username, $username_lama){
        $this->db->where("username !=",$username_lama);
        $this->db->where("username",$username);
        $user = $this->db->get("users")->row();
        return $user;
    }

    public function cek_kode_user_exist($kode_user, $kode_user_lama){
        $this->db->where("kode_user !=",$kode_user_lama);
        $this->db->where("kode_user",$kode_user);
        $user = $this->db->get("users")->row();
        return $user;
    }

    function save_upload($id,$photo_name,$kode_user,$no_hp,$email){
        $data["kode_user"] = $kode_user;
		$data["no_hp"] = $no_hp;
		$data["email"] = $email;
        if($photo_name != "default.png"){
            $data["photo"] = $photo_name;
        }

        $this->db->set($data);
        $this->db->where("id", $id);
        $save = $this->db->update('users');
        return $save;
    }

    
}