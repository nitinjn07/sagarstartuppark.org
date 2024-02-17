<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/users-permission');
   }
   public function role()
   {
    $this->load->view('pages/create-role');
   }

   public function SaveRole()
   {
       extract($_POST);
       
       $data = array('role_name'=>@$role_name,
                      'funding'=>@$funding,
                      'revenue'=>@$revenue,
                      'mentor_data'=>@$mentor_data,
                     'startup_data'=>@$startup_module,
                     'startup_exit'=>@$startup_exit,
                     'startup_swapping'=>@$swapping,
                     'startup_screening'=>@$screening,
                     'seat_onboarding'=>@$onboarding,
                     'startup_team'=>@$team,
                     'attendance'=>@$attendance,
                     'kra'=>@$kra,
                     'stage_upgrade'=>@$stage_upgrade,
                     'startup_document'=>@$startup_document,
                     'mentor_connect'=>@$mentor_connect,
                     'investor_data'=>@$investor,
                     'partner'=>@$partner,
                     'mou'=>@$mou,
                     'online_courses'=>@$courses,
                     'template_download'=>@$template,
                     'startup_servies'=>@$services,
                     'job'=>@$jobs,
                     'cofounder'=>@$cofounder,
                     'booking_request'=>@$booking,
                     'events'=>@$events,
                     'resources'=>@$resources,
                     'scheme_policy'=>@$schemepolicy,
                     'complain_suggesion'=>@$complain,
                     'user_role'=>@$userrole,
                     'setting'=>@$setting);

     $rs = $this->db->insert('role_permission',$data);
     if($rs)
     {
        $this->session->set_flashdata("success","Role successfully Created");           
        redirect(base_url()."Users/role"); 
     }
     else 
     {
        $this->session->set_flashdata("failed","Something went wrong");           
        redirect(base_url()."Users/role"); 
     }

   }

   public function UpdateRole()
   {
       extract($_POST);
       
       $data = array('role_name'=>@$role_name,
                      'funding'=>@$funding,
                      'revenue'=>@$revenue,
                      'mentor_data'=>@$mentor_data,
                     'startup_data'=>@$startup_module,
                     'startup_exit'=>@$startup_exit,
                     'startup_swapping'=>@$swapping,
                     'startup_screening'=>@$screening,
                     'seat_onboarding'=>@$onboarding,
                     'startup_team'=>@$team,
                     'attendance'=>@$attendance,
                     'kra'=>@$kra,
                     'stage_upgrade'=>@$stage_upgrade,
                     'startup_document'=>@$startup_document,
                     'mentor_connect'=>@$mentor_connect,
                     'investor_data'=>@$investor,
                     'partner'=>@$partner,
                     'mou'=>@$mou,
                     'online_courses'=>@$courses,
                     'template_download'=>@$template,
                     'startup_servies'=>@$services,
                     'job'=>@$jobs,
                     'cofounder'=>@$cofounder,
                     'booking_request'=>@$booking,
                     'events'=>@$events,
                     'resources'=>@$resources,
                     'scheme_policy'=>@$schemepolicy,
                     'complain_suggesion'=>@$complain,
                     'user_role'=>@$userrole,
                     'setting'=>@$setting);

     $where = array('id'=>$rolid);

     $rs = $this->db->update('role_permission',$data,$where);
     if($rs)
     {
        $this->session->set_flashdata("success","Update Role successfully Created");           
        redirect(base_url()."Users/role"); 
     }
     else 
     {
        $this->session->set_flashdata("failed","Something went wrong");           
        redirect(base_url()."Users/role"); 
     }

   }
   public function CreateUser()
   {
      extract($_POST);
      $role = $this->db->get_where('role_permission',array('id'=>$user_role))->row();
      $data = array('rolid'=>$user_role,
                    'name'=>$fullname,
                    'role'=>$role->role_name,
                    'email'=>$username,
                    'password'=>md5($password));

      $check = $this->db->get_where('user_registration',array('rolid'=>$user_role,'email'=>$username))->num_rows();
      
      if($check==0)
      {
         $this->db->insert('user_registration',$data);
         $this->session->set_flashdata("success","User created successfully");           
         redirect(base_url()."Users"); 

      }
      else 
      {
         $this->session->set_flashdata("failed","User already created");           
         redirect(base_url()."Users"); 
      }
   
   }

   public function UpdateUser()
   {
      extract($_POST);

      $where =array('id'=>$uid);
      $role = $this->db->get_where('role_permission',array('id'=>$user_role))->row();
      $data = array('rolid'=>$user_role,
                    'name'=>$fullname,
                    'role'=>$role->role_name,
                    'email'=>$username,
                    'password'=>md5($password));

      $check = $this->db->update('user_registration',$data,$where);
      
      if($check)
      {
         
         $this->session->set_flashdata("success","User Update successfully");           
         redirect(base_url()."Users"); 

      }
      else 
      {
         $this->session->set_flashdata("failed","User Not Updated");           
         redirect(base_url()."Users"); 
      }
   
   }
   public function Deactivate()
   {
       $where = array('id'=>$_GET['uid']);

       $data = array('delstatus'=>0);

       $check = $this->db->update('user_registration',$data,$where);

       if($check)
      {
         
         $this->session->set_flashdata("success","User Deactivate successfully");           
         redirect(base_url()."Users"); 

      }
      else 
      {
         $this->session->set_flashdata("failed","User Not Deactivated");           
         redirect(base_url()."Users"); 
      }

   }
   public function Activate()
   {
       $where = array('id'=>$_GET['uid']);

       $data = array('delstatus'=>1);

       $check = $this->db->update('user_registration',$data,$where);

       if($check)
      {
         
         $this->session->set_flashdata("success","User Activate successfully");           
         redirect(base_url()."Users"); 

      }
      else 
      {
         $this->session->set_flashdata("failed","User Not Activated");           
         redirect(base_url()."Users"); 
      }

   }
  
   
   
}