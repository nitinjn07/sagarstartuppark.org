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
                                <h1>Startup Details</h1>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-md-end d-md-flex">
                            <div class="breadcrumb_nav">
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a class="parent-item" href="index.html">Home</a>
                                        <i class="fa fa-angle-right"></i>
                                    </li>
                                    <li class="active">
                                        Startup Details
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
              $info = $this->db->get_where('startups_reg',array('id'=>$_GET['id']))->row(); 
           ?>

            <section class="chart_section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header">
                                <div class="card-title">

                                    <ul class="nav nav-pills nav-pill-custom nav-pills-sm " id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="pills-today-tab" data-toggle="pill"
                                                href="#pills-today" role="tab" aria-controls="pills-today"
                                                aria-selected="true">Basic Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-week-tab" data-toggle="pill"
                                                href="#pills-week" role="tab" aria-controls="pills-week"
                                                aria-selected="false">Startup Pitch</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-month-tab" data-toggle="pill"
                                                href="#pills-month" role="tab" aria-controls="pills-month"
                                                aria-selected="false">Team Details</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade active show" id="pills-today" role="tabpanel"
                                        aria-labelledby="pills-today-tab">
                                        <p>
                                            Lid est laborum dolo rumes fugats untras. Etharums ser quidem dolores nemis
                                            omnis fugats vitaes nemo minima
                                            rerum facilis dolores nemis omnis
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-week" role="tabpanel"
                                        aria-labelledby="pills-week-tab">
                                        <p>
                                            Etharums ser quidem dolores nemis omnis fugats vitaes nemo minima rerum
                                            facilis dolores nemis omnis
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-month" role="tabpanel"
                                        aria-labelledby="pills-month-tab">
                                        <p>
                                            Dolo rumes fugats untras. Etharums ser quidem dolores nemis omnis fugats
                                            vitaes nemo minima rerum facilis dolores
                                            nemis omnis
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card p-2">
                            <div class="card-header text-center">
                                <h1><?=$info->name;?></h1>
                                <a href="<?=base_url();?>Admin/acceptApplication?id=<?=$info->id;?>"
                                    class="btn btn-success" title="Accept Application"><i class="fa fa-check"></i></a>
                                <a href="<?=base_url();?>Admin/rejectApplication?id=<?=$info->id;?>"
                                    class="btn btn-danger" title="Reject Application"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">

                                        <table class="table border">
                                            <tr>
                                                <td>Email</td>
                                                <td><?=$info->email;?></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td><?=$info->mobile;?></td>
                                            </tr>
                                            <tr>
                                                <td>Country</td>
                                                <td>
                                                    <?= 
                                                    $info->country;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>State</td>
                                                <td>
                                                    <?= 
                                                   $info->state;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>
                                                    <?= $info->city; 
                                                    
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Category</td>
                                                <td><?=$info->startup_category;?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?=$info->gender;?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td><?= strtoupper($info->status);?></td>
                                            </tr>
                                            <tr>
                                                <td>Download PPT</td>
                                                <td>
                                                    <a href="<?=base_url('../uploads/ppt/').$info->ppt;?>"
                                                        target="_blank" download class="btn btn-info"
                                                        title="View PPT"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="col-md-8">

                                        <h3 class="pb-2">Problem</h3>
                                        <p style="text-align:justify;"><?=$info->problem;?></p>

                                        <h3 class="pb-2">Solutions Detail</h3>
                                        <p style="text-align:justify;"><?=$info->solution_detail;?></p>

                                        <h3 class="pb-2">Startup Pitch</h3>
                                        <p style="text-align:justify;"><?=$info->idea;?></p>

                                    </div>

                                </div>

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