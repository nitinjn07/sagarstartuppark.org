<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KraReport extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->output->delete_cache();
    }

    public function index()
    {
        $this->load->view('pages/kra-report');
    }
    
    public function getKraDetails()
    {
        $sid = $_POST['sid'];

        $kra = $this->db->get_where('set_kra',array('is_review'=>0,'startupid'=>$sid))->result();

        foreach($kra as $k)
        {
            echo "<option value=".$k->id.">".$k->title."</option>";
        }
    }
 }