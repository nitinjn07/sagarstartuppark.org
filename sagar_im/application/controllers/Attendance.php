<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {


   public function index()
   {
    $this->load->view('pages/upload-attendance');
   }
   
   public function PunchDailyAttd()
   {
      extract($_POST);
      
      $attd =  "attd".$seatno;
      $status =  $_POST[$attd];

      $check = $this->db->get_where('startup_attendance',array('startup_id'=>$startupid,'attd_date'=>date('d-m-Y'),'seatno'=>$seatno));
      
      if($check->num_rows()==0)
      {
         $data = array('startup_id'=>$startupid,'status'=>$status,'seatno'=>$seatno,'wing'=>$wing,'attd_date'=>$attd_date);

         $this->db->insert('startup_attendance',$data);

         $this->session->set_flashdata("success","Attendance Punch Successful");
         redirect(base_url()."Attendance");
      }
      else 
      {
        $id = $check->row()->id;
        $data = array('status'=>$status,'wing'=>$wing,'seatno'=>$seatno,'attd_date'=>$attd_date);

        $this->db->update('startup_attendance',$data,array('id'=>$id));

        $this->session->set_flashdata("success","Attendance Punch Successful");
        redirect(base_url()."Attendance");
      }
   }
   
      

   public function attendance_report()
   {
        $this->load->view('pages/attendance-report');
   }
   
  
}