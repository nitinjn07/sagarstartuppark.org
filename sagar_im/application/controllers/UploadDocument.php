<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadDocument extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/upload-document');
   }
  
    public function StartupUpload()
    {
        extract($_POST); 

        $data = array('startupid'=>$startupid,
                      'elector_pitch'=>$elector_pitch,
                      'legal_reg'=>$legal_reg,
                      'reg_no'=>$reg_no,
                      'dpiit_number'=>$dpiit_number);

        if($_FILES['coi_file']['name'] != "")
        {
        $recived_file           = $_FILES['coi_file']['name'];
        $file_size              = $_FILES['coi_file']['size'];
        $file_tmp               = $_FILES['coi_file']['tmp_name'];
        $file_type              = $_FILES['coi_file']['type'];
        $path                   =  "uploads/coi/";

        $temp = explode(".", $_FILES["coi_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('coi_files'=>$recived_file);

        }
        if($_FILES['pan_file']['name'] != "")
        {
        $recived_file           = $_FILES['pan_file']['name'];
        $file_size              = $_FILES['pan_file']['size'];
        $file_tmp               = $_FILES['pan_file']['tmp_name'];
        $file_type              = $_FILES['pan_file']['type'];
        $path                   =  "uploads/pan/";

        $temp = explode(".", $_FILES["pan_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('pan_files'=>$recived_file);

        }
        if($_FILES['dpiit_file']['name'] != "")
        {
        $recived_file           = $_FILES['dpiit_file']['name'];
        $file_size              = $_FILES['dpiit_file']['size'];
        $file_tmp               = $_FILES['dpiit_file']['tmp_name'];
        $file_type              = $_FILES['dpiit_file']['type'];
        $path                   =  "uploads/dpiit/";

        $temp = explode(".", $_FILES["dpiit_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('dpiit_files'=>$recived_file);

        }
        if($_FILES['msme_file']['name'] != "")
        {
        $recived_file           = $_FILES['msme_file']['name'];
        $file_size              = $_FILES['msme_file']['size'];
        $file_tmp               = $_FILES['msme_file']['tmp_name'];
        $file_type              = $_FILES['msme_file']['type'];
        $path                   =  "uploads/msme/";

        $temp = explode(".", $_FILES["msme_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('msme_files'=>$recived_file);

        }
        if($_FILES['incubation_file']['name'] != "")
        {
        $recived_file           = $_FILES['incubation_file']['name'];
        $file_size              = $_FILES['incubation_file']['size'];
        $file_tmp               = $_FILES['incubation_file']['tmp_name'];
        $file_type              = $_FILES['incubation_file']['type'];
        $path                   =  "uploads/incubationfile/";

        $temp = explode(".", $_FILES["incubation_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('incubation_files'=>$recived_file);

        }
       
        $rs = $this->db->insert('startupupload',$data);
        if($rs>0)
        {
            $this->session->set_flashdata('success',"Startup File Upload Successful");
            redirect(base_url().'UploadDocument');
        }
        

    }

    public function StartupUploadUpdate()
    {
        extract($_POST); 

        $where = array('id'=>$_GET['id']);

        $data = array('startupid'=>$startupid,
                      'elector_pitch'=>$elector_pitch,
                      'legal_reg'=>$legal_reg,
                      'reg_no'=>$reg_no,
                      'dpiit_number'=>$dpiit_number);

        if($_FILES['coi_file']['name'] != "")
        {
        $recived_file           = $_FILES['coi_file']['name'];
        $file_size              = $_FILES['coi_file']['size'];
        $file_tmp               = $_FILES['coi_file']['tmp_name'];
        $file_type              = $_FILES['coi_file']['type'];
        $path                   =  "uploads/coi/";

        $temp = explode(".", $_FILES["coi_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('coi_files'=>$recived_file);

        }
        if($_FILES['pan_file']['name'] != "")
        {
        $recived_file           = $_FILES['pan_file']['name'];
        $file_size              = $_FILES['pan_file']['size'];
        $file_tmp               = $_FILES['pan_file']['tmp_name'];
        $file_type              = $_FILES['pan_file']['type'];
        $path                   =  "uploads/pan/";

        $temp = explode(".", $_FILES["pan_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('pan_files'=>$recived_file);

        }
        if($_FILES['dpiit_file']['name'] != "")
        {
        $recived_file           = $_FILES['dpiit_file']['name'];
        $file_size              = $_FILES['dpiit_file']['size'];
        $file_tmp               = $_FILES['dpiit_file']['tmp_name'];
        $file_type              = $_FILES['dpiit_file']['type'];
        $path                   =  "uploads/dpiit/";

        $temp = explode(".", $_FILES["dpiit_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('dpiit_files'=>$recived_file);

        }
        if($_FILES['msme_file']['name'] != "")
        {
        $recived_file           = $_FILES['msme_file']['name'];
        $file_size              = $_FILES['msme_file']['size'];
        $file_tmp               = $_FILES['msme_file']['tmp_name'];
        $file_type              = $_FILES['msme_file']['type'];
        $path                   =  "uploads/msme/";

        $temp = explode(".", $_FILES["msme_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('msme_files'=>$recived_file);

        }
        if($_FILES['incubation_file']['name'] != "")
        {
        $recived_file           = $_FILES['incubation_file']['name'];
        $file_size              = $_FILES['incubation_file']['size'];
        $file_tmp               = $_FILES['incubation_file']['tmp_name'];
        $file_type              = $_FILES['incubation_file']['type'];
        $path                   =  "uploads/incubationfile/";

        $temp = explode(".", $_FILES["incubation_file"]["name"]);
        $newfilename =  time().'.' . end($temp);

        move_uploaded_file($file_tmp, $path.$newfilename);

        $recived_file     =  $path.$newfilename;

        $data += array('incubation_files'=>$recived_file);

        }
       
        $rs = $this->db->update('startupupload',$data,$where);
        if($rs>0)
        {
            $this->session->set_flashdata('success',"Update Successful");
            redirect(base_url().'UploadedList');
        }
        

    }


}