<?php include 'header.php';?>
<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');"
    alt="Incubation Center in Madhya Pradesh">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" style="height: 100px ;margin-bottom:80px;">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">

                <h2
                    class="text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom mt-5">
                    Register as a Partner</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Partner</h1>
            </div>

        </div>
    </div>
</section>

<div class="container">
    <div class="row">


        <div class="col-lg-12 col-md-12 mt-5 mb-5">
            <div class="p-5 box-shadow"
                style="border:5px solid grey; border-radius: 20px; box-shadow: 2px 2px 10px grey;">
                <form method="post" action="<?=base_url();?>Partner_form/insert" class="wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;" id="patner">
                    <div class="row">
                        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>-->
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Name of Firm <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter Firm Name"
                                        name="firm_name" required="true"
                                        onkeypress="return blockSpecialChar_numbers(event)" maxlength="50" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Please Specify your Type: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="type_of_firm" required="true">
                                        <option value="">Select One</option>
                                        <option value="corporate">Corporate </option>
                                        <option value="ecosystempartner">Ecosystem Partner</option>
                                        <option value="serviceprovider">Service Provider </option>
                                        <option value="Govt/NGO">Govt/NGO</option>
                                        <option value="internationalecosysytem">International Ecosysytem</option>
                                        <option value="academic">Academic</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Contact person name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter Name"
                                        name="name" required="true" onkeypress="return blockSpecialChar_numbers(event)"
                                        maxlength="20" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="Email" placeholder="Enter Email"
                                        name="email" required="true" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Mobilenumber">Mobile <span class="text-primary">
                                            (Optional)</span></label>
                                    <input type="text" name="mobile" class="form-control" id="Mobilenumber"
                                        placeholder="Mobile Number" onkeypress="return blockAlphabets(event)"
                                        maxlength="10" />
                                </div>
                            </div>
                            <div class="col-sm-12" style=" padding-top: 10px;">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"
                                        data-dj-validator-group="group" data-dj-validator="check"></div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">LinkedIn URL <span class="text-primary"> (Optional)</span></label>
                                    <input type="url" class="form-control" id="Linkedin"
                                        placeholder="Enter LinkedIn URL" name="linkedin_url" />
                                </div>
                            </div>


                            <div class="mb-3 form-group col-md-12">
                                <label class="form-label py-2">Country<span class="text-danger">*</span></label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">Select Country</option>
                                    <?php 
                                    $im = $this->load->database('imdb', TRUE);
                                    
                                                  $country = $im->get_where('countries')->result();
                                                  foreach($country as $c)
                                                  {
                                                 ?>
                                    <option value="<?=$c->id;?>"><?=$c->name;?></option>
                                    <?php
                                                  }
                                                ?>
                                </select>
                            </div>
                            <div class="mb-3 form-group col-md-12">
                                <label class="form-label py-2">State<span class="text-danger">*</span></label>
                                <select name="state" id="state" class="form-control">
                                    <option value="">Select State</option>

                                </select>
                            </div>
                            <div class=" form-group col-md-12">
                                <label class="form-label py-2">City<span class="text-danger">*</span></label>
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select City</option>

                                </select>
                            </div>



                        </div>
                    </div>
                    <label><input type="checkbox" name="is_true" value="1" checked required="true" />
                        &nbsp; I hereby certify that the above given information is true and accurate<span
                            class="text-danger">*</span></label>
                    <div class="col-md-12 mrg-20" align="center">
                        <div class="effect-1">
                            <input type="submit" class="btn btn-danger btn-radius grd1 register_button" name="Submit" />
                        </div>
                    </div>
                </form>
            </div>



        </div>

    </div>
</div>
<!-- start section -->

<!-- end section -->
<?php include 'footer.php';?>