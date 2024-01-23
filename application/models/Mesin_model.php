<?php
class Mesin_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }    
    public function get_data_mesin()
	{
		$this->_get_datatables_mesin();
		if ($this->input->post("length") != -1)
		$this->db->limit($this->input->post("length"), $this->input->post("start"));
        $query = $this->db->get();
        return $query->result();
	}
	public function _get_datatables_mesin()
	{
		// $f1=$this->input->post('f1');
		// if($f1){
		// 	$this->db->where('id',$f1); 
		// }
		$column_order = array('rank','machine_name');
    	$column_search = array('machine_name','equip_no');
		$order = array('rank' => 'desc');
		$this->db->from("machine");

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
	function count_filtered_mesin()
    {
        $this->_get_datatables_mesin();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_mesin()
    {
        $this->db->from("machine");
        return $this->db->count_all_results();
    }

    public function insert(){
        $data["rank"] = $this->input->post("rank");
		$data["machine_name"] = $this->input->post("machine_name");
		$data["section"] = $this->input->post("section");
		$data["equip_no"] = $this->input->post("equip_no");
		$data["cycle"] = $this->input->post("cycle");
		$data["create_by"] = $this->session->userdata("kode_user");
		$data["create_date"] = date('Y-m-d H:i:s');

        $this->db->insert('machine',$data);
        return true;
    }

    public function get_mesin_by_id($id){
        $this->db->where("id",$id);
        $user = $this->db->get("machine")->row();
        return $user;
    }

    public function cek_machine_name_exist($machine_name, $machine_name_lama){
        $this->db->where("machine_name !=",$machine_name_lama);
        $this->db->where("machine_name",$machine_name);
        $user = $this->db->get("machine")->row();
        return $user;
    }

    public function cek_equip_no_exist($equip_no, $equip_no_lama){
        $this->db->where("equip_no !=",$equip_no_lama);
        $this->db->where("equip_no",$equip_no);
        $user = $this->db->get("machine")->row();
        return $user;
    }

    public function update($id)
	{
        $data["rank"] = $this->input->post("rank");
		$data["machine_name"] = $this->input->post("machine_name");
		$data["section"] = $this->input->post("section");
		$data["equip_no"] = $this->input->post("equip_no");
		$data["cycle"] = $this->input->post("cycle");
		$data["update_by"] = $this->session->userdata("kode_user");
		$data["update_date"] = date('Y-m-d H:i:s');

        $this->db->set($data);
        $this->db->where("id", $id);
        $this->db->update('machine');
        return true;
	}
}