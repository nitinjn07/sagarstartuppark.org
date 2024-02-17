<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageVideoList extends CI_Controller {

        public function index()
        {
            $videodb = $this->load->database('videodb', TRUE); 
            
            $config = array();
            $where = array('status'=>1);
            $config["base_url"] = base_url() . "ManageVideoList";
            $config["total_rows"] = $this->Model->get_course_count("video_upload",$where);
            $config["per_page"] = 25;
            $config["uri_segment"] = 2;
            $this->pagination->initialize($config);
    
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    
            $data["links"] = $this->pagination->create_links();
    
         
            $data['video'] = $this->Model->get_pending_course($config["per_page"],$page,"video_upload",$where);
        $this->load->view('pages/upload-video-list',$data);
        }
        function __construct() {
        parent::__construct();
        $this->output->delete_cache();
        }

        

}