<?php 

class Legal_Pathshala extends CI_Controller{
    
    public function join(){
        
        extract($_POST);
        
        $data = array('name'=>$name,'startup'=>$startup,'contact'=>$contact,'email'=>$email,'state'=>$state,'city'=>$city);
        
        $this->db->insert('legal_pathshala', $data);
        	 	
		$htmlContent='<p><strong>Dear Applicant</strong>,<br/><br/>
		

            Thank you for joining The best legal Training Program “<strong> Legal Pathshala </strong>”, a project of Jabalpur Smart City Limited . <br/><br/>

		    Where: FB Page of Jabalpur Incubation Center and Jabalpur Smart City  </p><br/>
		    
		    FB Page: <a href="https://www.facebook.com/JabalpurIncubationCenter/">Jabalpur Incubation Center</a><br/>
		    FB Page: <a href="https://www.facebook.com/Smartcityjabalpur/">Smart City Jabalpur</a><br/>
		    YouTube Channel: <a href="https://www.youtube.com/c/IncubationMasters">Incubation Masters YouTube</a><br/><br/>
		    
		    <p>When: <strong>12th to 27th February</strong> <br/> Timing: <strong>5:00 pm to 6:00 pm</strong> <br/>Legal Pathshala will address all legal and financial topics in depth and Provide Free Certificate </p><br/>
		 
			<p>Stay Innovative!</p>
			<p><strong>Team, Jabalpur Incubation Center </strong><br /><strong>www.jicjabalpur.org</strong></p>';
            
		$config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to("connect@jicjabalpur.org");
        $this->email->cc($email,"info@incubationmasters.com");
        $this->email->from('Legalpathshala@jicjabalpur.org');
        $this->email->subject('Confirmation of your application with Jabalpur');
        $this->email->message($htmlContent);
      	$this->email->send();
        
    	$this->session->set_flashdata('message', 'Thank You For Joining Legal Pathshala');			
	 
	 	redirect(base_url().'legal-pathshala');
    }
    
}

?>