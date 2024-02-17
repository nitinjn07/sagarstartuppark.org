<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/home');
    }
    public function login()
    {
      extract($_POST);

      
      if($usertype=='Startup')
      {
         
        $where = array('email'=>$email,'password'=>md5($password),'delstatus'=>1);
        $rs = $this->db->get_where('startup',$where);
        $status = array('username'=>$email,'usertype'=>'Startup');   

        
        $startup = $this->db->get_where('startup',array('email'=>$email))->row();
        if($startup)
        {
        $data = array('startupid'=>$startup->id,'login_date'=>date('d-m-Y'),'login_time'=>date('d-m-y h:i:s'));
        $this->db->insert('startup_login_history',$data);
        }
        
       
       
        $path ='Startup/Dashboard';
      }
      if($usertype=='Admin')
      {
        $where = array('email'=>$email,'password'=>md5($password));
        $rs = $this->db->get_where('user_registration',$where);
        $r = $this->db->get_where('user_registration',$where)->row();
        $status = array('username'=>$email,'usertype'=>$r->role,'rolid'=>$r->rolid);
        $path ='Dashboard';
      }        

      if($rs->num_rows()>0)
      {
      $this->session->set_userdata($status);
      $this->session->set_flashdata('success',"Login Succesful");
      redirect(base_url().$path);
      }
      else 
      {

        $this->session->set_flashdata('failed',"Wrong username & password");
        redirect(base_url().'Home');

      }
    }
     //Logout Function
     public function logout()
     {   
       session_destroy();
       redirect(base_url(),'Home');
     }
}