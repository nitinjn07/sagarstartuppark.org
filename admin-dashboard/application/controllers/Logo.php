<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logo extends CI_Controller {

	public function index()
	{
        $this->load->view('Admin/logo');
	}
    public function photo_uploads()
    {
        extract($_POST);

        if($_FILES['logoimg']['name'] != "")
        {
            $image = $this->db->get_where('logo', array('id'=>1))->row()->path;

            if($image != '')
            {
              unlink($image);
            }

          $image              = $_FILES['logoimg']['name'];
          $file_size          = $_FILES['logoimg']['size'];
          $file_tmp           = $_FILES['logoimg']['tmp_name'];
          $file_type          = $_FILES['logoimg']['type'];
          $path               =  "uploads/logo/";
        
          $temp = explode(".", $_FILES["logoimg"]["name"]);
          $newfilename =  time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $image =  $path.$newfilename;

          $data = array('path'=>$image);
          $where = array('id'=>1);
          $rs = $this->db->where($where)->update('logo',$data);
        } 
        
        if($_FILES['fevicon']['name'] != "")
        {
            $fevicon = $this->db->get_where('logo', array('id'=>1))->row()->fevicon;

            if($fevicon != '')
            {
              unlink($fevicon);
            }

          $fav_image              = $_FILES['fevicon']['name'];
          $file_size          = $_FILES['fevicon']['size'];
          $file_tmp           = $_FILES['fevicon']['tmp_name'];
          $file_type          = $_FILES['fevicon']['type'];
          $path               =  "uploads/logo/";
        
          $temp = explode(".", $_FILES["fevicon"]["name"]);
          $newfilename =  rand(10,100).time().".". end($temp);
          move_uploaded_file($file_tmp, $path.$newfilename);
          $fav_image =  $path.$newfilename;

          $data = array('fevicon'=>$fav_image);
          $where = array('id'=>1);
          $rs = $this->db->where($where)->update('logo',$data);
        }
        

        if($alt != '')
        {
          $data = array('alt'=>$alt);
          $where = array('id'=>1);
          $rs = $this->db->where($where)->update('logo',$data);
        }


      $this->session->set_flashdata('success','Alt Tag Updated Successfully');
      redirect(base_url().'Logo','refresh');

    }
	
}
