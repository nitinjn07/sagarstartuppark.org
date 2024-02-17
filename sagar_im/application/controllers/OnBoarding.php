<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OnBoarding extends CI_Controller {
    
    public function index()
    {
          $this->load->view('pages/startup-onboarding');
    }
    public function seatallocate()
    {
        extract($_POST);
        if(isset($seat)) 
        {
        $data = array('startupid'=>$startupid,
                      'on_board_date'=>$on_board_date,
                      'graduate_date'=>$graduate_date,
                      'wing'=>$wing,
                      'seat_no'=>implode("|",$seat));
        $rs = $this->db->insert('onboard_seat',$data);

        if($rs>0)
        {      $data2 = array('on_board_date'=>$on_board_date,'graduate_date'=>$graduate_date);
               $this->db->update('startup',$data2,array('id'=>$startupid));            
               $this->session->set_flashdata('success','Startup onboarding and seat allocation successful');
               redirect(base_url().'OnBoarding');
        }
        }
        else 
        {
            $this->session->set_flashdata('failed','Please select the Seat No.');
            redirect(base_url().'OnBoarding'); 
        } 

       

    }
    public function UpdateSeatAllocate()
    {
        extract($_POST);
        
        if(empty($seat))
        {
            $seat = [];
        }

        $where = array('startupid'=>$startupid);
        $data = array('startupid'=>$startupid,
                      'on_board_date'=>$on_board_date,
                      'graduate_date'=>$graduate_date,
                      'wing'=>$wing,
                      'seat_no'=>implode("|",$seat));


        $rs = $this->db->update('onboard_seat',$data,$where);

        if($rs>0)
        {      $data2 = array('on_board_date'=>$on_board_date,'graduate_date'=>$graduate_date);
               $this->db->update('startup',$data2,array('id'=>$startupid));            
               $this->session->set_flashdata('success','Startup onboarding and seat allocation successful');
               redirect(base_url().'AllottedList');
        }

       

    }
   
}