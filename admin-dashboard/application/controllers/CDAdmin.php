<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CDAdmin extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Admin/login');
	}

	public function login()
	{
		extract($_POST);

		$where = array('username'=>$username,'password'=>$password);
		$rs = $this->Model->selectDataWhere('users',$where)->row();

		if($rs)
		{
			if($rs->role=='admin')
			{
                $this->session->set_userdata(array('role'=>'admin','username'=>$username));
                echo "<script> window.location.href='../Dashboard'; </script>";
			}
			else if($rs->role=='student')
			{
               $this->session->set_userdata(array('role'=>'student','username'=>$username));
               echo "<script> window.location.href='../Dashboard'; </script>";
			}
			else if($rs->role=='teacher')
			{
               $this->session->set_userdata(array('role'=>'teacher','username'=>$username));
               
			}
		}
		else 
		{
			echo "<script> alert('Wrong username & Password'); window.location.href='../';</script>";
		}
	}
}
