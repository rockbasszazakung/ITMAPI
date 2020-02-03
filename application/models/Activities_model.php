<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends CI_Model{
    public $tbl_name = "activities";

    function search($activities_name = null){
        if($activities_name == null){
        
        }
        else{
            $this->db->like('activities.activities_name',$activities_name);
        }
        $this->db->join('users','activities.user_id = users.user_id');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function allActivities(){
        $this->db->select('*');
        // $this->db->join('users','activities.user_id = users.role');
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
    function getActivities($activities_id){
        $this->db->where('activities_id', $activities_id);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

}