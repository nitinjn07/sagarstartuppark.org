<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeatMap extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/seat-map');
   }
   
}