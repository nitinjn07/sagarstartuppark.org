<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
    public function index()
    {
        $this->load->view('pages/add-investor');
    }
    //Login Function
   public function addInvester()
   {
       extract($_POST);     
       
       

       if($_FILES['profile']['name']!="")
		{
            $temp = explode(".", $_FILES["profile"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/invester/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('profile'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('compay_name'=>$compay_name,
                'email'=>$email,
                'mobile'=>$mobile,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'linkedin_url'=>$linkedin,
                'description'=>$summary,
                'password'=>md5($password),
                'type_of_invester'=>$type_of_invester,
                'name'=>$ownername,
                'company_funded'=>@$company_funded,
                'total_amount_invested'=>@$amount_invested,
                'created_date'=>date('d-m-Y'),
                'stage_ideation'=>@$stage_ideation,
                'stage_conception'=>@$stage_conception,
                'stage_commitment'=>@$stage_commitment,
                'stage_validation'=>@$stage_validation,
                'stage_launch'=>@$stage_launch,
                'stage_scaling'=>@$stage_scaling,
                'stage_establishing'=>@$stage_establishing,
                'logo'=>@$newfilename);

            $this->session->set_flashdata("success","Invester Added Successfully");
            $this->db->insert('investor',$data);

            redirect(base_url()."Investor");       
           }

       
        }
        else 
        {
          $data = array('compay_name'=>$compay_name,
                'email'=>$email,
                'mobile'=>$mobile,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'linkedin_url'=>$linkedin,
                'description'=>$summary,
                'password'=>md5($password),
                'type_of_invester'=>$type_of_invester,
                'name'=>$ownername,
                'company_funded'=>@$company_funded,
                'total_amount_invested'=>@$amount_invested,
                'created_date'=>date('d-m-Y'),
                'stage_ideation'=>@$stage_ideation,
                'stage_conception'=>@$stage_conception,
                'stage_commitment'=>@$stage_commitment,
                'stage_validation'=>@$stage_validation,
                'stage_launch'=>@$stage_launch,
                'stage_scaling'=>@$stage_scaling,
                'stage_establishing'=>@$stage_establishing);

            $this->session->set_flashdata("success","Invester Added Successfully");
            $this->db->insert('investor',$data);
            redirect(base_url()."Investor");
        }

}

public function deleteInvestor()
    {
      $delid = $_GET['id'];
      $data = array('delstatus'=>0);

      $rs = $this->db->update('investor',$data,array('id'=>$delid));
      if($rs)
      {
        $this->session->set_flashdata('success',"Delete Invester Successful");
        redirect(base_url().'InvestorList');
      }
      else 
      {
        $this->session->set_flashdata('failed',"Failed : Information not deleted");
         redirect(base_url().'InvestorList');
      }
    }

    public function updateInvestor()
    {   
        extract($_POST);
        $updateid = $_GET['editid'];
        
        if($_FILES['profile']['name']!="")
		{
            $temp = explode(".", $_FILES["profile"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/invester/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('profile'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('compay_name'=>$compay_name,
                'email'=>$email,
                'mobile'=>$mobile,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'linkedin_url'=>$linkedin,
                'description'=>$summary,
                'password'=>md5($password),
                'type_of_invester'=>$type_of_invester,
                'name'=>$ownername,
                'company_funded'=>@$company_funded,
                'total_amount_invested'=>@$amount_invested,
                'created_date'=>date('d-m-Y'),
                'stage_ideation'=>@$stage_ideation,
                'stage_conception'=>@$stage_conception,
                'stage_commitment'=>@$stage_commitment,
                'stage_validation'=>@$stage_validation,
                'stage_launch'=>@$stage_launch,
                'stage_scaling'=>@$stage_scaling,
                'stage_establishing'=>@$stage_establishing,
                'logo'=>@$newfilename);

            $this->session->set_flashdata("success","Invester Update Successfully");
            $this->db->update('investor',$data,array('id'=>$updateid));
            redirect(base_url()."InvestorList");

           }

                  
        }
        else 
        {
            $data = array('compay_name'=>$compay_name,
                'email'=>$email,
                'mobile'=>$mobile,
                'country'=>$country,
                'state'=>$state,
                'city'=>$city,
                'linkedin_url'=>$linkedin,
                'description'=>$summary,
                'password'=>md5($password),
                'type_of_invester'=>$type_of_invester,
                'name'=>$ownername,
                'company_funded'=>@$company_funded,
                'total_amount_invested'=>@$amount_invested,
                'created_date'=>date('d-m-Y'),
                'stage_ideation'=>@$stage_ideation,
                'stage_conception'=>@$stage_conception,
                'stage_commitment'=>@$stage_commitment,
                'stage_validation'=>@$stage_validation,
                'stage_launch'=>@$stage_launch,
                'stage_scaling'=>@$stage_scaling,
                'stage_establishing'=>@$stage_establishing);

                $this->session->set_flashdata("success","Invester Update Successfully");
                $this->db->update('investor',$data,array('id'=>$updateid));
                redirect(base_url()."InvestorList");
        }
       

        
    }


    public function AcceptInvestor()
    {
      $where = array('id'=>$_GET['id']);
      $data = array('action'=>'accepted');      
      $rs = $this->db->update('investor',$data,$where);
      if($rs)
      {
        $this->session->set_flashdata('success','Accept Invester Successful');
        redirect(base_url().'InvestorList');
      }
      else 
      {
        $this->session->set_flashdata('failed','Somthing Wrong');
        redirect(base_url().'InvestorList');
      }

    }
    public function RejectInvestor()
    {
      $where = array('id'=>$_GET['id']);
      $data = array('action'=>'rejected');      
      $rs = $this->db->update('investor',$data,$where);
      if($rs)
      {
        $this->session->set_flashdata('success','Reject Investor Successful');
        redirect(base_url().'InvestorList');
      }
      else 
      {
        $this->session->set_flashdata('failed','Somthing Wrong');
        redirect(base_url().'InvestorList');
      }
    }

    public function EditInvestor()
    {
        $investor['investor'] = $this->db->get_where('investor',array('id'=>$_GET['id']))->row(); 
        $this->load->view('pages/edit-investor',$investor);
    }









}