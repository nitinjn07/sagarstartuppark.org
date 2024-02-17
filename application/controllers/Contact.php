<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	public function index()
	{
		$data['con'] = $this->db->get_where('contact_details', array('id'=>1))->row();
		$this->load->view('contact', $data);
	}
	public function contactus()
	{
		extract($_POST);


		$data = array('name' => $name,'email' => $email,'mobile' =>$mobile ,'text' => $text);
	

		$rs=$this->Model->insertdata('contact',$data);
		if ($rs)
		 {
			echo "<script>alert('Thank you For Contacting with us'); window.location.href='../Contact'</script>";
		}

	}

	
}
