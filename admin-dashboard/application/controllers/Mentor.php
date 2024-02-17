<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller {

	public function index()
	{
		 $mentor['mentor']=$this->Model->selectOrderDataWhere('mentor',array('delstatus'=>1))->result();    
         $this->load->view('Admin/mentor',$mentor);
        
	}
    public function deleteData()
    {
         $where = array('id'=>$_GET['delid']);
         $data= array('delstatus'=>0);
        
         $rs = $this->Model->updateData('mentor',$data,$where);
        
         if($rs>0)
         {
            $this->session->set_flashdata('success','Metor Are Deleted Successfully!');
            redirect(base_url().'Mentor','refresh');
         }
        else 
        {
            $this->session->set_flashdata('failed','Something Went Wrong');
            redirect(base_url().'Mentor','refresh');
        }
    }
    
     public function ApprovedData()
    {
         $where = array('id'=>$_GET['approvedID']);
         $data = array('status'=>'success');
        
         $rs = $this->Model->updateData('mentor',$data,$where);
        
         if($rs>0)
         {
             echo "<script> window.location.href='../Mentor?status=success' </script>";
         }
        else 
        {
             echo "<script> window.location.href='../Mentor?status=failed' </script>";
        }
    }
    public function NotApprovedData()
    {
         $where = array('id'=>$_GET['notapprovedID']);
         $data = array('status'=>'pending');
        
         $rs = $this->Model->updateData('mentor',$data,$where);
        
         if($rs>0)
         {
             echo "<script> window.location.href='../Mentor?status=success' </script>";
         }
        else 
        {
             echo "<script> window.location.href='../Mentor?status=failed' </script>";
        }
    }

	
	
}
