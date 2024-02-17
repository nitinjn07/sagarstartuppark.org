<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateCategory extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
        
    }
    public function index()
    {
        
        $this->load->view('pages/template-category');
    }
    public function addCategory()
    {
        extract($_POST);
        
        if($_FILES['cat_img']['name']!="")
        {
            $temp = explode(".", $_FILES["cat_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/template_category/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('cat_img'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('title'=>$cat_name,
                'description'=>$cat_desc,                
                'image'=>@$newfilename);

            $this->session->set_flashdata("success","Template Category Added Successfully");
            $this->db->insert('template_category',$data);
            redirect(base_url()."TemplateCategory"); 

           }

              
        }
        else 
        {
          $data = array('title'=>$cat_name,
                'description'=>$cat_desc
                );

                $this->session->set_flashdata("success","Template Category Added Successfully");
                $this->db->insert('template_category',$data);
                redirect(base_url()."TemplateCategory"); 
        }
    }
    public function deleteCategory()
    {
        $where =array('id'=>$_GET['delid']);

        $rs = $this->db->delete('template_category',$where);

        if($rs)
        {
            
            $this->session->set_flashdata("success","Template Category Added Successfully");
            redirect(base_url().'TemplateCategory');
            
        }
        else 
        {
            
            $this->session->set_flashdata("failed","Template Category Not Added");
            redirect(base_url().'TemplateCategory');
        }
    }
    public function updateCategory()
    {
        
        extract($_POST);

        $where =array('id'=>$catid);
        
        if($_FILES['cat_img']['name']!="")
        {
            $temp = explode(".", $_FILES["cat_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/template_category/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('cat_img'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	
            redirect(base_url().'TemplateCategory');

            }
            else
            {
                $data = array('title'=>$cat_name,
                'description'=>$cat_desc,                
                'image'=>@$newfilename);

            $this->session->set_flashdata("success","Template Category Update Successfully");
            $this->db->update('template_category',$data,$where);
            redirect(base_url()."TemplateCategory"); 

           }

              
        }
        else 
        {
          $data = array('title'=>$cat_name,
                'description'=>$cat_desc
                );

                $this->session->set_flashdata("success","Template Category Update Successfully");
                $this->db->update('template_category',$data,$where);
                redirect(base_url()."TemplateCategory"); 
        }
    }
}