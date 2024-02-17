<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        KRA Report
                        <?php
                          if(!isset($_GET['kraid']))
                          {
                            redirect(base_url().'SetKRA');
                          }
                       
                          $kraid = $this->db->get_where('set_kra',array('id'=>$_GET['kraid']))->row();
                        ?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Sprint Task List (<?=date('d-m-Y',strtotime($kraid->start_date));?>) to
                                    (<?=date('d-m-Y',strtotime($kraid->end_date));?>)</h3>
                                <table class="table table-responsive table-hover">
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Module</th>

                                        <th>Task Status</th>
                                        <th>Review By</th>
                                        <th>Review Date</th>
                                    </tr>
                                    <?php
                                      
                                      $task=$this->db->get_where('tempkra_task',array('kraid'=>$_GET['kraid'],'delstatus'=>1))->result(); 
                                      foreach($task as $t)
                                      {
                                         $task_info=$this->db->get_where('kra_module_task',array('id'=>$t->taskid))->row();
                                         $module_info=$this->db->get_where('kra_module',array('id'=>$t->moduleid))->row();
                                    ?>
                                    <tr>
                                        <td><?=$task_info->task_name;?></td>
                                        <td><?=$module_info->module_name;?></td>

                                        <td>
                                            <?php

if($t->task_status=='open')
{
  echo "<label class='badge bg-danger'>Open</label>";
}
if($t->task_status=='assigned')
{
  echo "<label class='badge bg-info'>Assigned</label>";
}
if($t->task_status=='WorkInProgress')
{
  echo "<label class='badge bg-primary'>Work in Progress</label>";
}
if($t->task_status=='closed')
{
  echo "<label class='badge bg-warning'>Closed</label>";
}
if($t->task_status=='cancelled')
{
  echo "<label class='badge bg-success'>cancelled</label>";
}
?>
                                        </td>

                                        <td>
                                            <?=$t->review_by;?>
                                        </td>
                                        <td>
                                            <?= date('d-m-Y',strtotime($t->review_date));?>
                                        </td>

                                    </tr>
                                    <?php 
                                      }
                                    ?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    </div>
    </main>

    <?=include('common/footer.php');?>