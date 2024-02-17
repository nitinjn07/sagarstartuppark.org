<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        PRODUCT BACKLOG
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if(isset($_GET['editid']))
                                {
                                    $id = $_GET['editid'];
                                    $kra_task=$this->db->get_where('kra_module_task',array('delstatus'=>1,'id'=>$id))->row();
                            ?>
                                <form action="<?=base_url();?>KraModule/updateModuleTask" method="post">
                                    <div class="form-group">
                                        <label>Select Startup</label>

                                        <select name="startupid" class="form-control">
                                            <option value="">Select Startup</option>
                                            <?php
                                              $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'startup_type'=>'Physical','delstatus'=>1))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
                                            <option value="<?=$s->id;?>"
                                                <?php if($kra_task->startupid==$s->id){echo "selected"; }?>>
                                                <?=$s->startup_name;?></option>
                                            <?php 
                                              }
                                              ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Select Module</label>
                                        <input type="hidden" name="taskid" value="<?=$kra_task->id; ?>" />
                                        <select class="form-control" name="moduleid">
                                            <option value="">Select Module</option>
                                            <?php 
                                              $module = $this->db->get_where('kra_module',array('delstatus'=>1))->result();
                                              foreach($module as $m)
                                              {
                                             ?>
                                            <option value="<?=$m->id;?>"
                                                <?php if($m->id==$kra_task->moduleid){echo "selected"; }?>>
                                                <?=$m->module_name;?></option>
                                            <?php
                                              }
                                            ?>

                                        </select>

                                    </div>
                                    <div class="form-group my-2">
                                        <label for="">Task Title</label>
                                        <input type="text" value="<?=$kra_task->task_name;?>" class="form-control py-2"
                                            name="task_name" required>
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="">Task Priority</label>
                                        <select class="form-control" name="taskpriority">
                                            <option value="">Task Priority</option>
                                            <option value="High"
                                                <?php if($kra_task->task_priority=="High"){ echo "selected"; }?>>High
                                            </option>
                                            <option value="Medium"
                                                <?php if($kra_task->task_priority=="Medium") { echo "selected"; }?>>
                                                Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>
                                </form>
                                <?php
                                } 
                                else 
                                {
                              ?>
                                <form action="<?=base_url();?>KraModule/SaveModuleTask" method="post">
                                    <div class="form-group">
                                        <label>Select Startup</label>

                                        <select name="startupid" class="form-control">
                                            <option value="">Select Startup</option>
                                            <?php
                                               $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'startup_type'=>'Physical','delstatus'=>1))->result(); 
                                             
                                              foreach($startup as $s)
                                              {
                                            ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php 
                                              }
                                              ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Select Module</label>
                                        <select class="form-control" name="moduleid">
                                            <option value="">Select Module</option>
                                            <?php 
                                              $module = $this->db->get_where('kra_module',array('delstatus'=>1))->result();
                                              foreach($module as $m)
                                              {
                                             ?>
                                            <option value="<?=$m->id;?>"><?=$m->module_name;?></option>
                                            <?php
                                              }
                                            ?>

                                        </select>

                                    </div>
                                    <div class="form-group my-2">
                                        <label for="">Task Title</label>
                                        <input type="text" class="form-control py-2" name="task_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Task Priority</label>
                                        <select class="form-control" name="taskpriority">
                                            <option value="">Task Priority</option>
                                            <option value="High">High</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Low">Low</option>
                                        </select>
                                    </div>

                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save" />
                                    </div>
                                </form>
                                <?php } ?>



                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered" id="datatables-buttons">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Startup Name</th>
                                            <th>Module Name</th>
                                            <th>Task Name</th>
                                            <th>Priority</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                  $mt = $this->db->get_where('kra_module_task',array('delstatus'=>1))->result(); 
                                  $i=1;
                                  foreach($mt as $m)
                                  {
                                        $task = $this->db->get_where('kra_module',array('id'=>$m->moduleid))->row();
                                        $startup = $this->db->get_where('startup',array('id'=>$m->startupid))->row();
                                ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=@$startup->startup_name;?></td>
                                            <td><?=$task->module_name;?></td>
                                            <td><?=$m->task_name;?></td>
                                            <td><?=$m->task_priority;?></td>
                                            <td>
                                                <a href="<?=base_url();?>KraModule/deleteModuleTask?delid=<?=$m->id?>"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="<?=base_url();?>KraModule/KraModuleTask?editid=<?=$m->id;?>"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>

                                            </td>

                                        </tr>
                                        <?php 
                                    $i++;
                                  }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row bg-white">
                    <div class="col-md-12 py-2">
                        <h2 class="text-center py-3">Allotted Task to the Startup</h2>
                    </div>
                    <?php
                      $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'startup_type'=>'Physical'))->result(); 
                      
                      foreach($startup as $s)
                      {
                    ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 class="text-white">
                                    <?= strtoupper($s->startup_name);?>
                                </h5>

                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Task Name</th>
                                            <th>Task Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                      $task  = $this->db->get_where('kra_module_task',array('startupid'=>$s->id))->result(); 
                                      $i=1;
                                      foreach($task as $t)
                                      {
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$t->task_name;?></td>

                                            <td>
                                                <?php

                                           $status= $this->db->get_where('tempkra_task',array('taskid'=>$t->id))->row();

                                           if($status)
                                           {
if($status->task_status=='open')
{
  echo "<label class='badge bg-danger'>Open</label>";
}
if($status->task_status=='assigned')
{
  echo "<label class='badge bg-info'>Assigned</label>";
}
if($status->task_status=='WorkInProgress')
{
  echo "<label class='badge bg-primary'>Work in Progress</label>";
}
if($status->task_status=='closed')
{
  echo "<label class='badge bg-warning'>Closed</label>";
}
if($status->task_status=='cancelled')
{
  echo "<label class='badge bg-success'>cancelled</label>";
}
                                           }
                                           else 
                                           {
                                             echo "Open";
                                           }
?>
                                            </td>

                                        </tr>
                                        <?php
                                      $i++;
                                      } 
                                    ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>
                    <?php 
                      }
                      ?>
                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables with Buttons
            var datatablesButtons = $("#datatables-buttons").DataTable({
                responsive: true,
                buttons: ["copy", "print"],
                fixedHeader: true,
                bPaginate: false,
                bInfo: false
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
        });
        </script>