<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineVideoCategory extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
        
    }
    public function index()
    {
        
        $this->load->view('pages/online-video-category');
    }
    public function addCategory()
    {
        extract($_POST);
        
        if($_FILES['cat_img']['name']!="")
        {
            $temp = explode(".", $_FILES["cat_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/videocategory/';
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
                'image'=>@$newfilename,
                'cat_tags'=>$cat_tags);

            $this->session->set_flashdata("success","Video Category Added Successfully");
            $this->db->insert('online_video_category',$data);
            redirect(base_url()."OnlineVideoCategory"); 

           }

              
        }
        else 
        {
          $data = array('title'=>$cat_name,
                'description'=>$cat_desc,
                'cat_tags'=>$cat_tags
                );

                $this->session->set_flashdata("success","Video Category Added Successfully");
                $this->db->insert('online_video_category',$data);
                redirect(base_url()."OnlineVideoCategory"); 
        }
    }
    public function deleteCategory()
    {
        $where =array('id'=>$_GET['delid']);

        $rs = $this->db->delete('online_video_category',$where);

        if($rs)
        {
            
            $this->session->set_flashdata("success","Video Category Added Successfully");
            redirect(base_url().'OnlineVideoCategory');
            
        }
        else 
        {
            
            $this->session->set_flashdata("failed","Video Category Not Added");
            redirect(base_url().'OnlineVideoCategory');
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
            $config['upload_path']          = './uploads/videocategory/';
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
                'image'=>@$newfilename,
                'cat_tags'=>$cat_tags);

            $this->session->set_flashdata("success","Video Category Update Successfully");
            $this->db->update('online_video_category',$data,$where);
            redirect(base_url()."OnlineVideoCategory"); 

           }

              
        }
        else 
        {
          $data = array('title'=>$cat_name,
                'description'=>$cat_desc,
                'cat_tags'=>$cat_tags
                );

                $this->session->set_flashdata("success","Video Category Update Successfully");
                $this->db->update('online_video_category',$data,$where);
                redirect(base_url()."OnlineVideoCategory"); 
        }
    }
}