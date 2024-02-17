<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Uploaded List
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
                                            <th>RegNo</th>
                                            <th>Elector Pitch</th>
                                            <th>Legal Registration</th>
                                            <th>DPIIT Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($startup_upload as $ul)
                                           {
                                               
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <?php 
                                                   $s = $this->db->get_where('startup',array('id'=>$ul->startupid))->row();
                                                   echo @$s->startup_name;
                                                ?>
                                            </td>

                                            <td><?=$ul->reg_no;?></td>
                                            <td><?=$ul->elector_pitch;?></td>
                                            <td><?=$ul->legal_reg;?></td>
                                            <td><?=$ul->dpiit_number;?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-upload-data/<?= $ul->id; ?>')">Edit
                                                            Data</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-uploaded-document/<?= $ul->id; ?>')">View
                                                            Uploaded Document</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>UploadedList/DeleteData?id=<?= $ul->id; ?>">Delete</a>


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