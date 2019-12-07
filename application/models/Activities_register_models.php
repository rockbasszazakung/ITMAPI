<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_register_models extends CI_Model{
    private $tbl_name = "student";

    function getActivities_register($id){
        $this->db->where('id', $id);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
}