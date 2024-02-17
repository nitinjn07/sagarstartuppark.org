<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TeamList extends CI_Controller {


    public function index() {
        $startupid = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
        $config = array();
        $where = array('delstatus'=>1,'startup_id'=>$startupid->id);
        $config["base_url"] = base_url() . "TeamList";
        $config["total_rows"] = $this->Model->get_startup_count("team_member",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['team'] = $this->Model->get_pending_startup($config["per_page"],$page,"team_member",$where);

        $this->load->view('pages/team-list', $data);
    }

    

   
}