<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        MVP List
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
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Start Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                                          $mvp = $this->db->get_where('mvp',array('delstatus'=>1,'startupid'=>$startup->id))->result();
                                          $j=1;
                                           
                                           foreach($mvp as $m)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-mvp/<?= $m->id; ?>')"><?=$m->name;?></a>
                                            </td>

                                            <td><?=$m->short_desc;?></td>
                                            <td><?=$m->mvp_test_start_date;?></td>
                                            <td><?=$m->mvp_test_end_date;?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>LaunchMVP/EditMVP?id=<?= $m->id; ?>">Edit
                                                            Profile</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>LaunchMVP/SendEmail?startupid=<?= $m->startupid; ?>">Send
                                                            Emails</a>

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