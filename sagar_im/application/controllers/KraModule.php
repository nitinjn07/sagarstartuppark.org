<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KraModule extends CI_Controller {


    public function index() {
       
        $this->load->view('pages/kra-module');
    }
    public function KraModuleTask()
    {
        $this->load->view('pages/kra-module-task');
    }
    public function SetKraTask()
    {
        $this->load->view('pages/set-kra-task');
    }
    public function KraReport()
    {
        $this->load->view('pages/kra-report');
    }
    public function save()
    {
         extract($_POST);
         $data = array('module_name'=>$module_name);
         $rs = $this->db->insert('kra_module',$data);
         if($rs)
         {
            $this->session->set_flashdata('success','KRA Module Save Successfully');
            redirect(base_url().'KraModule');
         }
         else 
         {
            $this->session->set_flashdata('failed','KRA Module Not Save');
            redirect(base_url().'KraModule');
         }
    }
    public function Update()
    {
         extract($_POST);
         $data = array('module_name'=>$module_name);
         $where = array('id'=>$moduleid);
         $rs = $this->db->update('kra_module',$data,$where);
         if($rs)
         {
            $this->session->set_flashdata('success','KRA Module Update Successfully');
            redirect(base_url().'KraModule');
         }
         else 
         {
            $this->session->set_flashdata('failed','KRA Module Not Updated');
            redirect(base_url().'KraModule');
         }
    }

    public function delete()
    {
        $where = array('id'=>$_GET['delid']);
        $data = array('delstatus'=>0);    
        $rs = $this->db->update('kra_module',$data,$where);
        if($rs)
        {
            $this->session->set_flashdata('success','KRA Module Delete Successfully');
            redirect(base_url().'KraModule');
        }
        else 
        {
            $this->session->set_flashdata('failed','KRA Module Not Deleted');
            redirect(base_url().'KraModule');
        }
    }




    public function SaveModuleTask()
    {
         extract($_POST);
         $data = array('moduleid'=>$moduleid,'task_priority'=>$taskpriority,'task_name'=>$task_name,'startupid'=>$startupid,'task_priority'=>$taskpriority);
        
         $rs = $this->db->insert('kra_module_task',$data);
         if($rs)
         {
            $this->session->set_flashdata('success','KRA Module Task Save Successfully');
            redirect(base_url().'KraModule/KraModuleTask');
         }
         else 
         {
            $this->session->set_flashdata('failed','KRA Module Task Not Save');
            redirect(base_url().'KraModule/KraModuleTask');
         }
    }
    public function UpdateModuleTask()
    {
         extract($_POST);
         $data = array('moduleid'=>$moduleid,'task_priority'=>$taskpriority,'task_name'=>$task_name,'startupid'=>$startupid,'task_priority'=>$taskpriority);
         $where = array('id'=>$taskid);
         $rs = $this->db->update('kra_module_task',$data,$where);
         if($rs)
         {
            $this->session->set_flashdata('success','KRA Module Task Update Successfully');
            redirect(base_url().'KraModule/KraModuleTask');
         }
         else 
         {
            $this->session->set_flashdata('failed','KRA Module Task Not Updated');
            redirect(base_url().'KraModule/KraModuleTask');
         }
    }

    public function deleteModuleTask()
    {
        $where = array('id'=>$_GET['delid']);
        $data = array('delstatus'=>0);    
        $rs = $this->db->update('kra_module_task',$data,$where);
        if($rs)
        {
            $this->session->set_flashdata('success','KRA Module Task Delete Successfully');
            redirect(base_url().'KraModule/KraModuleTask');
        }
        else 
        {
            $this->session->set_flashdata('failed','KRA Module Task Not Deleted');
            redirect(base_url().'KraModule/KraModuleTask');
        }
    }
    public function getKraModule()
    {
        extract($_GET);
         $where = array('moduleid'=>$id,'startupid'=>$startupid);

         

         $kratask = $this->db->get_where('kra_module_task',$where)->result();
         
         foreach($kratask as $kt)
         {
           
           echo "<option value=".$kt->id.">".$kt->task_name."</option>";  
           
         }
         
    }
    public function KRATaskAllocation()
    {
         extract($_POST);

         $check = $this->db->get_where('tempkra_task',array('kraid'=>$kraid,'taskid'=>$taskid,'moduleid'=>$moduleid,'delstatus'=>1))->num_rows();
         if($check==0)
         {
         $data = array('kraid'=>$kraid,
                       'taskid'=>$taskid,
                       'moduleid'=>$moduleid,
                       'comment'=>$comment,
                       'teamid'=>$teamid);

        $data2 = array('is_task_assign'=>1);


        $rs = $this->db->insert('tempkra_task',$data);
        if($rs)
        {
           $this->db->update('set_kra',$data2,array('id'=>$kraid));

           $this->session->set_flashdata('success','Task Allocation Successful');
           redirect(base_url().'KraModule/SetKraTask?kraid='.$kraid);
        }
        else 
        {
            $this->session->set_flashdata('failed','Task Allocation Failed');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$kraid);
        }
        }
        else 
        {
            $this->session->set_flashdata('failed','Task Already Allocated');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$kraid);
        }
    }
    public function RemoveTempTask()
    {
        $where = array('id'=>$_GET['tid']);
        $data = array('delstatus'=>0);
        $res = $this->db->update('tempkra_task',$data,$where);

        if($res)
        {
            $this->session->set_flashdata('success','Task Remove Successfully');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$_GET['kraid']);
        }
        else 
        {
            $this->session->set_flashdata('failed','Task Not Removed');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$_GET['kraid']);
        }
    }
    public function ReviewTask()
    {
         extract($_POST);

         $data = array('review_date'=>$review_date,
                       'review_by'=>$review_by,
                       'comment'=>$comment,
                       'task_status'=>$task_status,
                       'teamid'=>$teamid,
                        'is_task_review'=>1);

        $where = array('id'=>$taskid);

        $rs = $this->db->update('tempkra_task',$data,$where);

        if($rs)
        {
            $this->session->set_flashdata('success','Task Review Successful');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$kraid);
        }
        else 
        {
            $this->session->set_flashdata('failed','Task Not Reviewed');
            redirect(base_url().'KraModule/SetKraTask?kraid='.$kraid);
        }
    }
   
}