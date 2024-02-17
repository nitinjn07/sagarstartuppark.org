<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function index()
	{
		
		$this->load->view('Admin/dashboard');
		
	}
	
	public function hackthon()
	{
	    $data['hackfest'] = $this->db->get('hackfest')->result();
	    
	    $this->load->view('Admin/hackfest', $data);
	}
	
	public function logout()
	{
		session_destroy();
		echo "<script> window.location.href='../CDAdmin'; </script>";
	}
}
