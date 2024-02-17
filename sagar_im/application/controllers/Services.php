<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/add-services');
   }

   public function NewServices()
   {
       extract($_POST);     
       

        if($_FILES['service_icon']['name']!="")
                {
                $temp = explode(".", $_FILES["service_icon"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $config['upload_path']          = './uploads/service_icon/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $config['file_name'] = $newfilename;
                $this->upload->initialize($config);
                if ( !$this->upload->do_upload('service_icon'))
                {


                $this->session->set_flashdata("failed","Image Not Upload");	

                }
                else
                {
                    $data = array(
                    'service_name'=>$service_name,
                    'service_description'=>$description,
                    'service_img'=>$newfilename
                    );

                $this->session->set_flashdata("success","Service Added Successfully");
                $this->db->insert('services',$data);
                redirect(base_url()."Services");  

            }             
            }
            else 
            {
                
                $this->session->set_flashdata("failed","Please upload image also");           
                redirect(base_url()."Services");  
            }

}

public function ServiceUpdate()
   {
       extract($_POST);     
       $where = array('id'=>$serviceid);

       if($_FILES['service_icon']['name']!="")
		    {
            $temp = explode(".", $_FILES["service_icon"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/service_icon/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('service_icon'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array(
                'service_name'=>$service_name,
                'service_description'=>$description,
                'service_img'=>$newfilename
                );

            $this->session->set_flashdata("success","Service Updated Successfully");
            $this->db->update('services',$data,$where);
            redirect(base_url()."Services");  
           }             
        }
        else 
        {
             $data = array(
                'service_name'=>$service_name,
                'service_description'=>$description                
                );

            $this->db->update('services',$data,$where);
              
            $this->session->set_flashdata("success","Service updated successfully");           
            redirect(base_url()."Services");  
        }

}

public function DeleteService()
{
    $id = $_GET['delid'];

    $res = $this->db->update('services',array('status'=>0),array('id'=>$id));

    if($res)
    {
        $this->session->set_flashdata("success","Service has been deleted");           
        redirect(base_url()."Services");
    }
    else 
    {
        $this->session->set_flashdata("failed","Service not deleted");           
        redirect(base_url()."Services");
    }
}

public function ServiceRequest()
{
    $this->load->view('pages/service-request');
}
public function AcceptBooking()
   {
      $id = $_GET['request_id'];

      $rs = $this->db->update('service_request',array('status'=>1,'accept_datetime'=>date('m/d/Y h:i:s a', time())),array('id'=>$id));

      if($rs)
      {
        $this->session->set_flashdata("success","Request Accepted");           
        redirect(base_url()."Services/ServiceRequest");  
      }
      else 
      { 
        $this->session->set_flashdata("failed","Request Not Accepted");           
        redirect(base_url()."Services/ServiceRequest"); 
        
      }
   }
}