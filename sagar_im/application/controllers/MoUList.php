<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MoUList extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('delstatus'=>1);
        $config["base_url"] = base_url() . "MentorList";
        $config["total_rows"] = $this->Model->get_startup_count("mou",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['mou'] = $this->Model->get_pending_startup($config["per_page"],$page,"mou",$where);

        $this->load->view('pages/mou-list', $data);
    }

    

   
}