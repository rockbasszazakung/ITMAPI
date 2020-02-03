<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_history_model extends CI_Model{
    private $tbl_name = "activities_history";

    function get_all($keyword){
        $this->db->select("activities_history.activities_history_id,activities.activities_name,activities.start_date");
        $this->db->from($this->tbl_name);
        $this->db->join('activities','activities_history.activities_id = activities.activities_id');
        $this->db->like('activities.activities_name',$keyword);
        $result = $this->db->get();
        return $result->result();
    }
    function insert($data){
            return $this->db->insert($this->tbl_name, $data);
        }
        function allActivities(){
            $this->db->select('*');
            // $this->db->join('users','activities.user_id = users.role');
            $result = $this->db->get($this->tbl_name);
            return $result->result();
        }
        function update($data){
            $this->db->where('activities_history_id',$data['activities_history_id']);
            $this->db->update($this->tbl_name,$data);
            $result = $this->db->get($this->tbl_name);
            return $result;
        }

        function getActivities($activities_history_id){
            $this->db->where('activities_history_id', $activities_history_id);
            $result = $this->db->get($this->tbl_name);
            return $result->result();
        }
        function delete($activities_history_id){    
            $this->db->where('activities_history_id', $activities_history_id); 
            return $this->db->delete($this->tbl_name);  
        }
    
}