<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Job Opening Listing
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
                                            <th>Job Title</th>
                                            <th>No of Opening</th>
                                            <th>Startup Name</th>
                                            <th>Job Role</th>
                                            <th>Job Location/City</th>
                                            <th>Job Status</th>
                                            <th>Listing Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $i=1;
                                           
                                           foreach($job as $j)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$i;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-job-listing/<?= $j->id; ?>')"><?=$j->job_title;?></a>
                                            </td>
                                            <td><?=$j->no_of_openings;?></td>
                                            <td><?php
                                              $sname = $this->db->get_where('startup',array('id'=>$j->startupid))->row();
                                              echo $sname->startup_name;
                                            ?></td>
                                            <td><?=$j->job_role;?></td>
                                            <td><?=$j->job_location;?></td>
                                            <td>
                                                <?php
                                                  if($j->is_active==1)
                                                  {
                                                    echo "<label class='badge bg-success p-3'>Active</label>";
                                                  }
                                                  if($j->is_active==0)
                                                  {
                                                    echo "<label class='badge bg-danger p-3'>Deactive</label>";
                                                  } 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                  if($j->status=='approved')
                                                  {
                                                    echo "<label class='badge bg-success p-3'>Approved</label>";
                                                  }
                                                  if($j->status=='pending')
                                                  {
                                                    echo "<label class='badge bg-danger p-3'>Pending</label>";
                                                  } 
                                                ?>
                                            </td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/EditJobOpening?id=<?= $j->id; ?>">Edit
                                                            Listing</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/DeleteJobOpening?id=<?= $j->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/ApprovJobOpening?id=<?= $j->id; ?>">Approved</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/PendingJobOpening?id=<?= $j->id; ?>">Pending</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/EnableJobOpening?id=<?= $j->id; ?>">Active</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>JobOpening/DisableJobOpening?id=<?= $j->id; ?>">Deactive</a>
                                                    </div>
                                                </div>
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