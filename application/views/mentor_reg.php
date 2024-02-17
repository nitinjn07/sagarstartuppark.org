<?php include 'header.php';?>
<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Top Incubation Center in India">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" style="height: 100px ;margin-bottom:80px;">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">

                <h2 class="text-white pt-4">Register as a Mentor</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Mentor</h1>
            </div>

        </div>
    </div>
</section>
<div class="container">
    <div class="row">

        <div class="col-lg-12 col-md-12 mt-3 mb-3">
            <div class="p-5 box-shadow"
                style="border:5px solid grey; border-radius: 20px; box-shadow: 2px 2px 10px grey;">
                <form method="post" action="<?=base_url();?>Mentor_reg/saveData" class="wow fadeInUp"
                    data-wow-duration="0.6s"
                    style="visibility: visible; animation-duration: 0.6s; animation-name: fadeInUp;" id="mentore">
                    <div class="row">
                        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                        </div>-->
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter Name"
                                        name="name" required="true" onkeypress="return blockSpecialChar_numbers(event)"
                                        maxlength="50">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control email_address"
                                        placeholder="E-mail" required="true">
                                    <span id="email_result" style="margin-top: -10px;"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Mobilenumber">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" data-smk-type="number" name="mobile" class="form-control"
                                        placeholder="Mobile Number" required="true" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">LinkedIn URL <span class="text-primary"> (Optional)</span></label>
                                    <input type="text" class="form-control" placeholder="Enter LinkedIn URL"
                                        name="linkedin_url">
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

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Number of years in Mentorship: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="no_of_mentor_year" required="true">
                                        <option value="">Select One</option>
                                        <option value="1">1 </option>
                                        <option value="2">2</option>
                                        <option value="3">3 </option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="Others">More than 10</option>
                                    </select>
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


                                <b>Sector Experties: <span class="text-primary">(Optional)</span></b>

                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_1" name="is_legal_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_1" class="checkChoice">Legal Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_2" name="is_finance_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_2" class="checkChoice">Finance Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_3" name="is_account_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_3" class="checkChoice">Account Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_4" name="is_marketing_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_4" class="checkChoice">Marketing Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_5" name="is_it_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_5" class="checkChoice">IT Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_6" name="is_digital_marketing_expert"
                                        elname="Checkbox" value="1">
                                    <label for="Checkbox_6" class="checkChoice">Digital Marketing</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_7" name="is_business_strategy_expert"
                                        elname="Checkbox" value="1">
                                    <label for="Checkbox_7" class="checkChoice">Business Strategy Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_8" name="is_women_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_8" class="checkChoice">Women Enterpreneure Expert</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="Checkbox_9" name="is_startup_expert" elname="Checkbox"
                                        value="1">
                                    <label for="Checkbox_9" class="checkChoice">Startup Expert</label>
                                </div>


                            </div>

                        </div>
                    </div>
                    <input type="checkbox" name="is_true" value="1" checked required="true">
                    &nbsp; I hereby certify that the above given information is true and accurate<span
                        class="text-danger">*</span>
                    <div class="col-md-12 mrg-20" align="center">
                        <div class="effect-1">
                            <input type="submit" class="btn btn-danger register_button" name="Submit">
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



<script>
$(document).ready(function() {

    $('.email_address').change(function(event) {

        event.preventDefault();

        var email = $('.email_address').val();
        var table = 'mentor';


        if (email != '') {
            $.ajax({

                url: '<?= base_url(); ?>Welcome/check_email_avalibility',
                method: 'POST',
                data: {
                    email: email,
                    table: table
                },
                success: function(response) {
                    $('#email_result').html(response);
                }

            });
        }

    });

});
</script>