<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SectorWiseStartup extends CI_Controller {


    public function index() {

        $sector = $_GET['verticals_sectors'];
      
        $where = array('action'=>'accept','delstatus'=>1,'is_screened'=>1,'is_graduate'=>0,'verticals_sectors'=>$sector);
     
        $data['startups'] = $this->db->get_where("startup",$where)->result();

        $this->load->view('pages/SectorWiseStartup', $data);
    }

   
}