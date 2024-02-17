<?php defined('BASEPATH') OR exit('No direct script access allowed');

class StartupMetrics extends CI_Controller {

    public function index() {
       
        $this->load->view('pages/startup-metrics');
    }
    public function CAC()
    {
        $this->load->view('pages/customer-acquistion-cost');
    }
    public function MRR()
    {
        $this->load->view('pages/mrr-list');
    }
    public function delMRR()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('mrr',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/MRR');
        }
    }
    public function ARR()
    {
        $this->load->view('pages/arr');
    }
     public function delARR()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('arr',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/ARR');
        }
    }
    public function CMGR()
    {
        $this->load->view('pages/cmgr');
    }
     public function delCMGR()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('cmgr',$data,$where);
        if($rs)
        {
            redirect(base_url().'cmgr');
        }
    }
    public function Revenue()
    {
        $this->load->view('pages/revenue');
    }
    
    public function AverageRevenuePerUser()
    {
        $this->load->view('pages/average-revenue-per-user');
    }
     public function delARPU()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('arpu',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/AverageRevenuePerUser');
        }
    }
    public function CustomerAcquisition()
    {
        $this->load->view('pages/customer-acquistion-cost');
    }
     public function delCAC()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('cac',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/CustomerAcquisition');
        }
    }
    public function UserRetention()
    {
        $this->load->view('pages/user-retention');
    }
     public function delUserRetention()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('user_retention',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/UserRetention');
        }
    }
    public function ProfitMargin()
    {
        $this->load->view('pages/profit-margin');
    }
    public function CustomerLifetimeValue()
    {
        $this->load->view('pages/customer-life-time-value');
    }
   
    
    public function SalesTarget()
    {
        $this->load->view('pages/sales-chart-target');
    }
     public function delSalesTarget()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('sales_target',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/SalesTarget');
        }
    }
    public function EBITDA()
    {
        $this->load->view('pages/ebitda');
    }
     public function delEBITDA()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('ebitda',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/EBITDA');
        }
    }
    public function CashBurnRate()
    {
        $this->load->view('pages/cash-burn-rate');
    }
    
    public function CashRunWay()
    {
        $this->load->view('pages/cash-runway');
    }
     public function delCashRunWay()
    {
        $where = array('id'=>$_GET['id']);
        $data = array('status'=>0);
        
        $rs = $this->db->update('cashrunway',$data,$where);
        if($rs)
        {
            redirect(base_url().'StartupMetrics/CashRunWay');
        }
    }
    public function CashBurnProjection()
    {
        $this->load->view('pages/cash-burn-projection');
    }

   public function UpdateMRR()
   {
   
    extract($_POST);
   
    
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $mrr = $arpa*$no_of_active_account;

    

  
    $data = array('year'=>$year,
                  'no_of_accounts'=>$no_of_active_account,
                  'month'=>$month,
                  'apra'=>$arpa,
                  'mrr'=>$mrr,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('mrr',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('mrr',$data);
        $this->session->set_flashdata('success','MRR Update Successully');
        redirect(base_url().'StartupMetrics/MRR');
    }
    else 
    {
        $this->session->set_flashdata('failed','MRR already updated for this year and month');
        redirect(base_url().'StartupMetrics/MRR');
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

    $check = $this->db->get_where('arr',array('year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('arr',$data);
        $this->session->set_flashdata('success','ARR Update Successully');
        redirect(base_url().'StartupMetrics/ARR');
    }
    else 
    {
        $this->session->set_flashdata('failed','ARR already updated for this year ');
        redirect(base_url().'StartupMetrics/ARR');
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

    $check = $this->db->get_where('arpu',array('year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('arpu',$data);
        $this->session->set_flashdata('success','Revenue Update Successully');
        redirect(base_url().'StartupMetrics/AverageRevenuePerUser');
    }
    else 
    {
        $this->session->set_flashdata('failed','Revenue already updated for this year and month ');
        redirect(base_url().'StartupMetrics/AverageRevenuePerUser');
    }
}


public function updateCAC()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
   
    if($new_customer==0)
    {
        $new_customer = 1;
    }

    $cac = ((int)$cost_sale+(int)$cost_marketing)/(int)$new_customer;
   
    $data = array('year'=>$year,                  
                  'cost_of_sale'=>$cost_sale,
                  'total_exp'=>$cost_marketing,
                  'new_customer'=>$new_customer,
                  'cac'=>$cac,
                  'month'=>$month,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('cac',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('cac',$data);
        $this->session->set_flashdata('success','CustomerAcquisition Update Successully');
        redirect(base_url().'StartupMetrics/CAC');
    }
    else 
    {
        $this->db->update('cac',$data,array('year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Customer Acquisition already updated for this year');
        redirect(base_url().'StartupMetrics/CAC');
    }
}

public function updateEbitda()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
    
    
    $ebitda = (int)$netincome+(int)$interest+(int)$tax+(int)$depreciation+(int)$amortization;
   
    $data = array('year'=>$year,                  
                  'netincome'=>$netincome,
                  'interest'=>$interest,
                  'tax'=>$tax,
                  'depreciation'=>$depreciation,
                  'amortization'=>$amortization,
                  'ebitda'=>$ebitda,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('ebitda',array('year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('ebitda',$data);
        $this->session->set_flashdata('success','EBITDA Update Successully');
        redirect(base_url().'StartupMetrics/EBITDA');
    }
    else 
    {
        $this->db->update('ebitda',$data,array('year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','EBITDA already updated for this year ');
        redirect(base_url().'StartupMetrics/EBITDA');
    }
}

public function updateSaleTarget()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
   
    $data = array('year'=>$year,                  
                  'target_sale'=>$target_sale,
                  'month'=>$month,
                  'net_sale'=>$net_sale,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('sales_target',array('year'=>$year,'startup_id'=>$startup->id,'month'=>$month,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('sales_target',$data);
        $this->session->set_flashdata('success','Sales Target Update Successully');
        redirect(base_url().'StartupMetrics/SalesTarget');
    }
    else 
    {
        $this->db->update('sales_target',$data,array('year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Sales Target  already updated for this year ');
        redirect(base_url().'StartupMetrics/SalesTarget');
    }
}


public function updateCashBurn()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
    
    
    if($start_capital>$end_capital)
    {
        $burn_rate = $end_capital;
    }
    else 
    {
        $burn_rate = $start_capital - $end_capital;
    }
   
    $data = array('month'=>$month, 
                  'year'=>$year,                 
                  'starting_capital'=>$start_capital,
                  'ending_capital'=>$end_capital,
                  'burn_rate'=>$burn_rate,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('burn_rate',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('burn_rate',$data);
        $this->session->set_flashdata('success','Cash Burn Rate Update Successully');
        redirect(base_url().'StartupMetrics/CashBurnRate');
    }
    else 
    {
        $this->db->update('burn_rate',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Cash Burn Rate  already updated for this month ');
        redirect(base_url().'StartupMetrics/CashBurnRate');
    }
}


public function updateRunWay()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
   
    if($burn_rate==0)
    {
        $burn_rate = 1;
    }


    $runway = (int)$cash_in_hand/(int)$burn_rate;
   
    $data = array('month'=>$month, 
                  'year'=>$year,                 
                  'cash_in_hand'=>$cash_in_hand,
                  'burn_rate'=>$burn_rate,
                  'runway'=>$runway,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('cashrunway',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('cashrunway',$data);
        $this->session->set_flashdata('success','Cash Runway Update Successully');
        redirect(base_url().'StartupMetrics/CashRunWay');
    }
    else 
    {
        $this->db->update('cashrunway',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Cash Runway already updated for this month ');
        redirect(base_url().'StartupMetrics/CashRunWay');
    }
}
public function delBurnProjection()
{
    $where = array('id'=>$_GET['id']);

    $data = array('status'=>0);

    $rs = $this->db->update('cash_burn_projection',$data,$where);

    if($rs)
    {
        $this->session->set_flashdata('success','Cash Burn Projection Update Successully');
        redirect(base_url().'StartupMetrics/CashBurnProjection');
    }
    else 
    {
        $this->session->set_flashdata('failed','Cash Burn Projection Not Updated');
        redirect(base_url().'StartupMetrics/CashBurnProjection');
    }
}
public function updateCashProjection()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
   
    $data = array('year'=>@$year,                  
                  'burn_projection'=>@$burn_projection,
                  'month'=>@$month,
                  'net_burn'=>@$net_burn,
                  'startup_id'=>@$startup->id);

    $check = $this->db->get_where('cash_burn_projection',array('year'=>$year,'startup_id'=>$startup->id,'month'=>$month,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('cash_burn_projection',$data);
        $this->session->set_flashdata('success','Cash Burn Update Successully');
        redirect(base_url().'StartupMetrics/CashBurnProjection');
    }
    else 
    {
        $this->db->update('cash_burn_projection',$data,array('year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Cash Burn already updated for this year ');
        redirect(base_url().'StartupMetrics/CashBurnProjection');
    }
}
public function CLVList()
{
    $this->load->view('pages/clv');
}
public function updateCLV()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();

     

    $clv = $avg_sale * $avg_transaction * $avg_customer_lifespan;

    $data = array('year'=>$year,
                  'month'=>$month,
                  'avg_sale'=>$avg_sale,
                  'avg_transaction'=>$avg_transaction,
                  'avg_customer_lifespan'=>$avg_customer_lifespan,
                  'clv'=>$clv,
                  'startup_id'=>$startup->id);

    
                  $check = $this->db->get_where('clv',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
                  if($check==0)
                  {
                      $this->db->insert('clv',$data);
                      $this->session->set_flashdata('success','CLV Update Successully');
                      redirect(base_url().'StartupMetrics/CLVList');
                  }
                  else 
                  {
                      $this->db->update('clv',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
                      $this->session->set_flashdata('failed','CLV  already updated for this month ');
                      redirect(base_url().'StartupMetrics/CLVList');
                  }


}
public function delCLV()
{
    $where = array('id'=>$_GET['id']);

    $data = array('status'=>0);

    $rs = $this->db->update('clv',$data,$where);

    if($rs)
    {
        $this->session->set_flashdata('success','CLV delete Successully');
        redirect(base_url().'StartupMetrics/CLVList');
    }
    else 
    {
        $this->session->set_flashdata('failed','CLV Not Updated');
        redirect(base_url().'StartupMetrics/CLVList');
    }
}
public function GrossList()
{
    $this->load->view('pages/gross-revenue-list');    
}
public function updateGross()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    

    $gross = $sold_goods * $item_price;

    
    $data = array('year'=>$year,
                  'month'=>$month,
                  'no_goods_sold'=>$sold_goods,
                  'price_per_item'=>$item_price,
                  'gross'=>$gross,
                  'startup_id'=>$startup->id,
                  'gross'=>$gross);

    
                  $check = $this->db->get_where('gross_revenue',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
                  if($check==0)
                  {
                      $this->db->insert('gross_revenue',$data);
                      $this->session->set_flashdata('success','Gross Revenue Update Successully');
                      redirect(base_url().'StartupMetrics/GrossList');
                  }
                  else 
                  {
                      $this->db->update('gross_revenue',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
                      $this->session->set_flashdata('failed','Gross Revenue  already updated for this month ');
                      redirect(base_url().'StartupMetrics/GrossList');
                  }


}


public function ChurnRateList()
{
    $this->load->view('pages/churn-rate-list');
}
public function updateChurnRate()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
     
    if($total_customer==0)
    {
        $total_customer = 1;
    } 

    $churnrate = ($lost_customer / $total_customer)*100;


    $data = array('year'=>$year,
    'month'=>$month,
    'lost_customer'=>$lost_customer,
    'total_customer'=>$total_customer,
    'churn_rate'=>$churnrate,
    'startup_id'=>$startup->id);


    $check = $this->db->get_where('churn_rate',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();

    if($check==0)
    {
    $this->db->insert('churn_rate',$data);
    $this->session->set_flashdata('success','Churn Rate Update Successully');
    redirect(base_url().'StartupMetrics/ChurnRateList');
    }
    else 
    {
    $this->db->update('churn_rate',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
    $this->session->set_flashdata('failed','Churn Rate  already updated for this month ');
    redirect(base_url().'StartupMetrics/ChurnRateList');
    } 
}
public function delChurnRate()
{
    $where = array('id'=>$_GET['id']);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    

    $data = array('status'=>0);

    $rs = $this->db->update('churn_rate',$data,$where);

    if($rs)
    {
        $this->session->set_flashdata('success','Churn Rate delete Successully');
        redirect(base_url().'StartupMetrics/ChurnRateList');
    }
    else 
    {
        $this->session->set_flashdata('failed','Churn Rate Not Updated');
        redirect(base_url().'StartupMetrics/ChurnRateList');
    }
    
}

//Cash Burn
public function updateCashBurnRate()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
   
    

    if($start_capital>$end_capital)
    {
        $burn_rate = $end_capital;
    }
    else 
    {
        $burn_rate = $start_capital - $end_capital;
    }
   
    $data = array('month'=>$month, 
                  'year'=>$year,                 
                  'starting_capital'=>$start_capital,
                  'ending_capital'=>$end_capital,
                  'burn_rate'=>$burn_rate,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('burn_rate',array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('burn_rate',$data);
        $this->session->set_flashdata('success','Burn Rate Update Successully');
        redirect(base_url().'StartupMetrics/BurnRateList');
    }
    else 
    {
        $this->db->update('burn_rate',$data,array('month'=>$month,'year'=>$year,'startup_id'=>$startup->id));
        $this->session->set_flashdata('failed','Burn Rate  already updated for this month ');
        redirect(base_url().'StartupMetrics/BurnRateList');
    }
}
public function BurnRateList()
{

    $this->load->view('pages/burn-rate-list');
}
public function delBurnRate()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('burn_rate',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/BurnRateList');
    }
}

// End of Cash Burn



public function RevenueList()
{
    $this->load->view('pages/revenue-list');
}
public function updateRevenue()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    
    
    $rev = (int)$gross-(int)$direct_expense;


    $data = array('year'=>$year,
                  'month'=>$month,
                  'gross'=>$gross,                  
                  'direct_expense'=>$direct_expense,
                  'revenue'=>$rev,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('revenue',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('revenue',$data);
        $this->session->set_flashdata('success','Revenue Update Successully');
        redirect(base_url().'StartupMetrics');
    }
    else 
    {
        $this->session->set_flashdata('failed','Revenue already updated for this year and month ');
        redirect(base_url().'StartupMetrics');
    }
}

public function delRevenue()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('revenue',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/RevenueList');
    }
}

public function delGrossRevenue()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('gross_revenue',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/GrossList');
    }
}
public function GrossProfitList()
{
    $this->load->view('pages/gross-profit-list');
}
public function updateGrossProfit()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    $gross_profit = $net_revenue-$goods_sold;
    
    $data = array('year'=>$year,
                  'month'=>$month,
                  'net_revenue'=>$net_revenue,
                  'goods_sold'=>$goods_sold,
                  'gross_profit'=>$gross_profit,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('gross_profit',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('gross_profit',$data);
        $this->session->set_flashdata('success','Gross Profit Update Successully');
        redirect(base_url().'StartupMetrics');
    }
    else 
    {
        $this->session->set_flashdata('failed','Gross Profit already updated for this year and month ');
        redirect(base_url().'StartupMetrics');
    }
}
public function delGrossProfit()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('gross_profit',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/GrossProfitList');
    }
}
public function updateOperatingProfit()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
    
    $operating_profit = $core_operation_revenue-$goods_sold_cost-$depreciation_exp-$operating_exp-$amortization_exp;
    
    $data = array('year'=>$year,
                  'month'=>$month,
                  'core_operation_revenue'=>$core_operation_revenue,
                  'goods_sold_cost'=>$goods_sold_cost,
                  'operating_exp'=>$operating_exp,
                  'amortization_exp'=>$amortization_exp,
                  'depreciation_exp'=>$depreciation_exp,
                  'operating_profit'=>$operating_profit,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('operating_profit',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('operating_profit',$data);
        $this->session->set_flashdata('success','Operating Profit Update Successully');
        redirect(base_url().'StartupMetrics');
    }
    else 
    {
        $this->session->set_flashdata('failed','Operating Profit already updated for this year and month ');
        redirect(base_url().'StartupMetrics');
    }
}

public function OperatingProfitList()
{
    $this->load->view('pages/operating-profit-list');
}

public function delOperatingProfit()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('operating_profit',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/OperatingProfitList');
    }
}

public function updateGrossProfitMargin()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();    
    
  
    if($total_sales==0)
    {
        $total_sales =1;
    }
    
    $gross_profit_margin = ((int)$gross_profit/(int)$total_sales)*100;      
    
    
    $data = array('year'=>$year,
                  'month'=>$month,
                  'gross_profit'=>$gross_profit,
                  'total_sales'=>$total_sales,
                  'gpm'=>$gross_profit_margin,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('gross_profit_margin',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('gross_profit_margin',$data);
        $this->session->set_flashdata('success','Gross Profit Margin Update Successully');
        redirect(base_url().'StartupMetrics/GrossProfitMarginList');
    }
    else 
    {
        $this->session->set_flashdata('failed','Gross Profit Margin already updated for this year and month ');
        redirect(base_url().'StartupMetrics/GrossProfitMarginList');
    }
}
public function GrossProfitMarginList()
{
    $this->load->view('pages/gross-profit-margin-list');
}
public function delGrossProfitMargin()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('gross_profit_margin',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/GrossProfitMarginList');
    }
}


//Operating Profit Margin

public function updateOperatingProfitMargin()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();    
    
    
    if($total_sales==0)
    {
        $total_sales =1;
    }
    
    $opm = ((int)$operating_profit/(int)$total_sales)*100;      
    $data = array('year'=>$year,
                  'month'=>$month,
                  'operating_profit'=>$operating_profit,
                  'total_sales'=>$total_sales,
                  'opm'=>$opm,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('operating_profit_margin',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('operating_profit_margin',$data);
        $this->session->set_flashdata('success','Operating Profit Margin Update Successully');
        redirect(base_url().'StartupMetrics/OperatingProfitMarginList');
    }
    else 
    {
        $this->session->set_flashdata('failed','Operating Profit Margin already updated for this year and month ');
        redirect(base_url().'StartupMetrics/OperatingProfitMarginList');
    }
}
public function OperatingProfitMarginList()
{
    $this->load->view('pages/operating-profit-margin-list');
}



public function delOperatingProfitMargin()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('operating_profit_margin',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/OperatingProfitMarginList');
    }
}




public function updateNetProfitMargin()
{
    extract($_POST);
    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();    
    
   
    if($total_revenue==0)
    {
        $total_revenue =1;
    }
    $npm = ((int)$net_profit/(int)$total_revenue)*100; 
    
    
    $data = array('year'=>$year,
                  'month'=>$month,
                  'net_profit'=>$net_profit,
                  'total_revenue'=>$total_revenue,
                  'npm'=>$npm,
                  'startup_id'=>$startup->id);

    $check = $this->db->get_where('net_profit_margin',array('year'=>$year,'month'=>$month,'startup_id'=>$startup->id,'status'=>1))->num_rows();
   
    if($check==0)
    {
        $this->db->insert('net_profit_margin',$data);
        $this->session->set_flashdata('success','Net Profit Margin Update Successully');
        redirect(base_url().'StartupMetrics/OperatingProfitMarginList');
    }
    else 
    {
        $this->session->set_flashdata('failed','Net Profit Margin already updated for this year and month ');
        redirect(base_url().'StartupMetrics/NetProfitMarginList');
    }
}
public function NetProfitMarginList()
{
    $this->load->view('pages/net-profit-margin-list');
}



public function delNetProfitMargin()
{
    $where = array('id'=>$_GET['id']);
    $data = array('status'=>0);
    
    $rs = $this->db->update('net_profit_margin',$data,$where);
    if($rs)
    {
        redirect(base_url().'StartupMetrics/NetProfitMarginList');
    }
}


}