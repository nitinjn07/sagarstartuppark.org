<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MeetingRequest extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('status'=>'pending');
        $config["base_url"] = base_url() . "MeetingRequest";
        $config["total_rows"] = $this->Model->get_startup_count("mentor_connect",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['meeting'] = $this->Model->get_pending_startup($config["per_page"],$page,"mentor_connect",$where);

        $this->load->view('pages/meeting-request', $data);
    }

    public function MeetingAccept()
    {
        extract($_POST);

        $data = array('mid'=>$meeting_id,'title'=>$title,'plateform'=>$plateform,'link'=>$link);

        $rs = $this->db->insert('meeting_details',$data);

        if($rs)
        {
            $st = $this->db->get_where('mentor_connect',array('id'=>$meeting_id))->row();
            $data = array('startupid'=>$st->startupid,'message'=>"Mentor Request Accepted",'link'=>"MentorConnect/getMeetingList");
            $this->db->insert('notification',$data);

            
            $this->db->update('mentor_connect',array('status'=>'accepted','accept_details'=>$remark),array('id'=>$meeting_id));
            $this->session->set_flashdata('success',"Meeting Accept Successful");
            redirect(base_url().'MeetingRequest');
        }
    }
    public function MeetingReject()
    {
        extract($_POST);
        
         $rs = $this->db->update('mentor_connect',array('status'=>'rejected','reject_details'=>$remark),array('id'=>$meeting_id));

         if($rs)
         {
            $this->session->set_flashdata('success',"Meeting Rejected Successful");
            redirect(base_url().'MeetingRequest');
         }
    }



    public function NewMeetingAccept()
    {
        extract($_POST);

        $where = array('id'=>$meeting_id);

        $data = array('status'=>'accept','title'=>$title,'plateform'=>$plateform,'link'=>$link,'remark'=>$remark);
         
        $rs = $this->db->update('new_mentor_request',$data,$where);

        if($rs)
        {
            $st = $this->db->get_where('new_mentor_request',array('id'=>$meeting_id))->row();
            $data = array('startupid'=>$st->startup_id,'message'=>"Mentor Request Accepted",'link'=>"MentorConnect/NewMentorRequest");
            $this->db->insert('notification',$data);          
         
            redirect(base_url().'NewMentorRequest');
        }
    }
    public function NewMeetingReject()
    {
        extract($_POST);

        $where = array('id'=>$meeting_id);

        $data = array('status'=>'reject','remark'=>$remark);
         
        $rs = $this->db->update('new_mentor_request',$data,$where);

        if($rs)
        {
            $st = $this->db->get_where('new_mentor_request',array('id'=>$meeting_id))->row();
            $data = array('startupid'=>$st->startup_id,'message'=>"Mentor Request Rejected",'link'=>"MentorConnect/NewMentorRequest");
            $this->db->insert('notification',$data);          
         
            redirect(base_url().'NewMentorRequest');
        }
    }
   


    

   
}