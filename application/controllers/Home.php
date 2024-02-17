<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
	    parent::__construct();
	}

	
	public function index()
	{
		$data['slider'] = $this->db->get('slider')->result();
		$this->load->view('home', $data);
	}

	public function subscrib()
	{
		extract($_POST);
		
		$ip = $_SERVER['REMOTE_ADDR'];
		$data = array('email' =>$email ,'ip' =>$ip);

		$rs=$this->Model->insertdata('subscribe',$data);

		if ($rs) 
		{
			echo "Thank you for subscribing us!";
		}

    }
}
