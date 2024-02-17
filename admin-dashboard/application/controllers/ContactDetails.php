<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactDetails extends CI_Controller {

	public function index()
	{
		$contact['contact'] = $this->Model->selectDataWhere('contact_details',array('id'=>1))->row();    
         $this->load->view('Admin/contactdetails',$contact);
        
	}
	public function UpdateContact()
	{
		 extract($_POST);

		 $data = array('address'=>$address,'phone'=>$phone,'website'=>$website,'fax'=>$fax,'email'=>$email,'copyright'=>$copyright);

		 $rs = $this->Model->updateData('contact_details',$data,array('id'=>1));

		 if($rs)
		 {
		 	echo "<script> window.location.href='../ContactDetails'; </script>";
		 }
	}

	
	
}
