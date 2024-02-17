<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoListing extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
        
    }
    public function index()
    {
        
        $this->load->view('pages/add-video');
    }
    public function addVideo()
    {
        extract($_POST);
        
        if($_FILES['vid_img']['name']!="")
        {
            $temp = explode(".", $_FILES["vid_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/videothumbnail/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('vid_img'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('vid_cid'=>$cid,
                'vid_link'=>$vid_link,                
                'vid_img'=>@$newfilename,
                'video_title'=>$video_title);

            $this->session->set_flashdata("success","Video  Added Successfully");
            $this->db->insert('video_listing',$data);
            redirect(base_url()."VideoListing"); 

           }

              
        }
        else 
        {
                $data = array('vid_cid'=>$cid,
                'vid_link'=>$vid_link,                
                'vid_img'=>@$newfilename,
                'video_title'=>$video_title);

                $this->session->set_flashdata("success","Video Added Successfully");
                $this->db->insert('video_listing',$data);
                redirect(base_url()."VideoListing"); 
        }
    }
    public function deleteVideoListing()
    {
        $where =array('id'=>$_GET['delid']);

        $rs = $this->db->delete('video_listing',$where);

        if($rs)
        {
            
            $this->session->set_flashdata("success","Video Delete Successfully");
            redirect(base_url().'VideoListing');
            
        }
        else 
        {
            
            $this->session->set_flashdata("failed","Video Not Deleted");
            redirect(base_url().'VideoListing');
        }
    }
    public function updateVideo()
    {
        
        extract($_POST);

        $where =array('id'=>$vidid);
        
        if($_FILES['vid_img']['name']!="")
        {
            $temp = explode(".", $_FILES["vid_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/videothumbnail/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('vid_img'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('vid_cid'=>$cid,
                'vid_link'=>$vid_link,                
                'vid_img'=>@$newfilename,
                'video_title'=>$video_title);

            $this->session->set_flashdata("success","Video Update Successfully");
            $this->db->update('video_listing',$data,$where);
            redirect(base_url()."VideoListing"); 

           }

              
        }
        else                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        {
            $data = array('vid_cid'=>$cid,
            'vid_link'=>$vid_link,
            'video_title'=>$video_title);

                $this->session->set_flashdata("success","Video Update Successfully");
                $this->db->update('video_listing',$data,$where);
                redirect(base_url()."VideoListing"); 
        }
    }
}