<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Accepted Applications
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
                                            <th>Mobile</th>
                                            <th>Screening Status</th>
                                            <th>Product/Services</th>
                                            <th>City</th>
                                            <th>Startup Type</th>
                                            <th>Is Graduate</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page+1;
                                           
                                           foreach($startups as $st)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='<?=base_url('/Dashboard/ViewStartupProfile?sid='.$st->id);?>'
                                                    target="_blank"><?=$st->startup_name;?></a>
                                            </td>
                                            <td><?=$st->mobile;?></td>
                                            <td><?php if($st->is_screened==0){echo "<span class='badge bg-danger'> No </span>"; }else { echo "<span class='badge bg-success'> Yes </span>";} ;?>
                                            </td>

                                            <td><?=$st->product_service_summary;?></td>
                                            <td><?=$st->city;?></td>
                                            <td><?=$st->startup_type;?></td>
                                            <td><?php if($st->is_graduate==0){echo "<span class='badge bg-danger'> No </span>"; }else { echo "<span class='badge bg-success'> Yes </span>";} ;?>
                                            </td>


                                        </tr>
                                        <?php 
                                         $j++;
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