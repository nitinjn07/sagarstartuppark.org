<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup_form extends CI_Controller {

	
	public function index()
	{
		$this->load->view('startup_form');
	}
	


   public function check_email_avalibility()
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            echo '<label class="text-danger">Invaild Email Address</label>';
        }
        else
        {
            if($this->Model->check_email_ava($_POST['email']))
            {
                echo '<small class="text-danger">Email Address are Alredy Regsitered</small>';
                echo '<style>#regsiter_button { display: none; }</style>';
            }
            else
            {
                echo '';
                echo '<style>#regsiter_button { display: block; }</style>';
            }
        }
    }
    

	public function saveData()
	{
		 extract($_POST);
		 
		 $this->db2 = $this->load->database('imdb', TRUE);

		 $data = array('startup_name'=>$startup_name,
						'email'=>$email,
						'mobile'=>$mobile,
						'state'=>$state,
						'city'=>$city,
						'password'=>md5("im#@2023"),
						'dpiit'=>$dpiit,
						'website_address'=>$website_address,
						'product_service_summary'=>$product_service_summary,
						'stage'=>$stage,
						'verticals_sectors'=>$verticals_sectors,
						'is_true'=>$is_true);


		 $rs = $this->db2->insert('startup',$data);

		 if($rs)
		 {
			$this->session->set_flashdata('success', "Your application has been submitted Successfully."); 
		 	redirect(base_url().'Thankyou');
		 }
	}

}