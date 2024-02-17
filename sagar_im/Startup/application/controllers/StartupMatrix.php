<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StartupMatrix extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/startup-matrix');
    }
    public function MRR()
    {
        $this->load->view('pages/mrr');
    }
    public function ARR()
    {
        $this->load->view('pages/arr');
    }
    public function CMGR()
    {
        $this->load->view('pages/cmgr');
    }
    public function Revenue()
    {
        $this->load->view('pages/revenue');
    }
    public function AverageRevenuePerUser()
    {
        $this->load->view('pages/average-revenue-per-user');
    }
    public function CustomerAcquisition()
    {
        $this->load->view('pages/customer-acquistion-cost');
    }
    public function UserRetention()
    {
        $this->load->view('pages/user-retention');
    }
    public function ProfitMargin()
    {
        $this->load->view('pages/profit-margin');
    }
    public function CustomerLifetimeValue()
    {
        $this->load->view('pages/customer-life-time-value');
    } public function ChurnRate()
    {
        $this->load->view('pages/churn-rate');
    }
    public function CashBurn()
    {
        $this->load->view('pages/cash-burn');
    }
    public function CashRunway()
    {
        $this->load->view('pages/cash-runway');
    }
    

   public function UpdateMRR()
   {
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $mrr = $apra * $no_of_active_account;
    $data = array('year'=>$year,
                  'no_of_accounts'=>$no_of_active_account,
                  'month'=>$month,
                  'apra'=>$arpa,
                  'mrr'=>$mrr,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('mrr',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('mrr',$data);
        $this->session->set_flashdata('success','MRR Update Successully');
        redirect(base_url().'StartupMatrix/MRR');
    }
    else 
    {
        $this->session->set_flashdata('failed','MRR already updated for this year and month');
        redirect(base_url().'StartupMatrix/MRR');
    }
}

public function UpdateARR()
   {
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $arr = $mrr * 12;
    $data = array('mrr'=>$mrr,
                  'arr'=>$arr,
                  'year'=>$year,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('arr',array('year'=>$year,'startup_id'=>$startup->id))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('arr',$data);
        $this->session->set_flashdata('success','ARR Update Successully');
        redirect(base_url().'StartupMatrix/ARR');
    }
    else 
    {
        $this->session->set_flashdata('failed','ARR already updated for this year ');
        redirect(base_url().'StartupMatrix/ARR');
    }
}
public function updateRevenue()
   {
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $rev = (float)$no_of_goods_sold * (float)$sale_price;
    $data = array('year'=>$year,
                  'month'=>$month,
                  'goods_sold'=>$no_of_goods_sold,
                  'sale_price'=>$sale_price,
                  'revenue'=>$rev,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('revenue',array('year'=>$year,'startup_id'=>$startup->id))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('revenue',$data);
        $this->session->set_flashdata('success','Revenue Update Successully');
        redirect(base_url().'StartupMatrix/Revenue');
    }
    else 
    {
        $this->session->set_flashdata('failed','Revenue already updated for this year and month ');
        redirect(base_url().'StartupMatrix/Revenue');
    }
}
public function updateARPU()
   {
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $arpu = (float)$total_revenue / (float)$total_customer;
    $data = array('year'=>$year,                  
                  'total_revenue'=>$total_revenue,
                  'total_customer'=>$total_customer,
                  'arpu'=>$arpu,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('arpu',array('year'=>$year,'startup_id'=>$startup->id))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('arpu',$data);
        $this->session->set_flashdata('success','Revenue Update Successully');
        redirect(base_url().'StartupMatrix/AverageRevenuePerUser');
    }
    else 
    {
        $this->session->set_flashdata('failed','Revenue already updated for this year and month ');
        redirect(base_url().'StartupMatrix/AverageRevenuePerUser');
    }
}


}