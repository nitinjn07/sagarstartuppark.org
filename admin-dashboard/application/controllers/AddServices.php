<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddServices extends CI_Controller {

  public function index()
  {
     $services['services']=$this->db->order_by('id','desc')->get('services')->result();
     $this->load->view('Admin/addServices',$services);
  }
  

	public function saveService()
	{
     extract($_POST);
          
      if($_FILES['image']['name'] != "")
      {

          $image              = $_FILES['image']['name'];
          $file_size          = $_FILES['image']['size'];
          $file_tmp           = $_FILES['image']['tmp_name'];
          $file_type          = $_FILES['image']['type'];
          $path               =  "uploads/services/";
        
          $temp = explode(".", $_FILES["image"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('service_name'=>$service_name,'content'=>$content,'image'=>$image);

          $this->Model->insertData('services',$data);
          $this->session->set_flashdata('success','Service Added Successfully');
          redirect(base_url().'AddServices','refresh');
      } 
      else
      {
        $this->session->set_flashdata('failed','Something Went Wrong');
        redirect(base_url().'AddServices','refresh');
      }
      
	}


  public function deleteService()
  {
      $id = $_GET['delid'];

      $where = array('id'=>$id);

      $rs = $this->Model->deleteData('services',$where);

      if($rs)
      {
         echo "<script> alert('Delete Service Successful'); window.location.href='../AddServices'; </script>";
      }
  }

  public function update_services($param = "")
  {
     extract($_POST);
            
      if($_FILES['image']['name'] != "")
      {
          $image = $this->db->get_where('services', array('id'=>$param))->row()->image;

          if($image != '')
          {
            unlink($image);
          }
          
          $image              = $_FILES['image']['name'];
          $file_size          = $_FILES['image']['size'];
          $file_tmp           = $_FILES['image']['tmp_name'];
          $file_type          = $_FILES['image']['type'];
          $path               =  "uploads/services/";
        
          $temp = explode(".", $_FILES["image"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('service_name'=>$service_name,'content'=>$content,'image'=>$image);
          $where = array('id'=>$param);
          $this->Model->updateData('services',$data,$where);
      } 
      else
      {
        $data = array('service_name'=>$service_name,'content'=>$content);
        $where = array('id'=>$param);
        $this->Model->updateData('services',$data,$where);
       }

      $this->session->set_flashdata('success','Data Updated Successfully');
      redirect(base_url().'AddServices','refresh');
  }

	
}
