<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function get_role_name($kode_role = '')
    {
        $ci=& get_instance();
        $ci->load->database(); 

        $sql ="SELECT name_role AS fvalue FROM role_user WHERE kode_role='$kode_role'"; 

        $query = $ci->db->query($sql);
        $row = $query->row();
        return $row->fvalue;
    }
    
    function get_photo_user($id = '')
    {
        $ci=& get_instance();
        $ci->load->database(); 

        $sql ="SELECT photo AS fvalue FROM users WHERE id='$id'"; 

        $query = $ci->db->query($sql);
        $row = $query->row();
        return $row->fvalue;
    } 

    function get_no_hp_user($id = '')
    {
        $ci=& get_instance();
        $ci->load->database(); 

        $sql ="SELECT no_hp AS fvalue FROM users WHERE id='$id'"; 

        $query = $ci->db->query($sql);
        $row = $query->row();
        return $row->fvalue;
    } 

    function get_email_user($id = '')
    {
        $ci=& get_instance();
        $ci->load->database(); 

        $sql ="SELECT email AS fvalue FROM users WHERE id='$id'"; 

        $query = $ci->db->query($sql);
        $row = $query->row();
        return $row->fvalue;
    } 