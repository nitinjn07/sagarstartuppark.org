<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup_form extends CI_Controller {

	
	function __construct() {
        parent::__construct();
        $this->load->helper('email_helper');
    }

	public function saveData()
	{
		
		extract($_POST);
		$this->db2 = $this->load->database('imdb', TRUE);

		$check = $this->db2->get_where('startup',array('mobile'=>$mobile))->num_rows();
		
		if($check==0)
		{
	    
        $config = array(
        array(
            'field' => 'startup_name',
            'label' => 'Startup Name',
            'rules' => 'trim|required|alpha_numeric_spaces'
        ),
       array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'trim|required|numeric|min_length[10]|max_length[10]'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'dpiit',
            'label' => 'DPIIT',
            'rules' => 'trim|numeric'
        ),
         array(
            'field' => 'website_address',
            'label' => 'Website URL',
            'rules' => 'trim|valid_url'
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
        ),
        array(
            'field' => 'product_service_summary',
            'label' => 'product_service_summary',
            'rules' => 'trim|required|required'
        )
        );
        
        $this->form_validation->set_rules($config);
	    
	    


		 
		 if($this->form_validation->run()==TRUE)
		 {
			 
		 
		 $data = array('startup_name'=>$this->input->post('startup_name',TRUE),
						'name'=>$this->input->post('startup_name',TRUE),
						'mobile'=>$this->input->post('mobile',TRUE),
						'email'=>$this->input->post('email',TRUE),
						'password'=>md5($this->input->post('mobile',TRUE)),
						'state'=>$this->input->post('state',TRUE),
						'stage'=>$this->input->post('stage',TRUE),
						'city'=>$this->input->post('city',TRUE),
						'product_service_summary'=>$this->input->post('product_service_summary',TRUE),
						'website_address'=>$this->input->post('website_address',TRUE),
						'verticals_sectors'=>$this->input->post('verticals_sectors',TRUE),
						'is_true'=>$this->input->post('is_true',TRUE),
						'dpiit'=>$this->input->post('dpiit',TRUE),
						'ip_address'=>$_SERVER['REMOTE_ADDR']);
						
						
	    
						

		 $rs = $this->db2->insert('startup',$data);
		 $id = $this->db2->insert_id();

		 if($rs)
		 {
		 	
		 	$to ="connect@jicjabalpur.org";
			$subject="New Startup Application Recieved";
			$htmlContent='<p>Dear Jabalpur Incubation Center,<br/></p>
          <p>This is to inform you that you have received a startup registration. 
          As per the registration details, we have created a profile for your reference. Please find the below details:</p>

				<table class="table table-dark table-striped" style="border: 1px solid black; width:100%; border-collapse: collapse;">
				<tbody>
				<tr>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mobile</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Email</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Startup_name&nbsp;</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Stage</th>
				</tr>
				<tr>
				<td style="border: 1px solid black;">'.$mobile.'</td>
				<td style="border: 1px solid black;">'.$email.'</td>
				<td style="border: 1px solid black;">'.$startup_name.'</td>
				<td style="border: 1px solid black;">'.$stage.'</td>
				</tr>
				<tr>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Website</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Verticals Sectors</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Product Service Summary</th>
				<th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City /State </th>
				</tr>

				<tr>
				<td style="border: 1px solid black;">'.$website_address.'</td>
				<td  style="border: 1px solid black;">'.$verticals_sectors.'</td>
				<td  style="border: 1px solid black;">'.$product_service_summary.'</td>
				<td  style="border: 1px solid black;">'.$city.' '.$state.'</td>
				</tr>

				</tbody>
				</table>
				<p>Stay Innovative!</p>
				<p><strong>Team, Jabalpur Incubation Center </strong><br /><strong>www.jicjabalpur.org</strong></p>
				';

			
            $to2 = $email;
			$subject2="Thank You for Registering as an Incubatee at Satna Incubation Center";
			$message="<p>Dear ".$startup_name.",</p>

			<p>Thankyou for registering as an incubatee of the Jabalpur Incubation Center (JIC).  We are happy to have you as a part of our community of entrepreneurs. 
			This is to inform you that our screening committee will be reviewing your startup idea, and we will be in touch with you soon regarding the next steps. We understand that starting a business can be a challenging process, and we want to ensure that we provide you with the best possible support to help you turn your ideas into a successful venture.</p>
  
			<p>At JIC, we offer a range of services, including mentoring, networking opportunities, training and workshops, office space, and much more. Our team of experts is here to guide you every step of the way and help you overcome any obstacles you may encounter.</p>
  
			<p>Best Regards,<br/>
			Jabalpur Incubation Center</p>";

            sendEmail($to,$subject,$htmlContent);
			sendEmail($to2,$subject2,$message);
			

                
			
			$this->session->set_flashdata('message', 'Startup Registration Successful');			
		 	redirect(base_url().'startup-registration');
			
		 }
		 else
		 {
			$this->session->set_flashdata('message', 'Startup Registration Failed');
		 	 redirect(base_url().'startup-registration');
		 }
		 
		 }
		 else 
		 {
		     $this->session->set_flashdata('message', validation_errors());
		 	 redirect(base_url().'startup-registration');
		 }
	
	
		}
		else 
		{
			$this->session->set_flashdata('message', 'Startup Mobile Number Already Exists..');
			redirect(base_url().'startup-registration');
		}
	
	}

}