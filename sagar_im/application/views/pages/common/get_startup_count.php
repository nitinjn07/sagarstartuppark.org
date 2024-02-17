    <?php 
      
      $pending = $this->db->get_where('startup',array('action'=>'pending','delstatus'=>1))->num_rows();
      $accept = $this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>0,'startup_type'=>NULL))->num_rows();
      $physical = $this->db->get_where('startup',array('action'=>'accept','startup_type'=>'Physical','delstatus'=>1,'is_screened'=>1,'is_graduate'=>0))->num_rows();
      $physical_graduate = $this->db->get_where('startup',array('action'=>'accept','startup_type'=>'Physical','delstatus'=>1,'is_screened'=>1,'is_graduate'=>1))->num_rows();
      $virtual = $this->db->get_where('startup',array('action'=>'accept','startup_type'=>'Virtual','delstatus'=>1,'is_screened'=>1,'is_graduate'=>0))->num_rows();
      $virtual_graduate = $this->db->get_where('startup',array('action'=>'accept','startup_type'=>'Virtual','delstatus'=>1,'is_screened'=>1,'is_graduate'=>1))->num_rows();
      $women = $this->db->get_where('startup',array('action'=>'accept','is_women'=>1,'delstatus'=>1,'is_screened'=>1,'delstatus'=>1,'is_graduate'=>0))->num_rows();
      
      $reject = $this->db->get_where('startup',array('action'=>'reject'))->num_rows();
      
    ?>