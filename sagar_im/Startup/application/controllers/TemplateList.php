<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateList extends CI_Controller {

	public function index()
	{
		
		$this->load->view('pages/template-list');
	}
    
    public function download()
    {
        $startup=$this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
        $sid = $startup->id;

        $tid = $_GET['tid'];


        $count = $this->db->get_where('download_count',array('startup_id'=>$sid))->num_rows();

       
        
        if($count<2)
        {        

           $rs = $this->db->insert('download_count',array('startup_id'=>$sid,'template_id'=>$tid));
           $this->session->set_flashdata('success','Download Success');
           $this->load->helper('download');
           $d = $this->db->get_where('template_listing',array('id'=>$tid))->row();          
           redirect(base_url().'TemplateList');
        }
        else 
        {
            $this->session->set_flashdata('failed','Only 2 or less Download Allowed');
            redirect(base_url().'TemplateList');
        }
     }
     
     public function DownloadTemplate()
     {
        extract($_POST);
        $this->load->helper('download');
        $row = $this->db->get_where('download_count',array('startup_id'=>$sid,'template_id'=>$tid))->num_rows();        
        if($row<3)
        {
                $template = $this->db->get_where('template_listing',array('id'=>$tid))->row();   
                // Initialize a file URL to the variable
                $url=base_url('../uploads/template_file/').$template->template_file;

                if($url)
                {
                   //sendEmail("nitinjn07@gmail.com","Template Download".$template->template_name,"You have successfully download template <a href='".$url."' target='_blank'>click here to access</a>");
                   force_download($url,NULL);
                   $data = array('startup_id'=>$sid,'template_id'=>$tid);
                   $rs = $this->db->insert('download_count',$data); 
                   if($rs)
                   {
                    //  echo "<script>window.open('".$url."'); </script>";
                     $this->session->set_flashdata('success','Template Download Successfull');
                     redirect(base_url().'TemplateList');
                   }  
                   else 
                   {
                     $this->session->set_flashdata('failed','Temlpate Download Not Successful');
                     redirect(base_url().'TemplateList');
                   }  
                }
                else
                {
                    $this->session->set_flashdata('failed','Temlpate Download Failed');
                    redirect(base_url().'TemplateList');  
                  
                }
        }
        else 
        {
            $this->session->set_flashdata('failed','Only 2 Template, You can download');
                     redirect(base_url().'TemplateList');
        }
     }
}

?>