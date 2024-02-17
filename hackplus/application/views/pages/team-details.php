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
                                <h1>Team Details</h1>
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
                                        Team Details
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
                                <button class="btn btn-success" onclick="fnExcelReport();">Download
                                    Excel</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="mytable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Team Member</th>
                                            <th>Tshirt Size</th>
                                            <th>Startup Name</th>
                                            <th>Startup Code</th>

                                            <th>Idea</th>
                                            <th>City</th>
                                            <th>PPT</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                              $i=1; 
                                              $startup = $this->db->Query('select * from team t JOIN startups_reg sr ON t.startup_code=sr.startup_code where sr.status="approved"')->result();
                                              foreach($startup as $s)
                                              {
                                            ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$s->team_name;?></td>
                                            <td><?=$s->tshirt_size;?></td>
                                            <td><a href="<?=base_url();?>startup-details?id=<?=$s->id;?>"
                                                    target="_blank"><?=$s->name;?></a>
                                            </td>
                                            <td><?=$s->startup_code;?></td>
                                            <td><?=$s->idea;?></td>
                                            <td>
                                                <?php
                                            $s->city;
                                            $city = $this->db->get_where('cities',array('id'=>$s->city))->row();
                                            echo $city->name;
                                            ?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url('../risehackathon1.0/uploads/ppt/').$s->ppt;?>"
                                                    target="_blank" download class="btn btn-info" title="View PPT"><i
                                                        class="fa fa-eye"></i></a>

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