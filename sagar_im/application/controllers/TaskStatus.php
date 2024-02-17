<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskStatus extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   public function index()
   {

    $config = array();
    $where = array('delstatus'=>1,'kra_id'=>$_GET['kraid']);
    $config["base_url"] = base_url() . "TaskStatus";
    $config["total_rows"] = $this->Model->get_startup_count("kra_task",$where);
    $config["per_page"] = 50;
    $config["uri_segment"] = 2;
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
    $data["links"] = $this->pagination->create_links(); 
    $data['kra_task'] = $this->Model->get_pending_startup($config["per_page"],$page,"kra_task",$where);
    $this->load->view('pages/task-status',$data);
    
   } 
   public function ReviewTask()
   {
        extract($_POST);

        
       
        $data2 = array('review_comment'=>$review,
        'reviewed_date'=>$review_date,
        'is_review'=>1,
        'status'=>$status,
        'review_by'=>$review_by);
        

         $kra = $this->db->get_where('set_kra',array('id'=>$kraid))->row();
          
         if($kra->is_plan_to_upgrade==1)
         {
           $data3 = array('startupid'=>$kra->startupid,
                          'stage'=>$stage,
                          'kraid'=>$kraid,
                          'upgrade_date'=>$review_date);
           $this->db->insert('stage_upgrade',$data3);
         }

         
        $rs = $this->db->update('set_kra',$data2,array('id'=>$kraid));
      
        if($rs)
        {
          $this->session->set_flashdata('success','Review KRA Successful');
          redirect(base_url().'SetKRA');
        }
        else 
        {
        $this->session->set_flashdata('failed','KRA Not Reviewed');
        redirect(base_url().'SetKRA');
        }
        
           

        

    
   }
//    public function CompletedStatus()
//    {
//        $where = array('tid'=>$_GET['id']);
//        $id = $_GET['id'];


//        $data = array('status'=>'completed');
//        $rs = $this->db->update('kra_task',$data,$where);
//        if($rs)
//        {
//            $this->session->set_flashdata('success','Task Completed Successful');
//            redirect(base_url().'SetKRA');
//        }
//    }
//    public function CancelledStatus()
//    {
//     $where = array('tid'=>$_GET['id']);
//     $id = $_GET['id'];
//     $data = array('status'=>'cancelled');
//     $rs = $this->db->update('kra_task',$data,$where);
//     if($rs)
//     {
//         $this->session->set_flashdata('success','Task Cancelled Successful');
//         redirect(base_url().'SetKRA');
//     }
//    }
  



}