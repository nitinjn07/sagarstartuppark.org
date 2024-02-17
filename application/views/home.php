<?php include('header.php');?>
<!-- <style>
    .modal-backdrop
    {
        z-index:0;
    }
</style>
<div class="modal fade" id="popup">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Latest Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        
                      
                        
                        <div class="col-md-6">
                            
                            <img src="<?= base_url(); ?>assets/open-data.jpeg" class="img img-thumbnail img-responsive" />
                           
                        </div>
                        
                        <div class="col-md-6">
                            
                             <h5 class='text-center  pt-5'>Open Data Hackathon</h5>
                            
                            <p class='text-danger text-center'><a href="https://forms.gle/M5PffKC27fXFvX4s8" target="_blank" style="color:red; font-weight: bold; font-size: 19px;">Register Now </a></p>
                
                        </div>
                        
                    </div>
                    
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
      </div>
</div> -->


       <section class="p-0 example home-startup bg-dark-slate-blue homepage" id="slider">
            <article class="content">
                <div id="rev_slider_26_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery">
                     <!--Start revolution slider 5.4.1 fullscreen mode -->
                    <div id="rev_slider_26_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                        <ul>
                            
                            <?php foreach($slider as $s){ ?>

                              <li data-index="rs-7<?= $s->id; ?>" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="1500"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="<?= $s->id; ?>" data-param1="<?= $s->id; ?>" data-description="">
                                <!-- main image -->
                                <img src="<?=base_url('admin-dashboard/').$s->path;?>" alt="Top smart City Incubation Center" data-bgcolor="#262b32" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>

                                <div class="overlay-bg bg-extra-dark-gray" style="opacity: 0.5;"></div> 

                                 <!--main text layer -->
                                <div class="tp-caption tp-resizeme alt-font text-white font-weight-600 text-center"
                                     id="slide-411-layer-01"
                                     data-frames='[{"delay":200,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[-100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                     data-type="text"
                                     data-whitespace="nowrap"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-50','-50','-115','-65']" 
                                     data-width="auto"
                                     data-height="auto"
                                     data-fontsize="['70','53','60','35']"
                                     data-lineheight="['70','59','70','39']"
                                     data-letterspacing="['-2','-1','-1','-1']"
                                     data-responsive="off"
                                     data-responsive_offset="off"
                                     data-paddingtop="['0','0','0','0']"
                                     data-paddingbottom="['15','8','8','8']"
                                     data-paddingright="['0','0','0','0']"
                                     data-paddingleft="['0','0','0','0']"
                                     style="text-shadow: 0 0 20px rgba(0,0,0,0.3);" id="heading"><?= $s->title; ?></div>

                                <!-- small text layer -->
                                <div class="tp-caption tp-resizeme alt-font text-white font-weight-300 text-center"
                                     id="slide-411-layer-02" 
                                     data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[-100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                     data-type="text"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                     data-y="['middle','middle','middle','middle']" data-voffset="['65','100','-5','15']" 
                                     data-width="auto"
                                     data-height="auto"
                                     data-fontsize="['19','16','19','14']"
                                     data-lineheight="['28','14','23','20']"
                                     data-letterspacing="['0.5','0.5','0.5','0.5']"
                                     data-responsive="off"
                                     data-responsive_offset="on" id="para">
                                        <?= $s->summary; ?>
                                     </div> 

                            </li>               
                            
                         <?php } ?>

                        </ul>
                    </div>
                </div>
                
               
                
            </article>
        </section>
      
        <!-- end revolution slider -->
        <!-- start section -->
       <section class="extra-big-section cover-background overflow-visible" id="serves">
            <div class="container">
                <div class="row">
                    <div class="col-12 overlap-section md-no-margin-top md-margin-70px-bottom sm-margin-50px-bottom">
                        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 justify-content-center">
                            <div class="col col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                                <!-- start feature box item-->
                                <div class="feature-box h-100 feature-box-left-icon-middle padding-3-rem-all bg-white box-shadow-small box-shadow-large-hover border-radius-4px overflow-hidden last-paragraph-no-margin lg-padding-2-half-rem-tb lg-padding-2-rem-lr md-padding-4-rem-all">
                                    <div class="feature-box-icon margin-30px-right lg-margin-25px-right">
                                        <i class="line-icon-Cursor-Click2 icon-medium text-green"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <div class="text-slate-blue font-weight-500 text-large margin-5px-bottom">Technology and Funding Support  </div>
                                        <!--<span>Move your business at the speed of technology</span>-->
                                    </div>
                                </div>
                                <!-- end feature box item-->
                            </div>
                            <div class="col col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                                <!-- start feature box item-->
                                <div class="feature-box h-100 feature-box-left-icon-middle padding-3-rem-all bg-white box-shadow-small box-shadow-large-hover border-radius-4px overflow-hidden last-paragraph-no-margin lg-padding-2-half-rem-tb lg-padding-2-rem-lr md-padding-4-rem-all">
                                    <div class="feature-box-icon margin-30px-right lg-margin-25px-right">
                                        <i class="line-icon-Bakelite icon-medium text-green"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <div class="text-slate-blue font-weight-500 text-large margin-5px-bottom">Constant Handholding and Mentoring </div>
                                       
                                    </div>
                                </div>
                                <!-- end feature box item-->
                            </div>
                            <div class="col col-sm-8">
                                <!-- start feature box item-->
                                <div class="feature-box h-100 feature-box-left-icon-middle padding-3-rem-all bg-white box-shadow-small box-shadow-large-hover border-radius-4px overflow-hidden last-paragraph-no-margin lg-padding-2-half-rem-tb lg-padding-2-rem-lr md-padding-4-rem-all">
                                    <div class="feature-box-icon margin-30px-right lg-margin-25px-right">
                                        <i class="line-icon-Boy icon-medium text-green"></i>
                                    </div>
                                    <div class="feature-box-content">
                                        <div class="text-slate-blue font-weight-500 text-large margin-5px-bottom">Legal and IPR assistance </div>
                                       
                                    </div>
                                </div>
                                <!-- end feature box item-->
                            </div>
                        </div>
                    </div>
                </div>
                <br/><br/>
                <div class="row align-items-end">
                    <div class="col-12 col-lg-3 col-md-6 order-1 text-center text-lg-right last-paragraph-no-margin md-margin-50px-bottom wow animate__fadeInLeft">
                        <div class="title-large-2 text-green alt-font line-height-70px letter-spacing-minus-3px font-weight-600">2000+</div>
                        <span class="alt-font text-extra-dark-gray font-weight-500 text-uppercase letter-spacing-2px d-block margin-15px-bottom sm-margin-5px-bottom">Jobs to be Created</span>
                        <p class="w-90 d-inline-block sm-w-60 xs-w-80"></p>
                    </div>
                    <div class="col-12 col-lg-6 order-3 order-lg-2 text-center z-index-0 wow animate__fadeIn">
                        <div class="tilt-box" data-tilt-options='{ "maxTilt": 20, "perspective": 1000, "easing": "cubic-bezier(.03,.98,.52,.99)", "scale": 1, "speed": 500, "transition": true, "reset": true, "glare": false, "maxGlare": 1 }'>
                            <span class="text-extra-big-2 alt-font text-uppercase text-green font-weight-600 letter-spacing-minus-10px image-mask cover-background" style="background-image: url('<?=base_url();?>assets/images/slider2.jpg');" alt="Top Incubation Center in India">500</span>
                            <span class="alt-font text-extra-large text-extra-dark-gray letter-spacing-4px font-weight-600 text-uppercase margin-5px-top d-block">Lakhs+ funding to be raised </span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 col-md-6 order-2 text-center text-lg-left order-lg last-paragraph-no-margin md-margin-50px-bottom wow animate__fadeInRight">
                        <div class="title-large-2 text-green alt-font line-height-70px letter-spacing-minus-3px font-weight-600" >500+</div>
                        <span class="alt-font text-extra-dark-gray font-weight-500 text-uppercase letter-spacing-2px d-block margin-15px-bottom sm-margin-5px-bottom">Startups to be engaged and impacted</span>
                        <p class="w-90 d-inline-block sm-w-60 xs-w-80"></p>
                    </div>                   
                </div>
            </div>
            <br/>
            <div style="text-align: center; font-size:25px;"><i>our innovation impact target for next 3 to 5 years </i></div>
        </section>
         <!--end section --> 
        <!--start section --> 
         <section class="overflow-visible pt-md-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center overlap-section wow animate__zoomIn">
                        <img class="rounded-circle box-shadow-large w-170px h-170px border-all border-width-10px border-color-white" src="<?=base_url();?>assets/images/slider1.jpg" alt="government incubation centre">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        
        <section id="whoweare pt-4 pb-4">
           
           <div class="container">
                     
                     <div class="row border p-3 bg-light">
                               <div class="col-md-12">
                                       <h1 class="text-center"> Who we are </h1>
                                       
                               </div>
                               
                               <div class="col-md-4">
                               
                                     <img src="<?=base_url();?>assets/images/logo.png" data-at2x="<?=base_url();?>assets/images/logo.png" alt="Top Incubation Center in India" id=logo>
                               
                               </div>
                               
                               <div class="col-md-8">
                                   
                                    <p class="text-justify"> Foundation for Spark Incubation Centre is a business incubation center of Sagar Smart City Limited. With programs specifically catering to entrepreneurs with profit ventures and social ventures, also student and women entrepreneurs, Foundation for Spark Incubation Centre (SPARK) offers its support to various players of the startup ecosystem. This center is currently being managed by Incubation Masters.</p>
                               
                               </div>
                               
                               
                     
                     </div>
                     
                     
           </div>
        
        </section>
        
        
        
        <section id="serviceat">
            <div class="container">
                
                 <div class="row ">
                    <div class="col-12 margin-1-rem-top md-margin-1-rem-top">
                        <h3 class="text-center">Services</h3>
                        <p class="text-center">We at Foundation for Spark Incubation Centre, synergise startups, innovators, MSMEs, corporations, governments, academia and investors to drive transformative change. Our innovation ecosystem promises to stand firmly on various services , which includes– </p>

                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/technology.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                           
                          <h6 class="text-center">Technology Support</h6>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/mentor.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Mentorship and Handholding</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/workingspace.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Co-working space with IT enable solution</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/infra.png" alt="Incubation Center in Madhya Pradesh"  />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">World class infrastructure</h6>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/funding.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Funding Support</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/procurement.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Business Registration</h6>
                        </div>
                    </div>
                </div> 
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/legal.png" alt="Incubation Center in Madhya Pradesh" />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Legal and IPR assistance</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-heading text-center pt-2">
                            <img src="<?=base_url();?>/assets/images/service/grant.png" alt="Top smart City Incubation Center"  />
                        </div>
                        <div class="card-body">
                            <h6 class="text-center">Grant and Government schemes support</h6>
                        </div>
                    </div>
                </div>    
                </div>
                
            </div>
        </section>
        
        <section>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-5 col-lg-6 col-md-10 md-margin-50px-bottom">
                        <div class="col-12 p-0 margin-3-rem-bottom wow animate__fadeIn">
                            
                            <h5 class="alt-font font-weight-600 text-extra-dark-gray d-inline-block w-90 lg-w-80 sm-w-100">Startup Incubation Process</h5>
                        </div>
                        <div class="col-12 p-0">
                            <!-- start progress item -->
                            <div class="col-12 p-0 process-step-style-02 wow animate__fadeIn" data-wow-delay="0.2s">
                                <div class="process-step-item">
                                    <div class="process-step-icon-wrap">
                                        <div class="process-step-icon text-center border-all border-color-green border-width-2px bg-green alt-font font-weight-500">1</div>
                                        <span class="process-step-item-box-bfr bg-medium-gray"></span>
                                    </div>
                                    <div class="process-content last-paragraph-no-margin">
                                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-5px-bottom">Enroll with SPARK</span>
                                        <p class="w-80 xs-w-100">Register your startup idea with us on this portal and present your pitch when given a chance before our screening committee.</p>                
                                    </div>
                                </div>
                            </div>
                            <!-- end progress item -->
                            <!-- start progress item -->
                            <div class="col-12 p-0 process-step-style-02 wow animate__fadeIn" data-wow-delay="0.4s">
                                <div class="process-step-item">
                                    <div class="process-step-icon-wrap">
                                        <div class="process-step-icon text-center border-all border-color-green border-width-2px bg-green alt-font font-weight-500">2</div>
                                        <span class="process-step-item-box-bfr bg-medium-gray"></span>
                                    </div>
                                    <div class="process-content last-paragraph-no-margin">
                                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-5px-bottom">Be our Sparkle (incubatee)</span>
                                        <p class="w-80 xs-w-100">Foundation for Spark Incubation Centre offers an incubation period of 6 to 9 months to the startups where we nurture your idea and help you convert into Minimum Viable Product and then a full-fledged useful product.</p>                
                                    </div>
                                </div>
                            </div>
                            <!-- end progress item -->
                            <!-- start progress item -->
                            <div class="col-12 p-0 process-step-style-02 wow animate__fadeIn" data-wow-delay="0.6s">
                                <div class="process-step-item">
                                    <div class="process-step-icon-wrap">
                                        <div class="process-step-icon text-center border-all border-color-green border-width-2px bg-green alt-font font-weight-500">3</div>
                                    </div>
                                    <div class="process-content last-paragraph-no-margin">
                                        <span class="alt-font d-block font-weight-500 text-extra-dark-gray margin-5px-bottom">Discover Success</span>
                                        <p class="w-80 xs-w-100">Once you successfully move out of Foundation for Spark Incubation Centre, you will be ready to take your product into market and continue your entrepreneurship journey and Achieve.</p>                
                                    </div>
                                </div>
                            </div>
                            <!-- end progress item -->
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 offset-xl-1 wow animate__fadeInRight">
                        <div class="outside-box-right position-relative">
                            <img src="<?=base_url();?>assets/images/slider2.jpg" class="overflow-hidden" alt="Top smart City Incubation Center" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
      
        <!-- end section -->
        <!-- start section -->
        <section class="bg-light-gray" id="digital">
            <div class="container">
                <div class="row justify-content-center wow animate__fadeIn">
                    <div class="col-12 col-xl-4 col-lg-5 col-sm-6 text-center margin-3-half-rem-bottom md-margin-2-rem-bottom">
                        
                        <h5 class="alt-font font-weight-600 text-extra-dark-gray d-inline-block letter-spacing-minus-1-half">Digital Transformation</h5>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-2" id="p1">
                        <i class="fa fa-cogs fa-2x text-dark" aria-hidden="true"></i>
                        <h6>Technology</h6>
                    </div>
                    <div class="col-md-2" id="p2">
                       <i class="fa fa-database fa-2x text-primary" aria-hidden="true"></i>
                        <h6>Data</h6>
                    </div>
                    <div class="col-md-2" id="p1">
                        <i class="fa fa-cloud fa-2x text-success" aria-hidden="true"></i>
                        <h6>Cloud</h6>
                    </div>
                    <div class="col-md-2" id="p2">
                         <i class="fa fa-magic fa-2x text-warning" aria-hidden="true"></i>
                         <h6>Automation</h6>
                    </div>
                    <div class="col-md-2" id="p1">
                       <i class="fa fa-cog fa-2x text-info" aria-hidden="true"></i>
                        <h6>AI</h6>
                    </div>
                    <div class="col-md-2" id="p2">
                          <i class="fa fa-info fa-2x text-red" aria-hidden="true"></i>
                         <h6>Other</h6>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="cover-background sm-overflow-visible wow animate__fadeIn" style="background-image: url('<?=base_url();?>assets/images/bg.jpg');" id="subscribe" alt="Top smart City Incubation Center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 col-md-10 text-center">
                        
                        <h5 class="alt-font font-weight-600 text-extra-dark-gray d-inline-block">Would you like to stay updated with all the activities, events, training any other program by Foundation for Spark Incubation Centre? </h5>
                        <h5 class="alt-font font-weight-600 text-extra-dark-gray d-inline-block">Leave your email here and we will keep you posted. </h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8 col-md-9 text-center">
                        <div class="newsletter-style-04 position-relative d-inline-block w-80 alt-font margin-3-rem-top md-w-100 sm-margin-15px-top">
                           <?PHP

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();




?>
                            <form action="" method="post" >
                                <input type="hidden" name="ip" value="<?=$user_ip;?>">
                                <input class="main-font box-shadow border-radius-6px large-input border-all border-color-transparent no-margin required" id="email" name="email" placeholder="Enter your email address" type="email" required>
                               
                                <input class="btn text-small letter-spacing-1px btn-green font-weight-400 validate " id="subscribe" type="submit"  style="line-height:40px;"/>
                            </form>
                            <script>
  $("#subscribe").submit(function() {
                var ip= $("#ip").val();
                var email= $("#email").val();

                $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>Home/subscrib",
                    data: "ip=" + ip+ "&email=" + email,
                    success: function(data) {
                       $('#result').text(data);
                    }
                });


            });
</script>
                            
                          
                        </div>
                      <h6 id='result'></h6>
                    </div>
                </div>
            </div>
        </section>
        

<?php include('footer.php');?>
<script>
$(window).on('load',function(){
    var delayMs = 1500; // delay in milliseconds
    
    setTimeout(function(){
        $('#popup').modal('show');
    }, delayMs);
}); 
</script>


