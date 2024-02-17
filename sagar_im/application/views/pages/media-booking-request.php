<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Media Room Booking Status
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>SNo.</th>
                                            <th>Startup Name</th>
                                            <th>Booking Date</th>
                                            <th>From Time</th>
                                            <th>To Time</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           
                                           $req = $this->db->get_where('media_room_booking')->result(); 
                                           $i=1;
                                           foreach($req as $r)
                                           {

                                            $stid = $this->db->get_where('startup',array('id'=>$r->startup_id))->row();
                                            
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$stid->startup_name;?></td>
                                            <td><?=$r->booking_date;?></td>
                                            <td><?=$r->from_time;?></td>
                                            <td><?=$r->end_time;?></td>
                                            <td><?=$r->purpose_booking;?></td>
                                            <td>
                                                <?php
                                                  if($r->status==0)
                                                  {
                                                    echo "<span class='badge bg-warning text-white p-2'>Pending</span>";
                                                  } 
                                                  else  if($r->status==1)
                                                  {
                                                    echo "<span class='badge bg-success text-white p-2'>Accepted</span>";
                                                  } 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                   if($r->status==0)
                                                   { 
                                                ?>
                                                <a href="<?=base_url();?>Booking/MediaAcceptBooking?booking_id=<?=$r->id;?>"
                                                    class="btn btn-success">Accept</a>
                                                <?php } else { echo "Done"; } ?>
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