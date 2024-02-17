<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MeetingHistory extends CI_Controller {


    public function index() {
        $config = array();
        $where = array();
        $config["base_url"] = base_url() . "MeetingHistory";
        $config["total_rows"] = $this->Model->get_startup_count("mentor_connect",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['meeting'] = $this->Model->get_pending_startup($config["per_page"],$page,"mentor_connect",$where);

        $this->load->view('pages/meeting-history', $data);
    }

   
    

   
}