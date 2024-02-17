<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function index() {       
        $this->load->view('pages/dashboard');
    }
    public function editProfile()
    {
        $this->load->view('pages/edit-profile');
    }
    public function uploadLogo()
    {     


            $id = $_GET['id'];
           
            $temp = explode(".", $_FILES["profile_image"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './../uploads/logo/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('profile_image')){


            $this->session->set_flashdata("failed","Image Not Upload");
            redirect(base_url()."Dashboard/editProfile");   	

            }
            else
            {
            $data = array('logo'=>$newfilename);

            $this->session->set_flashdata("success","Logo Update Successfully");
            $this->db->update('startup',$data,array('id'=>$id));
            redirect(base_url()."Dashboard/editProfile");   


            }

                
            
        }
     public function password()
     {
         $this->load->view('pages/change-password');
     }
     public function ChangePassword()
     {
        extract($_POST);
        $where = array('password'=>md5($current_password),'email'=>$_SESSION['username']);
        $rs = $this->db->get_where('startup',$where)->row();      
      
        if($rs)
        { 
          
            if($rs->password!=md5($new_password) && $rs->password!=md5($confirm_password))
            {
              
                if(md5($new_password)==md5($confirm_password))
                {
                        $data = array('password'=>md5($new_password));
                        $this->db->update('startup',$data,array('email'=>$_SESSION['username']));
                        $this->session->set_flashdata('success',"Change Password Successful");
                        redirect(base_url().'Dashboard/Password');                    
                }
                else 
                {
                    $this->session->set_flashdata('failed',"new & confirm password should be equal");
                    redirect(base_url().'Dashboard/Password');
                }

            }
            else 
            {
              $this->session->set_flashdata('failed',"new & confirm password should be diffrent from current password");
              redirect(base_url().'Dashboard/Password');
            }

        }
        else 
        {
          $this->session->set_flashdata('failed',"Current Password is Wrong");
          redirect(base_url().'Dashboard/Password');          

        }
     }
     public function StartupProfile()
     {
        $this->load->view('pages/startup-profile');
     }
     

    public function services() {       
        $this->load->view('pages/services');
    }
}