<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceDetails extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/service-details');
    }
    public function ServiceRequest() {
       
        $this->load->view('pages/service-request');
    }
    public function Services()
    {
         $this->load->view('pages/services');
    }
    public function SendRequest()
    {
        extract($_POST);

        $data = array('service_id'=>$service_id,'startup_id'=>$startup_id,'why_need'=>$why_need,'what_help'=>$what_help);

        $check = $this->db->get_where('service_request',array('service_id'=>$service_id,'startup_id'=>$startup_id))->num_rows();

        if($check>0)
        {
            $this->session->set_flashdata('failed',"This service request already submitted");
            redirect(base_url().'Dashboard');
        }
        else 
        {
            $rs = $this->db->insert('service_request',$data);
            if($rs)
            {
                $this->session->set_flashdata('success',"This service request submitted Successfully");
                redirect(base_url().'Dashboard');
            }
            else 
            {
                $this->session->set_flashdata('failed',"This service request not submitted");
                redirect(base_url().'Dashboard');
            }
        }
    }
  
}