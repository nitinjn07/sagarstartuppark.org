<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revenue extends CI_Controller {
    

    public function index()
    {
       $this->load->view('pages/monthly-revenue');
    }
    public function SaveRevenue()
    {
       extract($_POST);

       $data = array('startup_id'=>$startup_id,
                     'year'=>$year,
                     'month'=>$month,
                     'total_revenue'=>$total_revenue,
                     'net_profit'=>$net_profit,
                     'net_expenses'=>$net_expenses,
                     'new_customer'=>$new_customer);

       $check = $this->db->get_where('startup_revenue',array('startup_id'=>$startup_id,'year'=>$year,'month'=>$month))->num_rows();

       if($check==0)
       {
         $this->db->insert('startup_revenue',$data);
         $this->session->set_flashdata('success','Information Update Successfully');
            redirect(base_url().'Revenue');
       }
       else 
       {
         $this->session->set_flashdata('failed','Something Went Wrong');
            redirect(base_url().'Revenue');
       }
    }

   }
  
   
   