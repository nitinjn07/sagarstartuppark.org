<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SetKRA extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   
   public function index()
   {
        $where = array('delstatus'=>1);

        $config=[
                'base_url' => base_url('setKRA/index'),
                'per_page' =>10,
                'total_rows' => $this->Model->get_startup_count("set_kra",$where)
            ];

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);

        $data["links"] = $this->pagination->create_links();

        $data['kra'] = $this->Model->get_pending_startup_order_by($config["per_page"],$page,"set_kra",$where);

        $this->load->view('pages/set-kra',$data);
   } 

   public function getStartupDetail()
   {
        $id = $_GET['id'];

        $s = $this->db->Query('select * from startup where id ='.$id);
        
        if($s->num_rows()>0)
        {
            $s = $s->row();
        
            echo "<tr> 
                     <td class='fw-bolder'>Startup Name</td>
                     <td>".$s->startup_name."</td>
                     <td class='fw-bolder'>Mobile Number</td>
                     <td>".$s->mobile."</td>
                  </tr>
                  <tr> 
                     <td class='fw-bolder'>Founder Name</td>
                     <td>".$s->founder_name."</td>
                     <td class='fw-bolder'>On Board Date</td>
                     <td>".$s->on_board_date."</td>
                  </tr>
                  <tr> 
                     <td class='fw-bolder'>Type of bussine</td>
                     <td>".$s->type_of_business."</td>
                     <td class='fw-bolder'>Found</td>
                     <td>".$s->founded_month.' '.$s->founded_year."</td>
                  </tr>
                  <tr> 
                     <td class='fw-bolder'>Tentative Graduate Date</td>
                     <td>".$s->graduate_date."</td>
                     <td class='fw-bolder'>Startup Type</td>
                     <td>".$s->startup_type."</td>
                  </tr>
                  <tr> 
                     <td class='fw-bolder'>DPIIT</td>
                     <td>".$s->dpiit."</td>
                     <td class='fw-bolder'>City</td>
                     <td>".$s->city."</td>
                  </tr>
                  <tr> 
                     <td class='fw-bolder'>Website</td>
                     <td colspan='3'>".$s->website_address."</td>
                  </tr>
                  <tr> 
                    
                  
                  <tr> 
                  <td class='fw-bolder'>Stage</td>
                  <td colspan='3' class='bg-success fw-bolder p-2 text-white'>".strtoupper(str_replace("_"," ",$s->stage))."</td>
                  </tr>
                  <tr>
                     <td class='fw-bolder'> Company Type</td>
                     <td>".$s->company_type."</td>
                     <td class='fw-bolder'> Founder Name</td>
                     <td>".$s->founder_name."</td>
                  </tr>
                  <tr>
                  <td class='fw-bolder'> Founder Background</td>
                  <td>".$s->founder_background."</td>
                  
                  </tr>
                  <tr>
                  <td class='fw-bolder'> Pitch</td>
                  <td colspan='3'>".$s->pitch."</td>
                 
                  </tr>
                  
                  <tr>
               
                  <td class='fw-bolder'> Founder Background</td>
                  <td colspan='3'>".$s->founder_background."</td>
                  </tr>

                  
                  
                  
                  
                  ";
        }
        else 
        {
            echo "No Record Found";
        }
        
   
   
  }
  public function setNow()
  {
        extract($_POST);
        
        $data = array('startupid'=>$startupid,
                      'duration'=>$period,
                      'start_date'=>$start_date,
                      'end_date'=>$end_date,
                      'review_date'=>$review_date,
                     'remark'=>$remark,
                     'title'=>$kra_title);

        $rs = $this->db->insert('set_kra',$data);

        if($rs>0)
        {
           $this->session->set_flashdata('success','Set KRA Successfull');
           redirect(base_url().'SetKRA');
        }

        
  }
  public function UpdateKRA()
  {
        extract($_POST);
        
        $data = array('startupid'=>$startupid,
                      'duration'=>$period,
                      'start_date'=>$start_date,
                      'end_date'=>$end_date,
                      'review_date'=>$review_date,
                     'remark'=>$remark,
                     'title'=>$kra_title);

        $where = array('id'=>$kraid);

        $rs = $this->db->update('set_kra',$data,$where);

        if($rs>0)
        {
           $this->session->set_flashdata('success','Update KRA Successfull');
           redirect(base_url().'SetKRA');
        }

        
  }
  public function addKraTask()
  {
   extract($_POST);
        
   $data = array('kra_id'=>$kraid,
                 'startupid'=>$startupid,
                 'task_name'=>$taskname,
                 'start_date'=>$start_date,
                 'end_date'=>$end_date,
                 'help_incubation'=>$help_incubation,
                 'task_owner'=>$task_owener,
                 'plan_to_complete'=>$plan_to_complete,
                 'remark'=>$remark);

   $rs = $this->db->insert('kra_task',$data);

   if($rs>0)
   {
    $this->session->set_flashdata('success','Set KRA  Task Successfull');
      redirect(base_url().'SetKRA');
   }
  }





}