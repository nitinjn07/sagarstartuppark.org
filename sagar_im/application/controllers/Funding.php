<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funding extends CI_Controller {
   
   public function Bootstrap()
   {
       $this->load->view('pages/bootstrap');
   }
   public function SeedFunding()
   {
       $this->load->view('pages/seed-funding');
   }
   public function VCFunding()
   {
       $this->load->view('pages/vc-funding');
   }
   public function AngelFunding()
   {
       $this->load->view('pages/angel-investor');
   }
 
   
   public function SaveBootstrap()
   {
        extract($_POST);

        $data = array('startup_id'=>$startup_id,
                     'purpose'=>$purpose,
                     'amount'=>$amount,
                     'invest_date'=>$invest_date);

        $rs = $this->db->insert('bootstrap',$data);
        if($rs)
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/Bootstrap');
        }
        else 
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/Bootstrap');
        }

        
   }

   public function SaveSeed()
   {
        extract($_POST);

        $data = array('startup_id'=>$startup_id,
                     'seed_amount'=>$seed_amount,
                     'seed_provided_by'=>$seed_provided_by,
                     'seed_date'=>$seed_date,
                     'pre_money'=>$pre_money,
                     'post_money'=>$post_money);

        $rs = $this->db->insert('seed_funding',$data);
        if($rs)
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/SeedFunding');
        }
        else 
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/SeedFunding');
        }

        
   }
   public function SaveVC()
   {
        extract($_POST);

        $data = array('startup_id'=>$startup_id,
                     'vc_amount'=>$vc_amount,
                     'vc_name'=>$vc_name,
                     'vc_date'=>$vc_date,
                     'pre_money'=>$pre_money,
                     'post_money'=>$post_money);

        $rs = $this->db->insert('vc_funding',$data);
        if($rs)
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/VCFunding');
        }
        else 
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/VCFunding');
        }

        
   }
   public function SaveAngelInvestor()
   {
      

       extract($_POST);

        $data = array('startup_id'=>$startup_id,
                     'investor_name'=>$investor_name,
                     'investor_background'=>$investor_background,
                     'amount'=>$amount,
                     'investing_date'=>$investing_date,
                     'pre_money'=>$pre_money,
                     'post_money'=>$post_money);

        $rs = $this->db->insert('angel_investor',$data);
        if($rs)
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/AngelFunding');
        }
        else 
        {
            $this->session->set_flashdata('success','Information save successfully');
            redirect(base_url().'Funding/AngelFunding');
        }

   }
  
   
   
}