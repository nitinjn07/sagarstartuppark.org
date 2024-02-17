<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/change-password');
    }
    public function Change()
      {
          extract($_POST);
          $where = array('password'=>md5($current_password),'email'=>$_SESSION['username'],'role'=>$_SESSION['usertype']);
          $rs = $this->db->get_where('user_registration',$where)->row();

                
          if($rs)
          { 
            
              if($rs->password!=md5($new_password) && $rs->password!=md5($confirm_password))
              {
                
                  if(md5($new_password)==md5($confirm_password))
                  {
                          $data = array('password'=>md5($new_password));
                          $this->db->update('user_registration',$data,array('email'=>$_SESSION['username'],'role'=>$_SESSION['usertype']));
                          $this->session->set_flashdata('success',"Change Password Successful");
                          redirect(base_url().'ChangePassword');                    
                  }
                  else 
                  {
                      $this->session->set_flashdata('failed',"new & confirm password should be equal");
                      redirect(base_url().'ChangePassword');
                  }

              }
              else 
              {
                $this->session->set_flashdata('failed',"new & confirm password should be diffrent from current password");
                redirect(base_url().'ChangePassword');
              }

          }
          else 
          {
            $this->session->set_flashdata('failed',"Current Password is Wrong");
            redirect(base_url().'ChangePassword');          

          }    



      }
}