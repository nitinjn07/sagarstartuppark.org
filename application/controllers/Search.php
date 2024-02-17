<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	
	public function index()
	{
		$this->load->view('search');
	}
	public function searchitem()
	{
	    extract($_POST);
	    
	    $search_term = $search;
	    
	    $result['result'] = $this->db->select('*')->from('sitemap')->where("title LIKE '%$search_term%'")->get()->result();
	    
	    $this->load->view('search',$result);
	}

	
}
