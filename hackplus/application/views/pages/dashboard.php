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
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-md-end d-md-flex">
                            <div class="breadcrumb_nav">
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a class="parent-item" href="#">Home</a>
                                        <i class="fa fa-angle-right"></i>
                                    </li>
                                    <li class="active">
                                        Dashboard
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section class="chart_section">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 text-light card-shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="homepage_single">

                                            <span class="bg-info text-center wb-icon-box bg_shedo_light"> <i
                                                    class="fa fa-users f24" aria-hidden="true"></i> </span>
                                            <div class="homepage_fl_right">
                                                <h4 class="mt-0">Pending Application</h4>
                                                <?php 
                                                  $count = $this->db->get_where('startups_reg',array('status'=>'pending'))->num_rows();
                                                ?>
                                                <h3><?=$count;?></h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 text-light card-shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="homepage_single">

                                            <span class="bg-success text-center wb-icon-box bg_shedo_light"> <i
                                                    class="fa fa-users f24" aria-hidden="true"></i> </span>
                                            <div class="homepage_fl_right">
                                                <h4 class="mt-0">Accepted Application</h4>
                                                <?php 
                                                  $count = $this->db->get_where('startups_reg',array('status'=>'approved'))->num_rows();
                                                ?>
                                                <h3><?=$count;?></h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-0 text-light card-shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="homepage_single">

                                            <span class="bg-danger text-center wb-icon-box bg_shedo_light"> <i
                                                    class="fa fa-users f24" aria-hidden="true"></i> </span>
                                            <div class="homepage_fl_right">
                                                <h4 class="mt-0">Rejected Application</h4>
                                                <?php 
                                                  $count = $this->db->get_where('startups_reg',array('status'=>'reject'))->num_rows();
                                                ?>
                                                <h3><?=$count;?></h3>
                                            </div>

                                        </div>
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