<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Candidate Applied for Job
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
                                            <th>Candidate Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Apply For</th>
                                            <th>Experience</th>
                                            <th>Current CTC</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $i=1;
                                           
                                           foreach($applied as $j)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$i;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-candidate/<?= $j->id; ?>')"><?=$j->Name;?></a>
                                            </td>
                                            <td>
                                                <?=$j->Email;?>
                                            </td>
                                            <td>
                                                <?=$j->Mobile;?>
                                            </td>
                                            <td>
                                                <?=$j->applyfor;?>
                                            </td>
                                            <td>
                                                <?=$j->Total_Experience;?>
                                            </td>
                                            <td>
                                                <?=$j->Current_CTC;?>
                                            </td>

                                        </tr>
                                        <?php 
                                         $i++;
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