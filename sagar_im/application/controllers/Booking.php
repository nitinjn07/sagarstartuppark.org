<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/conference-booking-request');
   }
   public function MediaRoom()
   {
       $this->load->view('pages/media-booking-request');
   }
   public function AcceptBooking()
   {
      $id = $_GET['booking_id'];
      $st = $this->db->get_where('media_room_booking',array('id'=>$id))->row();

      $rs = $this->db->update('conference_book',array('status'=>1,'accept_datetime'=>date('m/d/Y h:i:s a', time())),array('id'=>$id));

      if($rs)
      {
        $notification = array('startupid'=>$st->startup_id,'message'=>'Conference Room Booking Request Accepted please check','link'=>'#');
        $this->db->insert('notification',$notification);
        
        $this->session->set_flashdata("success","Booking Accepted");           
        redirect(base_url()."Booking");  
      }
      else 
      { 
        $this->session->set_flashdata("failed","Booking Not Accepted");           
        redirect(base_url()."Booking"); 
        
      }
   }
   public function MediaAcceptBooking()
   {
      $id = $_GET['booking_id'];
      $st = $this->db->get_where('media_room_booking',array('id'=>$id))->row();


      $rs = $this->db->update('media_room_booking',array('status'=>1,'accept_datetime'=>date('m/d/Y h:i:s a', time())),array('id'=>$id));

      if($rs)
      {
        $notification = array('startupid'=>$st->startup_id,'message'=>'Conference Room Booking Request Accepted please check','link'=>'#');
        $this->db->insert('notification',$notification);
       
        $this->session->set_flashdata("success","Booking Accepted");           
        redirect(base_url()."Booking/MediaRoom");  
      }
      else 
      { 
        $this->session->set_flashdata("failed","Booking Not Accepted");           
        redirect(base_url()."Booking/MediaRoom"); 
        
      }
   }
   
   
}