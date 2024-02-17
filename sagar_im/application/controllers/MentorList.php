<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MentorList extends CI_Controller {


    public function index() {
        
        if(isset($_GET['type']))
        {
        $type=$_GET['type'];
        }
        else 
        {
            $type='all';
        }

        if($type=='legal')
        {
           
           $where = array('delstatus'=>1,'is_legal_expert'=>1);
        }
        else if($type=='finance')
        {
           
           $where = array('delstatus'=>1,'is_finance_expert'=>1);
        }
        else if($type=='account')
        {
           
           $where = array('delstatus'=>1,'is_account_expert'=>1);
        }
        else if($type=='marketing')
        {
           
           $where = array('delstatus'=>1,'is_marketing_expert'=>1);
        }
        else if($type=='it')
        {
           
           $where = array('delstatus'=>1,'is_it_expert'=>1);
        }
        else if($type=='digital')
        {
           
           $where = array('delstatus'=>1,'is_digital_marketing_expert'=>1);
        }
        else if($type=='business')
        {
           
           $where = array('delstatus'=>1,'is_business_strategy_expert'=>1);
        }

    

        else if($type=='startup')
        {
           
           $where = array('delstatus'=>1,'is_startup_expert'=>1);
        }

        else if($type=='personality')
        {
           
           $where = array('delstatus'=>1,'is_softskill_expert'=>1);
        }
        else if($type=='is_hr')
        {
           
           $where = array('delstatus'=>1,'is_hr'=>1);
        }
        else if($type=='is_ipr')
        {
           
           $where = array('delstatus'=>1,'is_ipr'=>1);
        }
        else if($type=='is_social_media')
        {
           
           $where = array('delstatus'=>1,'is_social_media'=>1);
        } 
            
        else 
        {
            $where = array('delstatus'=>1);
        }


        $config = array();
       
        $config["base_url"] = base_url() . "MentorList";
        $config["total_rows"] = $this->Model->get_startup_count("mentor",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['mentors'] = $this->Model->get_pending_startup($config["per_page"],$page,"mentor",$where);

        $this->load->view('pages/mentor-list', $data);
    }

    

   
}