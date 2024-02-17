<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageVideo extends CI_Controller {

        public function index()
        {
        $this->load->view('pages/manage-video');
        }
        function __construct() {
        parent::__construct();
        $this->output->delete_cache();
        }

        public function uploadVideo()
        {
        extract($_POST);        
        $data = array(
        
        'tid'=>$tid,
        'cid'=>$cid,
        'subid'=>$sid, 
        'title'=>$title, 
        'description'=>$description, 
        'requirement'=>$requirement,
        'this_course_is_for'=>$this_course_is_for,
        'what_you_learn'=>$what_you_learn,
        'intro_video'=>$intro_video,
        'main_video'=>$main_video,
        'doc_file'=>$doc_file    );

        $videodb = $this->load->database('videodb', TRUE); 
        $rs = $videodb->insert('video_upload',$data);

        if($rs){
        $this->session->set_flashdata('success',"Video Successfully Added");
        redirect(base_url().'ManageVideo');  
        }
        }

        public function updateVideo()
        {
        extract($_POST);  
        $where = array('id'=>$videolistid);      
        $data = array(
        
        'tid'=>$tid,
        'cid'=>$cid,
        'subid'=>$sid, 
        'title'=>$title, 
        'description'=>$description, 
        'requirement'=>$requirement,
        'this_course_is_for'=>$this_course_is_for,
        'what_you_learn'=>$what_you_learn,
        'intro_video'=>$intro_video,
        'main_video'=>$main_video,
        'doc_file'=>$doc_file    );

        $videodb = $this->load->database('videodb', TRUE); 
        $rs = $videodb->update('video_upload',$data,$where);

        if($rs){
        $this->session->set_flashdata('success',"Video Update Successfully");
        redirect(base_url().'ManageVideoList');  
        }
        }



     public function editVideo()
     {
        $this->load->view('pages/edit-video');
     }

     public function deleteVideo()
     {
         $where = array('id'=>$_GET['delid']);
         $videodb = $this->load->database('videodb', TRUE); 
         $rs = $videodb->update('video_upload',array('status'=>0),$where);
         if($rs){
                $this->session->set_flashdata('success',"Video Delete Successfully");
                redirect(base_url().'ManageVideoList');  
                }

     }

}