<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exporttest extends BD_Controller{
    function __construct(){
        
        parent::__construct();
        
        $this->load->model('Checknamestudent_model');
    }
    function get_exporttest_get(){
        $status = $this->get('status');
        $result = $this->Checknamestudent_model->posthistorydata($status);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }


}