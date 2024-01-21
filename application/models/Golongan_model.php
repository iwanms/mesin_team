<?php
class Golongan_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function get_data_golongan()
	{
		$this->_get_datatables_golongan();
		if ($this->input->post("length") != -1)
		$this->db->limit($this->input->post("length"), $this->input->post("start"));
        $query = $this->db->get();
        return $query->result();
	}
	public function _get_datatables_golongan()
	{
		// $f1=$this->input->post('f1');
		// if($f1){
		// 	$this->db->where('id',$f1); 
		// }
		$column_order = array('Username','Password','Nama');
    	$column_search = array('Username','Nama');
		$order = array('id_user' => 'desc');
		$this->db->from("user");

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
	function count_filtered_golongan()
    {
        $this->_get_datatables_golongan();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_golongan()
    {
        $this->db->from("user");
        return $this->db->count_all_results();
    }

    public function insert()
	{
		$data["Username"] = $this->input->post("username");
		$data["Nama"] = $this->input->post("nama");
		$data["No_hp"] = $this->input->post("no_hp");
		$data["Password"] = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
		$data["Level"] = $this->input->post("level");

        $this->db->insert('user',$data);
        return true;
	}

    public function get_user_by_id($id){
        $this->db->where("id_user",$id);
        $user = $this->db->get("user")->row();
        return $user;
    }

    public function update($id)
	{
        $data["id_user"] = $id;
		$data["Username"] = $this->input->post("username");
		$data["Nama"] = $this->input->post("nama");
		$data["No_hp"] = $this->input->post("no_hp");
		$data["Password"] = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
		$data["Level"] = $this->input->post("level");


        $this->db->set($data);
        $this->db->where("id_user", $data["id_user"]);
        $this->db->update('user');
        return true;
	}

    public function cek_username_exist($username, $username_lama){
        $this->db->where("Username !=",$username_lama);
        $this->db->where("Username",$username);
        $user = $this->db->get("user")->row();
        return $user;
    }
}