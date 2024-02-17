<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PendingApplication extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('action'=>'pending','delstatus'=>1,'is_screened'=>0);
        $config["base_url"] = base_url() . "PendingApplication";
        $config["total_rows"] = $this->Model->get_startup_count("startup",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['startups'] = $this->Model->get_pending_startup($config["per_page"],$page,"startup",$where);

        $this->load->view('pages/pending-application', $data);
    }

    public function AcceptStartup()
        {
            extract($_POST);
          $where = array('id'=>$_GET['id']);
          $user= $this->db->get_where('user_registration',array('email'=>$_SESSION['username']))->row();
          $data = array('action'=>'accept','remark'=>$remark,'accepted_rejected_by'=>$user->id,'accept_reject_date'=>date('d/m/Y'));      

          $rs = $this->db->update('startup',$data,$where);
          if($rs)
          {
            $this->session->set_flashdata('success','Accept Startup Successful');
            redirect(base_url().'PendingApplication');
          }
          else 
          {
            $this->session->set_flashdata('failed','Somthing Wrong');
            redirect(base_url().'PendingApplication');
          }

        }
        public function RejectStartup()
        {
            extract($_POST);
          $where = array('id'=>$_GET['id']);
          $user= $this->db->get_where('user_registration',array('email'=>$_SESSION['username']))->row();
          $data = array('action'=>'reject','remark'=>$remark,'accepted_rejected_by'=>$user->id,'accept_reject_date'=>date('d/m/Y'));         
          $rs = $this->db->update('startup',$data,$where);
          if($rs)
          {
            $this->session->set_flashdata('success','Reject Startup Successful');
            redirect(base_url().'PendingApplication');
          }
          else 
          {
            $this->session->set_flashdata('failed','Somthing Wrong');
            redirect(base_url().'PendingApplication');
          }
        }
}