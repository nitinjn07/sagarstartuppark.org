<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {
   
    public function index()
    {
        $this->load->view('pages/add-partner');
    }
    function __construct() {
        parent::__construct();
        $this->output->delete_cache();
    }
    public function addPartner()
    {
        extract($_POST);     
        
        
 
        if($_FILES['profile']['name']!="")
         {
             $temp = explode(".", $_FILES["profile"]["name"]);
             $newfilename = round(microtime(true)) . '.' . end($temp);
             $config['upload_path']          = './uploads/partner/';
             $config['allowed_types']        = 'gif|jpg|png|jpeg';
 
             $config['file_name'] = $newfilename;
             $this->upload->initialize($config);
             if ( !$this->upload->do_upload('profile'))
             {
 
 
             $this->session->set_flashdata("failed","Image Not Upload");	
 
             }
             else
             {
                 $data = array('firm_name'=>$firm_name,
                 'email'=>$email,
                 'mobile'=>$mobile,
                 'country'=>$country,
                 'state'=>$state,
                 'city'=>$city,
                 'linkedin_url'=>$linkedin,
                 'summary'=>$summary,
                 'password'=>md5($password),
                 'type_of_firm'=>$type_of_firm,
                 'name'=>$ownername,
                 'created_date'=>date('d-m-Y'),                
                 'user_pic_url'=>@$newfilename);
 
             $this->session->set_flashdata("success","Partner Added Successfully");
             $this->db->insert('partner',$data);
             redirect(base_url()."Partner"); 
 
            }
 
               
         }
         else 
         {
           $data = array('firm_name'=>$firm_name,
                 'email'=>$email,
                 'mobile'=>$mobile,
                 'country'=>$country,
                 'state'=>$state,
                 'city'=>$city,
                 'linkedin_url'=>$linkedin,
                 'summary'=>$summary,
                 'password'=>md5($password),
                 'type_of_firm'=>$type_of_firm,
                 'name'=>$ownername,
                 'created_date'=>date('d-m-Y'));
 
             $this->session->set_flashdata("success","Partner Added Successfully");
             $this->db->insert('partner',$data);
             redirect(base_url()."Partner"); 
         }
 
 }
 
 public function deletePartner()
     {
       $delid = $_GET['id'];
       $data = array('delstatus'=>0);
 
       $rs = $this->db->update('partner',$data,array('id'=>$delid));
       if($rs)
       {
         $this->session->set_flashdata('success',"Delete Partner Successful");
         redirect(base_url().'PartnerList');
       }
       else 
       {
         $this->session->set_flashdata('failed',"Failed : Information not deleted");
          redirect(base_url().'PartnerList');
       }
     }
 
     public function updatePartner()
     {   
         extract($_POST);
         $updateid = $_GET['editid'];
         
         if($_FILES['profile']['name']!="")
         {
             $temp = explode(".", $_FILES["profile"]["name"]);
             $newfilename = round(microtime(true)) . '.' . end($temp);
             $config['upload_path']          = './uploads/partner/';
             $config['allowed_types']        = 'gif|jpg|png|jpeg';
 
             $config['file_name'] = $newfilename;
             $this->upload->initialize($config);
             if ( !$this->upload->do_upload('profile'))
             {
 
 
             $this->session->set_flashdata("failed","Image Not Upload");	
 
             }
             else
             {
                 $data = array('firm_name'=>$firm_name,
                 'email'=>$email,
                 'mobile'=>$mobile,
                 'country'=>$country,
                 'state'=>$state,
                 'city'=>$city,
                 'linkedin_url'=>$linkedin,
                 'summary'=>$summary,
                 'password'=>md5($password),
                 'type_of_firm'=>$type_of_firm,
                 'name'=>$ownername,
                 'created_date'=>date('d-m-Y'),                
                 'user_pic_url'=>@$newfilename);
 
             $this->session->set_flashdata("success","Partner Update Successfully");
             $this->db->update('partner',$data,array('id'=>$updateid));
             redirect(base_url()."PartnerList");
 
            }
 
                   
         }
         else 
         {
             $data = array('firm_name'=>$firm_name,
                 'email'=>$email,
                 'mobile'=>$mobile,
                 'country'=>$country,
                 'state'=>$state,
                 'city'=>$city,
                 'linkedin_url'=>$linkedin,
                 'summary'=>$summary,
                 'password'=>md5($password),
                 'type_of_firm'=>$type_of_firm,
                 'name'=>$ownername,
                 'created_date'=>date('d-m-Y'));
 
                 $this->session->set_flashdata("success","Partner Update Successfully");
                 $this->db->update('partner',$data,array('id'=>$updateid));
                 redirect(base_url()."PartnerList");
         }
        
 
         
     }
 
 
     public function AcceptPartner()
     {
       $where = array('id'=>$_GET['id']);
       $data = array('action'=>'accepted');      
       $rs = $this->db->update('partner',$data,$where);
       if($rs)
       {
         $this->session->set_flashdata('success','Accept Partner Successful');
         redirect(base_url().'PartnerList');
       }
       else 
       {
         $this->session->set_flashdata('failed','Somthing Wrong');
         redirect(base_url().'PartnerList');
       }
 
     }
     public function RejectPartner()
     {
       $where = array('id'=>$_GET['id']);
       $data = array('action'=>'rejected');      
       $rs = $this->db->update('partner',$data,$where);
       if($rs)
       {
         $this->session->set_flashdata('success','Partner Investor Successful');
         redirect(base_url().'PartnerList');
       }
       else 
       {
         $this->session->set_flashdata('failed','Somthing Wrong');
         redirect(base_url().'PartnerList');
       }
     }

     public function EditPartner()
     {
         $this->load->view('pages/edit-partner');
     }
    
}