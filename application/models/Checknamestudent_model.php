<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    class Checknamestudent_model extends CI_Model{
        
        private $tbl_name = "finance";

        function posthistorydata($status){
                $this->db->from('finance');
                $this->db->where('status',$status);
                $result = $this->db->get();
                return $result->result();
            }

          

    }
?>