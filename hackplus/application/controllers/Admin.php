<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
   
    public function AdminLogin()
    {
        extract($_POST);
        $where = array('username'=>$email,'password'=>md5($password));
        $rs = $this->db->get_where('admin',$where);
        if($rs->num_rows()>0)
        {
            $_SESSION['admin_username']= $email;
            $this->session->set_flashdata('success','Login Successful');
            redirect(base_url().'dashboard');
        }
        else 
        {
            $this->session->set_flashdata('failed','Login Failed');
            redirect(base_url().'home');
        }
    }
    public function Logout()
    {
        session_destroy();
        redirect(base_url().'home');
    }
    public function acceptApplication()
    {
        $id = $_GET['id'];
        $where = array('id'=>$id);
        $rand = substr(md5(microtime()),rand(0,26),5);
        $data = array('status'=>'approved','startup_code'=>$rand);        

        $rs = $this->db->update('startups_reg',$data,$where);

        if($rs)
        {
            $this->session->set_flashdata('success','Application Approved Successful');
            redirect(base_url().'pending-application');
        }
        else 
        {
            $this->session->set_flashdata('failed','Application not approved Something Went Wrong');
            redirect(base_url().'pending-application');
        }
    }
    public function rejectApplication()
    {
        $id = $_GET['id'];
        $where = array('id'=>$id);
        $data = array('status'=>'reject');

        $rs = $this->db->update('startups_reg',$data,$where);

        if($rs)
        {
            $this->session->set_flashdata('success','Application Rejected Successful');
            redirect(base_url().'pending-application');
        }
        else 
        {
            $this->session->set_flashdata('failed','Application not rejected Something Went Wrong');
            redirect(base_url().'pending-application');
        }
    }

    public function addJury()
    {
          extract($_POST);

          $config['upload_path']  = './uploads/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $config['encrypt_name'] = TRUE;

          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ( ! $this->upload->do_upload('juryphoto'))
          {
                  $error = array('error' => $this->upload->display_errors());
                  $message = $error['error'];

                  $this->session->set_flashdata('failed',$message);
                  redirect(base_url().'add-jury');
                  
          }
          else
          {
                  $data = array('upload_data' => $this->upload->data());

                  $filename = $data['upload_data']['file_name'];
                  $rand = substr(md5(microtime()),rand(0,26),5);

                  $data = array('jury_name'=>$jury_name,
                                'jury_email'=>$jury_email,
                                'jury_mobile'=>$jury_mobile,
                                'jury_linkedin'=>$jury_linkedin,
                                'jury_profile'=>$jury_profile,
                                'jury_photo'=>$filename,
                                'jury_code'=>$rand);

                  $this->db->insert('jury',$data);

                  $this->session->set_flashdata('success',"Add Jury Member Successful");
                  redirect(base_url().'add-jury');
          }
    }

    public function DeleteJury()
    {
        $where = array('id'=>$_GET['id']);

        $rs = $this->db->update('jury',array('status'=>0),$where);

        if($rs)
        {
            $this->session->set_flashdata('success',"Jury Delete Successful");
            redirect(base_url().'add-jury');
        }
        else 
        {
            $this->session->set_flashdata('success',"Jury Note Deleted");
            redirect(base_url().'add-jury');
        }
    }
	public function SeatAllocation()
    {
        extract($_POST);

        $info = $this->db->get_where('startups_reg',array('id'=>$sid))->row();

        
        $check = $this->db->get_where('seat_allocation',array('id'=>$sid,'startup_code'=>$info->startup_code));

        if($check->num_rows()>0) 
        {
            $this->session->set_flashdata('failed',"Already Allocatted");
            redirect(base_url().'seat-allocation');
        }
        else 
        {

        $data = array('startup_code'=>$info->startup_code,
                      'startup_id'=>$sid,
                      'house_name'=>$house,
                      'seat_no'=>$seat);

        $rs = $this->db->insert('seat_allocation',$data);

        if($rs)
        {
            $this->session->set_flashdata('success',"Seat & House Allocation Successful");
            redirect(base_url().'seat-allocation');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Not allocatted- Something Went Wrong");
            redirect(base_url().'seat-allocation');
        }

        }
       
    }

    public function UpdateSeat()
    {
        extract($_POST);

        $where = array('id'=>$seatid);

        $info = $this->db->get_where('startups_reg',array('id'=>$sid))->row();

        
        $data = array('house_name'=>$house,
                      'seat_no'=>$seat);

        $rs = $this->db->update('seat_allocation',$data,$where);

        if($rs)
        {
            $this->session->set_flashdata('success',"Seat & House Update Successful");
            redirect(base_url().'seat-allocation');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Not Updated- Something Went Wrong");
            redirect(base_url().'seat-allocation');
        }

        
       
    }
    public function JuryAllotHouse()
    {
        extract($_POST);

        $jury = $this->db->get_where('jury',array('id'=>$juryid))->row();

        
        $check = $this->db->get_where('jury_house_allot',array('jury_id'=>$juryid));

        if($check->num_rows()>0) 
        {
            $this->session->set_flashdata('failed',"Already Allocatted");
            redirect(base_url().'jury-house-allot');
        }
        else 
        {

        $data = array('house_no'=>$housename,
                      'jury_id'=>$juryid);

        $rs = $this->db->insert('jury_house_allot',$data);

        if($rs)
        {
            $this->session->set_flashdata('success',"House Allocation to Jury Successful");
            redirect(base_url().'jury-house-allot');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Not allocatted- Something Went Wrong");
            redirect(base_url().'jury-house-allot');
        }

        }
    }

    public function UpdateJuryHouse()
    {
        extract($_POST);
        
        $where = array('id'=>$juryhouseid);

        $data = array('house_no'=>$housename,
                      'jury_id'=>$juryid);

        $rs = $this->db->update('jury_house_allot',$data,$where);

        if($rs)
        {
            $this->session->set_flashdata('success',"House Update to Jury Successful");
            redirect(base_url().'jury-house-allot');
        }
        else 
        {
            $this->session->set_flashdata('failed',"Not Updated- Something Went Wrong");
            redirect(base_url().'jury-house-allot');
        }

        
    }
}