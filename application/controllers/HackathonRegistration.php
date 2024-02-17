<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HackathonRegistration extends CI_Controller {

	
	public function index()
	{
		$this->load->view('bundelkhand-spark-hackathon-registration');
	}
    public function StartupRegistration()
    {
         $this->hackdb = $this->load->database('hack', TRUE);
    extract($_POST);

    $config['upload_path']          = './uploads/ppt/';
    $config['allowed_types']        = 'ppt|pptx|pdf';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('ppt'))
    {
    $error = array('error' => $this->upload->display_errors());
    
   
    $this->session->set_flashdata('failed', $error['error']);
    redirect(base_url().'Sorry');
    }
    else
    {
    $data = array('upload_data' => $this->upload->data());    
    $filename = $data['upload_data']['file_name'];
    $data = array('name'=>$name,
            'email'=>$email,
            'mobile'=>$mobile,
            'country'=>$country,
            'state'=>$state,
            'city'=>$city,
            'school_college'=>$school_college,
            'gender'=>$gender,
            'idea'=>$idea,
            'ppt'=>$filename,
            'problem'=>$problem,
            'solution_detail'=>$solution_detail,
            'startup_category'=>$startup_category,
            'stages'=>$stages);

    $check = $this->db->get_where('startups_reg',array('email'=>$email,'mobile'=>$mobile));              
    if($check->num_rows()>0)
    {
    $this->session->set_flashdata('failed', "Your application already submitted");   
    redirect(base_url().'Sorry'); 
    }
    else 
    {
        $content ="<p>Dear ".$name.",</p>
        <p>Thank you for completing your registration for the Bundelkhand Spark Hackathon 2.0.</strong></p>
        <p>This email confirms that your registration has been received. Our team will contact you, if your application is shortlisted to proceed further with the process.
        </p>
        <p>Till then, keep following us on social media to get to know the latest update on Bundelkhand SPARK Hackathon 2.0 <br/>  <img src='".base_url('assets/images/social.png')."' /> </p>
        
        <h5>Details :</h5>
        
        <p>Startup Name : ".$name."</p>
        <p>Email: ".$email."</p>
        <p>Mobile: ".$mobile."</p>
        <p>Idea:  ".$idea."</p>
        <p>Category: ".$startup_category."</p>
        <p>Stage: ".$stages."</p>
        <p>State/City: ".$state."/".$city."</p>
        <p>School/College/Company Name: ".$school_college."</p>
        <p> PPT :<a href='".base_url().'uploads/ppt/'.$filename."' target='_blank' download>Open PPT</a> <p>
        
        <img src='".base_url('assets/startup-confirm.jpg')."' />
        
        <p><br></p>
        <p>Regards,<br>Team Spark Incubation Centre</p>";

        
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->ClearAddresses();
        $mail->ClearAttachments();
        /* SMTP configuration */
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sparkincubationcentre@gmail.com';
        $mail->Password = 'xakxidlqkqfrjktt';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->SMTPDebug = 2;
        
        $mail->setFrom('sparkincubationcentre@gmail.com', 'Spark Incubation Centre');
        $mail->addReplyTo('sparkincubationcentre@gmail.com', 'Spark Incubation Centre');
        /* Add a recipient */
        $mail->addAddress($email);
        
        $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
        ));
        /* Add cc or bcc */
        $mail->addCC('connect@sagarstartuppark.org');
        
        /* Email subject */
        $mail->Subject = "Registration Confirmation - Bundelkhand Spark Hackathon 2.0";
        /* Set email format to HTML */
        $mail->isHTML(true);
        $mail->Body = $content;
        $mail->send();
        $this->session->set_flashdata('success', "Your application has been submitted Successfully. Please check email for confirmation"); 
       $this->hackdb->insert('startups_reg',$data);                
       redirect(base_url().'Thankyou');  
    }
    }
    }
}