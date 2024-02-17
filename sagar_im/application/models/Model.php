<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    
  
    
    public function get_startup_count($table,$where) {
        return $this->db->get_where($table,$where)->num_rows();
    }
    
    public function get_pending_startup($limit, $start,$table,$where) {

        $data = $this->db->limit($limit,$start)->get_where($table,$where)->result();
        return $data;
              
    }
    
    public function get_pending_startup_order_by($limit, $start,$table,$where) {

        $data = $this->db->order_by('id','desc')->limit($limit,$start)->get_where($table,$where)->result();
        return $data;
              
    }

    public function get_course_count($table,$where) {
        $videodb = $this->load->database('videodb', TRUE);
        return $videodb->get_where($table,$where)->num_rows();
    }
    
    public function get_pending_course($limit, $start,$table,$where) {
        $videodb = $this->load->database('videodb', TRUE);
        $data = $videodb->limit($limit,$start)->get_where($table,$where)->result();
        return $data;
              
    }


 
}