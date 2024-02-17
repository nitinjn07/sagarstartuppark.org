<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentore_form extends CI_Controller {

	


	public function saveData()
	{

        extract($_POST);
        $this->db2 = $this->load->database('imdb', TRUE);

        $check = $this->db2->get_where('mentor',array('email'=>$email))->num_rows();

        if($check==0)
        {
	   $config = array(
        array(
            'field' => 'name',
            'label' => 'Name',
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
		 
		 $data = array('name'=>$this->input->post('name',TRUE),
						'email'=>$this->input->post('email',TRUE),
						'city'=>$this->input->post('city',TRUE),
						'mobile'=>$this->input->post('mobile',TRUE),
						'password'=>md5($this->input->post('mobile',TRUE)),
						'linkedin_url'=>$this->input->post('linkedin_url',TRUE),
						'no_of_mentor_year'=>$this->input->post('no_of_mentor_year',TRUE),
						'is_true'=>$this->input->post('is_true',TRUE),
						'created_date'=>date('d/m/Y'),
						'state'=>$this->input->post('state',TRUE),
						'city'=>$this->input->post('city',TRUE),
					    'country'=>$this->input->post('country',TRUE));
        			
        $data['is_legal_expert'] = $this->input->post('is_legal_expert',TRUE);
        $data['is_finance_expert'] = $this->input->post('is_finance_expert',TRUE);
        $data['is_account_expert'] = $this->input->post('is_account_expert',TRUE);
        $data['is_marketing_expert'] = $this->input->post('is_marketing_expert',TRUE);
        $data['is_it_expert'] = $this->input->post('is_it_expert',TRUE);
        $data['is_digital_marketing_expert'] = $this->input->post('is_digital_marketing_expert',TRUE);
        $data['is_business_strategy_expert'] = $this->input->post('is_business_strategy_expert',TRUE);
        $data['is_women_expert'] = $this->input->post('is_women_expert',TRUE);
        $data['is_startup_expert'] = $this->input->post('is_startup_expert',TRUE);
        $data['is_personality_development_expert'] = $this->input->post('is_personality_development_expert',TRUE);
        $data['is_communication_expert'] = $this->input->post('is_communication_expert',TRUE);


		 $rs = $this->db2->insert('mentor',$data);

		 if($rs)
		 {
	
			$htmlContent='<p><strong>Dear Applicant</strong>,<br/><br/>Thank you for your interest to be associated with jicjabalpur, a project of Jabalpur Smart City Limited. Our screening committee will go through your profile and get back to you as soon we can.</p>
			
		<p>Registration Details</p>
<table class="table table-dark table-striped" style="border: 1px solid black; width:100%; border-collapse: collapse;">
<tbody>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Name</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Email</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mobile</th>
</tr>
<tr>
<td style="border: 1px solid black;">'.$name.'</td>
<td style="border: 1px solid black;">'.$email.'</td>
<td style="border: 1px solid black;">'.$city.'</td>
<td style="border: 1px solid black;">'.$mobile.'</td>
</tr>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Linkedin</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mentor Year</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">True</th>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">State;</th>
</tr>

<tr>
<td style="border: 1px solid black;">'.$linkedin_url.'</td>
<td  style="border: 1px solid black;">'.$no_of_mentor_year.'</td>
<td  style="border: 1px solid black;">'.$is_true.'</td>
<td  style="border: 1px solid black;">'.$state.'</td>
</tr>
<tr>
<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City</th>

</tr>
<tr>

<td  style="border: 1px solid black;">'.$city.'</td>


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
			
			   $this->session->set_flashdata('message', 'Mentor Registration Successful');
			   redirect(base_url().'mentor-registration');
		 }
		  else
		 {
			$this->session->set_flashdata('message', 'Mentor Registration Failed');
			redirect(base_url().'mentor-registration');
		 }
		 }
		 else 
		 {
		     $this->session->set_flashdata('message', validation_errors());
			redirect(base_url().'mentor-registration');
		 }

        }
        else 
        {
            $this->session->set_flashdata('message', 'Mentor Already Exists');
			redirect(base_url().'mentor-registration');
        }
	}
}