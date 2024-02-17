<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Task Status
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h2 align="center" class="mt-4 mb-4">
                                        <hr />

                                        <?php
                                              if(!empty($kra_task))
                                              {
                                              $id = $kra_task[0]->startupid;
                                              $name = $this->db->get_where('startup',array('id'=>$id))->row();
                                              echo $name->startup_name." (Task List)";
                                              }
                                              else 
                                              {
                                                  echo "No Task Found";
                                              }

                                           
                                            ?>
                                    </h2>
                                    <table class="table">
                                        <tr>

                                            <th>Task</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Need Help</th>
                                            <th>Task Owner</th>
                                            <th>Plan</th>
                                            <th>Remark</th>
                                            <th>Comment</th>



                                        </tr>
                                        <?php 
                                      foreach($kra_task as $k)
                                      {
                                    ?>
                                        <tr>

                                            <td>
                                                <?=$k->task_name;?>
                                            </td>
                                            <td>
                                                <?=$k->start_date;?>
                                            </td>
                                            <td>
                                                <?=$k->end_date;?>
                                            </td>

                                            <td><?=$k->help_incubation;?></td>
                                            <td><?=$k->task_owner;?></td>
                                            <td><?=$k->plan_to_complete;?></td>
                                            <td><?=$k->remark;?></td>
                                            <td><?=$k->task_comment;?></td>


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