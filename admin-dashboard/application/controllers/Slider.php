<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	public function index()
	{
		     $slider['slider']=$this->db->order_by('id','desc')->get('slider')->result();
         $this->load->view('Admin/slider',$slider);
        
	}
  public function uploadSlider()
  {
      extract($_POST);

      if($_FILES['sliderimg']['name'] != "")
      {
          $image              = $_FILES['sliderimg']['name'];
          $file_size          = $_FILES['sliderimg']['size'];
          $file_tmp           = $_FILES['sliderimg']['tmp_name'];
          $file_type          = $_FILES['sliderimg']['type'];
          $path               =  "uploads/slider/";
        
          $temp = explode(".", $_FILES["sliderimg"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('title'=>$title, 'summary'=>$summary, 'path'=>$image);
          $rs = $this->Model->insertData('slider',$data);
          $this->session->set_flashdata('success','Slider Add Successfully');
          redirect(base_url().'Slider','refresh');
      }
      else
      {
        $this->session->set_flashdata('failed','Something Went Wrong');
        redirect(base_url().'Slider','refresh');
      }

  }
   public function updateSlider()
  {
    extract($_POST);

    if($_FILES['sliderimg']['name'] != "")
    {
        $image = $this->db->get_where('slider', array('id'=>$_GET['updateId']))->row()->path;

        if($image != '')
        {
          @unlink($image);
        }

        $image              = $_FILES['sliderimg']['name'];
        $file_size          = $_FILES['sliderimg']['size'];
        $file_tmp           = $_FILES['sliderimg']['tmp_name'];
        $file_type          = $_FILES['sliderimg']['type'];
        $path               =  "uploads/slider/";
      
        $temp = explode(".", $_FILES["sliderimg"]["name"]);
        $newfilename =  time().".". end($temp);
        
        move_uploaded_file($file_tmp, $path.$newfilename);

        $image =  $path.$newfilename;

        $data = array('title'=>$title, 'summary'=>$summary, 'path'=>$image);
        $where = array('id'=>$_GET['updateId']);   
        $rs = $this->Model->updateData('slider',$data,$where);
        $this->session->set_flashdata('success','Slider Updated Successfully');
        redirect(base_url().'Slider','refresh');
    }
    else
    {
      $where =array('id'=>$_GET['updateId']);  
      $data = array('title'=>$title, 'summary'=>$summary);    
      $rs = $this->Model->updateData('slider',$data,$where);
      $this->session->set_flashdata('success','Slider Updated Successfully');
      redirect(base_url().'Slider','refresh');
    }
  }

  
  public function deletSlider()
  {
      $id = $_GET['slideid'];
      $where = array('id'=>$id);

      $image = $this->db->get_where('slider', $where)->row()->path;
      if($image != '')
      {
        unlink($image);
      }

      $rs = $this->Model->deleteData('slider',$where);
      if($rs)
      {
        $this->session->set_flashdata('success','Slider Deleted Successfully');
        redirect(base_url().'Slider','refresh');
      }
  }


	
}
