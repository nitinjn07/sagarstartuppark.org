<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeStartupType extends CI_Controller {


    public function index() {
       
        $this->load->view('pages/startup-type-change');
    }
    public function changeType()
    {
        
        $id = $_GET['startup_id'];
        $date = date('d-m-Y');

        if($_GET['type']=='physical')
        {
        
        $data = array('startup_type'=>'Virtual');
        $where = array('id'=>$id);

        
        
        $this->db->update('startup',$data,$where);

        $data2 = array('startupid'=>$id,'from_type'=>'Physical','to_type'=>'Virtual','change_date'=>$date);
    
        $rs = $this->db->insert('startup_type_change',$data2);

        if($rs)
        {
            $this->db->delete('onboard_seat',array('startupid'=>$id));
            $this->session->set_flashdata('success',"Change Startup Type Physical to Virtual Successfully");
            redirect(base_url().'ChangeStartupType');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Change Startup Failed:");
            redirect(base_url().'ChangeStartupType');
        }

       }
       else if($_GET['type']=='virtual') 
       {

        $data = array('startup_type'=>'Physical');
        $where = array('id'=>$id);
        
        $this->db->update('startup',$data,$where);

        $data2 = array('startupid'=>$id,'from_type'=>'Virtual','to_type'=>'Physical','change_date'=>$date);
    
        $rs = $this->db->insert('startup_type_change',$data2);

        if($rs)
        {
            $this->session->set_flashdata('success',"Change Startup Type Virtual to Physical Successfully");
            redirect(base_url().'ChangeStartupType');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Change Startup Failed:");
            redirect(base_url().'ChangeStartupType');
        }
        
       }
    }
   
    

   
}