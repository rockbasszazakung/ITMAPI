<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Role_models extends CI_Model{
    private $tbl_name = "role";

    function get_all($keyword){
        $this->db->like('activities_name',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }
    function allActivities(){
        $this->db->select('*');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function update($data){
        $this->db->where('role_id',$data['role_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
    function delete($role_id){    
        $this->db->where('role_id', $role_id); 
        return $this->db->delete($this->tbl_name);  
    }


}