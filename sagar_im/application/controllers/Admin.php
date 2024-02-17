<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
	    	$this->output->delete_cache();
    }

    public function Enquiry()
    {
        extract($_POST);
       
        $data = array('first_name'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'phone'=>$phone,
        'message'=>$message);

        $rs = $this->db->insert('enquiry',$data);
        
        if($rs)
        {
            $this->session->set_flashdata('message', 'Thank you for connecting with us');
			redirect(base_url().'contact-us');
        }
        else 
        {
            $this->session->set_flashdata('message', 'Somthing went wrong. try again after some time');
			redirect(base_url().'contact-us');
        }
    }
    
      public function Vote()
    {
        extract($_POST);
        
        $poll=$this->db->get_where('poll',array('ip'=>$ip))->num_rows();
       
       if($poll==0){
           
            $data = array('ans'=>$ans,
            'other'=>$other,'name'=>$name,'mobile'=>$mobile,'startup_name'=>$startup_name,'ip'=>$ip
            );
    
            $rs = $this->db->insert('poll',$data);
            
            if($rs)
            {
                $this->session->set_flashdata('message', 'Thanks for Participating');
    			redirect(base_url().'poll');
            }
            else 
            {
                $this->session->set_flashdata('message', 'something went wrong, please try again!');
    			redirect(base_url().'poll');
            }
       }
       else 
        {
            $this->session->set_flashdata('message', 'You have already submitted your vote for this poll, you may submit your vote again in the next poll.');
    		redirect(base_url().'poll');
        }
    }
    
    public function Feedback()
    {
        extract($_POST);
        
        $poll=$this->db->get_where('feedback',array('ip'=>$ip))->num_rows();
       
       if($poll==0){
           
            $data = array('name'=>$name,
                          'date'=>$date,
                          'Ans1'=>$Ans1,
                          'Ans2'=>$Ans2,
                          'Ans3'=>$Ans3,
                          'Ans4'=>$Ans4,
                          'Ans5'=>$Ans5,
                          'Ans6'=>$Ans6,
                          'ip'=>$ip
            );
    
            $rs = $this->db->insert('feedback',$data);
            
            if($rs)
            {
                $this->session->set_flashdata('message', 'Feedback Submitted Successfully 🌝');
    			redirect(base_url().'feedback');
            }
            else 
            {
                $this->session->set_flashdata('message', 'something went wrong, please try again!');
    			redirect(base_url().'feedback');
            }
       }
       else 
        {
            $this->session->set_flashdata('message', 'You have already submitted your Feedback, you can now exit this page.');
    		redirect(base_url().'feedback');
        }
    }
     public function Ccs()
    {
        extract($_POST);
        
        $poll=$this->db->get_where('ccs',array('ip'=>$ip))->num_rows();
       
       if($poll==0){
           
            $data = array('first_name'=>$first_name,
                          'last_name'=>$last_name,
                          'email'=>$email,
                          'phone'=>$phone,
                          'i_have_a'=>$i_have_a,
                          'description'=>$description,
                          'ip'=>$ip
            );
    
            $rs = $this->db->insert('ccs',$data);
            
            if($rs)
            {
                $this->session->set_flashdata('message', 'Submitted Successfully 🌝');
    			redirect(base_url().'ccs');
            }
            else 
            {
                $this->session->set_flashdata('message', 'something went wrong, please try again!');
    			redirect(base_url().'ccs');
            }
       }
       else 
        {
            $this->session->set_flashdata('message', 'Your Entry is already submitted , you can now exit this page.');
    		redirect(base_url().'ccs');
        }
    }
    public function WedcReg()
    {
        extract($_POST);
       
        $data = array('name'=>$name,
        'email'=>$email,
        'contact'=>$contact,
        'startupname'=>$startupname);

        $rs = $this->db->insert('wedc_reg',$data);
        
        if($rs)
        {
            $this->session->set_flashdata('message', 'Thank you for register with us');
			redirect(base_url().'wedc');
        }
        else 
        {
            $this->session->set_flashdata('message', 'You have already submitted your vote for this poll, you may submit your vote again in the next poll.');
			redirect(base_url().'wedc');
        }
    }

    public function StartupLogin()
    {
      
        extract($_POST);

        $this->db2 = $this->load->database('imdb', TRUE);

        $where = array('email'=>$email,'password'=>md5($password));

        $rs = $this->db2->get_where('startup',$where)->row();
        
        if($rs)
        {
            $this->session->set_userdata('uid',$rs->id);
            redirect(base_url().'Startup/dashboard'); 

        }
        else 
        {
            $this->session->set_flashdata('message', 'Wrong email_id or Password');
            redirect(base_url().'startup-login');
        }
    }
    
    public function logout()
    {
        session_destroy();
        redirect(base_url().'startup-login');
    }

    public function udhyogini_registration()
    {
      
        extract($_POST);

        $where = array('name'=>$name,'email'=>$email,'contact'=>$contact,'location'=>$location);

        $rs = $this->db->insert('udhyogini',$where);
        
        if($rs > 0)
        {
            $this->session->set_flashdata('message', 'Thank you for Register');
            redirect(base_url().'udhyogini-registration'); 

        }
        else 
        {
            $this->session->set_flashdata('message', 'Please try Again!');
            redirect(base_url().'udhyogini-registration');
        }
    }
    
    public function SearchNow()
    {  
        extract($_POST);
        $search = $this->db->Query("select * from search where keywords LIKE '%$term%'")->result();
        echo "<ul class='list-group'>";
        foreach($search as $s)
        {
            echo "<li class='list-gorup-item'> <a href='".$s->page_name."' target='_blank'>".$s->title."</a></li>";
        }
        echo "</ul>";
    }
    public function GetState()
    {
        $country = $this->db->get_where('states',array('country_code'=>$_GET['code']))->result();
        foreach($country as $c)
        {
            echo "<option value=".$c->id.">".$c->state_name."</option>";
        }
    }
    public function GetCity()
    {
        
        $city = $this->db->get_where('cities',array('state_code'=>$_GET['state_code']))->result();
        foreach($city as $c)
        {
            echo "<option value=".$c->id.">".$c->city_name."</option>";
        }
    }
    public function ApplyForJob()
    {
        extract($_POST);

        $im = $this->load->database('imdb', TRUE);
        
        $sid = $im->get_where('job_listing',array('id'=>$jobid))->row();
        

        $data = array('Name'=>$name,
                      'Email'=>$email,
                      'Mobile'=>$mobile,
                      'State'=>$state,
                      'City'=>$city,
                      'zipcode'=>$zipcode,
                      'Address'=>$address,
                      'Total_Experience'=>$exp,
                      'Last_Company_Name'=>$company_name,
                      'Higher_Qualification'=>$qualification,
                      'Current_CTC'=>$ctc,
                      'applyfor'=>$applyfor,
                      'jobid'=>$jobid,
                      'startupid'=>$sid->startupid);

                     

        $rs = $im->insert('application_form',$data);
        
        if($rs > 0)
        {
            $this->session->set_flashdata('message', 'You successfully applied for this job');
            redirect(base_url().'job-listing'); 

        }
        else 
        {
            $this->session->set_flashdata('message', 'Please try Again!');
            redirect(base_url().'job-listing');
        }
    }

    public function MVPFeedback()
    {
        extract($_POST);
       
        $imdb1 = $this->load->database('imdb', TRUE);

        $feedback = $imdb1->get('mvp_feedback_collection',array('startupid'=>$startupid))->row();
        if($feedback)
        {
            $this->session->set_flashdata("failed","Feedback Already Submitted");
            redirect(base_url().'mvp-failed');
        }
        else 
        {
        $data =array('mvpid'=>$mvpid,
                     'startupid'=>$startupid,
                    'customer_name'=>$customer_name,
                    'customer_email'=>$customer_email,
                    'how_did_u_know'=>$how_did_u_know,
                    'f1_s1_feedback'=>$f1_s1_feedback,
                    'f1_s1_ranking'=>$f1_s1_ranking,
                    'f1_s1_like'=>$f1_s1_like,
                    'f1_s1_hat'=>$f1_s1_hat,
                    'f2_s2_feedback'=>$f2_s2_feedback,
                    'f2_s2_ranking'=>$f2_s2_ranking,
                    'f2_s2_like'=>$f2_s2_like,
                    'f2_s2_hat'=>$f2_s2_hat,
                    'f3_s3_feedback'=>$f3_s3_feedback,
                    'f3_s3_ranking'=>$f3_s3_ranking,
                    'f3_s3_like'=>$f3_s3_like,
                    'f3_s3_hat'=>$f3_s3_hat,
                    'f4_s4_feedback'=>$f4_s4_feedback,
                    'f4_s4_ranking'=>$f4_s4_ranking,
                    'f4_s4_like'=>$f4_s4_like,
                    'f4_s4_hat'=>$f4_s4_hat,
                    'overall_like'=>$overall_like,
                    'mvp_like'=>$mvp_like,
                    'mvp_hat'=>$mvp_hat);

                    
                    
        $res = $imdb1->insert('mvp_feedback_collection',$data);            
        if($res)
        {
            $this->session->set_flashdata("success","Thank you for valuable feedback");
            redirect(base_url().'mvp-success');
        }
        else 
        {
            $this->session->set_flashdata("failed","Sorry you feedback not submitted");
            redirect(base_url().'mvp-failed');
        }
        }
    }

}