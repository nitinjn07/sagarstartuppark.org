<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateList extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
        
    }
    public function index()
    {        
        $this->load->view('pages/add-template');
    }
    public function addTemplate()
    {
        extract($_POST);
        
        
        if($_FILES['template_file']['name']!="")
        {
            $temp = explode(".", $_FILES["template_file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/template_file/';
            $config['allowed_types']        = 'docx|pdf|doc|xls|xlsx';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if ( !$this->upload->do_upload('template_file'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('template_catid'=>$cid,
                'template_name'=>$template_name,                
                'template_file'=>@$newfilename,
                'description'=>$description);

            $this->session->set_flashdata("success","Template  Added Successfully");
            $this->db->insert('template_listing',$data);
            redirect(base_url()."TemplateList"); 

           }

              
        }
        else 
        {
            $data = array('template_catid'=>$cid,
            'template_name'=>$template_name,
            'description'=>$description);

                $this->session->set_flashdata("success","Template Added Successfully");
                $this->db->insert('template_listing',$data);
                redirect(base_url()."TemplateList"); 
        }
    }
    public function deleteTemplateList()
    {
        $where =array('id'=>$_GET['delid']);

        $rs = $this->db->delete('template_listing',$where);

        if($rs)
        {
            
            $this->session->set_flashdata("success","Template Delete Successfully");
            redirect(base_url().'TemplateList');
            
        }
        else 
        {
            
            $this->session->set_flashdata("failed","Template Not Deleted");
            redirect(base_url().'TemplateList');
        }
    }
    public function updateTemplate()
    {
        
        extract($_POST);

        $where =array('id'=>$template_catid);

        
        
        if($_FILES['template_file']['name']!="")
        {
            $temp = explode(".", $_FILES["template_file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $config['upload_path']          = './uploads/template_file/';
            $config['allowed_types']        = 'docx|pdf|doc|xls|xlsx';

            $config['file_name'] = $newfilename;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('template_file'))
            {


            $this->session->set_flashdata("failed","Image Not Upload");	

            }
            else
            {
                $data = array('template_catid'=>$tempalte_catid,
                'template_name'=>$template_name,                
                'template_file'=>@$newfilename,
                'description'=>$description);

            $this->session->set_flashdata("success","Template Update Successfully");
            $this->db->update('template_listing',$data,$where);
            redirect(base_url()."TemplateList"); 

           }

              
        }
        else                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
        {
             $data = array('template_catid'=>$cid,
            'template_name'=>$template_name,
            'description'=>$description);

                $this->session->set_flashdata("success","Template Update Successfully");
                $this->db->update('template_listing',$data,$where);
                redirect(base_url()."TemplateList"); 
        }
    }
}