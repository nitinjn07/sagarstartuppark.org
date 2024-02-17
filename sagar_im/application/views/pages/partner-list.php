<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Partner List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body table-responsive ">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firm Name</th>
                                            <th>Type of Firm</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Linkedin</th>
                                            <th>State/City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($partner as $p)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-partner/<?= $p->id; ?>')"><?=$p->firm_name;?></a>
                                            </td>

                                            <td><?=$p->type_of_firm;?></td>
                                            <td><?=$p->mobile;?></td>
                                            <td><?=$p->email;?></td>
                                            <td><a href="<?=$p->linkedin_url;?>" target="_blank"><i
                                                        class="fa fa-linkedin"></i></a></td>
                                            <td><?=$p->state;?> / <?=$p->city;?></td>
                                            <td>
                                                <?php
                                                     $s = $p->action;   
                                                     if($s=="rejected")
                                                     {
                                                         echo "<label class='bg bg-danger p-2 text-white'>Rejected</label>";
                                                     }
                                                     if($s=="pending")
                                                     {
                                                         echo "<label class='bg bg-warning p-2 text-white'>Pending</label>";
                                                     }
                                                     if($s=="accepted")
                                                     {
                                                         echo "<label class='bg bg-success p-2 text-white'>Accepted</label>";
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
                                                            href="<?= base_url(); ?>Partner/EditPartner?id=<?= $p->id; ?>">Edit
                                                            Profile</a>
                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Partner/deletePartner?id=<?= $p->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url(); ?>Partner/AcceptPartner?id=<?= $p->id; ?>">Accept</a>

                                                        <a class=" dropdown-item"
                                                            href="<?= base_url(); ?>Partner/RejectPartner?id=<?= $p->id; ?>">Reject</a>


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