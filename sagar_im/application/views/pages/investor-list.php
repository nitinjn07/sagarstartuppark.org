<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Investor List
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
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>LinkedIn</th>
                                            <th>City</th>
                                            <th>Type of Investor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($investor as $i)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-investor/<?= $i->id; ?>')"><?=$i->name;?></a>
                                            </td>

                                            <td><?=$i->email;?></td>
                                            <td><?=$i->mobile;?></td>
                                            <td><a href="<?=$i->linkedin_url;?>" target="_blank"><i
                                                        class="fa fa-linkedin"></i></a>
                                            </td>
                                            <td>
                                                <?php 
                                                  $state = $this->db->get_where('states',array('id'=>$i->state))->row();
                                                  echo $state->name."/";

                                                  $city = $this->db->get_where('cities',array('id'=>$i->city))->row();
                                                  echo $city->name;
                                                 ?>
                                            </td>
                                            <td><?php if($i->action=='accepted'){echo '<span class="badge bg-success">Accepted</span>';}else if($i->action=='pending'){echo '<span class="badge bg-warning">Pending</span>';}else {echo '<span class="badge bg-danger">Rejected</span>';} ;?>
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
                                                            href="<?= base_url(); ?>Investor/EditInvestor?id=<?= $i->id; ?>">Edit
                                                            Profile</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Investor/deleteInvestor?id=<?= $i->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Investor/AcceptInvestor?id=<?= $i->id; ?>">Accept</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Investor/RejectInvestor?id=<?= $i->id; ?>">Reject</a>
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