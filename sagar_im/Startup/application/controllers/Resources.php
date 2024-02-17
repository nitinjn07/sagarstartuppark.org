<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends CI_Controller {


   public function AddResources()
   {
      $this->load->view('pages/add-resource');  
   }
   public function ResourcesList()
   {
      $this->load->view('pages/resource-list');
   }
   public function ResourceSoftwareList()
   {
      $this->load->view('pages/resource-software-list');
   }

   
}