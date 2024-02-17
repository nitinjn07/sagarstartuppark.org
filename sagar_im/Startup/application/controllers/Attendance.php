<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {  
      

   public function index()
   {
        $this->load->view('pages/attendance-report');
   }
   
  
}