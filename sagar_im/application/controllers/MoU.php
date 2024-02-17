<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoU extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-mou');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    public function addMou()
    {
        extract($_POST); 
        if($_FILES['mou_doc']['name']!="")
        {
            $temp = explode(".", $_FILES["mou_doc"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            $config['upload_path'] = './uploads/mou/';
            
            $config['allowed_types'] = 'pdf';
            
            $config['file_name'] = $newfilename;
        
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('mou_doc'))
            {
                
                $this->session->set_flashdata("failed","Mou Not Upload. Allowed only PDF File");
                redirect(base_url()."MoU"); 	

            }
            else
            {
                $data = array('type_of_org'=>$type_of_org,
                'name_of_org'=>$name_of_org,
                'mobile_no'=>$mobile_no,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'person_name'=>$person_name,
                'mou_doc'=>$newfilename);

            $this->session->set_flashdata("success","Mou Added Successfully");
            $this->db->insert('mou',$data);
            redirect(base_url()."MoU"); 


            }

                    
        }

    }

public function deleteMou()
    {
      $delid = $_GET['id'];
      $data = array('delstatus'=>0);

      $rs = $this->db->update('mou',$data,array('id'=>$delid));
      if($rs)
      {
        $this->session->set_flashdata('success',"Delete Mou Successful");
        redirect(base_url().'MoUList');
      }
      else 
      {
        $this->session->set_flashdata('failed',"Failed : Information not deleted");
         redirect(base_url().'MoUList');
      }
    }

   public function EditMoU()
   {

    $this->load->view('pages/edit-mou');
   }


    public function updateMou()
    {   
        extract($_POST);
        $updateid = $_GET['editid'];
        
        if($_FILES['mou_doc']['name']!="")
		{
		    echo "hello";
            $temp = explode(".", $_FILES["mou_doc"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/mou/';
            $config['allowed_types']        = 'pdf';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('mou_doc'))
            {


            $this->session->set_flashdata("failed","Mou Not Upload");	

            }
            else
            {
                $data = array('type_of_org'=>$type_of_org,
                'name_of_org'=>$name_of_org,
                'mobile_no'=>$mobile_no,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
                'person_name'=>$person_name,
                'mou_doc'=>$newfilename,
                'email_id'=>$email_id);

            $this->session->set_flashdata("success","Mou Update Successfully");
            $this->db->update('mou',$data,array('id'=>$updateid));
            redirect(base_url()."MoUList");

          }

                  
        }
        else 
        {
            $data = array('type_of_org'=>$type_of_org,
            'name_of_org'=>$name_of_org,
            'mobile_no'=>$mobile_no,
            'country'=>$country,
            'state'=>$state,
            'city'=>$city,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'person_name'=>$person_name,
            'email_id'=>$email_id
            );

            $this->session->set_flashdata("success","Mou Update Successfully");
            $this->db->update('mou',$data,array('id'=>$updateid));
            redirect(base_url()."MoUList");
        }
    }
}