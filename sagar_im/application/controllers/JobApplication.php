   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobApplication extends CI_Controller {
   
   public function index()
   {
       $this->load->view('pages/job-application-list');
   }
   public function deleteJobApplication()
   {
      $where = array('id'=>$_GET['delid']);

      $rs = $this->db->delete('application_form',$where);

      if($rs)
      {
        $this->session->set_flashdata("success","Delete Job Listing Successful");
        redirect(base_url().'JobApplication');
      }
   }

}