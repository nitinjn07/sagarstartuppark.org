<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCategory extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->output->delete_cache();
       
          
    }
    public function index()
    {
        //Course-type
        $config = array();
        $config2 = array();
        $config3 = array();   
        
        $where = array('status'=>1);
        $config["base_url"] = base_url() . "ManageCategory";
        $config["total_rows"] = $this->Model->get_course_count("course_type",$where);
        $config["per_page"] = 3;
        $config["uri_segment"] = 2;


        $where2 = array('status'=>1);
        $config2["base_url"] = base_url() . "ManageCategory";
        $config2["total_rows"] = $this->Model->get_course_count("course_category",$where2);
        $config2["per_page"] = 4;
        $config2["uri_segment"] = 2;


        $where3 = array('status'=>1);
        $config3["base_url"] = base_url() . "ManageCategory";
        $config3["total_rows"] = $this->Model->get_course_count("course_sub_category",$where3);
        $config3["per_page"] = 5;
        $config3["uri_segment"] = 2;
 



        $this->pagination->initialize($config);
        $this->pagination->initialize($config2);
        $this->pagination->initialize($config3);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $type["links"] = $this->pagination->create_links();




        $type['course_type'] = $this->Model->get_pending_course($config["per_page"],$page,"course_type",$where);
        $type['course_category'] = $this->Model->get_pending_course($config2["per_page"],$page,"course_category",$where2);
         $type['course_sub_category'] = $this->Model->get_pending_course($config3["per_page"],$page,"course_sub_category",$where3);


        $this->load->view('pages/manage-category',$type);
    }
   
    public function addCourseType()
    {
          extract($_POST);

          $data = array('type'=>$coursetype,'slug'=>$slug);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->insert('course_type',$data);

         if($rs){
            $this->session->set_flashdata('success',"Course Type Successfully Added");
            redirect(base_url().'ManageCategory');  
         }

    }
     public function updateCourseType()
    {
          extract($_POST);

          $data = array('type'=>$coursetype,'slug'=>$slug);
          $where = array('id'=>$typeid);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->update('course_type',$data,$where);

         if($rs){
            $this->session->set_flashdata('success',"Update Course Type Successfully");
            redirect(base_url().'ManageCategory');  
         }

    }
     public function deleteCourseType()
    {
          extract($_GET);

      
          $data = array('status'=>0);
          $where = array('id'=>$id);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->update('course_type',$data,$where);

         if($rs){
            $this->session->set_flashdata('success',"Delete Course Type Successfully");
            redirect(base_url().'ManageCategory');  
         }

    }
    public function addCategory()
    {
          extract($_POST);

          $data = array('tid'=>$typeid,'category_name'=>$category_name,'slug'=>$slug);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->insert('course_category',$data);

         if($rs){
            $this->session->set_flashdata('success',"Course Category Successfully Added");
            redirect(base_url().'ManageCategory');  
         }

    }
       public function updateCourseCategory()
    {
          extract($_POST);

          $data = array('tid'=>$typeid,'category_name'=>$category_name,'slug'=>$slug);
          $where = array('id'=>$catid);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->update('course_category',$data,$where);

         if($rs){
            $this->session->set_flashdata('success',"Update Course Category Successfully");
            redirect(base_url().'ManageCategory');  
         }

    }
     public function deleteCourseCategory()
    {
          extract($_GET);

      
          $data = array('status'=>0);
          $where = array('id'=>$id);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->update('course_category',$data,$where);

         if($rs){
            $this->session->set_flashdata('success',"Delete Course Category Successfully");
            redirect(base_url().'ManageCategory');  
         }

    }

    public function getCategory()
    {   
        extract($_POST);
        $where = array('tid'=>$typeid);
        $videodb = $this->load->database('videodb', TRUE);
        $category = $videodb->get_where('course_category',$where)->result();

        $data = '<option value="" selected disabled>Select Category</option>';

        foreach($category as $c)
        {
            $data .= "<option value='".$c->id."'>".$c->category_name."</option>";
        }

        echo $data;

    }
      public function getSubCategory()
    {   
        extract($_POST);
       
        $where = array('cid'=>$cid);
        $videodb = $this->load->database('videodb', TRUE);
        $category = $videodb->get_where('course_sub_category',$where)->result();

        $data = '<option value="" selected disabled>Select Sub Category</option>';

        foreach($category as $c)
        {
            $data .= "<option value='".$c->id."'>".$c->sub_cat_name."</option>";
        }

        echo $data;

    }


    public function addSubCategory()
    {
          extract($_POST);

          $data = array('tid'=>$typeid,'cid'=>$cid,'sub_cat_name'=>$subcat,'slug'=>$slug);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->insert('course_sub_category',$data);

         if($rs){
            $this->session->set_flashdata('success',"Course Sub Category Successfully Added");
            redirect(base_url().'ManageCategory');  
         }

    }

    public function deleteSubCategory()
    {
          extract($_GET);

      
          $data = array('status'=>0);
          $where = array('id'=>$id);

           $videodb = $this->load->database('videodb', TRUE);

         $rs = $videodb->update('course_sub_category',$data,$where);

         if($rs){
            $this->session->set_flashdata('success',"Delete Sub Category Successfully");
            redirect(base_url().'ManageCategory');  
         }

    }
 
    
}