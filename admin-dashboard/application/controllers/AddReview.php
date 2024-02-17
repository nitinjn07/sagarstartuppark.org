<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddReview extends CI_Controller {

	public function index()
	{
		   
         $review['review']=$this->Model->selectData('review');
         $this->load->view('Admin/addReview',$review);
        
	}

	public function saveReview()
	{
          extract($_POST);

          
          
		$config['upload_path']          = './uploads/review';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$new_name = time().$_FILES["reviewPhoto"]['name'];
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);

		

          $data = array('Name'=>$name,'Relation'=>$relation,'Rate'=>$rate,'Review'=>$review,'Photo'=>$new_name);

         $rs = $this->Model->insertData('review',$data); 

         if($rs)
         {
			     $this->upload->do_upload('reviewPhoto');
         	 echo "<script> alert('Save Review Successsful'); window.location.href='../AddReview'; </script>";
         }

	}
  public function deleteReview()
  {
      $id = $_GET['delid'];

      $where = array('id'=>$id);

      $rs = $this->Model->deleteData('review',$where);

      if($rs)
      {
         echo "<script> alert('Delete Review Successful'); window.location.href='../AddReview'; </script>";
      }
  }
	
}
