<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance_model extends CI_Model{
    private $tbl_name = "finance";
    function show_activities(){
        $this->db->select('*');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }
}