<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_relations_model extends CI_Model{
    private $tbl_name = "public_relations";

    function get_all($keyword){
        $this->db->like('topic',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function allPublic_relations(){
        $this->db->select('*');
        $this->db->join('users','public_relations.announcer_id = users.role');
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
    function delete($public_id){    
        $this->db->where('public_id', $public_id); 
        return $this->db->delete($this->tbl_name);  
    }
    function getPublic_relations($public_id){
        $this->db->where('public_id', $public_id);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
}