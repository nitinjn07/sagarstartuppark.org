<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutUs extends CI_Controller {

	public function index()
	{
		     
         $this->load->view('Admin/aboutus');
        
	}
  public function updateAbout()
  {
       extract($_POST);

      if($_FILES['image']['name'] != "")
        {
            $image              = $_FILES['image']['name'];
            $file_size          = $_FILES['image']['size'];
            $file_tmp           = $_FILES['image']['tmp_name'];
            $file_type          = $_FILES['image']['type'];
            $path               =  "uploads/about/";
          
            $temp = explode(".", $_FILES["image"]["name"]);
            $newfilename =  time().".". end($temp);
            
            move_uploaded_file($file_tmp, $path.$newfilename);

            $image =  $path.$newfilename;

            $data = array('content'=>$content, 'title'=>$title, 'image'=>$image);
            $where = array('id',1);    
            $rs = $this->Model->updateData('aboutus',$data,$where);
            redirect(base_url().'AboutUs','refresh');
        }
        else
        {
          $where = array('id',1);
          $data = array('content'=>$content, 'title'=>$title);    
          $rs = $this->Model->updateData('aboutus',$data,$where);
          redirect(base_url().'AboutUs','refresh');
        }

  }

	
}
