<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    public function index() {
       
        $this->load->view('pages/event-list');
    }
    public function getEventDetails()
    {
        $this->load->view('pages/event-details');
    }
    

   
}