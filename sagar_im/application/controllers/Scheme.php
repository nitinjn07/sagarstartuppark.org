<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheme extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-scheme');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
 
   public function saveScheme()
   {
       
        extract($_POST);
        
        if($_FILES['document']['name']!="")
        {
            $temp = explode(".", $_FILES["document"]["name"]);
            $scheme = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/scheme/';
            $config['allowed_types']        = 'pdf';

            $config['file_name'] = $scheme;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('document'))
            {

            $this->session->set_flashdata("failed","Document Not Upload");	

            }
            else
            {
            
            
            $data = array(
            'title'=>$title,
            'description'=>$description,
            'document'=>$scheme
            );

           
        

            $this->session->set_flashdata("success","Document Upload Successfully");
            $this->db->insert('scheme',$data);
            redirect(base_url()."Scheme");  

            }             
        }
        else 
        {
        $this->session->set_flashdata("failed","Please attach document");           
        redirect(base_url()."Scheme");  
        }
   }
   public function deleteScheme()
   { 
       extract($_GET);
       $where = array('id'=>$delid);
       $data = array('delstatus'=>0);
       $rs = $this->db->update('scheme',$data,$where);
       if($rs)
       {
        $this->session->set_flashdata("success","Scheme Delete Successfully");
        redirect(base_url()."Scheme");  
       }
       else 
       {
        $this->session->set_flashdata("failed","Scheme Not Delete Successfully");
        redirect(base_url()."Scheme");  
       }
    
   }
   public function updateScheme()
   {
        extract($_POST);
        $where =array('id'=>$_GET['uid']);
        
        if($_FILES['document']['name']!="")
        {
        $temp = explode(".", $_FILES["document"]["name"]);
        $cat_image = round(microtime(true)) . '.' . end($temp);
        $config['upload_path']          = './uploads/scheme/';
        $config['allowed_types']        = 'pdf';

        $config['file_name'] = $cat_image;
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('document'))
        {


        $this->session->set_flashdata("failed","Scheme Not Upload");	

        }
        else
        {
            $data = array(
                'title'=>$title,
                'description'=>$description,
                'document'=>$scheme
                );      

        $this->session->set_flashdata("success","Scheme Added Successfully");
        $this->db->insert('scheme',$data);
        redirect(base_url()."Scheme");  

        }             
        }
        else 
        {
            $data = array(
                'title'=>$title,
                'description'=>$description
                ); 
                
        $this->db->update('scheme',$data,$where);
        $this->session->set_flashdata("success","Scheme Update successful");           
        redirect(base_url()."Scheme");  
        }
   }
   
}