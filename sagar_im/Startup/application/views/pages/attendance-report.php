<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Attendance Report
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">

                            <div class="card-body table-responsive">

                                <form class="form-horizontal" action="" method="post">
                                    <div class="row my-5">
                                        <div class="col-md-4 d-block">

                                            <div class="form-group">
                                                <label>Select Month</label>
                                                <select name="month" class="form-control">
                                                    <option value="">Select Month</option>
                                                    <?php for ($i = 1; $i <= 12; $i++){
            $month_name = date('F', mktime(0, 0, 0, $i, 1, 2011));
            echo "<option value=\"" . $month_name . "\">" . $month_name . "</option>";
        }?>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Select Year</label>
                                                <select name="year" class="form-control">
                                                    <option value="">Select Year</option>
                                                    <?php
                                            for($i=date('Y'); $i>=1990; $i--)
                                            {
                                           ?>
                                                    <option value="<?=$i;?>"><?=$i;?></option>
                                                    <?php
                                            } 
                                           ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 pt-3">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-lg" value="Filter Now"
                                                    name="filter_attd" />
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php 
                                if(isset($_POST['filter_attd']))
                                {
                                $month = $_POST['month'];
                                $year = $_POST['year'];
                                
                                $start_date = "01-".$month."-".$year;
                                $start_time = strtotime($start_date);
                                
                                $end_time = strtotime("+1 month", $start_time);
                                
                                for($i=$start_time; $i<$end_time; $i+=86400)
                                {
                                   $current_month[] = date('d-m-Y', $i);
                                }
                            }
                            else 
                            {
                                $month = date('m');
                                $year = date('Y');
                                
                                $start_date = "01-".$month."-".$year;
                                $start_time = strtotime($start_date);
                                
                                $end_time = strtotime("+1 month", $start_time);
                                
                                for($i=$start_time; $i<$end_time; $i+=86400)
                                {
                                   $current_month[] = date('d-m-Y', $i);
                                } 
                            }
                                
                                ?>


                                <table class="table table-bordered" id="tblexport">
                                    <tr>
                                        <th>Employee Name</th>
                                        <?php
                          foreach($current_month as $cm)
                          { 
                        ?>
                                        <th><?=$cm;?></th>
                                        <?php
                          } 
                        ?>
                                    </tr>
                                    <?php
                     $s = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                     
                    ?>
                                    <tr>
                                        <td><?=$s->startup_name;?></td>
                                        <?php
                          foreach($current_month as $cm)
                          { 
                              $status = $this->db->get_where('startup_attendance',array('startup_id'=>$s->id,'attd_date'=>$cm))->row();
                              if($status)
                              {
                                  if($status->status=="P")
                                  {
                                       $color = "green";
                                       $txt ="white";
                                  }
                                  if($status->status=="A")
                                  {
                                       $color = "red";
                                       $txt ="white";
                                  }
                             
                                  
                        ?>
                                        <td style="color:<?=$txt;?>; background:<?=$color;?>;">
                                            <?=$status->status;?>
                                        </td>
                                        <?php 
                                  
                                }
                                else {
                         ?>
                                        <td style="background:skyblue;"> NA </td>
                                        <?php
                                }
                          }
                        ?>
                                    </tr>



                                </table>


                            </div>
                        </div>
                    </div>

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