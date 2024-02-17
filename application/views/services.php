<?php include 'header.php';?>

      <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider2.jpg');" alt="Incubation Center in Madhya Pradesh">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                     <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">
                        
                        <h2 class="text-white text-left">Services</h2>
                         <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Services</h1>
                        <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
                    </div>
                  
                </div>
            </div>
        </section>

        
        <section class="bg-light-gray wow animate__fadeIn" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                         <h2>Our Services</h2>
                         
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2" style=" font-family: Poppins, sans-serif!important">
                    
                    <?php foreach($services as $s){ ?>

                        <div class="col-md-4 wow animate__fadeIn" id="<?= $s->service_name; ?>" data-wow-delay="0.2s">
                            <div class="card">
                                <div class="card-heading">
                                    <img src="<?= base_url('admin-dashboard/').$s->image; ?>" alt="Incubation Center in Madhya Pradesh"/>
                                    <h6 class="text-center pt-2"><?= $s->service_name; ?></h6>
                                </div>
                                <div class="card-body">
                                  <?= $s->content; ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    
                </div>
            </div>
        </section>
        <!-- end section -->
<?php include('footer.php');?>