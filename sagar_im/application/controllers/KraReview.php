<?php defined('BASEPATH') OR exit('No direct script access allowed');

class KraReview extends CI_Controller {

    public function index()
    {
        $this->load->view('pages/full-kra-review');
    }

    public function getKraDetails()
    {
         

         $kra = $this->db->get_where('set_kra',array('startupid'=>$_GET['id']))->result();
         
         foreach($kra as $k)
         {
         ?>
<option value="<?=$k->id;?>"><?=$k->title;?></option>
<?php
         }

         echo "<option value='Other' selected>Select KRA</option>";
        

    } 
    public function getKraTask()
    {    

        $kra = $this->db->get_where('set_kra',array('id'=>$_GET['id']))->row();         
        
        echo '
         <table class="table"> 
               <tr>
               <td>KRA Title</td>
               <td>'.$kra->title.'</td>
               </tr>
               <tr>
               <td>Start Date</td>
               <td>'.date('d-m-Y',strtotime($kra->start_date)).'</td>
               </tr>
               <tr>
               <td>End Date</td>
               <td>'.date('d-m-Y',strtotime($kra->end_date)).'</td>
               </tr>
               <tr>
               <td>Duration</td>
               <td>'.$kra->duration.' Days </td>
               </tr>
               <tr>
               <td>KRA Status</td>
               <td>'.strtoupper($kra->kra_status).' </td>
               </tr>
         </table>
        
        ';

        ?>
<table class="table table-bordered table-hover my-3">
    <tr>
        <th>Task Name</th>
        <th>Task Owner</th>
        <th>Priority</th>
        <th>Task Status</th>
        <th>Review By</th>
        <th>Review Date</th>
        <td>Update</td>
    </tr>

    <?php 
    $kraid =  $kra->id;
    $task = $this->db->get_where('tempkra_task',array('kraid'=>$kraid))->result();
    
    foreach($task as $t)
    {
       $tt=$this->db->get_where('kra_module_task',array('id'=>$t->taskid))->row();
       $team=$this->db->get_where('team_member',array('id'=>$t->teamid))->row();     
    ?>
    <tr>
        <td><?=@$tt->task_name;?></td>
        <td><?=@$team->name;?></td>
        <td><?=@$tt->task_priority;?></td>
        <td><?=@$t->task_status;?></td>
        <td><?=@$t->review_by;?></td>
        <td><?=@$t->review_date;?></td>
        <td> <a class="btn btn-primary" href='#'
                onclick="showAjaxModal('<?=base_url(); ?>Popup/index/review-task/<?= $t->id; ?>')">Review
                Task</a></td>
    </tr>
    <?php
      
    }  
                 
    }

   public function FinalKraReview()
   {
       extract($_POST);

       $data =array('kra_status'=>$kra_status,
                    'review_by'=>$review_by,
                    'review_comment'=>$review_comment);

      $where = array('id'=>$kraid);

      $rs = $this->db->update('set_kra',$data,$where);

      if($rs)
      {
         $this->session->set_flashdata('success','KRA Review Successfully');
         redirect(base_url().'KraReview');
      }
      else 
      {
         $this->session->set_flashdata('failed','KRA Not Reviewed');
         redirect(base_url().'KraReview');
      }
   }
}