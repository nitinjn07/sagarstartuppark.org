<?php  include('header.php'); ?>
<!-- Content_right -->
<div class="container_full">

    <?php  include('sidemenu.php'); ?>


    <div class="content_wrapper">
        <div class="container-fluid">
            <div class="page_breadc">

                <div class="page-heading">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="page-breadcrumb">
                                <h1>Pending Application</h1>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-md-end d-md-flex">
                            <div class="breadcrumb_nav">
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a class="parent-item" href="<?=base_url();?>dashboard">Home</a>
                                        <i class="fa fa-angle-right"></i>
                                    </li>
                                    <li class="active">
                                        Pending Application
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <button class="btn btn-success" onclick="fnExcelReport()">Download Excel</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="mytable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>PPT</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                              $i=1; 
                                              $startup = $this->db->get_where('startups_reg',array('status'=>'pending'))->result();
                                              foreach($startup as $s)
                                              {
                                            ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><a href="<?=base_url();?>startup-details?id=<?=$s->id;?>"
                                                    target="_blank"><?=$s->name;?></a>
                                            </td>
                                            <td><?=$s->email;?></td>
                                            <td><?=$s->mobile;?></td>
                                            <td><?=
                                            $s->state;
                                            ?></td>
                                            <td>
                                                <?=
                                            $s->city;
                                           
                                            ?>
                                            </td>
                                            <td><?=$s->startup_category;?></td>
                                            <td><?=$s->status;?></td>
                                            <td>
                                                <a href="<?=base_url('../uploads/ppt/').$s->ppt;?>"
                                                    target="_blank" download class="btn btn-info" title="View PPT"><i
                                                        class="fa fa-eye"></i></a>



                                                <a href="<?=base_url();?>Admin/acceptApplication?id=<?=$s->id;?>"
                                                    class="btn btn-success" title="Accept Application"><i
                                                        class="fa fa-check"></i></a>
                                                <a href="<?=base_url();?>Admin/rejectApplication?id=<?=$s->id;?>"
                                                    class="btn btn-danger" title="Reject Application"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>

                                        <?php 
                                           $i++;
                                              }
                                            ?>

                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </section>




        </div>
    </div>

</div>
<!-- Content_right_End -->
<?php include('footer.php'); ?>