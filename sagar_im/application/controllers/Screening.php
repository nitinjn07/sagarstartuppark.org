<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screening extends CI_Controller {
    
    public function index()
    {
          $this->load->view('pages/add-screening-member');
    }
    public function ScreeningMemberAccept()
        {
          $where = array('id'=>$_GET['id']);
          $data = array('action'=>'accept');      
          $rs = $this->db->update('screning_committe',$data,$where);
          if($rs)
          {
            $this->session->set_flashdata('success','Accept Member Successful');
            redirect(base_url().'MemberList');
          }
          else 
          {
            $this->session->set_flashdata('failed','Somthing Wrong');
            redirect(base_url().'MemberList');
          }

        }
        public function ScreeningMemberReject()
        {
          $where = array('id'=>$_GET['id']);
          $data = array('action'=>'reject');      
          $rs = $this->db->update('screning_committe',$data,$where);
          if($rs)
          {
            $this->session->set_flashdata('success','Reject Member Successful');
            redirect(base_url().'MemberList');
          }
          else 
          {
            $this->session->set_flashdata('failed','Somthing Wrong');
            redirect(base_url().'MemberList');
          }
        }

        public function deleteScreeningMember()
        {
          $delid = $_GET['id'];
          $data = array('status'=>0,'action'=>'deleted');

          $rs = $this->db->update('screning_committe',$data,array('id'=>$delid));
          if($rs)
          {
            $this->session->set_flashdata('success',"Delete Member Successful");
            redirect(base_url().'MemberList');
          }
          else 
          {
            $this->session->set_flashdata('failed',"Failed : Information not deleted");
            redirect(base_url().'MemberList');
          }
        }

        public function UpdateScreeningMember()
        {
          extract($_POST);
          $id = $_GET['id'];
          $where = array('id'=>$id);
          $data = array('name'=>$name,'email'=>$email,'contact'=>$contact,'password'=>md5(1223),'designation'=>$designation);

          $rs = $this->db->update('screning_committe',$data,$where);

          if($rs)
          {
            $this->session->set_flashdata('success',"Update Member Successful");
            redirect(base_url().'MemberList');
          }
          else 
          {
            $this->session->set_flashdata('failed',"Failed : Information not Update");
            redirect(base_url().'MemberList');
          }
        }
        public function CreateScreeningTeam()
        {
          extract($_POST);
          $data = array('name'=>$name,'email'=>$email,'contact'=>$contact,'password'=>md5(1223),'designation'=>$designation);

          $rs = $this->db->insert('screning_committe',$data);

          if($rs)
          {
            $this->session->set_flashdata('success',"Create Member Successful");
            redirect(base_url().'Screening');
          }
          else 
          {
            $this->session->set_flashdata('failed',"Member Creation Failed");
            redirect(base_url().'Screening');
          }
        }
      
        public function schedule()
        {
          extract($_POST);      
          if(empty($startup) OR empty($member))
          {
            $this->session->set_flashdata('success',"Please Select at least one startup and one member");
            redirect(base_url().'schedule-screening');
          }
          else 
          {

            $data = array('title'=>$title,
            'screening_date'=>$schedule_date,
            'startup_id'=>implode("|",$startup),
            'member_id'=>implode("|",$member)
            );


            $rs = $this->db->insert('screening_schedule',$data);
            if($rs)
            {
              $this->session->set_flashdata('success',"Schedule Successful");
              redirect(base_url().'Screening/ScheduleScreening');
            }
            else 
            {
              $this->session->set_flashdata('failed',"Schedule Failed");
              redirect(base_url().'Screening/ScheduleScreening');
            }
        }
      }
        public function deleteSchedule()
        {
          
          $id = $_GET['id'];
          
          $rs = $this->db->where('id',$id)->delete('screening_schedule');
          
          if($rs)
          {
            $this->session->set_flashdata('success',"Delete Schedule Successful");
            redirect(base_url().'scheduling-list');
          }
          else 
          {
            $this->session->set_flashdata('failed',"Schedule Not Deleted");
            redirect(base_url().'scheduling-list');
          }
          
        } 
        public function scheduleUpdate()
        {
          extract($_POST);
          $id = $_GET['id'];
          
          $data = array('title'=>$title,
          'screening_date'=>$schedule_date,
          'startup_id'=>implode("|",$startup),
          'member_id'=>implode("|",$member)
          );

          $rs = $this->db->update('screening_schedule',$data,array('id'=>$id));
          
          if($rs)
          {
            $this->session->set_flashdata('success',"Update Schedule Successful");
            redirect(base_url().'SchedulingList');
          }
          else 
          {
            $this->session->set_flashdata('failed',"Update Schedule Failed");
            redirect(base_url().'SchedulingList');
          }
          
        } 

        public function accept_screening_process()
        {
          $this->load->view('pages/accept-screening');
        }
        public function ScreeningProcess()
        {
           extract($_POST);
           
          
              $data = array();
              
              if($_FILES['screening_doc']['name'] != "")
              {
              $recived_file           = $_FILES['screening_doc']['name'];
              $file_size              = $_FILES['screening_doc']['size'];
              $file_tmp               = $_FILES['screening_doc']['tmp_name'];
              $file_type              = $_FILES['screening_doc']['type'];
              $path                   =  "uploads/screening_doc/";

              $temp = explode(".", $_FILES["screening_doc"]["name"]);
              $newfilename =  time().'.' . end($temp);

              move_uploaded_file($file_tmp, $path.$newfilename);

              $recived_file     =  $path.$newfilename;

              $data += array('screening_doc'=>$recived_file);

              }


           $data = array('startup_id'=>$startupid,
                         'scheduleid'=>$scheduleid,
                         'startup_type'=>$type,
                         'stage'=>$stages,
                         'incubation_period'=>$period,
                         'screening_remark'=>$remark,
                         'screening_status'=>'accept');

           $data2 = array('action'=>'accept');
           $where2 = array('id'=>$scheduleid);           
           $data3  = array('is_screened'=>1,'action'=>'accept','startup_type'=>$type,'stage'=>$stages);
           $where3 = array('id'=>$startupid);
           
           $rs = $this->db->insert('screening_status',$data);
                 
           if($rs)
           {
             $this->db->update('screening_schedule',$data2,$where2);  
             $this->db->update('startup',$data3,$where3);     
                               
             $this->session->set_flashdata('success',"Screening Successful");
             redirect(base_url().'SchedulingList');
           }
           else 
           {
             $this->session->set_flashdata('failed',"Somthing went worng");
             redirect(base_url().'SchedulingList');
           }
           
          
          
          }
        



        public function reject_screening_process()
        {
          $this->load->view('pages/reject-screening');
        }
        public function ScreeningProcessReject()
        {
           extract($_POST);         
           if($_FILES['screening_doc']['name']!="")
           { 
            $temp = explode(".", $_FILES["screening_doc"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/screening_doc/';            
            $config['allowed_types']        = 'pdf';
            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('screening_doc'))
            {


            $this->session->set_flashdata("failed","File Not Upload");	
            redirect(base_url().'SchedulingList');
            }
            else
            {

           $data = array('startup_id'=>$startupid,
                         'scheduleid'=>$scheduleid,                         
                         'screening_remark'=>$remark,
                         'screening_status'=>'reject');

           $data2 = array('action'=>'reject');
           $where2 = array('id'=>$scheduleid);           
           $data3  = array('is_screened'=>1,'action'=>'reject');
           $where3 = array('id'=>$startupid);
           
           $rs = $this->db->insert('screening_status',$data);
                 
           if($rs)
           {
             $this->db->update('screening_schedule',$data2,$where2);  
             $this->db->update('startup',$data3,$where3);     
                               
             $this->session->set_flashdata('success',"Screening Successful");
             redirect(base_url().'SchedulingList');
           }
           else 
           {
             $this->session->set_flashdata('failed',"Somthing went worng");
             redirect(base_url().'SchedulingList');
           }
           
            }
          }
          
          
        } 















        public function EditMember()
        {
          $this->load->view('pages/edit-member');
        }
        public function ScheduleScreening()
        {
          $this->load->view('pages/schedule-screening');
        }
        public function ScheduleFinalProcess()
        {
          $this->load->view('pages/screening-final-process');
        }

}