<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function index() {
       
        $this->load->view('pages/dashboard');
    }
    public function ViewStartupProfile()
    {
       
        
        $this->load->view('pages/view-full-startup-profile');
    }
    public function getStartupDetails()
    {
       
        $this->load->view('pages/view-full-startup-profile');
    }
}