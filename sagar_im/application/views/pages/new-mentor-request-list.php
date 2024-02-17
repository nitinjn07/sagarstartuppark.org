<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        New Mentor Requested
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
                                            <th>Finding Mentor in Category</th>
                                            <th>Problem which dicuss</th>
                                            <th>Startup Name</th>
                                            <th>Status</th>
                                            <th>Meeting Details</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         
                                           $req = $this->db->get('new_mentor_request')->result(); 
                                           $i=1;
                                           foreach($req as $r)
                                           {
                                        ?>

                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$r->category;?></td>
                                            <td><?=$r->problem;?></td>
                                            <td><?php 
                                              echo $this->db->get_where('startup',array('id'=>$r->startup_id))->row()->startup_name;
                                            ?></td>
                                            <td><?=$r->status;?></td>
                                            <td>
                                                <?php 
                                                   if($r->status=='accept')
                                                   {
                                                 ?>
                                                <p><?="Title:".$r->title;?><br /><?= "Plateform:".$r->plateform;?><br /><?="Remark:".$r->remark;?>
                                                    <br />
                                                    <?="Link:".$r->link;?>
                                                </p>

                                                <?php 
                                                   }
                                                   else 
                                                   {
                                                    echo "NA";
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
                                                    <?php 
                                                       if($r->status=='pending')
                                                       {
                                                    ?>
                                                    <div class="dropdown-menu" style="">



                                                        <a href='#' class="dropdown-item"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/new-accept-meeting/<?= $r->id; ?>')">Accept
                                                            Meeting</a>

                                                        <a href='#' class="dropdown-item"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/new-reject-meeting/<?= $r->id; ?>')">Reject
                                                            Meeting</a>



                                                    </div>
                                                    <?php } ?>
                                                </div>
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