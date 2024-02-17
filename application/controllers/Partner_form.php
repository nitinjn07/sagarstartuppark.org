<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_form extends CI_Controller {

	
	public function index()
	{
		$this->load->view('partner_form');
	}

	public  function insert()
	{
		extract($_POST);
		$this->db2 = $this->load->database('imdb', TRUE);

		$data = array('firm_name' =>$firm_name, 
	    'name' =>$name, 
		'mobile' =>$mobile, 
		'email' =>$email, 
		'is_true' =>$is_true, 
		'state' =>$state, 
		'city' =>$city, 
		'country' =>$country );



		 $rs= $this->db2->insert('partner',$data);
		 if($rs)
		 {
		
			$this->session->set_flashdata('success', "Your application has been submitted Successfully."); 
			redirect(base_url().'Thankyou');
	     }
		else
		{
			$this->session->set_flashdata('failed', "Your application not submitted please contact : connect@sagarstartuppark.org."); 
			redirect(base_url().'Sorry');
		}
		
	}
}