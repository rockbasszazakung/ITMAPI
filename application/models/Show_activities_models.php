<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_model extends CI_Model{
    private $tbl_name = "show_activities";
    function get_all($keyword){
        $this->db->like('show_activities_name	',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function show_activities(){
        $this->db->select('*');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }
    function update($data){
        $this->db->where('show_activities_id',$data['show_activities_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
    function delete($activities_id){    
        $this->db->where('show_activities_id', $show_activities_id); 
        return $this->db->delete($this->tbl_name);  
    }
}