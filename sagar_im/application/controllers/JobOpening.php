<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobOpening extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/new-job-opening');
   }
	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    public function AddNewJob()
    {
        extract($_POST);
        
        if($required_skill_1=="")
        {
            $required_skill_1 = NULL;
        }
        if($required_skill_2=="")
        {
            $required_skill_2 = NULL;
        }
        if($required_skill_3=="")
        {
            $required_skill_3 = NULL;
        }
        if($required_skill_4=="")
        {
            $required_skill_4 = NULL;
        }
        if($required_skill_5=="")
        {
            $required_skill_5 = NULL;
        }

        $data = array('job_title'=>$job_title,
                      'job_type'=>$job_type,
                      'startupid'=>$startupid,
                      'job_location'=>$job_location,                     
                      'no_of_openings'=>$no_of_openings,
                      'job_role'=>$job_role,
                      'short_description'=>$short_desc,
                      'long_description'=>$long_desc,
                      'min_salary'=>$min_salary,
                      'max_salary'=>$max_salary,
                      'essential_education'=>$essential_education,
                      'skill_required_1'=>$required_skill_1,
                    'skill_required_2'=>$required_skill_2,
                'skill_required_3'=>$required_skill_3,
            'skill_required_4'=>$required_skill_4,
        'skill_required_5'=>$required_skill_5);
         
        $rs = $this->db->insert('job_listing',$data);              
        
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Successfully Added");
            redirect(base_url().'JobOpening');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Added");
            redirect(base_url().'JobOpening');
        }


    }
    public function EditJobOpening()
    {
        $id = $_GET['id'];
        $job['job']=$this->db->get_where('job_listing',array('id'=>$id))->row();
        $this->load->view('pages/edit-job-opening',$job);
    }

   

    public function UpdateJobOpening()
    {
        extract($_POST);

        $where = array('id'=>$id);

        if($required_skill_1=="")
        {
            $required_skill_1 = NULL;
        }
        if($required_skill_2=="")
        {
            $required_skill_2 = NULL;
        }
        if($required_skill_3=="")
        {
            $required_skill_3 = NULL;
        }
        if($required_skill_4=="")
        {
            $required_skill_4 = NULL;
        }
        if($required_skill_5=="")
        {
            $required_skill_5 = NULL;
        }

        $data = array('job_title'=>$job_title,
                      'job_type'=>$job_type,
                      'startupid'=>$startupid,
                      'job_location'=>$job_location,                     
                      'no_of_openings'=>$no_of_openings,
                      'job_role'=>$job_role,
                      'short_description'=>$short_desc,
                      'long_description'=>$long_desc,
                      'min_max_salary'=>$min_max_salary,
                      'essential_education'=>$essential_education,
                      'skill_required_1'=>$required_skill_1,
                    'skill_required_2'=>$required_skill_2,
                'skill_required_3'=>$required_skill_3,
            'skill_required_4'=>$required_skill_4,
        'skill_required_5'=>$required_skill_5);
         
        $rs = $this->db->update('job_listing',$data,$where);              
        
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Update Successfully");
            redirect(base_url().'JobOpeningList');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Updated");
            redirect(base_url().'JobOpeningList');
        }


    }

    public function DeleteJobOpening()
    {
        $id = $_GET['id'];
        $data = array('delstatus'=>0);
        $rs=$this->db->update('job_listing',$data,array('id'=>$id));
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Delete Successfully");
            redirect(base_url().'JobOpeningList');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Deleted");
            redirect(base_url().'JobOpeningList');
        }
        
    }
    public function ApprovJobOpening()
    {
        $id = $_GET['id'];
        $data = array('status'=>'approved');
        
        $rs=$this->db->update('job_listing',$data,array('id'=>$id));
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Approved Successfully");
            redirect(base_url().'JobOpeningList');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Approved Deleted");
            redirect(base_url().'JobOpeningList');
        }
        
    }
    public function PendingJobOpening()
    {
        $id = $_GET['id'];
        $data = array('status'=>'pending');
        
        $rs=$this->db->update('job_listing',$data,array('id'=>$id));
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Pending Successfully");
            redirect(base_url().'JobOpeningList');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Pending Deleted");
            redirect(base_url().'JobOpeningList');
        }
        
    }

    public function EnableJobOpening()
    {
        $id = $_GET['id'];
        $data = array('is_active'=>1);
        
        $rs=$this->db->update('job_listing',$data,array('id'=>$id));
        if($rs)
        {
            $job = $this->db->get_where('job_listing',array('id'=>$id))->row();

            $data = array('startupid'=>$job->startupid,'message'=>"Job Listing Active Successfully",'link'=>"http://www.sicsatna.org/sic_im/Startup/JobOpeningList");

            $this->db->insert('notification',$data);
            $this->session->set_flashdata("success","Job Listing Active Successfully");
            redirect(base_url().'JobOpeningList');

            
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Active");
            redirect(base_url().'JobOpeningList');
        }
        
    }
    public function DisableJobOpening()
    {
        $id = $_GET['id'];
        $data = array('is_active'=>0);
        
        $rs=$this->db->update('job_listing',$data,array('id'=>$id));
        if($rs)
        {
            $this->session->set_flashdata("success","Job Listing Deactivate Successfully");
            redirect(base_url().'JobOpeningList');
        }
        else 
        {
            $this->session->set_flashdata("failed","Job Listing Not Deactivate");
            redirect(base_url().'JobOpeningList');
        }
        
    }




}