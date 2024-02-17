<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComplaintList extends CI_Controller {


    public function index() {        
        $this->load->view('pages/complain-list');
    }  

   
}