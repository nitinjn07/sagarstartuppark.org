<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StartupPublic extends CI_Controller {
    public function index() {       
        $this->load->view('pages/startup-public-profile');
    }
    public function savePublicProfile()
    {
        extract($_POST);

        $data = array('startupid'=>$startupid,
                      'founder_name'=>$founder_name,
                      'short_description'=>$short_description,
                      'product_services'=>$product_services,
                      'msg_peer_startup'=>$msg_peer_startup,
                      'msg_to_share'=>$msg_to_share,
                      'website'=>$website,
                      'facebook'=>$facebook,
                      'linkedin'=>$linkedin,
                      'youtube'=>$youtube,
                      'twitter'=>$twitter,
                      'instagram'=>$instagram);

        
        $rs = $this->db->get_where('public_profile',array('startupid'=>$startupid))->num_rows();
        
        if($rs==0)
        {
             $this->db->insert('public_profile',$data);
             $this->session->set_flashdata('success',"Public Profile Submit Successfully");
             redirect(base_url().'StartupPublic');       
        }
        else 
        {
            $this->db->update('public_profile',$data,array('startupid'=>$startupid));
            $this->session->set_flashdata('success',"Public Profile Update Successfully");
            redirect(base_url().'StartupPublic');  
        }


    }
    
}