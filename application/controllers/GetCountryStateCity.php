<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetCountryStateCity extends CI_Controller {

	
	public function getState()
	{
        $im = $this->load->database('imdb', TRUE); 
        $id = $_GET['country_id'];
        
        $state = $im->get_where('states',array('country_id'=>$id))->result();
        foreach($state as $s)
        {
              echo "<option value='".$s->id."'>".$s->name."</option>";
        }
        
	}

      public function getCity()
	{
            $im = $this->load->database('imdb', TRUE);
        $id = $_GET['state_id'];       
        
        $city = $im->get_where('cities',array('state_id'=>$id))->result();      
        
        foreach($city as $c)
        {
              echo "<option value='".$c->id."'>".$c->name."</option>";
        }
        
	}
}