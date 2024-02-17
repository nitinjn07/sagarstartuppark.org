<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Techpathshala extends CI_Controller {

	
	public function index()
	{
		$this->load->view('techpathshala');
	}

	public function savedata()
	{
	    if(isset($_POST['techform']))
	    {
	    
		extract($_POST);

		$data = array('name' =>$name ,'	gender' =>$gender ,'email' =>$email ,'college' =>$college ,'mobile' =>$mobile ,'state' =>$state ,'	city' =>$city ,'startup' =>$startup ,'term' =>$term);

		$rs=$this->Model->insertdata('techpathshala',$data);

       		 if($rs)
		 {
            $htmlContent = '
        <p><strong>Dear Applicant</strong>,<br/><br/>Thank you for your interest in Tech Pathshala, 15 days FREE TECH CLASSES by Sagar Startup Park, a project of Sagar Smart City Limited. We will get back to you as soon we can. Meanwhile, follow us on the social media pages mentioned in the signature.</p>
        <p>Registration Details</p>
        <table class="table table-dark table-striped" style="border: 1px solid black; width:100%; border-collapse: collapse;">
        <tbody>
        <tr
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Name</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Gender</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Email</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">College</th>
        </tr>
        <tr>
        <td style="border: 1px solid black;">'.$name.'</td>
        <td style="border: 1px solid black;">'.$gender.'</td>
        <td style="border: 1px solid black;">'.$email.'</td>
        <td style="border: 1px solid black;">'.$college.'</td>
        </tr>
        <tr>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Mobile</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">State</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">City</th>
        <th style=" padding-top: 12px;padding-bottom: 12px; text-align: left; border: 1px solid black;">Startup</th>
        </tr>
        
        <tr>
        <td style="border: 1px solid black;">'.$mobile.'</td>
        <td  style="border: 1px solid black;">'.$state.'</td>
        <td  style="border: 1px solid black;">'.$city.'</td>
        <td  style="border: 1px solid black;">'.$startup.'</td>
        </tr>
        <tr>
        
        
        
        </tr>
        
        
        
        </tbody>
        </table>
        <p>Stay Innovative!</p>
        <p><strong>Team, Sagar Startup Park (SPARK)</strong><br /><strong>www.sagarstartuppark.org</strong></p>
        
           <strong><a href="https://www.facebook.com/SagarStartupPark">Facebook</a></strong>,
            
            <strong><a href="https://instagram.com/sagarstartuppark?igshid=1fodlf2h37l2k">Instagram</a></strong>,
            
          <strong><a href="https://www.linkedin.com/company/sagarstartupparkk">Linkedin</a></strong>,
            
            <strong><a href="https://twitter.com/S_StartupPark?s=09k">Twitter</a></strong>,
            
            <strong><a href="GATXUWWYDFFHN4SK64F6H3X6UVUCRGMR6BXJ4JAPT2MMG5QI5VRQLQNE">Youtube</a></strong>
        ';
            
            
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->to($email);
            $this->email->from('connect@sagarstartuppark.org');
            $this->email->cc('techpathshala@sagarstartuppark.org');
            $this->email->subject('Confirmation of your application with Sagar Startup Park');
            $this->email->message($htmlContent);
          
            $this->email->send();
            
             echo "<script> window.location.href='../Thankyou'; </script>";
		 }
	   
	    else 
	    {
	        echo "<script> window.location.href='../Errorpage'; </script>";
	    }
	}
}

        function check_email_avalibility()
    {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            echo '<label class="text-danger">Invaild Email Address</label>';
        }
        else
        {
            if($this->Model->check_email_ava($_POST['email']))
            {
                echo '<label class="text-danger">This Email Id Already Exists</label>';
                echo '<style>#validate { display: none; }</style>';
            }
            else
            {
                echo ' ';
                echo '<style>#validate { display: block; }</style>';
            }
        }
    }
}
