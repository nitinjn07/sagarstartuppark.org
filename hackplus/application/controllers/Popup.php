<?php if (!defined('BASEPATH'))exit('No direct script access allowed');


class Popup extends CI_Controller 
{

    function __construct() {
        parent::__construct();
    }

    public function index($page_name='', $param= '')
    {       
        $data['param'] = $param;
        $this->load->view('pages/'.$page_name.'.php', $data);
    }

}
?>