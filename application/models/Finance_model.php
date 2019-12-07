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
    function getFinance($finance_id){
        $this->db->where('finance_id', $finance_id);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
    function update($data){
        $this->db->where('finance_id',$data['finance_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }
    function delete($finance_id){    
        $this->db->where('finance_id', $finance_id); 
        return $this->db->delete($this->tbl_name);  
    }
    function allFinance(){
        $this->db->select('*');
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }
}