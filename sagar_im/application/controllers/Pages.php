<?php
class Pages extends CI_Controller {

        public function view($page = 'home')
        {
            if ( ! file_exists(APPPATH.'views/web/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                   redirect(base_url().'404');
            }
            
          
            $data['page_name'] = $page; // Capitalize the first letter    
            $this->load->view('web/'.$page, $data);
            
        }

        public function startup_view()
        {
                $this->db2 = $this->load->database('imdb', TRUE);
        $url = $_SERVER['REQUEST_URI'];
        $this->path = pathinfo($url, PATHINFO_BASENAME);
        $pathFragments = explode('-', $this->path);
        $id = end($pathFragments);

        $sd['sd'] = $this->db2->get_where('startup',array('id'=>$id))->row();

        $this->load->view('web/startup-details',$sd);
        }

        public function mentor_view()
        {
                $this->db2 = $this->load->database('imdb', TRUE);
        $url = $_SERVER['REQUEST_URI'];
        $this->path = pathinfo($url, PATHINFO_BASENAME);
        $pathFragments = explode('-', $this->path);
        $id = end($pathFragments);

        $md['md'] = $this->db2->get_where('mentor',array('id'=>$id))->row();

        $this->load->view('web/mentor-details',$md);
        }

        public function invester_view()
        {
        
        $this->db2 = $this->load->database('imdb', TRUE);
        $url = $_SERVER['REQUEST_URI'];
        $this->path = pathinfo($url, PATHINFO_BASENAME);
        $pathFragments = explode('-', $this->path);
        $id = end($pathFragments);

        $md['md'] = $this->db2->get_where('investor',array('id'=>$id))->row();

        $this->load->view('web/invester-details',$md);
        }


        public function partner_view()
        {
        
        $this->db2 = $this->load->database('imdb', TRUE);
        $url = $_SERVER['REQUEST_URI'];
        $this->path = pathinfo($url, PATHINFO_BASENAME);
        $pathFragments = explode('-', $this->path);
        $id = end($pathFragments);

        $md['md'] = $this->db2->get_where('partner',array('id'=>$id))->row();

        $this->load->view('web/partner-details',$md);
        }



}
?>