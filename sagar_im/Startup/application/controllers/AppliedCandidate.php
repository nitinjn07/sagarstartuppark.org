<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AppliedCandidate extends CI_Controller {


    public function index() {
        $config = array();
        $s=$this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
        $where = array('startupid'=>$s->id);
        $config["base_url"] = base_url() . "AppliedCandidate";
        $config["total_rows"] = $this->Model->get_startup_count("application_form",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['applied'] = $this->Model->get_pending_startup($config["per_page"],$page,"application_form",$where);

        $this->load->view('pages/applied-candidate', $data);
    }

    

   
}