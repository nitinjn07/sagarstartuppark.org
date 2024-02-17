<?php include 'header.php';?>
      <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Contact with Spark">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">
                       
                        <h2 class="text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom mt-5">Contact Us</h2>

                          <h1 class="alt-font text-white opacity-10 margin-20px-bottom" style="padding-top: 15px;"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Contact Us</h1>
                    </div>
                  
                </div>
            </div>
        </section>

        <section class="no-padding-tb wow animate__fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 px-0">
                        <div class="map-style-3 ">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14599.195731798138!2d78.74914640124416!3d23.82574790790165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3978d7f46cd90a53%3A0x2f420395a8b946fd!2sSpark%20Incubation%20Center%2C%20Sagar%20(M.P)!5e0!3m2!1sen!2sin!4v1689576914867!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end map section -->
        <!-- start section -->
        <section class="half-section">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- start feature box item-->
                    <div class="col-12 col-sm-auto sm-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="d-flex justify-content-center align-items-center padding-15px-lr">
                            <i class="feather icon-feather-headphones align-middle icon-extra-small text-gradient-magenta-orange margin-10px-right"></i>
                            <span class="text-extra-dark-gray alt-font text-medium"><?= $con->phone; ?></span>
                        </div>
                    </div>
                    <!-- end feature box item-->
                    <!-- start feature box item-->
                    <div class="col-12 col-sm-auto pb-4 wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="d-flex justify-content-center align-items-center padding-15px-lr h-100">
                            <i class="feather icon-feather-mail align-middle icon-extra-small text-gradient-magenta-orange margin-10px-right"></i>
                            <a href="mailto:<?= $con->email; ?>" class="text-extra-dark-gray alt-font text-medium"><?= $con->email; ?></a>
                        </div>
                    </div>
                    <!-- end feature box item-->
                    <!-- start feature box item-->
                    
                    <!-- end feature box item-->
                </div>  
            </div>
        </section>
        <section class="big-section wow animate__fadeIn">
            <div class="container">
                   <div class="row mb-5">
                    <div class="col-12 col-lg-6 offset-lg-1 col-md-8">
                        <h4 class="alt-font text-black font-weight-600">Let's get in touch with us</h4>
                        <form action="<?=base_url();?>Contact/contactus" method="post" class="alt-font text-extra-dark-gray">
                            <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark large-input px-0 margin-25px-bottom border-radius-0px required" type="text" name="name" placeholder="Your name"  required/>
                            <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark large-input px-0 margin-25px-bottom border-radius-0px required" type="email" name="email" placeholder="Your email address" id='email' required />
                            <input class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark large-input px-0 margin-25px-bottom border-radius-0px" type="tel" name="mobile" placeholder="Mobile no" required/>
                            <textarea class="input-border-bottom border-color-extra-dark-gray bg-transparent placeholder-dark large-input px-0 margin-35px-bottom border-radius-0px" name="text" rows="5" placeholder="How can we help you?" required ></textarea>
                           
                           
                            <input  type="submit" class="btn btn-medium btn-dark-gray mb-0 " value="Send Message"/>
                            
                        </form>
                    </div>
                
                    <div class="col-5 col-lg-5 bg-dark text-white pt-4 text-center">
                    
                            <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                <p><?= $con->address; ?></p>
                              <br/>
                              <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>         
                              <p> <?= $con->email; ?></p>
                              
                              <br/>
                              <i class="fa fa-phone fa-2x" aria-hidden="true"></i>         
                              <p> <?= $con->phone; ?> </p>
                              
                              <br/>     
                              <p> CIN:U85300MP2021NPL056183</p>
                    </div>
                </div>
                </div>
            
        </section>
        <!-- end section -->
        <!-- start map section -->
        
        <!-- end section -->
   <?php include 'footer.php';?>