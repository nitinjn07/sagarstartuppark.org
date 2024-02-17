<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {
    
    public function selectData($table)
    {
    	$query = $this->db->get($table)->result();

        return $query;
    }

	public function selectDataWhere($table,$where)
	{
       $query = $this->db->get_where($table,$where);

       return $query;
	}
   
    public function insertData($table,$data)
    {
      $rs = $this->db->insert($table, $data);
      return $rs;
    }
   
    public function deleteData($table,$where)
    {

        $rs = $this->db->delete($table, $where);
        return $rs;
    }
   
    public function updateData($table,$data,$where)
    { 
		$rs = $this->db->update($table, $data, $where);
		return $rs;
    }
    
    public function selectOrderDataWhere($table,$where)
    {
       $query = $this->db->order_by('id','desc')->get_where($table,$where);

       return $query;
    }
}
