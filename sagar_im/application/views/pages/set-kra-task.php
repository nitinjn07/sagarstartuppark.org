<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Set ( Sprint ) KRA Task
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
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Assign New Task</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <form method="post" action="<?=base_url();?>KraModule/KRATaskAllocation">
                                        <div class="form-group mb-3 mt-3">
                                            <label for="" class="py-2">
                                                <h5>1. Select Sprint</h5>
                                            </label>
                                            <select class="form-control" name="kraid" readonly>
                                                <option value="">Select KRA </option>
                                                <?php
                                                  $kra= $this->db->order_by('id','desc')->get_where("set_kra",array('delstatus'=>1))->result(); 
                                                  foreach($kra as $k)
                                                  {

                                                    $s=$this->db->get_where('startup',array('id'=>$k->startupid))->row();
                                                     
                                                ?>
                                                <option value="<?=$k->id;?>" <?php 
                                                  if($kraid->id==$k->id)
                                                  {
                                                    echo "selected";
                                                  }
                                                ?>>ID:<?=$k->id;?>-<?=$k->title;?> - <?=$s->startup_name;?>
                                                </option>
                                                <?php 
                                                  }
                                                ?>
                                            </select>


                                        </div>
                                        <div class="form-group mb-3 mt-3">
                                            <label for="" class="py-2">
                                                <h5>2. Select Module</h5>
                                            </label>
                                            <select class="form-control" id="module" name="moduleid" required>
                                                <option value="">Select Module</option>
                                                <?php
                                                  $krmod= $this->db->get_where("kra_module",array('delstatus'=>1))->result(); 
                                                  foreach($krmod as $km)
                                                  {
                                                ?>
                                                <option value="<?=$km->id;?>"><?=$km->module_name;?></option>
                                                <?php 
                                                  }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group py-2">
                                            <label for="" class="py-2">
                                                <h5>3. Select Task</h5>
                                            </label>
                                            <select id="taskmodule" name="taskid" class="form-control" required>
                                                <option value="">Select Task</option>

                                            </select>


                                        </div>

                                        <div class="form-group py-2">
                                            <label for="">
                                                <h5>4.Who will do this task</h5>
                                            </label>
                                            <select class="form-control" name="teamid" required>
                                                <option value="">Select Task</option>
                                                <?php
                                                   $team=$this->db->get_where('team_member',array('startup_id'=>$kraid->startupid))->result(); 
                                                   foreach($team as $t)
                                                   {
                                                 ?>
                                                <option value="<?=$t->id;?>"><?=$t->name;?></option>
                                                <?php
                                                   }
                                                ?>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">
                                                <h5>5.Comment</h5>
                                            </label>
                                            <textarea name="comment" class="form-control"></textarea>

                                        </div>





                                        <div class="form-group mb-2 mt-2">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?=base_url();?>SetKRA" class="btn btn-primary">
                                    Set New KRA</a>
                            </div>
                            <div class="card-body">

                                <h3>Sprint Task List (<?=date('d-m-Y',strtotime($kraid->start_date));?>) to
                                    (<?=date('d-m-Y',strtotime($kraid->end_date));?>)</h3>
                                <table class="table table-responsive table-hover">
                                    <tr>
                                        <th>Task Name</th>
                                        <th>Task Owner</th>
                                        <th>Module</th>

                                        <th>Task Status</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                      
                                      $task=$this->db->get_where('tempkra_task',array('kraid'=>$_GET['kraid'],'delstatus'=>1))->result(); 
                                      foreach($task as $t)
                                      {
                                         $task_info=$this->db->get_where('kra_module_task',array('id'=>$t->taskid))->row();
                                         $module_info=$this->db->get_where('kra_module',array('id'=>$t->moduleid))->row();
                                         $team = $this->db->get_where('team_member',array('id'=>$t->teamid))->row();
                                    ?>
                                    <tr>
                                        <td><?=$task_info->task_name;?></td>
                                        <td><?=$team->name;?></td>
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
if($t->task_status=='workinprogress')
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
                                            <?=$t->comment;?>
                                        </td>
                                        <td>


                                            <a class="btn btn-primary" href='#'
                                                onclick="showAjaxModal('<?=base_url(); ?>Popup/index/review-task/<?= $t->id; ?>')">Review
                                                Task</a>

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
        </main>

        <?=include('common/footer.php');?>
        <script>
        $('#startupid').on('change', function() {

            var id = $('#startupid').val();
            $.ajax({
                type: "GET",
                url: '<?=base_url();?>SetKRA/getStartupDetail',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#startup_profile').html(data);
                }
            });

        });
        </script>

        <script>
        function addDays() {
            var days = parseInt(document.getElementById('period').value);
            var date = document.getElementById('startdate').value;
            var result = new Date(date);
            result.setDate(result.getDate() + days);
            document.getElementById('enddate').value = formatDate(result);
            document.getElementById('reviewdate').setAttribute("min", date);
            document.getElementById('reviewdate').setAttribute("max", formatDate(result));


        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
        </script>
        <script>
        $(document).ready(function() {
            <?php
              $kraid = $this->db->get_where('set_kra',array('id'=>$_GET['kraid']))->row(); 
            ?>
            $('#taskmodule').hide();
            $('#module').on('change', function() {

                var moduleid = $('#module').val();

                if (moduleid != "") {
                    $('#taskmodule').show();
                } else {
                    $('#taskmodule').hide();
                }

                $.ajax({
                    data: {
                        id: moduleid,
                        startupid: <?=$kraid->startupid;?>

                    },
                    url: "<?=base_url();?>KraModule/getKraModule",
                    type: 'GET',
                    success: function(data) {
                        $("#taskmodule").html(data);
                    }
                });




            });

        });
        </script>