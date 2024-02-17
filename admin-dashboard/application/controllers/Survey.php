<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
		$this->db2 =  $this->load->database('survey', TRUE);
	}

	public function index()
	{
		     
         $this->load->view('Admin/survey');
        
	}

	
	
}