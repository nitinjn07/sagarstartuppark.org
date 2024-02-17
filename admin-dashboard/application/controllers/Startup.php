<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup extends CI_Controller {

	public function index()
	{
		 $startups['startups']=$this->Model->selectOrderDataWhere('startup',array('delstatus'=>1))->result();    
         $this->load->view('Admin/startup',$startups);
        
	}
    public function deleteData()
    {
         $where = array('id'=>$_GET['delid']);
         $data= array('delstatus'=>0);
        
         $rs = $this->Model->updateData('startup',$data,$where);
        
         if($rs>0)
         {
             echo "<script> window.location.href='../Startup?status=success' </script>";
         }
        else 
        {
             echo "<script> window.location.href='../Startup?status=failed' </script>";
        }
    }
    
     public function ApprovedData()
    {
         $where = array('id'=>$_GET['approvedID']);
         $data = array('status'=>'success');
        
         $rs = $this->Model->updateData('startup',$data,$where);
        
         if($rs>0)
         {
             echo "<script> window.location.href='../Startup?status=success' </script>";
         }
        else 
        {
             echo "<script> window.location.href='../Startup?status=failed' </script>";
        }
    }
    public function NotApprovedData()
    {
         $where = array('id'=>$_GET['notapprovedID']);
         $data = array('status'=>'pending');
        
         $rs = $this->Model->updateData('startup',$data,$where);
        
         if($rs>0)
         {
             echo "<script> window.location.href='../Startup?status=success' </script>";
         }
        else 
        {
             echo "<script> window.location.href='../Startup?status=failed' </script>";
        }
    }

	
	
}
