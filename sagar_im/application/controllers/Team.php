<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   
   public function index()
   {
        $config = array();
        $where = array('delstatus'=>1);
        $config["base_url"] = base_url() . "team/index";
        $config["total_rows"] = $this->Model->get_startup_count("team_member",$where);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['team'] = $this->Model->get_pending_startup($config["per_page"],$page,"team_member",$where);

        $this->load->view('pages/add-team-member',$data);
   } 

   public function getSeat()
   {
        $id = $_GET['id'];

        $seat = $this->db->get_where("onboard_seat",array('startupid'=>$id))->row();

        $no = explode("|",$seat->seat_no);

        foreach($no as $n)
        {
            $exist = $this->db->get_where('team_member',array('seat_no'=>$n,'startup_id'=>$id,'delstatus'=>1));
            if($exist->num_rows()==0)
            {
            echo "<option value=".$n.">".$n."</option>";
            }
        }
   }
   public function getSeatEdit()
   {
        $id = $_GET['id'];

        $seat = $this->db->get_where("onboard_seat",array('startupid'=>$id))->row();

        $no = explode("|",$seat->seat_no);

        foreach($no as $n)
        {
           
            echo "<option value=".$n.">".$n."</option>";
            
        }
   }

    public function addTeam()
    {
    extract($_POST);   

    if($_FILES['profile']['name']!="")
    {
    $temp = explode(".", $_FILES["profile"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $config['upload_path']          = './uploads/team/';
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

    public function deleteTeam()
    {
      $delid = $_GET['id'];
      $statupid = $_GET['startupid'];
      $data = array('delstatus'=>0);

      $rs = $this->db->update('team_member',$data,array('id'=>$delid));
      if($rs)
      {
        $this->session->set_flashdata('success',"Delete Member Successful");
        redirect(base_url()."Team"); 
      }
      else 
      {
        $this->session->set_flashdata('failed',"Failed : Information not deleted");
        redirect(base_url()."Team"); 
      }
    }   

    public function updateTeam()
    {
        $id = $_GET['editid'];
        $sid = $_GET['startupid'];
        extract($_POST);   
        
        if($_FILES['profile']['name']!="")
     {
             $temp = explode(".", $_FILES["profile"]["name"]);
             $newfilename = round(microtime(true)) . '.' . end($temp);
             $config['upload_path']          = './uploads/team/';
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
                 'profile'=>$newfilename,
                 'seat_no'=>$seatno
                 );
 
             $this->session->set_flashdata("success","Team Member Update Successfully");
             $this->db->update('team_member',$data,array('id'=>$id));
 
 
            }
 
         redirect(base_url()."Team");       
         }
         else 
         {
             $data = array('name'=>$name,
             'email'=>$email,
             'contact'=>$contact,
             'intern'=>$intern,
             'part_time'=>$parttime,
             'role'=>$role,
             'seat_no'=>$seatno
             );
 
         $this->session->set_flashdata("success","Team Member Update Successfully");
         $this->db->update('team_member',$data,array('id'=>$id));
 
         redirect(base_url()."Team"); 
 
         }
 
 }







}