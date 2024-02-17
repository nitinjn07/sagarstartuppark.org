<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function index()
	{
		 $qa['qa']=$this->Model->selectData('questionans');    
         $this->load->view('Admin/question',$qa);
        
	}

	public function saveQuestion()
	{
          extract($_POST);
          $data = array('question'=>$question,
                        'answer'=>$answer);

          $rs = $this->Model->insertData('questionans',$data); 

          if($rs)
          {
			 
         	 echo "<script> alert('Save Question Successsful'); window.location.href='../Question'; </script>";
          }

	}
	public function deleteQuestion()
	{
	$id = $_GET['delid'];

	$where = array('qid'=>$id);

	$rs = $this->Model->deleteData('questionans',$where);

	if($rs)
	{
	 echo "<script> alert('Delete Question Successful'); window.location.href='../Question'; </script>";
	}
	}
	
}
