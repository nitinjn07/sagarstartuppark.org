<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Seat Allocation List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Startup Name</th>
                                            <th>On OnBoarding</th>
                                            <th>Tenative Graduate Date</th>
                                            <th>Total Seats</th>
                                            <th>Floor</th>
                                            <th>Seat No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page+1;
                                           
                                           foreach($startups as $st)
                                           {
                                               $seat = $this->db->get_where('onboard_seat',array('startupid'=>$st->id));

                                               if($seat->num_rows()>0)
                                               {
                                                   $seat = $seat->row();
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td><a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-startup/<?= $st->id; ?>')"><?=$st->startup_name;?></a>
                                            </td>
                                            <td><?=$seat->on_board_date;?></td>
                                            <td><?=$seat->graduate_date;?></td>
                                            <td><?php if(!empty($seat->seat_no)){ echo count(explode("|",$seat->seat_no));} else { echo "<label class='text-danger'>0</label>";} ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($seat->wing)){ if($seat->wing=='F1'){ echo "<label class='bg-primary p-2'>F1</label>"; } if($seat->wing=='F2'){ echo "<label class='bg-success p-2'>F2</label>"; }  } else { echo "<label class='text-danger'>No</label>";} ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($seat->seat_no)){ echo str_replace("|",",",$seat->seat_no);} else { echo "<label class='text-danger'>No</label>";} ?>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-warning"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-seat/<?= $seat->startupid; ?>')">
                                                    <i class="fa fa-edit"></i>

                                                </a>
                                            </td>



                                        </tr>
                                        <?php 
                                         $j++;
                                           }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <p id="pagination"><?php echo $links; ?></p>
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