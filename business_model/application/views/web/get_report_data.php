<?php 
   $where = array('uid'=>$_SESSION['uid']);
   $t1 = $this->db->get_where('basic_information',$where);
   $t2 = $this->db->get_where('business_contact',$where);
   $t3 = $this->db->get_where('business_formation',$where);
   $t4 = $this->db->get_where('business_operation',$where);

   $t5= $this->db->get_where('founders',$where);
   $t6 = $this->db->get_where('business_partner',$where);
   $t7 = $this->db->get_where('promoters_advisor',$where);   
   $t8 = $this->db->get_where('value_propositions',$where);
   $t9 = $this->db->get_where('customer_segment',$where);
   $t10 = $this->db->get_where('distribution_channel',$where);

   $t11 = $this->db->get_where('revenue_model',$where);
   $t12 = $this->db->get_where('pricing_strategy',$where);
   $t13 = $this->db->get_where('competitive_analysis',$where);

   $t14 = $this->db->get_where('key_resources',$where);
   $t15 = $this->db->get_where('key_activity',$where);
   
   

   
?>