<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CoFounderSearch extends CI_Controller {

	public function index()
	{
		
		$this->load->view('pages/search-co-founder');
	}
    public function RequestForCoFounder()
    {
        extract($_POST);

        if(isset($_POST['skills_founder']) and isset($_POST['skills_looking']))
        {

        $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();

        $sid = $startup->id;

        
        $data = array('startup_id'=>$sid,
                     'startup_idea'=>$startup_idea,
                     'why_need'=>$why_need,
                     'skills_looking'=>implode(",",$skills_looking),
                     'skills_founder'=>implode(",",$skills_founder),
                     'why_partner'=>$why_partner,
                     'working_hours'=>$working_hours);

        $rs = $this->db->insert('co-founder',$data);

        if($rs)
        {
            $this->session->set_flashdata("success","Co-Founder Request has been Submmitted");
            redirect(base_url().'CoFounderSearch');
        }
        else 
        {
            $this->session->set_flashdata("failed","Co-Founder Request not Submmitted");
            redirect(base_url().'CoFounderSearch');
        }
       }
       else 
       {
        $this->session->set_flashdata("failed","Skills Checkbox Required");
            redirect(base_url().'CoFounderSearch');
       }
    }
    
}

?>