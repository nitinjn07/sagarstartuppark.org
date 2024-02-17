<?php include 'header.php';?>
<!-- start page title -->

<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');"
    alt="Incubation Center in Madhya Pradesh">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" style="height: 100px ;margin-bottom:80px;">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">

                <h2 class="text-white text-left">Thank You</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Thank You
                </h1>
                <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
            </div>

        </div>
    </div>
</section>
<!-- start section -->

<section class="big-section">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-9 col-md-12 text-center">
                <h1 class='display-4'>Thank You</h1>
                <p><?= @$_SESSION['success']; ?></p>
                <div class="p-3 bg-success mx-auto text-center text-white my-5"
                    style="width:100px; height:100px; border-radius:100%; line-height:100px; ">
                    <i class="fa fa-check fa-3x"> </i>
                </div>

                <a href="<?=base_url();?>" class="btn btn-primary my-4">Go to Home</a>
            </div>
        </div>
    </div>
</section>
<!-- end section -->
<!-- start footer -->
<?php include 'footer.php';?>