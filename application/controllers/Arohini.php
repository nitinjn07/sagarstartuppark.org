<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arohini extends CI_Controller {

	
	public function index()
	{
		$this->load->view('arohini-registration');
	}
	public function ArohiniRegistration()
	{
		$this->load->view('arohini-registration-step2');
	}
	public function RegisterNow()
	{
		extract($_POST);

        $where = array('name'=>$name,'email'=>$email,'startup_idea'=>$startup_idea,'mobile	'=>$mobile,'city_name'=>$cityname);

        $rs = $this->db->insert('arohini',$where);
        
        if($rs > 0)
        {
            $this->session->set_flashdata('success', 'Thank you for Registration');
            redirect(base_url().'Thankyou'); 

        }
        else 
        {
            $this->session->set_flashdata('failed', 'Please try Again!');
            redirect(base_url().'Sorry');
        }
	}
    public function ArohiniDetails()
    {
        $this->load->view('arohini-details');
    }
}