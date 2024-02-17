<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model 
{


public function insertdata($table,$data)
{
$rs=$this->db->insert($table, $data);

 return $rs;

}
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

public function mail()
{
$this->email->from($email, $fname);
$this->email->to('iaviabvp@gmail.com');


$this->email->subject('Email Test');
$this->email->message($msg);

$this->email->send();
}

public function newinsertdata()
{
	$data['email'] = $this->input->post('email');
	$data['ip'] = 'haye';

	$this->db->insert('subscribe', $data);
}

function check_email_ava($email)
    {
       $this->db->where('email',$email);
       $query = $this->db->get('startup');

       if($query->num_rows() > 0)
       {
           return true;
       }
       else
       {
           return false;
       }
    }
    
    

function check_email_avalibility($email,$table)
 {
    $this->db->where('email',$email);
    $query = $this->db->get($table);

    if($query->num_rows() > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
 }

}
