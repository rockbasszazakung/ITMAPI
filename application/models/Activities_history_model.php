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
}