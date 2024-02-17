<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComplaintAndSuggestion extends CI_Controller {

	public function index()
	{
		
		$this->load->view('pages/complaint-and-suggestion');
	}
    public function Ccs()
    {
        extract($_POST);
        
       
           
            $data = array('first_name'=>$fname,
                          'last_name'=>$lname,
                          'email'=>$email,
                          'phone'=>$mobile,
                          'i_have_a'=>$type_of_review,
                          'description'=>$review,
                          'ip'=>$_SERVER['REMOTE_ADDR']);
                          
            $web = $this->load->database('webpanel', TRUE);

            $rs = $web->insert('ccs',$data);
            
            if($rs)
            {
                $this->session->set_flashdata('success', 'Submitted Successfully 🌝');
    			redirect(base_url().'ComplaintAndSuggestion');
            }
            else 
            {
                $this->session->set_flashdata('failed', 'something went wrong, please try again!');
    			redirect(base_url().'ComplaintAndSuggestion');
            }
       
    }
}

?>