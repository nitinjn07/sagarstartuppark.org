<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        All Request Services Status
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
                                            <th>Service Image</th>
                                            <th>Service Name</th>
                                            <th>Service Description</th>
                                            <th>Request Date & Time</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $stid = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                                           $req = $this->db->get_where('service_request',array('startup_id'=>$stid->id))->result(); 
                                           $i=1;
                                           foreach($req as $r)
                                           {

                                            $sid = $this->db->get_where('services',array('id'=>$r->service_id))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><img src="<?=base_url('../uploads/service_icon/').$sid->service_img;?>"
                                                    width="50px" height="50px" /></td>
                                            <td><?=$sid->service_name;?></td>
                                            <td><?=$sid->service_description;?></td>
                                            <td><?=$r->create_datetime;?></td>
                                            <td>
                                                <?php
                                                  if($r->status==0)
                                                  {
                                                    echo "<span class='badge bg-warning text-white p-2'>Pending</span>";
                                                  } 
                                                  if($r->status==1)
                                                  {
                                                    echo "<span class='badge bg-success text-white p-2'>Accepted</span>";
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