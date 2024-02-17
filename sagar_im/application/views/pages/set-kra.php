<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Set KRA ( Sprint )
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                      if(isset($_GET['kraid']))
                                      {
                                        echo "<h1>Update Sprint</h1>";
                                        $where = array('id'=>$_GET['kraid']);

                                        $kra= $this->db->get_where('set_kra',$where)->row();
                                        $st=$this->db->get_where('startup',array('id'=>$kra->startupid))->row();

                                        
                                     ?>
                                    <form method="post" action="<?=base_url();?>SetKRA/UpdateKRA">
                                        <div class="form-group mb-3 mt-3">
                                            <label>Sprint Title</label>
                                            <input type="text" value="<?=$kra->title;?>" name="kra_title"
                                                class="form-control" required />
                                        </div>
                                        <input type="hidden" name="kraid" value="<?=$kra->id;
                                        ?>" />

                                        <div class="form-group" id="taskmodule">
                                            <label for="">Select Task</label>


                                        </div>
                                        <div class="form-group">
                                            <label>Select Startup</label>

                                            <select name="startupid" id="startupid" class="form-control js-select2">
                                                <option value="">Select Startup</option>
                                                <?php
                                              $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'startup_type'=>'Physical'))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
                                                <option value="<?=$s->id;?>" <?php
                                                 if($st->id==$s->id) 
                                                 {
                                                    echo "selected";
                                                 }
                                                ?>><?=$s->startup_name;?></option>
                                                <?php 
                                              }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Start Date</label>
                                            <input type="date" value="<?=$kra->start_date;?>" class="form-control"
                                                id="startdate" name="start_date" required />
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint End Date</label>
                                            <input type="date" value="<?=$kra->end_date;?>" class="form-control"
                                                id="enddate" name="end_date" required />
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Duration</label>
                                            <select class="form-control" name="period" id="period" onchange="addDays()"
                                                required>
                                                <option>Select Period</option>
                                                <option value="15" <?php if($kra->duration=='15'){ echo "selected";}?>>
                                                    15 Days</option>
                                                <option value="30" <?php if($kra->duration=='30'){ echo "selected";}?>>1
                                                    Month</option>
                                                <option value="60" <?php if($kra->duration=='60'){ echo "selected";}?>>2
                                                    Month</option>
                                                <option value="90" <?php if($kra->duration=='90'){ echo "selected";}?>>6
                                                    Month</option>
                                                <option value="270"
                                                    <?php if($kra->duration=='270'){ echo "selected";}?>>
                                                    9 Month</option>
                                                <option value="365"
                                                    <?php if($kra->duration=='365'){ echo "selected";}?>>
                                                    12 Month</option>

                                            </select>
                                        </div>




                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Review Date</label>
                                            <input type="date" value="<?=$kra->review_date;?>" class="form-control"
                                                id="reviewdate" name="review_date" required />
                                        </div>
                                        <!-- <div class="radio  mt-4">
                                            <label class='text-success'><b>Is startup stage planned in this
                                                    review?</b></label><br />
                                            <label><input type="radio" name="upgrade" value="1" required />
                                                Yes</label>&nbsp;&nbsp;&nbsp;
                                            <label><input type="radio" name="upgrade" value="0" required /> No</label>
                                        </div> -->

                                        <div class="form-group mb-2 mt-2">
                                            <label>Remark </label>
                                            <textarea name="remark" class="form-control"><?=$kra->remark;?></textarea>
                                        </div>


                                        <div class="form-group mb-2 mt-2">
                                            <input type="submit" value="Update" class="btn btn-warning" />
                                        </div>


                                    </form>

                                    <?php
                                      } 
                                      else 
                                      {
                                     ?>
                                    <form method="post" action="<?=base_url();?>SetKRA/setNow">
                                        <div class="form-group mb-3 mt-3">
                                            <label>Sprint Title</label>
                                            <input type="text" name="kra_title" class="form-control" />
                                        </div>

                                        <div class="form-group" id="taskmodule">
                                            <label for="">Select Task</label>


                                        </div>
                                        <div class="form-group">
                                            <label>Select Startup</label>

                                            <select name="startupid" id="startupid" class="form-control js-select2">
                                                <option value="">Select Startup</option>
                                                <?php
                                              $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'startup_type'=>'Physical'))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
                                                <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                                <?php 
                                              }
                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Start Date</label>
                                            <input type="date" class="form-control" id="startdate" name="start_date"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint End Date</label>
                                            <input type="date" class="form-control" id="enddate" name="end_date"
                                                required />
                                        </div>
                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Duration</label>
                                            <select class="form-control" name="period" id="period" onchange="addDays()"
                                                required>
                                                <option>Select Period</option>
                                                <option value="15">15 Days</option>
                                                <option value="30">1 Month</option>
                                                <option value="60">2 Month</option>
                                                <option value="90">6 Month</option>
                                                <option value="270">9 Month</option>
                                                <option value="365">12 Month</option>

                                            </select>
                                        </div>




                                        <div class="form-group mb-2 mt-2">
                                            <label>Sprint Review Date</label>
                                            <input type="date" class="form-control" id="reviewdate" name="review_date"
                                                required />
                                        </div>
                                        <!-- <div class="radio  mt-4">
                                            <label class='text-success'><b>Is startup stage planned in this
                                                    review?</b></label><br />
                                            <label><input type="radio" name="upgrade" value="1" required />
                                                Yes</label>&nbsp;&nbsp;&nbsp;
                                            <label><input type="radio" name="upgrade" value="0" required /> No</label>
                                        </div> -->

                                        <div class="form-group mb-2 mt-2">
                                            <label>Remark </label>
                                            <textarea name="remark" class="form-control"></textarea>
                                        </div>


                                        <div class="form-group mb-2 mt-2">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>


                                    </form>
                                    <?php
                                      }
                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h3>Startup Details</h3>
                                    <table id="startup_profile" class="table table-bordered table-striped">

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Sprint Title</th>
                                            <th>Startup Name</th>
                                            <th>Duration</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Review Date</th>
                                            <th>Task Assign?</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $kra = $this->db->order_by('id','desc')->get_where('set_kra')->result(); 
                                          $i=1;
                                          foreach($kra as $k)
                                          {
                                            $startup= $this->db->get_where('startup',array('id'=>$k->startupid))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$k->title;?></td>
                                            <td><?=$startup->startup_name;?></td>
                                            <td><?=$k->duration;?> Days</td>
                                            <td><?=date('d-m-Y',strtotime($k->start_date));?></td>
                                            <td><?=date('d-m-Y',strtotime($k->end_date));?></td>
                                            <td><?=date('d-m-Y',strtotime($k->review_date));?></td>
                                            <td>
                                                <?php
                                                 if($k->is_task_assign==0)
                                                 {
                                                    echo "<label class='badge bg-danger'>Not Assigned</label>";
                                                 } 
                                                 else 
                                                 {
                                                    echo "<label class='badge bg-info'>Assigned</label>";
                                                 }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                 if($k->is_task_assign==0)
                                                 {
                                             ?>
                                                <a href="<?=base_url();?>KraModule/SetKraTask?kraid=<?=$k->id;?>"
                                                    class="btn btn-success btn-sm" target="_blank">Assign
                                                    Task</a>
                                                <?php
                                                 } 
                                                 
                                                ?>
                                                <?php
                                                 if($k->is_task_assign==1)
                                                 {
                                             ?>
                                                <a href="<?=base_url();?>KraModule/SetKraTask?kraid=<?=$k->id;?>"
                                                    class="btn btn-warning btn-sm">Review Sprint</a>
                                                <?php
                                                 } 
                                                ?>

                                                <?php
                                                 
                                                 if($k->is_task_assign==1)
                                                 {
                                             ?>
                                                <a href="<?=base_url();?>KraModule/KraReport?kraid=<?=$k->id;?>"
                                                    class="btn btn-primary btn-sm">Sprint Report</a>
                                                <?php
                                                 } 
                                                ?>

                                                <a href="<?=base_url();?>SetKRA?kraid=<?=$k->id;?>"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-edit"></i></a>

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
                        id: moduleid
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