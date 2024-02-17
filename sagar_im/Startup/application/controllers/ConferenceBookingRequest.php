<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ConferenceBookingRequest extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/conference-booking-request');
    }
    public function SendRequest()
    {
        extract($_POST);

        $data = array('startup_id'=>$startup_id,'booking_date'=>$booking_date,'from_time'=>$from_time,'to_time'=>$to_time,'purpose'=>$purpose,'type'=>$type);
         
        $booking = $this->db->get_where('conference_book',array('booking_date'=>$booking_date,'type'=>$type))->row();

        if($booking)
        {
            $qry="select * from conference_book where from_time<='$from_time' and to_time>='$from_time' OR from_time<='$to_time' and to_time>='$to_time'";
            
            $check = $this->db->Query($qry);
            
            if($check->num_rows() ==0)
            {
                $rs = $this->db->insert('conference_book',$data);
                if($rs)
                {
                    $this->session->set_flashdata('success',"Conference Booking Request Submitted Successfully");
                    redirect(base_url().'ConferenceBookingRequest');
                }
                else 
                {
                    $this->session->set_flashdata('failed',"Conference Booking Request not submitted");
                    redirect(base_url().'ConferenceBookingRequest');
                }
            }
            else {
                $this->session->set_flashdata('failed',"This Slot is already Booked for Other Startup");
                redirect(base_url().'ConferenceBookingRequest');
            }
             
        }
        else 
        {
            $rs = $this->db->insert('conference_book',$data);
            if($rs)
            {
                $this->session->set_flashdata('success',"Conference Booking Request Submitted Successfully");
                redirect(base_url().'ConferenceBookingRequest');
            }
            else 
            {
                $this->session->set_flashdata('failed',"Conference Booking Request not submitted");
                redirect(base_url().'ConferenceBookingRequest');
            }
        }



      
    }
    public function BookingHistory()
    {
        $this->load->view('pages/booking-history');
    }
    
  
}