<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Attendance <?=date("d-m-Y",strtotime($_SESSION['attd_first']));?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="<?=base_url();?>Attendance/index" method="post">
                                    <input type="date" name="attd_date"
                                        value="<?php if(isset($_SESSION['attd_first'])){ echo $_SESSION['attd_first']; }?>"
                                        class="form-control" required />
                                    <input type="submit" name="select_date" class="btn btn-primary mt-2"
                                        value="Click here to submit attendance" />
                                </form>
                            </div>
                            <div class="card-body">


                                <?php
                                
                              if(isset($_POST['select_date']))
                              {
                                  $_SESSION['attd_first'] = $_POST['attd_date'];
                                  $_SESSION['att_date'] = date("d-m-Y", strtotime($_SESSION['attd_first']));

                                  
                              } 
                            ?>

                                <?php
                                   if(isset($_SESSION['att_date']))
                                   { 
                                 ?>


                                <table class="table table-bordered">
                                    <tr>
                                        <th>Seat No</th>
                                        <th>Startup Name</th>
                                        <th>Attendance Status</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php                                           
                                          $startup = $this->db->get_where('startup',array('delstatus'=>1,'startup_type'=>'Physical','is_graduate'=>0))->result();
                                          foreach($startup as $s)
                                          {
                                        ?>
                                    <tr>
                                        <td></td>
                                        <td><?=$s->startup_name; ?></td>
                                        <td>
                                            <?php
                                                  $seat = $this->db->get_where('onboard_seat',array('startupid'=>$s->id)); 
                                                  
                                                  
                                                ?>
                                        </td>

                                        <?php
                                        if($seat->num_rows()>0)
                                        {
                                        $seats = explode("|",$seat->row()->seat_no);

                                        foreach($seats as $se)
                                        {
                                        $at = $this->db->get_where('startup_attendance',array('startup_id'=>$s->id,'seatno'=>$se,'attd_date'=>$_SESSION['att_date']))->row();
                                        ?>
                                        <form id="attendance" action="<?=base_url();?>Attendance/PunchDailyAttd"
                                            method="post">
                                    <tr>
                                        <td>
                                            <?php 
                                        $tn = $this->db->get_where('team_member',array('seat_no'=>$se,'startup_id'=>$s->id,'delstatus'=>1))->row();
                                       
                                        if(!empty($tn->name))
                                        {
                                        echo $tn->name."- (".$se.")";
                                        }
                                        else 
                                        {
                                        echo "<label class='text-danger'>Not Allocated-"."(".$se.")</label>";
                                        }


                                        ?></td>
                                        <td><input type="radio" value="P" name="attd<?=$se;?>"
                                                <?php if(@$at->status=='P'){ echo "checked"; } ?> required /> P
                                            <input type="radio" value="A" name="attd<?=$se;?>"
                                                <?php if(@$at->status=='A'){ echo "checked"; } ?> required /> A
                                            <input type="hidden" name="startupid" value="<?=$s->id;?>" />
                                            <input type="hidden" name="seatno" value="<?=$se;?>" />
                                            <input type="hidden" name="wing" value="<?=$seat->row()->wing;?>" />
                                            <input type="hidden" name="attd_date" value="<?=$_SESSION['att_date'];?>" />

                                        </td>
                                        <td><?=@$at->status;?></td>
                                        <td><input type="submit" value="Save" class="btn btn-warning" />
                                        </td>
                                    </tr>
                                    </form>
                                    <?php
                                        } 
                                        }
                                        ?>

                                    <td></td>
                                    </tr>

                                    <?php 

                                        }
                                        ?>

                                </table>
                                <?php 
                                   }
                                ?>


                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>

        <script>
        $('form#attendance').submit(function(e) {

                    var form = $(this);

                    e.preventDefault();

                    $.ajax({
                                type: "POST",
                                url: "<?=base_url();?>Attendance/PunchDailyAttd",
                                data: form.serialize(), // <--- THIS IS THE CHANGE
                                dataType: "html",
                                success: function(data) {

                                        $('#feed-container').prepend(data);
                                        echo "<script>alert('submit sccessful'); widnow.location.href='Attendance';
        </script>";
        },
        error: function() {
        alert("Error posting feed.");
        }
        });

        });
        </script>