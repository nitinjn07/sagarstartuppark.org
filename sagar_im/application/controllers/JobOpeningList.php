<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JobOpeningList extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('delstatus'=>1);
        $config["base_url"] = base_url() . "JobOpeningList";
        $config["total_rows"] = $this->Model->get_startup_count("job_listing",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['job'] = $this->Model->get_pending_startup($config["per_page"],$page,"job_listing",$where);

        $this->load->view('pages/job-opening-list', $data);
    }

    

   
}