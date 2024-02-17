<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor_reg extends CI_Controller {

	
	public function index()
	{
		$this->load->view('mentor_reg');
	}

	public function saveData()
	{
		 extract($_POST);
		 $this->db2 = $this->load->database('imdb', TRUE);
		 
	     if(!empty($domain))
	     {
	        $domain = implode(",",$domain);
	     }
	     else 
	    {
	        $domain = null;
	    }
	     if(!empty($sector))
	     {
	        $sector = implode(",",$sector);
	     }
	     else 
	    {
	        $sector = null;
	    }

		 $data = array('name'=>$name,
						'email'=>$email,
						'city'=>$city,
						'mobile'=>$mobile,
						'linkedin_url'=>$linkedin_url,
						'no_of_mentor_year'=>$no_of_mentor_year,
						'is_true'=>$is_true,
						'created_date'=>date('d-m-Y h:i:s'),
						'state'=>$state,
						'country'=>$country);
		$data['is_legal_expert'] = $this->input->post('is_legal_expert');
        $data['is_finance_expert'] = $this->input->post('is_finance_expert');
        $data['is_account_expert'] = $this->input->post('is_account_expert');
        $data['is_marketing_expert'] = $this->input->post('is_marketing_expert');
        $data['is_it_expert'] = $this->input->post('is_it_expert');
        $data['is_digital_marketing_expert'] = $this->input->post('is_digital_marketing_expert');
        $data['is_business_strategy_expert'] = $this->input->post('is_business_strategy_expert');
        $data['is_women_expert'] = $this->input->post('is_women_expert');
        $data['is_startup_expert'] = $this->input->post('is_startup_expert');

		 $rs = $this->db2->insert('mentor',$data);

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