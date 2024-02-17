<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MediaRoomBooking extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/media-room-booking');
    }
    public function SendRequest()
    {
        extract($_POST);

        $data = array('startup_id'=>$startup_id,'booking_date'=>$booking_date,'from_time'=>$from_time,'end_time'=>$end_time,'purpose_booking'=>$purpose);
         
        $booking = $this->db->get_where('media_room_booking',array('booking_date'=>$booking_date))->row();

        if($booking)
        {
            $qry="select * from media_room_booking where from_time<='$from_time' and end_time>='$from_time' OR from_time<='$end_time' and end_time>='$end_time'";
            
            $check = $this->db->Query($qry);
            
            if($check->num_rows() ==0)
            {
                $rs = $this->db->insert('media_room_booking',$data);
                if($rs)
                {
                    $this->session->set_flashdata('success',"Media Room Booking Request Submitted Successfully");
                    redirect(base_url().'MediaRoomBooking');
                }
                else 
                {
                    $this->session->set_flashdata('failed',"Media Room Booking Request not submitted");
                    redirect(base_url().'MediaRoomBooking');
                }
            }
            else {
                $this->session->set_flashdata('failed',"This Slot is already Booked for Other Startup");
                redirect(base_url().'MediaRoomBooking');
            }
             
        }
        else 
        {
            $rs = $this->db->insert('media_room_booking',$data);
            if($rs)
            {
                $this->session->set_flashdata('success',"Media Room Booking Request Submitted Successfully");
                redirect(base_url().'MediaRoomBooking');
            }
            else 
            {
                $this->session->set_flashdata('failed',"Conference Booking Request not submitted");
                redirect(base_url().'MediaRoomBooking');
            }
        }



      
    }
    public function MediaBookingList()
    {
        $this->load->view('pages/media-booking-list');
    }
    
  
}