<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invester_form extends CI_Controller {

	
	

	public function insert()
	{
        extract($_POST);
		$this->db2 = $this->load->database('imdb', TRUE);

        $check = $this->db2->get_where('investor',array('email'=>$email))->num_rows();

        if($check==0)
        {
	    
	    $config = array(
        array(
            'field' => 'compay_name',
            'label' => 'compay_name',
            'rules' => 'trim|alpha_numeric_spaces'
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
            'label' => 'Linkedin URL',
            'rules' => 'trim|valid_url'
        ),
         array(
            'field' => 'total_amount_invested',
            'label' => 'total_amount_invested',
            'rules' => 'trim|required'
        ),
         array(
            'field' => 'type_of_invester',
            'label' => 'type_of_invester',
            'rules' => 'trim|required'
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
        )
        );
        
        $this->form_validation->set_rules($config);
        
        
		
		
		if($this->form_validation->run() == TRUE)
		{
        $data = array('compay_name'=>$this->input->post('company_name',TRUE),
						'email'=>$this->input->post('email',TRUE),
						'city'=>$this->input->post('city',TRUE),
						'mobile'=>$this->input->post('mobile',TRUE),
						'password'=>md5($this->input->post('mobile',TRUE)),
						'linkedin_url'=>$this->input->post('linkedin_url',TRUE),
						'company_funded'=>$this->input->post('company_funded',TRUE),
						'is_true'=>$this->input->post('is_true',TRUE),
						'total_amount_invested'=>$this->input->post('total_amount_invested',TRUE),
						'state'=>$this->input->post('state',TRUE),
						'country'=>$this->input->post('country',TRUE),
						'name'=>$this->input->post('name',TRUE),
						'type_of_invester'=>$this->input->post('type_of_invester',TRUE));
		
		$data['stage_ideation']  = $this->input->post('stage_ideation',TRUE);
		$data['stage_validation']  = $this->input->post('stage_validation',TRUE);
		$data['stage_launch']	 = $this->input->post('stage_prototype',TRUE);
		$data['stage_scaling'] 	= $this->input->post('stage_scaling',TRUE);
		$data['stage_establishing']	 = $this->input->post('stage_establishing',TRUE);


		 $rs= $this->db2->insert('investor',$data);

		 if($rs)
		 {
		 	
			$htmlContent='<p><strong>Dear Applicant</strong>,<br/><br/>Thank you for your interest to be associated with jicjabalpur, a project of Jabalpur Smart City Limited. Our screening committee will go through your profile and get back to you as soon we can.</p>
<p>Registration Details</p>
<table class="table table-dark table-striped" style="border: 1px solid black; width:100%; border-collapse: collapse;">
<tbody>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Compay Name</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Email</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mobile</th>
</tr>
<tr>
<td style="border: 1px solid black;">'.$compay_name.'</td>
<td style="border: 1px solid black;">'.$email.'</td>
<td style="border: 1px solid black;">'.$city.'</td>
<td style="border: 1px solid black;">'.$mobile.'</td>
</tr>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">linkedin</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Company Funded</th>

<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Total Invested Amount</th>
</tr>

<tr>
<td style="border: 1px solid black;">'.$linkedin_url.'</td>
<td  style="border: 1px solid black;">'.$company_funded.'</td>
<td  style="border: 1px solid black;">'.$total_amount_invested.'</td>
</tr>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">State</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;" >Name</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Type of Invester</th>
</tr>
<tr>

<td  style="border: 1px solid black;">'.$state.'</td>

<td  style="border: 1px solid black;">'.$name.'</td>
<td  style="border: 1px solid black;">'.$type_of_invester.'</td>
</tr>


</tbody>
</table>
<p>Stay Innovative!</p>
<p><strong>Team, Jabalpur Incubation Center </strong><br /><strong>www.jicjabalpur.org</strong></p>
';

			$config['mailtype'] = 'html';
            $this->email->initialize($config);
             $this->email->to("connect@jicjabalpur.org");
            $this->email->cc($email,"info@incubationmasters.com");
            $this->email->from('sender@jicjabalpur.org');
            $this->email->subject('Confirmation of your application with Jabalpur');
            $this->email->message($htmlContent);
          	 $this->email->send();
			
			   $this->session->set_flashdata('message', 'Invester Registration Successful');
			   redirect(base_url().'investor-registration');
		 }
		  else
		 {
			$this->session->set_flashdata('message', 'Invester Registration failed');
			redirect(base_url().'investor-registration');
		 }
		}
		else 
		{
		    $this->session->set_flashdata('message', validation_errors());
			redirect(base_url().'investor-registration');
		}

    }
    else 
    {
        $this->session->set_flashdata('message', 'Invester Mobile Number Already Exists');
        redirect(base_url().'investor-registration');
    }
	}
}