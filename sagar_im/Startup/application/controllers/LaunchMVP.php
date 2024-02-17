<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaunchMVP extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }
   public function index()
   {
      $this->load->view('pages/launch-mvp');
   }
   public function MVPList()
   {
      
        $this->load->view('pages/mvp-list');
     
   }
   public function CustomerList()
   {
      
      $this->load->view('pages/customer-list');
   }
    
   public function SaveMVP()
   {
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    
    $data =array(
                'startupid'=>$startup->id,
                 'name'=>$product_name,
                'short_desc'=>$short_description,
                'mvp_test_start_date'=>$mvp_test_start_date,
                'mvp_test_end_date'=>$mvp_test_end_date,
                'f1_name'=>$f1_name,
                'f1_short_desc'=>$f1_short_desc,
                'f1_s1'=>$f1_s1,
                'f1_s2'=>$f1_s2,
                'f1_s3'=>$f1_s3,
                'f1_s4'=>$f1_s4,
                'f2_name'=>$f2_name,
                'f2_short_desc'=>$f2_short_desc,
                'f2_s1'=>$f2_s1,
                'f2_s2'=>$f2_s2,
                'f2_s3'=>$f2_s3,
                'f2_s4'=>$f2_s4,
                'f3_name'=>$f3_name,
                'f3_short_desc'=>$f3_short_desc,
                'f3_s1'=>$f3_s1,
                'f3_s2'=>$f3_s2,
                'f3_s3'=>$f3_s3,
                'f3_s4'=>$f3_s4,
                'f4_name'=>$f4_name,
                'f4_short_desc'=>$f4_short_desc,
                'f4_s1'=>$f4_s1,
                'f4_s2'=>$f4_s2,
                'f4_s3'=>$f4_s3,
                'f4_s4'=>$f4_s4,
                'video_link'=>$video_link            
            );

     $rs = $this->db->insert('mvp',$data);

     if($rs)
     {
        $this->session->set_flashdata('success',"MVP Create Successfully");
        redirect(base_url().'LaunchMVP');
     }
     else 
     {
        $this->session->set_flashdata('failed',"MVP Not Created");
        redirect(base_url().'LaunchMVP');
     }
   }


   public function UpdateMVP()
   {
    extract($_POST);

    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();

    $where = array('startupid',$startup->id);
    
    $data =array('name'=>$product_name,
                'short_desc'=>$short_description,
                'mvp_test_start_date'=>$mvp_test_start_date,
                'mvp_test_end_date'=>$mvp_test_end_date,
                'f1_name'=>$f1_name,
                'f1_short_desc'=>$f1_short_desc,
                'f1_s1'=>$f1_s1,
                'f1_s2'=>$f1_s2,
                'f1_s3'=>$f1_s3,
                'f1_s4'=>$f1_s4,
                'f2_name'=>$f2_name,
                'f2_short_desc'=>$f2_short_desc,
                'f2_s1'=>$f2_s1,
                'f2_s2'=>$f2_s2,
                'f2_s3'=>$f2_s3,
                'f2_s4'=>$f2_s4,
                'f3_name'=>$f3_name,
                'f3_short_desc'=>$f3_short_desc,
                'f3_s1'=>$f3_s1,
                'f3_s2'=>$f3_s2,
                'f3_s3'=>$f3_s3,
                'f3_s4'=>$f3_s4,
                'f4_name'=>$f4_name,
                'f4_short_desc'=>$f4_short_desc,
                'f4_s1'=>$f4_s1,
                'f4_s2'=>$f4_s2,
                'f4_s3'=>$f4_s3,
                'f4_s4'=>$f4_s4,
                'video_link'=>$video_link            
            );

     $rs = $this->db->update('mvp',$data,$where);

     if($rs)
     {
        $this->session->set_flashdata('success',"MVP Update Successfully");
        redirect(base_url().'LaunchMVP/MVPList');
     }
     else 
     {
        $this->session->set_flashdata('failed',"MVP Not Updated");
        redirect(base_url().'LaunchMVP/MVPList');
     }
   }

   public function EditMVP()
   {
    $this->load->view('pages/edit-mvp');
   }
   public function UploadCustomer()
   {
      $this->load->view('pages/upload-customer');
   }

   public function SaveCustomerCSV()
   {
      extract($_POST);
      $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
      if($_FILES['csv_file']['name']!="")
        {
            $temp = explode(".", $_FILES["csv_file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            
            $config['upload_path'] = './uploads/customer_csv/';
            
            $config['allowed_types'] = 'csv';
            
            $config['file_name'] = $newfilename;
        
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('csv_file'))
            {                
                $this->session->set_flashdata("failed","File not uploaded");
                redirect(base_url()."LaunchMVP/UploadCustomer"); 	
            }
            else
            {
                $data = array('startupid'=>$startup->id,
                'file_name'=>$file_name,
                'file_location'=>$newfilename);

               $this->session->set_flashdata("success","CSV Uploaded Successfull");
            $this->db->insert('mvp_customer',$data);
            redirect(base_url()."LaunchMVP/UploadCustomer"); 


            }

                    
        }
   }
   public function DeleteCustomerCSV()
   {
      $where =array('id'=>$_GET['id']);

      $data = array('delstatus'=>0);

      $rs = $this->db->update("mvp_customer",$data,$where);

      if($rs)
      {
      $this->session->set_flashdata('success',"CSV File Delete Successfully");
      redirect(base_url().'LaunchMVP/UploadCustomer');
      }
      else 
      {
      $this->session->set_flashdata('failed',"CSV File Not Delete");
      redirect(base_url().'LaunchMVP/UploadCustomer');
      }
   }

   public function SendEmail()
   {
      $this->load->view('pages/send-email-customer');
   }
   public function sendEmailCustomerNow()
   {
      $id = $_GET['id'];
     
      $file = $this->db->get_where('mvp_customer',array('id'=>$id))->row();
      
      $csv = base_url('uploads/customer_csv/').$file->file_location;

         $file = fopen('./uploads/customer_csv/'.$file->file_location,"r");

         while(! feof($file))
         {
           $data = fgetcsv($file);
           
           
           if(str_contains($data[1],"@"))
           {         
            
            $ci = get_instance();
            $ci->load->library('email');
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://smtp.gmail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "jicjabalpurofficial@gmail.com"; 
            $config['smtp_pass'] = "vgxgpdzllluzkccl  ";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";            
            $ci->email->initialize($config);            
            $ci->email->from('jicjabalpurofficial@gmail.com', 'Jabalpur Incubation Center');
            $list = array($data[1]);
            $ci->email->to($list);
            $this->email->reply_to('jicjabalpurofficial@gmail.com', 'JIC');
            $ci->email->subject('This is an email test');
            $root  = "http://".$_SERVER['HTTP_HOST'];
            $root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
            $ci->email->message('https://jicjabalpur.org/mvp-feedback?mvpid='.$id);
            $ci->email->send();          
           }
           
         }

         fclose($file);

         $this->session->set_flashdata('success',"Email Send Successfully");
         redirect(base_url().'LaunchMVP/UploadCustomer');
   }
 
 }