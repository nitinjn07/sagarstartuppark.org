<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventDetail extends CI_Controller {

	public function index()
	{
		 $id = $_GET['eventid'];
		 $event['event']=$this->Model->selectDataWhere('events',array('id'=>$id))->row();    
         $this->load->view('Web/eventdetails',$event);
         
	}

	
	
}
