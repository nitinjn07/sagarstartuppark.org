<?php defined('BASEPATH') OR exit('No direct script access allowed');

class VirtualGraduate extends CI_Controller {


    public function index() {
        $config = array();
        $where = array('action'=>'accept','delstatus'=>1,'startup_type'=>'Virtual','is_screened'=>1,'is_graduate'=>1);
        $config["base_url"] = base_url() . "VirtualGraduate";
        $config["total_rows"] = $this->Model->get_startup_count("startup",$where);
        $config["per_page"] = 50;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

     
        $data['startups'] = $this->Model->get_pending_startup($config["per_page"],$page,"startup",$where);

        $this->load->view('pages/virtual-graduate', $data);
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
            if(!isset($is_graduate))
            {
              $gd = 0;
            }
            else 
            {
              $gd = 1;
            }
            
            
            $updateid = $_GET['updateid'];
            
            $data = array('startup_id'=>$startup_id,
            'startup_name'=>$startup_name,
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
            'stage'=>$stage,
            'incubation_joining_month'=>$incubation_joining_month,
            'incubation_joining_year'=>$incubation_joining_year,
            'is_graduate'=>@$is_graduate,
            'is_women'=>@$is_women,
            'graduate_date'=>$graduate_date,
            'startup_type'=>$startup_type,
            'product_service_summary'=>$product_service_summary,
            'name'=>$ownername,
            'wing'=>$wing,
            'seatsallocated'=>$seatsallocated,
            'seatnowithcomma'=>$seatnowithcomma,
            'color_codes'=>$color_codes
            );
            
            $rs = $this->db->where('id',$updateid)->update('startup',$data);

            if($rs)
            {
              $this->session->set_flashdata('success',"Update Startup Information Successful");
              redirect(base_url().'PhysicalStartup/EditStartup?id='.$updateid);
            }
            else 
            {
              $this->session->set_flashdata('failed',"Failed : Information not update");
              redirect(base_url().'PhysicalStartup/EditStartup?id='.$updateid);
            }
    }

   
}