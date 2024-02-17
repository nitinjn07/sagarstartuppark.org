<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StageUpgrade extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/startup-stage-upgrade');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   public function getStageDetail()
   {
       
        
        $where = array('id'=>$_GET['id']);
        $startup = $this->db->get_where('startup',$where)->row();
        echo "$startup->im_stage";   

        
   }
   public function upgradeStage()
   {
    
        extract($_POST);  

        $check = $this->db->get_where('stage_upgrade',array('startupid'=>$startupid,'upgrade_stage'=>$upgrade_stage));      
        if($check->num_rows()>0)
        {
            $this->session->set_flashdata("failed","Startup already in this stage");
            redirect(base_url()."StageUpgrade"); 
        }
        else 
        {

        if($_FILES['upgrade_doc']['name']!="")
        {
            $temp = explode(".", $_FILES["upgrade_doc"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            $config['upload_path'] = './uploads/upgrade_doc/';
            
            $config['allowed_types'] = 'pdf';
            
            $config['file_name'] = $newfilename;
        
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('upgrade_doc'))
            {
                
                $this->session->set_flashdata("failed","Document Not Upload. Allowed only PDF File");
                redirect(base_url()."StageUpgrade"); 	

            }
            else
            {
            $data = array('im_stage'=>$upgrade_stage);
            $this->db->update('startup',$data,array('id'=>$startupid));

                     $data = array('startupid'=>$startupid,
                    'current_stage'=>$current_stage,
                    'upgrade_stage'=>$upgrade_stage,
                    'upgrade_date'=>$upgrade_date,
                    'upgrade_doc'=>$newfilename,
                    'comment'=>$comment);

            $this->session->set_flashdata("success","Stage Upgradation Successful");
            $this->db->insert('stage_upgrade',$data);
            redirect(base_url()."StageUpgrade"); 


            }

                    
        }
    }

   }
  
}