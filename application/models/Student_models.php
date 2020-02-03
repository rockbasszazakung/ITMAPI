<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_models extends BD_Model{
    public $tbl_name = "student";
    
    function getStudentbyid($student_id){
        $this->db->select('name_structure,major');
        $this->db->where('student_id',$student_id);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

}