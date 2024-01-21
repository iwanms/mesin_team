<?php
class Pegawai_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function get_data_pegawai()
	{
		$this->_get_datatables_pegawai();
		if ($this->input->post("length") != -1)
		$this->db->limit($this->input->post("length"), $this->input->post("start"));
        $query = $this->db->get();
        return $query->result();
	}
	public function _get_datatables_pegawai()
	{
		// $f1=$this->input->post('f1');
		// if($f1){
		// 	$this->db->where('id',$f1); 
		// }
		$column_order = array('Nip','Nm_pegawai');
    	$column_search = array('Nip','Nm_pegawai');
		$order = array('id_pegawai' => 'desc');
		$this->db->from("tbl_pegawai");

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
	function count_filtered_pegawai()
    {
        $this->_get_datatables_pegawai();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_pegawai()
    {
        $this->db->from("tbl_pegawai");
        return $this->db->count_all_results();
    }

    public function insert()
	{
		$data["Nip"] = $this->input->post("nip");
		$data["Nm_pegawai"] = $this->input->post("nm_pegawai");
		$data["Jk"] = $this->input->post("jk");
		$data["Tpt_lhr"] = $this->input->post("tempat_lahir");
		$data["Tgl_lahir"] = $this->input->post("tanggal_lahir");
        $data["Agama"] = $this->input->post("agama");
		$data["No_hp"] = $this->input->post("no_hp");
		$data["Email"] = $this->input->post("email");
		$data["Alamat"] = $this->input->post("alamat");
		$data["Tgl_msk"] = $this->input->post("tanggal_masuk");

        $this->db->insert('tbl_pegawai',$data);
        return true;
	}

    public function get_user_by_id($id){
        $this->db->where("id_pegawai",$id);
        $user = $this->db->get("tbl_pegawai")->row();
        return $user;
    }

    public function update($id)
	{
		$data["Nip"] = $this->input->post("nip");
		$data["Nm_pegawai"] = $this->input->post("nm_pegawai");
		$data["Jk"] = $this->input->post("jk");
		$data["Tpt_lhr"] = $this->input->post("tempat_lahir");
		$data["Tgl_lahir"] = $this->input->post("tanggal_lahir");
        $data["Agama"] = $this->input->post("agama");
		$data["No_hp"] = $this->input->post("no_hp");
		$data["Email"] = $this->input->post("email");
		$data["Alamat"] = $this->input->post("alamat");
		$data["Tgl_msk"] = $this->input->post("tanggal_masuk");

        $this->db->set($data);
        $this->db->where("id_pegawai", $id);
        $this->db->update('tbl_pegawai');
        return true;
	}

    public function get_pegawai_by_id($id){
        $this->db->where("id_pegawai",$id);
        $user = $this->db->get("tbl_pegawai")->row();
        return $user;
    }
}