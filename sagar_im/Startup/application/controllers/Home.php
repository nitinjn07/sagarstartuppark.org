<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

       
     //Logout Function
     public function logout()
     {   
       session_destroy();
       redirect('../');
     }
     public function updateStartup()
     {
        extract($_POST);
           
            $updateid = $_GET['updateid'];
            
            $data = array( 
              'mobile'=>$mobile,
              'website_address'=>$website_address,
              'dpiit'=>$dpiit,
              'product_service_summary'=>$product_service_summary,
              'aboutus'=>$aboutus       
            );
            
            $rs = $this->db->where('id',$updateid)->update('startup',$data);

            if($rs)
            {
              $this->session->set_flashdata('success',"Update Startup Information Successful");
              redirect(base_url().'Dashboard/editProfile');
            }
            else 
            {
              $this->session->set_flashdata('failed',"Failed : Information not update");
              redirect(base_url().'Dashboard/editProfile');
            }
    }
}