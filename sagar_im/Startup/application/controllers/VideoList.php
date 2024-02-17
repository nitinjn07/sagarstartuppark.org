<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoList extends CI_Controller {

	public function index()
	{
		
		$this->load->view('pages/learning-video');
	}
    public function VideoCategoryList()
    {
        $this->load->view('pages/video-category-list');
    }
    public function VideoCategorySublist()
    {
        $this->load->view('pages/video-category-sublist');
    }
}

?>