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
 
}