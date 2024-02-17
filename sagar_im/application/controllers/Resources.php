<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-resource');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   public function Category()
   {
      $this->load->view('pages/add-resource-category');
   } 
   public function saveCategory()
   {
        extract($_POST);
        if($_FILES['cat_image']['name']!="")
        {
        $temp = explode(".", $_FILES["cat_image"]["name"]);
        $cat_image = round(microtime(true)) . '.' . end($temp);
        $config['upload_path']          = './uploads/resource_category/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $config['file_name'] = $cat_image;
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('cat_image'))
        {


        $this->session->set_flashdata("failed","Image Not Upload");	

        }
        else
        {
        $data = array(
        'cat_name'=>$cat_name,
        'cat_image'=>$cat_image
        );

      

        $this->session->set_flashdata("success","Category Added Successfully");
        $this->db->insert('resource_category',$data);
        redirect(base_url()."Resources/Category");  

        }             
        }
        else 
        {

        $this->session->set_flashdata("failed","Please upload image also");           
        redirect(base_url()."Resources/Category");  
        }
   }
   public function deleteCategory()
   { 
       extract($_GET);
       $where = array('id'=>$delid);
       $data = array('delstatus'=>0);
       $rs = $this->db->update('resource_category',$data,$where);
       if($rs)
       {
        $this->session->set_flashdata("success","Category Delete Successfully");
        redirect(base_url()."Resources/Category");  
       }
       else 
       {
        $this->session->set_flashdata("failed","Category Not Delete Successfully");
        redirect(base_url()."Resources/Category");  
       }
    
   }
   public function updateCategory()
   {
        extract($_POST);
        $where =array('id'=>$_GET['uid']);
        
        if($_FILES['cat_image']['name']!="")
        {
        $temp = explode(".", $_FILES["cat_image"]["name"]);
        $cat_image = round(microtime(true)) . '.' . end($temp);
        $config['upload_path']          = './uploads/resource_category/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';

        $config['file_name'] = $cat_image;
        $this->upload->initialize($config);
        if ( !$this->upload->do_upload('cat_image'))
        {


        $this->session->set_flashdata("failed","Image Not Upload");	

        }
        else
        {
        $data = array(
        'cat_name'=>$cat_name,
        'cat_image'=>$cat_image
        );      

        $this->session->set_flashdata("success","Category Added Successfully");
        $this->db->insert('resource_category',$data);
        redirect(base_url()."Resources/Category");  

        }             
        }
        else 
        {
        $data = array(
        'cat_name'=>$cat_name
        );
        $this->db->update('resource_category',$data,$where);
        $this->session->set_flashdata("success","Update category successful");           
        redirect(base_url()."Resources/Category");  
        }
   }
   public function saveResource()
   {
       extract($_POST);

       $data = array('title'=>$title,
                     'description'=>$description,
                     'link'=>$link,
                     'type'=>$r_type,
                     'catid'=>$catid);

      $rs = $this->db->insert('resouces',$data);

      if($rs)
      {
        $this->session->set_flashdata("success","Add Resource successful");           
        redirect(base_url()."Resources"); 
      }
      else 
      {
        $this->session->set_flashdata("failed","Information not updated");           
        redirect(base_url()."Resources"); 
      }

       
   } 
   public function updateResource()
   {
       extract($_POST);

       $where = array('id'=>$_GET['updateid']);

       $data = array('title'=>$title,
                     'description'=>$description,
                     'link'=>$link,
                     'type'=>$r_type,
                     'catid'=>$catid);

      $rs = $this->db->update('resouces',$data,$where);

      if($rs)
      {
        $this->session->set_flashdata("success","Update Resource successful");           
        redirect(base_url()."Resources"); 
      }
      else 
      {
        $this->session->set_flashdata("failed","Information not updated");           
        redirect(base_url()."Resources"); 
      }

       
   } 
   public function deleteResource()
   {
      $where = array('id'=>$_GET['delid']);

      $data = array('delstatus'=>0);

      $res  = $this->db->update('resouces',$data,$where);

      if($res)
      {
        $this->session->set_flashdata("success","Delete Resource Successfull");           
        redirect(base_url()."Resources"); 
      }
      else 
      {
        $this->session->set_flashdata("failed","Resource Not Deleted Successfull");           
        redirect(base_url()."Resources"); 
      } 
   }
}