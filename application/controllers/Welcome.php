<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
   public function check_email_avalibility()
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            echo '<small class="text-danger">Invaild Email Address</small>';
        }
        else
        {
        	$table = $_POST['table'];

            if($this->Model->check_email_avalibility($_POST['email'],$table))
            {
                echo '<small class="text-danger">Email Address are Alredy Regsitered</small>';
                echo '<style>.regsiter_button { display: none; }</style>';
            }
            else
            {
                echo '';
                echo '<style>.regsiter_button { display: block; }</style>';
            }
        }
    }
}
