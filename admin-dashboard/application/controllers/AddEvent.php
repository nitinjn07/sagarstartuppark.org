<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddEvent extends CI_Controller {

  public function index()
  {
     $data['events']=$this->db->order_by('id','desc')->get('events')->result();
     $this->load->view('Admin/addEvent',$data);
  }

	public function save_event()
	{
     extract($_POST);

      if($_FILES['image']['name'] != "")
      {
          $image              = $_FILES['image']['name'];
          $file_size          = $_FILES['image']['size'];
          $file_tmp           = $_FILES['image']['tmp_name'];
          $file_type          = $_FILES['image']['type'];
          $path               =  "uploads/events/";
        
          $temp = explode(".", $_FILES["image"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('evtDate'=>$evtDate,'evtLink'=>$evtLink,'evtContent'=>$evtContent,'evtImage'=>$image);

          $this->Model->insertData('events',$data);
          $this->session->set_flashdata('success','event Added Successfully');
          redirect(base_url().'AddEvent','refresh');
      } 
      else
      {
        $this->session->set_flashdata('failed','Something Went Wrong');
        redirect(base_url().'AddEvent','refresh');
      }

	}


  public function update_event($param = "")
  {
     extract($_POST);

      if($_FILES['image']['name'] != "")
      {
          $image              = $_FILES['image']['name'];
          $file_size          = $_FILES['image']['size'];
          $file_tmp           = $_FILES['image']['tmp_name'];
          $file_type          = $_FILES['image']['type'];
          $path               =  "uploads/events/";
        
          $temp = explode(".", $_FILES["image"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('evtDate'=>$evtDate,'evtLink'=>$evtLink,'evtContent'=>$evtContent,'evtImage'=>$image);
          $where = array('id'=>$param);
          $this->Model->updateData('events',$data, $where);
          $this->session->set_flashdata('success','event Updated Successfully');
          redirect(base_url().'AddEvent','refresh');
      } 
      else
      {
        $data = array('evtDate'=>$evtDate,'evtLink'=>$evtLink,'evtContent'=>$evtContent);
        $where = array('id'=>$param);
        $this->Model->updateData('events',$data, $where);
        
        $this->session->set_flashdata('success','event Updated Successfully');
        redirect(base_url().'AddEvent','refresh');
      }

  }

  public function deleteEvent()
  {
      $id = $_GET['delid'];

      $where = array('id'=>$id);

      $rs = $this->Model->deleteData('events',$where);

      if($rs)
      {
         echo "<script> alert('Delete Event Successful'); window.location.href='../AddEvent'; </script>";
      }
  }
	
}
