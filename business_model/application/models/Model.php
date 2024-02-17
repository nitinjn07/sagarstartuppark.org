<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	
   public function login($table,$where)
   {
      $query = $this->db->get_where($table,$where);
      return $query;
   }
    
}