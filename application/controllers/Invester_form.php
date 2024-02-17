<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invester_form extends CI_Controller {

	
	public function index()
	{
		$this->load->view('invester_form');
	}

	public function insert()
	{
		extract($_POST);
		$this->db2 = $this->load->database('imdb', TRUE);	

		@$data = array('compay_name'=>$compay_name,
						'email'=>$email,
						'city'=>$city,
						'mobile'=>$mobile,
						'linkedin_url'=>$linkedin_url,
						'company_funded'=>$company_funded,
						'is_true'=>$is_true,
						'total_amount_invested'=>$total_amount_invested,
						'state'=>$state,
						'country'=>$country,
						'name'=>$name,
						'type_of_invester'=>$type_of_invester
						);

		 $rs= $this->db2->insert('investor',$data);


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