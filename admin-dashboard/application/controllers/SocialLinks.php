<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SocialLinks extends CI_Controller {

	public function index()
	{
		 $social['social'] = $this->Model->selectDataWhere('sociallinks',array('id'=>1))->row();    
         $this->load->view('Admin/sociallinks',$social);
        
	}
	public function UpdateSocial()
	{
		 extract($_POST);

		 $data = array('facebook'=>$facebook,'twitter'=>$twt,'youtube'=>$youtube,'instagram'=>$instagram,'linkedin'=>$linkedin,'whatsapp'=>$whatsapp);

		 $rs = $this->Model->updateData('sociallinks',$data,array('id'=>1));

		 if($rs)
		 {
		 	echo "<script> window.location.href='../SocialLinks'; </script>";
		 }
	}

	
	
}
