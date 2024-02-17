<?php 
include('header.php'); 
$im = $this->load->database('imdb', TRUE);
$sd= $im->get_where('startup',array('email'=>$_SESSION['uid']))->row();
?>
<div class="content-wrapper">


    <div class="row" id="report">

        <div class="col-lg-12 mx-auto">
            <div class="mt-100">
                <div class="container">
                    <div class="row mb-4">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">

                                        <?php
                                      if($sd->logo=="")
                                      {
                                     ?>
                                        <img src="<?=base_url('../assets/web/assets/images/startup_default.jpg');?>"
                                            class="img-fluid" />
                                        <?php
                                      } 
                                      else 
                                      {
                                     ?>
                                        <img src="<?=base_url('../jic_im/uploads/logo/').$sd->logo;?>"
                                            class="img-fluid" />
                                        <?php
                                      }
                                    ?>

                                    </div>
                                    <div class="col-lg-8">
                                        <h2><?= strtoupper($sd->startup_name);?></h2>

                                        <p><?=$sd->product_service_summary; ?></p>

                                        <a href="<?=$sd->website_address;?>" class="text-danger" target="_blank">See
                                            More..</a>
                                        <p><i class="fa fa-tag"></i> <span
                                                class="badge bg-dark"><?=$sd->verticals_sectors;?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <h3>Basic Information</h3>
                                <p><?=$sd->aboutus;?></p>

                                <table class="table">
                                    <tr>
                                        <td>Owner Name</td>
                                        <td><?=$sd->name;?></td>

                                    </tr>
                                    <tr>
                                        <td>DPIIT No.</td>
                                        <td><?=$sd->dpiit;?></td>

                                    </tr>
                                    <tr>
                                        <td>Incubation ID</td>
                                        <td><?=$sd->incubation_id;?></td>

                                    </tr>
                                    <tr>
                                        <td>On Board Date</td>
                                        <td><?=$sd->incubation_joining_month;?>(<?=$sd->incubation_joining_year;?>)
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Founded Year</td>
                                        <td><?=$sd->founded_year;?></td>

                                    </tr>
                                    <tr>
                                        <td>Stage</td>
                                        <td><?=$sd->stage;?></td>

                                    </tr>
                                    <tr>
                                        <td>Legal Name</td>
                                        <td><?=$sd->startup_name;?></td>

                                    </tr>
                                    <tr>
                                        <td>Headquaters</td>
                                        <td><?=$sd->city;?>,<?=$sd->state;?></td>

                                    </tr>
                                    <tr>
                                        <td>Business Model</td>
                                        <td><?=$sd->type_of_business;?></td>

                                    </tr>
                                    <tr>
                                        <td>Team Summary</td>
                                        <td><?=$sd->team_summary;?></td>
                                    </tr>

                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<?php include('footer.php'); ?>