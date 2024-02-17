<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AllottedList extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('delstatus'=>1,'is_screened'=>1,'action'=>'accept','is_graduate'=>0);
        $config["base_url"] = base_url() . "AllottedList";
        $config["total_rows"] = $this->Model->get_startup_count("startup",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['startups'] = $this->Model->get_pending_startup($config["per_page"],$page,"startup",$where);

        $this->load->view('pages/allotted-list', $data);
    }

    

   
}