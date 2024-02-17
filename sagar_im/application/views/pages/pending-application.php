<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Pending Applications
                    </h1>
                </div>
                <div class="row">
                    <div class="<?php if(isset($_GET['showid'])){ echo "col-xxl-8"; }else {echo "col-xxl-12";}?>">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Startup Name</th>

                                            <th>Mobile</th>
                                            <th>Product/Services</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
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
                                            <td><?=$st->product_service_summary;?></td>
                                            <td><?=$st->city;?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/accept-startup/<?= $st->id; ?>')">Accept</a>
                                                        <a class="dropdown-item" href="#"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/reject-startup/<?= $st->id; ?>')">Reject</a>


                                                    </div>
                                                </div>
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