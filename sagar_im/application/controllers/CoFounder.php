<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoFounder extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/cofounder-request');
   }
   public function Accept()
   {
      $id = $_GET['rid'];

      $data = array('request_status'=>'accept');
      $where = array('id'=>$id);
      $rs = $this->db->update('co-founder',$data,$where);
      if($rs)
      {
         $this->session->set_flashdata('success','Request Accepted for Co-Founder');
         redirect(base_url().'CoFounder');
      }
      else 
      {
        $this->session->set_flashdata('failed','Request Not Accepted for Co-Founder');
        redirect(base_url().'CoFounder');
      }

   }
   public function Reject()
   {
      $id = $_GET['rid'];
      $data = array('request_status'=>'reject');
      $where = array('id'=>$id);
      $rs = $this->db->update('co-founder',$data,$where);
      if($rs)
      {
         $this->session->set_flashdata('success','Request Rejected for Co-Founder');
         redirect(base_url().'CoFounder');
      }
      else 
      {
        $this->session->set_flashdata('failed','Request Not Rejected for Co-Founder');
        redirect(base_url().'CoFounder');
      }
   }

   public function Hold()
   {
      $id = $_GET['rid'];
      $data = array('request_status'=>'hold');
      $where = array('id'=>$id);
      $rs = $this->db->update('co-founder',$data,$where);
      if($rs)
      {
         $this->session->set_flashdata('success','Request Holded for Co-Founder');
         redirect(base_url().'CoFounder');
      }
      else 
      {
        $this->session->set_flashdata('failed','Request Not Holded for Co-Founder');
        redirect(base_url().'CoFounder');
      }
   }
   
   
}