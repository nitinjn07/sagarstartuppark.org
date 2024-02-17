<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AcceptedApplication extends CI_Controller {

    public function index() {
        $config = array();
        $where = array('action'=>'accept','delstatus'=>1,'is_screened'=>0);
        $config["base_url"] = base_url() . "AcceptedApplication";
        $config["total_rows"] = $this->Model->get_startup_count("startup",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['startups'] = $this->Model->get_pending_startup($config["per_page"],$page,"startup",$where);

        $this->load->view('pages/accepted-application', $data);
    }

    public function EditStartup()
    {
        $where = array('id'=>$_GET['id']);

        $startup['startup'] = $this->db->get_where('startup',$where)->row();

        $this->load->view('pages/edit-startup', $startup);
    }
    public function updateStartup()
    {
          extract($_POST);        
       
           
          $updateid = $_GET['updateid'];            
          $data = array('startup_id'=>$startup_id,
          'startup_name'=>$startup_name,
          'im_stage'=>$im_stage,
          'email'=>$email,
          'mobile'=>$mobile,
          'state'=>$state,
          'city'=>$city,
          'website_address'=>$website_address,
          'verticals_sectors'=>$verticals_sectors,
          'type_of_business'=>$type_of_business,
          'founded_month'=>$founded_month,
          'founded_year'=>$founded_year,
          'dpiit'=>$dpiit,
          'incubation_joining_month'=>$incubation_joining_month,
          'incubation_joining_year'=>$incubation_joining_year,
          'is_women'=>@$is_women,
          'product_service_summary'=>$product_service_summary,          
          'companyType'=>$company_type,
          'pitch'=>$pitch,
          'no_of_founder'=>$no_of_founder,           
          'stage'=>$stage,          
          'facebook'=>$facebook,
          'twitter'=>$twitter,
          'linkedin'=>$linkedin,
          'youtube'=>$youtube,
          'whatsapp'=>$whatsapp,
          'is_dpiit_reg'=>$is_dpiit_reg,
          'is_tax_excemption'=>$is_tax_excemption,
          'is_dpiit_recog'=>$is_dpiit_recog);
        
         
          $rs = $this->db->where('id',$updateid)->update('startup',$data);

          if($rs)
          {
            
          
            $this->session->set_flashdata('success',"Update Startup Information Successful");
            redirect(base_url().'AcceptedApplication/EditStartup?id='.$updateid);
          }
          else 
          {
            $this->session->set_flashdata('failed',"Failed : Information not update");
            redirect(base_url().'AcceptedApplication/EditStartup?id='.$updateid);
          }
        }









           
    

    public function AddFounder()
    {
      extract($_POST);

      $data = array('startup_id'=>$startup_id,
                    'founderName'=>$founderName,
                    'founderEmail'=>$founderEmail,
                    'founderMobile'=>$founderMobile,
                    'founderGender'=>$founderGender,
                    'founderBackground'=>$founderBackground,
                    'founderEducation'=>$founderEducation);

           
      $rs = $this->db->insert('founders',$data);

      if($rs)
      {
          $this->session->set_flashdata('success',"Add Founder Details");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$startup_id);
      }
      else 
      {
          $this->session->set_flashdata('failed',"Not added");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$startup_id);
      }
      
     

    
   
    }
    public function UpdateFounder()
    {
      extract($_POST);

      $data = array('founderName'=>$founderName,
                    'founderEmail'=>$founderEmail,
                    'founderMobile'=>$founderMobile,
                    'founderGender'=>$founderGender,
                    'founderBackground'=>$founderBackground,
                    'founderEducation'=>$founderEducation);

      $where = array('id'=>$id);

           
      $rs = $this->db->update('founders',$data,$where);

      if($rs)
      {
          $this->session->set_flashdata('success',"Update Founder Successful");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$id);
      }
      else 
      {
          $this->session->set_flashdata('failed',"Not added");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$id);
      }
      
     

    
   
    }

    public function deleteFounder()
    {
        $startup_id = $_GET['sid'];
        $founder_id = $_GET['delid'];

        $rs = $this->db->update('founders',array('delstatus'=>0),array('id'=>$founder_id));

        if($rs)
        {
          $this->session->set_flashdata('success',"Founder deleted Successful");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$startup_id);
        }
        else 
        {
          $this->session->set_flashdata('failed',"Founder not deleted");
          redirect(base_url().'AcceptedApplication/EditStartup?id='.$startup_id);
        }
    }

   
}