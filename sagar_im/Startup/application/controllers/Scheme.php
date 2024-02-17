<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scheme extends CI_Controller {


  
   public function index()
   {
      $this->load->view('pages/scheme-list');
   }

   
}