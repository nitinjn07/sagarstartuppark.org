<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function logout()
    {
        session_destroy();
        redirect(base_url().'../sagar_im/');
    }
    public function ChangePassword()
	{
		extract($_POST);
		$current = md5($current_password);
		$newpass = md5($new_password);
		$confirmpass = md5($confirm_password);

		$data = array('password'=>$newpass);
        $this->db2 = $this->load->database('imdb', TRUE);
		$user = $this->db2->get_where('startup',array('id'=>$_SESSION['uid']))->row();

		if($user->password == $current)
		{
			if($newpass != $current and $confirmpass!=$current)
			{
				   if($newpass == $confirmpass)
				   {
					   
                        $this->db2->where('id',$user->id)->update('startup',$data);
						$this->session->set_flashdata("Success","Change Password Successful");
					    redirect(base_url()."change-password");

				   }
				   else 
				   {
					$this->session->set_flashdata("Failed","New and Confirm Password Should be Same");
					redirect(base_url()."change-password");
				   }
			}
			else 
			{
				$this->session->set_flashdata("Failed","New and Confirm Password Should be Diffrent from current password");
				redirect(base_url()."change-password");
			}
		}
		else 
		{
			$this->session->set_flashdata("Failed","Current Password is Wrong.");
			redirect(base_url()."change-password");
		}
		
		

	}

	public function user_login()
	{
		

		$im = $this->load->database('imdb', TRUE);

		extract($_POST);

		$where = array('email'=>$email,'password'=>$password);

		$count = $im->get_where('startup',$where)->num_rows();

		if($count>0)
		{
			$this->session->set_userdata('uid',$email);
			redirect(base_url().'dashboard');
		}
		else 
		{
			redirect(base_url().'home');
		}
	}


}