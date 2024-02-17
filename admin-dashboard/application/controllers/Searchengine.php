<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchengine extends CI_Controller {

	public function index()
	{
		     
         $this->load->view('Admin/Searchengine');
        
	}
  public function update()
  {
       extract($_POST);

       $where = array('id'=>1);
      $data = array('title'=>$title, 'pagename'=>$pagename, 'url'=>$url, 'description'=>$description);    
      $rs = $this->Model->updateData('searchengine',$data,$where);
      echo "<script> window.location.href='../Searchengine'; </script>";
     

  }


	
}
