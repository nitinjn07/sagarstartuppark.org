<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   public function index()
   {
      $this->load->view('pages/add-team-member');
   }
    //Login Function
   public function addTeam()
   {
       extract($_POST);   
       
       if($_FILES['profile']['name']!="")
		   {
            $temp = explode(".", $_FILES["profile"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './../uploads/team/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('profile'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('name'=>$name,
                'email'=>$email,
                'contact'=>$contact,
                'startup_id'=>$startupid,
                'intern'=>$intern,
                'part_time'=>$parttime,
                'role'=>$role,
                'profile'=>$newfilename,
                'seat_no'=>$seatno
                );

            $this->session->set_flashdata("success","Team Member Added Successfully");
            $this->db->insert('team_member',$data);


           }

        redirect(base_url()."Team");       
        }
        else 
        {
            $data = array('name'=>$name,
            'email'=>$email,
            'contact'=>$contact,
            'startup_id'=>$startupid,
            'intern'=>$intern,
            'part_time'=>$parttime,
            'role'=>$role,
            'seat_no'=>$seatno
            );

        $this->session->set_flashdata("success","Team Member Added Successfully");
        $this->db->insert('team_member',$data);

        redirect(base_url()."Team");  

        }

}

// public function deleteTeam()
//     {
//       $delid = $_GET['id'];
//       $statupid = $_GET['startupid'];
//       $data = array('delstatus'=>0);

//       $rs = $this->db->update('team_member',$data,array('id'=>$delid));
//       if($rs)
//       {
//         $this->session->set_flashdata('success',"Delete Member Successful");
//         redirect(base_url().'TeamList');
//       }
//       else 
//       {
//         $this->session->set_flashdata('failed',"Failed : Information not deleted");
//          redirect(base_url().'TeamList');
//       }
//     }

    

    public function updateTeam()
    {
        $id = $_GET['editid'];
        $sid = $_GET['startupid'];
        extract($_POST);   
        
        if($_FILES['profile']['name']!="")
        {
             $temp = explode(".", $_FILES["profile"]["name"]);
             $newfilename = round(microtime(true)) . '.' . end($temp);
             $config['upload_path']          = './../uploads/team/';
             $config['allowed_types']        = 'gif|jpg|png|jpeg';
 
             $config['file_name'] = $newfilename;
             $this->upload->initialize($config);
             if ( !$this->upload->do_upload('profile'))
             {
 
 
             $this->session->set_flashdata("failed","Image Not Upload");	
 
             }
             else
             {
                 $data = array('name'=>$name,
                 'email'=>$email,
                 'contact'=>$contact,
                 'intern'=>$intern,
                 'part_time'=>$parttime,
                 'role'=>$role,
                 'seat_no'=>$seatno,
                 'profile'=>$newfilename
                 );
 
             $this->session->set_flashdata("success","Team Member Update Successfully");
             $this->db->update('team_member',$data,array('id'=>$id));
 
 
            }
 
         redirect(base_url()."TeamList");       
         }
         else 
         {
             $data = array('name'=>$name,
             'email'=>$email,
             'contact'=>$contact,
             'intern'=>$intern,
             'part_time'=>$parttime,
             'seat_no'=>$seatno,
             'role'=>$role
             );
 
         $this->session->set_flashdata("success","Team Member Added Successfully");
         $this->db->update('team_member',$data,array('id'=>$id));
 
         redirect(base_url()."TeamList");  
 
         }
 
 }







}