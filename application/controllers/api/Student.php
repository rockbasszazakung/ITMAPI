<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends BD_Controller{
    function __construct(){
        
        parent::__construct();
        
        $this->load->model('Student_models');
    }
    function get_select_get(){
        $result = $this->Student_models->getAll();
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

    function getStudent_get(){
        $student_id = $this->get('student_id');
        $result = $this->Student_models->getStudentbyid($student_id);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }

}