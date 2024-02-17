<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UploadedList extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('delstatus'=>1);
        $config["base_url"] = base_url() . "UploadedList";
        $config["total_rows"] = $this->Model->get_startup_count("startupupload",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['startup_upload'] = $this->Model->get_pending_startup($config["per_page"],$page,"startupupload",$where);

        $this->load->view('pages/uploaded-list', $data);
    }

    public function DeleteData()
    {
         $id = $_GET['id'];
         $rs = $this->db->update('startupupload',array('delstatus'=>0),array('id'=>$id));
        if($rs)
        {
            $this->session->set_flashdata('success',"Delete Successful");
            redirect(base_url().'UploadedList');
        }
    }

    

   
}