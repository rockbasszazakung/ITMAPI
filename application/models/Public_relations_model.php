<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_relations_model extends CI_Model{
    private $tbl_name = "public_relations";

    function get_all($keyword){
        $this->db->like('public_name',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }

    function update($data){
        $this->db->where('public_id',$data['public_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
}