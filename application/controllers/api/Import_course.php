<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class courses extends API_Controller{
class Import_course extends BD_Controller{
    function __construct()
    {    
        parent::__construct();
        $this->load->model('import_course_model');
    }

    function inportcourse_post(){
        $course = $this->post('student');
            $data = [];
            foreach ($course as $i => $v) {
                $data['student'][$i] = [
                    'student_id'     => $v['student_id'],
                    'name_structure' => $v['name_structure'],
                    'major'          => $v['major']
                ];
            }

            $result = $this->import_course_model->import_course($data);
            if ($result != null)
            {
                $this->response([
                    'status' => true,
                    'response' => $result
                ], REST_Controller::HTTP_OK); 
            }else{
                $this->response([
                    'status' => false,
                    'message' => ''
                ], REST_Controller::HTTP_CONFLICT);
            }
    }
}