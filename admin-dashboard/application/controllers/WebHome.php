<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebHome extends CI_Controller {

	public function index()
	{
		 $slider['slider']=$this->Model->selectData('slider'); 
		 $teacher['teacher']=$this->Model->selectData('teacher');  
		 $events['events']=$this->Model->selectData('events'); 
		 $question['question']=$this->Model->selectData('questionans'); 
		 $review['review']=$this->Model->selectData('review'); 
         $this->load->view('Web/index',$slider+$teacher+$events+$question+$review);
        
	}

	
	
}
