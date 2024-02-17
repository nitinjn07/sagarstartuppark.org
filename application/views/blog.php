<?php include 'header.php';?>

   <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/3.jpg');" alt="Incubation Center in Madhya Pradesh">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">
                        
                        <h2 class="text-white text-left">News & Events</h2>
                        <h1 class="alt-font text-white opacity-10 margin-20px-bottom" ><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;News & Events</h1>
                        <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
                    </div>
                  
                </div>
            </div>
        </section>

    
     
        <!-- start section --> 
        <section class="bg-light-gray pt-3 padding-ten-lr xl-padding-two-lr lg-padding-three-lr sm-no-padding-lr pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- start filter navigation -->
                        <ul class="blog-filter grid-filter nav nav-tabs justify-content-center border-0 text-uppercase font-weight-500 alt-font padding-6-rem-bottom md-padding-4-half-rem-bottom sm-padding-2-rem-bottom">
                           <li class="nav"><a data-filter=".travel" href="#">News and Media</a></li>
                            <li class="nav"><a data-filter=".fashion" href="#">Events Concluded</a></li>
                            <li class="nav"><a data-filter=".lifestyle" href="#">Upcoming Events</a></li>
                           
                            
                        </ul>
                        <!-- end filter navigation -->
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 blog-content">
                        <ul class="blog-clean blog-wrapper grid row">
                            <li class="grid-sizer"></li>
                            
                            <?php foreach($events as $e){ 

                                if($e->evtLink != '')
                                {
                                    $link = $e->evtLink;
                                }
                                else
                                {
                                    $link = '#';
                                }

                                ?>

                             <li class="grid-item travel wow animate__fadeIn col-sm-4 mt-3">
                               <div class="blog-post text-center border-radius-6px bg-white box-shadow box-shadow-large-hover" id="<?= $e->evtContent; ?>">
                                    <div class="blog-post-image bg-gradient-fast-blue-purple">
                                        <a href="<?= $link; ?>" target="_blank" >  <img src="<?= base_url('admin-dashboard/').$e->evtImage; ?>" alt="Top Incubation Center In Madhya Pradesh" />
                                            <div class="blog-rounded-icon bg-white border-color-white absolute-middle-center">
                                                <i class="feather icon-feather-arrow-right text-extra-dark-gray icon-extra-small"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="post-details padding-30px-all xl-padding-25px-lr">
                                        <a href="#" class="post-author text-medium text-uppercase">
                                            
                                            <?php $date = date_create($e->evtDate); echo date_format($date, 'd M, Y'); ?>
                                        </a>
                                        <a href="<?= $link; ?>"  target="_blank" class="text-extra-dark-gray font-weight-500 alt-font d-block">
                                            <?= $e->evtContent; ?>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <?php } ?>
                             
                        </ul>
                    </div>         

                    <div class="col-4">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSagarStartupPark&tabs=timeline&width=10000&height=500&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=537155190724698" width="500" height="1500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->  
    

        
<?php include 'footer.php';?>

