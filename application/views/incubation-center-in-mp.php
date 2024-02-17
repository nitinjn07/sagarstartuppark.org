<?php include 'header.php';?>
<style>
    #indu
    {
       height: 100px;
       margin-bottom:80px;
    }
</style>

<?php  $about = $this->Model->selectDataWhere('aboutus',array('id'=>1))->row();  ?>


 <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Incubation Center in Madhya Pradesh">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container"  id="indu">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">
                        
                        <h2 class="text-white text-left">SATNA INCUBATION CENTER IN MADHYA PRADESH</h2>
                     <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;About Us</h1>
                        <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
                    </div>
                  
                </div>
            </div>
        </section>

    
        <!-- start section -->
        <section id="about" class="bg-light-gray pb-5">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h4 class="text-center"><?= $about->title; ?></h4>
                        <hr />
                      
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="cover-background" style="background-image:url('<?= base_url('admin-dashboard/').$about->image; ?>'); min-height: 300px;" alt="Incubation Center in Madhya Pradesh"></div>
                    </div>

                    <div class="col-12 col-lg-12">
                        <div class="mt-5">
                            
                            <?= $about->content; ?>
                            
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
       
        <!-- end section -->
      <?php include 'footer.php';?>