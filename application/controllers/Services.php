<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	
	public function index()
	{
		$data['services'] = $this->db->get('services')->result();
		$this->load->view('services', $data);
	}
}
