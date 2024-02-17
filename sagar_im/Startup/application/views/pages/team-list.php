<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Team List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>SNO.</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Seat No</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                          $i=1;
                                           
                                           foreach($team as $t)
                                           {
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            
                                            <td><img src="<?=base_url('../uploads/team/').$t->profile; ?>"
                                                    width="50px" /></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-team/<?= $t->id; ?>')"><?=$t->name;?></a>
                                            </td>

                                            <td><?=$t->email;?></td>
                                            <td><?=$t->contact;?></td>
                                            <td><?=$t->seat_no;?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-team-member/<?= $t->id; ?>')">Edit
                                                            Profile</a>
                                                        <!-- <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Team/deleteTeam?id=<?= $t->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a> -->


                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                        <?php 
                                        $i++;
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