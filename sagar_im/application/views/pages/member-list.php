<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Member List
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
                                            <th>name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Designation</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($screen as $s)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-member/<?= $s->id; ?>')"><?=$s->name;?></a>
                                            </td>

                                            <td><?=$s->email;?></td>
                                            <td><?=$s->contact;?></td>
                                            <td><?=$s->designation;?></td>
                                            <td><?php 
                                            if($s->action=='accept'){ 
                                                echo "<label class='bg bg-success p-2 text-white'>Accept</label>";     
                                                    }
                                                    if($s->action=='pending'){ 
                                                        echo "<label class='bg bg-warning p-2 text-white'>Pending</label>";     
                                                    }
                                                    if($s->action=='reject'){ 
                                                        echo "<label class='bg bg-danger p-2 text-white'>Reject</label>";     
                                                    }
                                            
                                             ?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-member/<?= $s->id; ?>')">Edit
                                                            Profile</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Screening/deleteScreeningMember?id=<?= $s->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Screening/ScreeningMemberAccept?id=<?= $s->id; ?>">Accept</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Screening/ScreeningMemberReject?id=<?= $s->id; ?>">Reject</a>


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
                                <p id=" pagination"><?php echo $links; ?></p>
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