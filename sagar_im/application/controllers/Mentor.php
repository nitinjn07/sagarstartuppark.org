<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-mentor');
   }
	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    //Login Function
   public function addMentor()
   {
       extract($_POST);     
        
       $profile_img = $_FILES['profile']['name'];
       $mou = $_FILES['mou']['name'];
       
       $profile_img_temp = $_FILES['profile']['tmp_name'];
       $mou_temp = $_FILES['mou']['tmp_name'];

       $path="./uploads/mentor/";
       $complete_path1 =$path.$profile_img;

       $path2="./uploads/mou/";
       $complete_path2 = $path2.$mou;

       move_uploaded_file($mou_temp,$complete_path2);
       move_uploaded_file($profile_img_temp,$complete_path1);

       
      $data = array('name'=>$name,
      'email'=>$email,
      'mobile'=>$mobile,
      'country'=>$country,
      'state'=>$state,
      'city'=>$city,
      'linkedin_url'=>$linkedin,
      'summary'=>$summary,
      'no_of_mentor_year'=>$exp,
      'created_date'=>date('d-m-Y'),
      'is_legal_expert'=>@$is_legal_expert,
      'is_finance_expert'=>@$is_finance_expert,
      'is_account_expert'=>@$is_account_expert,
      'is_marketing_expert'=>@$is_marketing_expert,
      'is_it_expert'=>@$is_it_expert,
      'is_digital_marketing_expert'=>@$is_digital_marketing_expert,
      'is_business_strategy_expert'=>@$is_business_strategy_expert,
      'is_women_expert'=>@$is_women_expert,
      'is_startup_expert'=>@$is_startup_expert,
      'user_pic_url'=>@$profile_img,
      'mou_path'=>@$mou);



      
      $rs = $this->db->insert('mentor',$data);
      if($rs)
      {
        $this->session->set_flashdata("success","Mentor Added Successfully");
        redirect(base_url()."Mentor"); 
      }
      else 
      {
        $this->session->set_flashdata("failed","Mentor Not Added");
        redirect(base_url()."Mentor");
      }


      
      
        

   }

public function deleteMentor()
    {
      $delid = $_GET['id'];
      $data = array('delstatus'=>0);

      $rs = $this->db->update('mentor',$data,array('id'=>$delid));
      if($rs)
      {
        $this->session->set_flashdata('success',"Delete Mentor Successful");
        redirect(base_url().'MentorList');
      }
      else 
      {
        $this->session->set_flashdata('failed',"Failed : Information not deleted");
         redirect(base_url().'MentorList');
      }
    }

    public function updateMentor()
    {   
       extract($_POST);
       $updateid = $_GET['editid'];

       $mentor = $this->db->get_where('mentor',array('id'=>$updateid))->row();
       
       if(isset($_FILES['profile']['name']))
       { 
       $profile_img = $_FILES['profile']['name'];             
       $profile_img_temp = $_FILES['profile']['tmp_name'];
       $path="./uploads/mentor/";
       $complete_path1 =$path.$profile_img;
       move_uploaded_file($profile_img_temp,$complete_path1);
       }
       else 
       {
        $profile_img = $mentor->user_pic_url;
       }
       if(isset($_FILES['mou']['name']))
       {
       $mou = $_FILES['mou']['name']; 
       $mou_temp = $_FILES['mou']['tmp_name'];   
       $path2="./uploads/mou/";
       $complete_path2 = $path2.$mou;
       move_uploaded_file($mou_temp,$complete_path2);
       }
       else 
       {
        $mou = $mentor->mou_path;
       } 
       

       
      $data = array('name'=>$name,
      'email'=>$email,
      'mobile'=>$mobile,
      'country'=>$country,
      'state'=>$state,
      'city'=>$city,
      'linkedin_url'=>$linkedin,
      'summary'=>$summary,
      'no_of_mentor_year'=>$exp,
      'created_date'=>date('d-m-Y'),
      'is_legal_expert'=>@$is_legal_expert,
      'is_finance_expert'=>@$is_finance_expert,
      'is_account_expert'=>@$is_account_expert,
      'is_marketing_expert'=>@$is_marketing_expert,
      'is_it_expert'=>@$is_it_expert,
      'is_digital_marketing_expert'=>@$is_digital_marketing_expert,
      'is_business_strategy_expert'=>@$is_business_strategy_expert,
      'is_women_expert'=>@$is_women_expert,
      'is_startup_expert'=>@$is_startup_expert,
      'user_pic_url'=>@$profile_img,
      'mou_path'=>@$mou,
      'is_hr'=>@$is_hr,
      'is_ipr'=>@$is_ipr,
      'is_social_media'=>@$is_social_media,
      'is_other'=>$$is_other);



      
      $rs = $this->db->update('mentor',$data,array('id'=>$updateid));
      if($rs)
      {
        $this->session->set_flashdata("success","Mentor Update Successfully");
        redirect(base_url()."MentorList"); 
      }
      else 
      {
        $this->session->set_flashdata("failed","Mentor Not Updated");
        redirect(base_url()."MentorList");
      }

        
    }


    public function AcceptMentor()
    {
      $where = array('id'=>$_GET['id']);
      $data = array('action'=>'accepted');      
      $rs = $this->db->update('mentor',$data,$where);
      if($rs)
      {
        $this->session->set_flashdata('success','Accept Mentor Successful');
        redirect(base_url().'MentorList');
      }
      else 
      {
        $this->session->set_flashdata('failed','Somthing Wrong');
        redirect(base_url().'MentorList');
      }

    }
    public function RejectMentor()
    {
      $where = array('id'=>$_GET['id']);
      $data = array('action'=>'rejected');      
      $rs = $this->db->update('mentor',$data,$where);
      if($rs)
      {
        $this->session->set_flashdata('success','Reject Mentor Successful');
        redirect(base_url().'MentorList');
      }
      else 
      {
        $this->session->set_flashdata('failed','Somthing Wrong');
        redirect(base_url().'MentorList');
      }
      
    }



    public function EditMentor()
    {
        $mentor['mentor'] = $this->db->get_where('mentor',array('id'=>$_GET['id']))->row(); 
        $this->load->view('pages/edit-mentor',$mentor);
    }

   






}