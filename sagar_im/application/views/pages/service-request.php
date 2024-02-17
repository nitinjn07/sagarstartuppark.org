<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Service Request By Startup
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
                                            <th>Service Name</th>
                                            <th>Why Need ?</th>
                                            <th>What Help Need?</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           
                                           $req = $this->db->get_where('service_request')->result(); 
                                           $i=1;
                                           foreach($req as $r)
                                           {

                                            $stid = $this->db->get_where('startup',array('id'=>$r->startup_id))->row();
                                            $service = $this->db->get_where('services',array('id'=>$r->service_id))->row();
                                            
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$stid->startup_name;?></td>
                                            <td><?=$service->service_name;?></td>
                                            <td><?=$r->why_need;?></td>
                                            <td><?=$r->what_help;?></td>

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
                                                <a href="<?=base_url();?>Services/AcceptBooking?request_id=<?=$r->id;?>"
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