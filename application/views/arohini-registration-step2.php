<?php include 'header.php';?>
<style>
#indu {
    height: 100px;
    margin-bottom: 80px;
}
</style>

<?php  $about = $this->Model->selectDataWhere('aboutus',array('id'=>1))->row();  ?>


<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');"
    alt="Incubation Center in Madhya Pradesh">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" id="indu">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">

                <h2 class="text-white text-left">आरोहिणी</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;आरोहिणी</h1>
                <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
            </div>

        </div>
    </div>
</section>


<!-- start section -->
<section id="about" class="bg-light-gray pb-5">
    <div class="container">
        <div class="row">

            <div class='col-md-6'>

                <img src="<?=base_url('assets/images/arohini_1.jpeg');?>" height="200px" width="100%"
                    class="img img-thumbnail" />

            </div>

            <div class="col-md-6">
                <form action="<?=base_url();?>Arohini/RegisterNow" method="post">
                    <div class="form-group">
                        <label for="">Your Name <span class="text-danger">(*)</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required />
                    </div>
                    <div class="form-group">
                        <label for="">Email <span class="text-danger">(*)</span></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required />
                    </div>
                    <div class="form-group">
                        <label for="">Mobile <span class="text-danger">(*)</span></label>
                        <input type="number" name="mobile" class="form-control" placeholder="Enter your mobile no"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="">Describe Your Startup Idea <span class="text-danger">(*)</span></label>
                        <textarea name="startup_idea" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">City Name<span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" name="cityname" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register Now" />
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>
<!-- end section -->
<!-- start section -->

<!-- end section -->
<?php include 'footer.php';?>