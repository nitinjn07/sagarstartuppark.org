<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analytics extends CI_Controller {

	public function index()
	{
		     
         $this->load->view('Admin/Analytics');
        
	}
  public function update()
  {
       extract($_POST);

       $where = array('id'=>1);
      $data = array('googleanalytics'=>$googleanalytics, 'googlesearch'=>$googlesearch, 'googletag'=>$googletag, 'googlemap'=>$googlemap, 'googletag2'=>$googletag2 );    
      $rs = $this->Model->updateData('analytics',$data,$where);
      echo "<script> window.location.href='../Analytics'; </script>";
     

  }


	
}
