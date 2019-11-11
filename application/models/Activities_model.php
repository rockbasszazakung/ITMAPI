<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends CI_Model{
    private $tbl_name = "activities";

    function get_all($keyword){
        $this->db->like('activities_name',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function allActivities(){
        $this->db->select('*');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }
    function update($data){
        $this->db->where('activities_id',$data['activities_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
    function delete($activities_id){    
        $this->db->where('activities_id', $activities_id); 
        return $this->db->delete($this->tbl_name);  
    }
}