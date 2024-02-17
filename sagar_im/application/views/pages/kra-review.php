<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        KRA Review
                    </h1>
                </div>
                <div class="row">

                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h1>KRA Details</h1>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="2" class="bg-primary">
                                            <h3 class="text-white">
                                                <?php
                                          $startup = $this->db->get_where('startup',array('id'=>$k->startupid))->row();
                                          echo $startup->startup_name;
                                        ?></h3>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td><?=$k->title;?></td>
                                    </tr>
                                    <tr>
                                        <td>Kra Duration </td>
                                        <td><?=$k->duration." Days";?></td>
                                    </tr>
                                    <tr>
                                        <td>Start Date</td>
                                        <td><?=$k->start_date;?></td>
                                    </tr>
                                    <tr>
                                        <td>End Date</td>
                                        <td><?=$k->end_date;?></td>
                                    </tr>
                                    <tr>
                                        <td>Current Stage</td>
                                        <td class="bg-primary text-white">
                                            <?= $startup->stage;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Review Date</td>
                                        <td><?=$k->review_date;?></td>
                                    </tr>
                                    <tr>
                                        <td>Remark</td>
                                        <td><?=$k->remark;?></td>
                                    </tr>
                                    <tr>
                                        <td>Is Plan to Upgrade</td>
                                        <td>
                                            <?php 
                                               if($k->is_plan_to_upgrade==1)
                                               {
                                                echo "<label class='bg-success p-2 rounded-pill text-white'>Yes</label>";
                                               }
                                               else 
                                               {
                                                echo "<label class='bg-warning p-2 rounded-pill text-white'>No</label>";
                                               }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is Reviewed</td>
                                        <td>
                                            <?php 
                                               if($k->is_review==0)
                                               {
                                                echo "<label class='bg-warning p-2 rounded-pill text-white'>Not Reviewed</label>";
                                               }
                                               else 
                                               {
                                                echo "<label class='bg-success p-2 rounded-pill text-white'>Reviewed</label>";
                                               }
                                            ?>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                    </div>
                    <form action="<?=base_url();?>KraReview/ReviewKRA" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>KRA Task</h3>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Task Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Help Need</th>
                                                    <th>Task Owner</th>
                                                    <th>Plan to Complete</th>
                                                    <th>Remark</th>
                                                    <th>Comment</th>


                                                </tr>
                                                <?php 
                                      $i=1;
                                      $task = $this->db->get_where('kra_task',array('startupid'=>$k->startupid))->result();
                                      foreach($task as $t)
                                      {
                                    ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$t->task_name;?></td>
                                                    <td><?=$t->start_date;?></td>
                                                    <td><?=$t->end_date;?></td>
                                                    <td><?=$t->help_incubation;?></td>
                                                    <td><?=$t->task_owner;?></td>
                                                    <td><?=$t->plan_to_complete;?></td>
                                                    <td><?=$t->remark;?></td>
                                                    <td>
                                                        <input type="text" class="form-control" name="task_comment[]"
                                                            required />
                                                        <input type="hidden" class="form-control" name="taskid[]"
                                                            value="<?=$t->tid;?>" />
                                                    </td>

                                                </tr>
                                                <?php 
                                        $i++;
                                      }
                                      ?>
                                            </table>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                $stages = array(1=>'concept_ideation',
                                2=>'customer_discovery',
                                3=>'idea_validation',
                                4=>'minimum_viable_product',
                                5=>'product_market_fit',
                                6=>'growth_establishment_and_scale_up',
                                7=>'maturity_and_possible_exit'); 
                                ?>
                                        <div class="form-group">
                                            <input type="hidden" name="kraid" value="<?=$k->id;?>" />
                                            <input type="hidden" name="sid" value="<?=$startup->id;?>" </div>
                                            <div class="form-group py-2">
                                                <label>Review Date</label>
                                                <input type="date" class="form-control py-2" name="review_date" />
                                            </div>
                                            <div class="form-group py-2">
                                                <label>Review By</label>
                                                <input type="text" class="form-control py-2" name="review_by" />
                                            </div>
                                            <?php
                                  if($k->is_plan_to_upgrade==1)
                                  { 
                                ?>
                                            <div class="form-group py-2">
                                                <label>Stage Upgrade</label>
                                                <select name="upgrade_stage" id="upgrade_stage" class="form-control">
                                                    <option value="">Select Stage</option>
                                                    <?php
                                          foreach($stages as $s)
                                          { 
                                        ?>
                                                    <option value="<?=$s;?>" <?php
                                          if($startup->stage == $s)
                                          {
                                            echo "selected";
                                          }
                                           
                                        ?>><?=$s;?></option>
                                                    <?php 
                                          }
                                          ?>
                                                </select>

                                            </div>
                                            <?php 
                                  }
                                ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Comments</label>
                                            <textarea class="form-control" name="review_comment"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-lg mt-3" value="Submit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>

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