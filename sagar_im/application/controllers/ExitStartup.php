<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ExitStartup extends CI_Controller {


    public function index() {
       
        $this->load->view('pages/startup-exit');
    }
    
    public function exitStartups()
    {
         extract($_POST);

         if($status=='graduate')
         {
             $data = array('is_graduate'=>1,'graduate_date'=>$exit_date,'graduate_reason'=>$reason);
             $data1 = array('startupid'=>$startupid,'status'=>$status,'date'=>$exit_date,'reason'=>$reason);
            
         }
         if($status=='terminate')
         {
            $data = array('is_terminate'=>1,'termination_date'=>$exit_date,'terminate_reason'=>$reason,'delstatus'=>0);
            $data1 = array('startupid'=>$startupid,'status'=>$status,'date'=>$exit_date,'reason'=>$reason);
         }
         if($status=='left')
         {
            $data = array('is_left'=>1,'left_date'=>$exit_date,'left_stage'=>$stage,'delstatus'=>0,'left_reason'=>$reason);
            $data1 = array('startupid'=>$startupid,'status'=>$status,'date'=>$exit_date,'reason'=>$reason,'stage'=>$stage);
         }
       
         $where = array('id'=>$startupid);


         $rs = $this->db->update('startup',$data,$where);

         if($rs)
         {      
            $this->db->insert('exit_startup',$data1);  
            
            $check = $this->db->get_where('onboard_seat',array('startupid'=>$startupid))->row();
            if($check)
            {
                $data = array('startupid'=>$startupid,'seat_no'=>$check->seat_no,'wing'=>$check->wing);

                $this->db->insert('seat_history',$data);
                $this->db->delete('onboard_seat',array('startupid'=>$startupid));
                
            }
            
            $this->session->set_flashdata('success',"Startup Exit Successfully");
            redirect(base_url().'ExitStartup');
         }
         else 
         {
            $this->session->set_flashdata('failed',"Startup not exit : failed");
            redirect(base_url().'ExitStartup');
         }

    }
    

   
}