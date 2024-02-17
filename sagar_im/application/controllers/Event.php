<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-event');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    public function addEvent()
    {
        extract($_POST); 
        
        if($_FILES['evt_img']['name']!="")
        {
            $temp = explode(".", $_FILES["evt_img"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            $config['upload_path'] = './uploads/event/';
            
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            
            $config['file_name'] = $newfilename;
        
            $this->upload->initialize($config);


            $temp2 = explode(".", $_FILES["evt_banner"]["name"]);
            $newfilename2 = round(microtime(true)) . '_banner_.' . end($temp2);
            
            $config2['upload_path'] = './uploads/event/';
            
            $config2['allowed_types'] = 'jpg|png|jpeg|gif';
            
            $config2['file_name'] = $newfilename2;
        
            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('evt_img'))  {
                
                $this->session->set_flashdata("failed","Event image not uploaded. Format is not correct");

                redirect(base_url()."Event"); 	

            } else {

                if($evt_mode=='')
                {
                    $evt_mode="Na";
                }
               
                if($evt_link=='')
                {
                    $evt_link="#";
                }
                if($evt_venue=='')
                {
                    $evt_venue="Na";
                }

                $data = array('event_title'=>$evt_title,
                'start_evt'=>$start_evt,
                'end_evt'=>$end_evt,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'event_description'=>$evt_description,
                'event_tags'=>$evt_tags,
                'event_type'=>$evt_type,
                'event_image'=>$newfilename,
                'event_banner'=>$newfilename2,
                'event_link'=>@$evt_link,
                'event_mode'=>$evt_mode,
                'event_venue'=>@$evt_venue,
                'reg_fees'=>$reg_fees);

                $this->session->set_flashdata("success","Event Added Successfully");
                $this->db->insert('events',$data);
               
                redirect(base_url()."Event"); 

            }

                    
        }

    }
    public function eventlist()
    {
        $config = array();   
        $where = array(1=>1);     
        $config["base_url"] = base_url() . "Event/eventlist";
        $config["total_rows"] = $this->Model->get_startup_count("events",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['events'] = $this->Model->get_pending_startup($config["per_page"],$page,"events",$where);

        $this->load->view('pages/event-list',$data);
    }
    public function publish()
    {
        $where =array('id'=>$_GET['eid']);
        $data = array('event_status'=>'publish');
        $rs = $this->db->update('events',$data,$where);
        if($rs)
        {
           $this->session->set_flashdata('success','Event publish successfully');
           redirect(base_url().'Event/eventlist');
        }
        else 
        {
            $this->session->set_flashdata('failed','Event Unpublish successfully');
            redirect(base_url().'Event/eventlist');
        }
    }
    public function unpublish()
    {
        $where =array('id'=>$_GET['eid']);
        $data = array('event_status'=>'unpublish');
        $rs = $this->db->update('events',$data,$where);
        if($rs)
        {
           $this->session->set_flashdata('success','Event publish successfully');
           redirect(base_url().'Event/eventlist');
        }
        else 
        {
            $this->session->set_flashdata('failed','Event Unpublish successfully');
            redirect(base_url().'Event/eventlist');
        }
    }
  
}