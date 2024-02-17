<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	
	public function index()
	{
		$data['events'] = $this->db->order_by('evtDate','desc')->get('events')->result();
		$this->load->view('blog', $data);
	}
}
