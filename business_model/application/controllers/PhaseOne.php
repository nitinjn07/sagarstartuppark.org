<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhaseOne extends CI_Controller {
    

    public function BasicInforamtion()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'business_name'=>$bname,
        'address'=>$address,
        'city'=>$city,
        'state'=>$state,
        'zip_code'=>$zipcode,
        'est_month'=>$est_month,
        'est_year'=>$est_year,
        'short_goal'=>$short_goal,
        'long_goal'=>$long_goal,
        'mission_stm'=>$mission_stm,
        'market_place'=>$market_place,
        'pitch'=>$pitch);

        $rs = $this->db->get_where('basic_information',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('basic_information',$data);
            redirect(base_url().'business-information');
            
        }
        else 
        {
            $this->db->insert('basic_information',$data);
            redirect(base_url().'contact-information');
        }
    }
    public function ContactInformation()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'telephone'=>$tel,
        'email'=>$email,
        'website'=>$website);

        $rs = $this->db->get_where('business_contact',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('business_contact',$data);
            redirect(base_url().'contact-information');
            
        }
        else 
        {
            $this->db->insert('business_contact',$data);
            redirect(base_url().'business-formation');
        }
    }
    public function BusinessFormation()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'entity_type'=>$entity_type);

        $rs = $this->db->get_where('business_formation',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('business_formation',$data);
            redirect(base_url().'business-formation');
            
        }
        else 
        {
            $this->db->insert('business_formation',$data);
            redirect(base_url().'business-operation');
        }
    }
    public function BusinessOperation()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'state_of_opt'=>$state_of_opt);

        $rs = $this->db->get_where('business_operation',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('business_operation',$data);
            redirect(base_url().'business-operation');
            
        }
        else 
        {
            $this->db->insert('business_operation',$data);
            redirect(base_url().'business-operation');
        }
    }
    public function Founders()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'founder_name'=>$founder_name,
        'founder_background'=>$founder_background,
        'co_name_one'=>$co_name_one,
        'co_background_one'=>$co_background_one,
        'co_name_two'=>$co_name_two,
        'co_background_two'=>$co_background_two);

        $rs = $this->db->get_where('founders',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('founders',$data);
            redirect(base_url().'founders');
            
        }
        else 
        {
            $this->db->insert('founders',$data);
            redirect(base_url().'business-partner');
        }
    }
    public function BusinessPartner()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'name_one'=>$name_one,
        'importance_one'=>$importance_one,
        'activity_one'=>$activity_one,
        'name_one'=>$name_one,
        'importance_one'=>$importance_one,
        'activity_one'=>$activity_one);

        $rs = $this->db->get_where('business_partner',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('business_partner',$data);
            redirect(base_url().'business-partner');
            
        }
        else 
        {
            $this->db->insert('business_partner',$data);
            redirect(base_url().'business-advisor');
        }
    }
    public function BusinessAdvisor()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'name_one'=>$name_one,
        'role_one'=>$role_one,
        'name_two'=>$name_two,
        'role_two'=>$role_two);

        $rs = $this->db->get_where('promoters_advisor',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('promoters_advisor',$data);
            redirect(base_url().'business-advisor');
            
        }
        else 
        {
            $this->db->insert('promoters_advisor',$data);
            redirect(base_url().'value-propositions');
        }
    }
    public function ValuePropositions()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'industry'=>$industry,
        'name'=>$name,
        'description'=>$description,
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3,
        'q4'=>$q4,
        'q5'=>$q5,
        'q6'=>$q6,
        'offer'=>$offer);

        $rs = $this->db->get_where('value_propositions',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('value_propositions',$data);
            redirect(base_url().'value-propositions');
            
        }
        else 
        {
            $this->db->insert('value_propositions',$data);
            redirect(base_url().'customer-segment');
        }
    }
    public function CustomerSegment()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'target_customer'=>$target_customer,
        'location'=>$location,
        'age'=>$age,
        'occupation'=>$occupation,
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3,
        'q4'=>$q4,
        'q5'=>$q5);

        $rs = $this->db->get_where('customer_segment',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('customer_segment',$data);
            redirect(base_url().'customer-segment');
            
        }
        else 
        {
            $this->db->insert('customer_segment',$data);
            redirect(base_url().'distribution-channel');
        }
    }
    public function DistributionChannel()
    {
        extract($_POST);
        if(empty($dm))
        {
            $dm = [];
        }
        $data = array('uid'=>$_SESSION['uid'],
        'distribution_method'=>implode(",",$dm),     
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3);

        $rs = $this->db->get_where('distribution_channel',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('distribution_channel',$data);
            redirect(base_url().'distribution-channel');
            
        }
        else 
        {
            $this->db->insert('distribution_channel',$data);
            redirect(base_url().'revenue-stream');
        }
    }

    public function RevenueStream()
    {
        extract($_POST);
        
        $data = array('uid'=>$_SESSION['uid'],      
        'model'=>$revenue);

        $rs = $this->db->get_where('revenue_model',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('revenue_model',$data);
            redirect(base_url().'revenue-stream');
            
        }
        else 
        {
            $this->db->insert('revenue_model',$data);
            redirect(base_url().'price-strategy');
        }
    }

    public function PriceStrategy()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3,
        'q4'=>$q4,
        'q5'=>$q5,
        'q6'=>$q6,
        'q7'=>$q7);

        $rs = $this->db->get_where('pricing_strategy',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('pricing_strategy',$data);
            redirect(base_url().'price-strategy');
            
        }
        else 
        {
            $this->db->insert('pricing_strategy',$data);
            redirect(base_url().'competitive-analysis');
        }
    }
    public function CompetitiveAnalysis()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'com1'=>$com1,
        'com2'=>$com2,
        'com3'=>$com3,
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3,
        'q4'=>$q4);

        $rs = $this->db->get_where('competitive_analysis',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('competitive_analysis',$data);
            redirect(base_url().'competitive-analysis');
            
        }
        else 
        {
            $this->db->insert('competitive_analysis',$data);
            redirect(base_url().'key-resource');
        }
    }


    public function KeyResource()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3,
        'q4'=>$q4,
        'q5'=>$q5,
        'q6'=>$q6,
        'q7'=>$q7,
        'q8'=>$q8);

        $rs = $this->db->get_where('key_resources',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('key_resources',$data);
            redirect(base_url().'key-resource');
            
        }
        else 
        {
            $this->db->insert('key_resources',$data);
            redirect(base_url().'key-activity');
        }
    }


    public function KeyActivity()
    {
        extract($_POST);

        $data = array('uid'=>$_SESSION['uid'],
        'q1'=>$q1,
        'q2'=>$q2,
        'q3'=>$q3);

        $rs = $this->db->get_where('key_activity',array('uid'=>$_SESSION['uid']));

        if($rs->num_rows()>0)
        {
            $this->db->where('uid',$_SESSION['uid'])->update('key_activity',$data);
            redirect(base_url().'key-activity');
            
        }
        else 
        {
            $this->db->insert('key_activity',$data);
            redirect(base_url().'key-activity');
        }
    }
    
}