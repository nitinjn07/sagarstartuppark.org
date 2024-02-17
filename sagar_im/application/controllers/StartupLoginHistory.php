<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StartupLoginHistory extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/startup-login-history');
   }
   function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
  
  
}