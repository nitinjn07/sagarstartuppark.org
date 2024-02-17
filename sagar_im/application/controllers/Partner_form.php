<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_form extends CI_Controller {

	
	
	public  function insert()
	{

        extract($_POST);
		$this->db2 = $this->load->database('imdb', TRUE);

        $check = $this->db2->get_where('partner',array('email'=>$email))->num_rows();

        if($check==0)
        {

	    $config = array(
        array(
            'field' => 'firm_name',
            'label' => 'firm_name',
            'rules' => 'trim|required|alpha_numeric_spaces'
        ),
          array(
            'field' => 'type_of_firm',
            'label' => 'type_of_firm',
            'rules' => 'required'
        ),
         array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'trim|required|alpha_numeric_spaces'
        ),
       array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'trim|numeric|min_length[10]|max_length[10]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'linkedin_url',
            'label' => 'linkedin_url',
            'rules' => 'trim|valid_url'
        ),
         array(
            'field' => 'country',
            'label' => 'country',
            'rules' => 'required'
        ),
        array(
            'field' => 'state',
            'label' => 'state',
            'rules' => 'required'
        ),
        array(
            'field' => 'city',
            'label' => 'city',  
            'rules' => 'required'
        ));
        
        $this->form_validation->set_rules($config);
        
		
		
		if($this->form_validation->run()==TRUE)
		{
		
		
		$data = array('firm_name' =>$this->input->post('firm_name',TRUE), 
	    'name' =>$this->input->post('name',TRUE), 
	    'type_of_firm'=>$this->input->post('type_of_firm',TRUE),
		'mobile' =>$this->input->post('mobile',TRUE), 
		'email' =>$this->input->post('email',TRUE), 		
		'is_true' =>$this->input->post('is_true',TRUE), 
		'state' =>$this->input->post('state',TRUE), 
		'city' =>$this->input->post('city',TRUE),
		'country'=>$this->input->post('country',TRUE));



		 $rs= $this->db2->insert('partner',$data);

		 if($rs)
		 {
		$htmlContent='<p><strong>Dear Applicant</strong>,<br/><br/>Thank you for your interest to be associated with jicjabalpur, a project of Jabalpur Smart City Limited. Our screening committee will go through your profile and get back to you as soon we can.</p>
		<p>Registration Details</p>
<table class="table table-dark table-striped" style="border: 1px solid black; width:100%; border-collapse: collapse;">
<tbody>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Name</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mobile</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Email;</th>
</tr>

<tr>
<td style="border: 1px solid black;">'.$name.'</td>
<td style="border: 1px solid black;">'.$mobile.'</td>
<td style="border: 1px solid black;">'.$email.'</td>

</tr>

<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">True</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">State</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City</th>
</tr>

<tr>
<td style="border: 1px solid black;">'.$is_true.'</td>
<td style="border: 1px solid black;">'.$state.'</td>
<td style="border: 1px solid black;">'.$city.'</td>

</tr>

</tbody>
</table>
<p>Stay Innovative!</p>
<p><strong>Team, Jabalpur Incubation Center </strong><br /><strong>www.jicjabalpur.org</strong></p>
<p>Verify your account click here. </p>
';
		    $config['mailtype'] = 'html';
            $this->email->initialize($config);
           $this->email->to("connect@jicjabalpur.org");
            $this->email->cc($email,"info@incubationmasters.com");
            $this->email->from('sender@jicjabalpur.org');
            $this->email->subject('Confirmation of your application with Jabalpur');
            $this->email->message($htmlContent);
          	 $this->email->send();
			   $this->session->set_flashdata('message', 'Partner Registration Successful');
		 	 redirect(base_url().'partner-registration');
			
		 }
		  else
		 {
			 $this->session->set_flashdata('message', 'Partner Registration Failed');
		 	 redirect(base_url().'partner-registration');
		 }
		 
		}
		else 
		{
		    $this->session->set_flashdata('message', validation_errors());
		 	 redirect(base_url().'partner-registration');
		}

    }
    else 
    {
        $this->session->set_flashdata('message', 'Partner Already Exists');
		 	 redirect(base_url().'partner-registration');
    }
		
	}
}