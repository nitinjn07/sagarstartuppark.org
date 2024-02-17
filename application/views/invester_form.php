<?php include 'header.php';?>
<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Top smart City Incubation Center">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" style="height: 100px ;margin-bottom:80px;">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">

                <h2
                    class="text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom mt-5">
                    Register as a Investor</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Investor</h1>
            </div>

        </div>
    </div>
</section>

<div class="container">
    <div class="row">


        <div class="col-lg-12 col-md-12 mt-5 mb-5">
            <div class="p-5 box-shadow"
                style="border:5px solid grey; border-radius: 20px; box-shadow: 2px 2px 10px grey;">
                <form method="post" class="wow fadeInUp" data-wow-duration="0.6s"
                    action="<?=base_url()?>Invester_form/insert"
                    style="visibility: visible; animation-duration: 0.6s; animation-name: fadeInUp;" id="investor">
                    <div class="row">
                        <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>-->
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Invester Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Name" placeholder="Enter Name"
                                        name="name" required="true" onkeypress="return blockSpecialChar_numbers(event)"
                                        maxlength="50">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Compay Name <span class="text-primary">(Optional)</span></label>
                                    <input type="text" class="form-control" id="Name" placeholder="Compay Name "
                                        name="compay_name" onkeypress="return blockSpecialChar_numbers(event)"
                                        maxlength="50">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Type of Investor <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type_of_invester" required="true">
                                        <option value="">Select One</option>
                                        <option value="SeedInvestor">Seed Investor</option>
                                        <option value="AngelInvestor">Angel Investor</option>
                                        <option value="VentureCapatilist">Venture Capatilist </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="Email" placeholder="Enter Email"
                                        name="email" required="true">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="Mobilenumber">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" id="Mobilenumber"
                                        placeholder="Mobile Number" required="true"
                                        onkeypress="return blockAlphabets(event)" maxlength="10">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">LinkedIn URL <span class="text-primary"> (Optional)</span></label>
                                    <input type="text" class="form-control" id="Linkedin"
                                        placeholder="Enter LinkedIn URL" name="linkedin_url" />
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
                                <label for=""><b>Investment Limit:</b> <span class="text-danger">*</span></label>
                                <div class="radio">

                                    <label><input type="radio" name="total_amount_invested" required>
                                        Upto 2 Lakh</label> &nbsp;&nbsp;
                                    <label> <input type="radio" name="total_amount_invested" required>
                                        2-5 Lakh</label> &nbsp;&nbsp;
                                    <label><input type="radio" name="total_amount_invested" required>
                                        More than 5 Lakh</label>
                                    <br />
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <label>Choice of startup stage for investing <span class="text-primary">
                                        (Optional)</span> </label>
                                <div class="tempContDiv">
                                    <div class="check">

                                        <span class="multiAttType">
                                            <input type="checkbox" id="Checkbox_1" class="checkBoxType" name="choice[]"
                                                elname="Checkbox" value="Ideation" formula_val="">
                                            <label for="Checkbox_1" class="checkChoice">Ideation</label>
                                        </span>

                                        <span class="multiAttType">
                                            <input type="checkbox" id="Checkbox_4" class="checkBoxType" name="choice[]"
                                                elname="Checkbox" value="Validation" formula_val="">
                                            <label for="Checkbox_4" class="checkChoice">Validation</label>
                                        </span> <br />

                                        <span class="multiAttType">
                                            <input type="checkbox" id="Checkbox_2" class="checkBoxType" name="choice[]"
                                                elname="Checkbox" value="Prototype/MVP" formula_val="">
                                            <label for="Checkbox_2" class="checkChoice">Prototype/MVP</label>
                                        </span> <span class="multiAttType">
                                            <input type="checkbox" id="Checkbox_3" class="checkBoxType" name="choice[]"
                                                elname="Checkbox" value="Scaling" formula_val="">
                                            <label for="Checkbox_3" class="checkChoice">Scaling</label>
                                        </span>

                                        <div class="clearBoth"></div>
                                    </div>
                                    <p class="errorMessage" elname="error" id="error-Checkbox"></p>
                                </div>
                                <div class="clearBoth"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><b>Number of companies funded:</b> <span
                                            class="text-primary">(Optional)</span></label>
                                    <select class="form-control" name="company_funded">
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

                        </div>
                    </div>
                    <div>
                        <label><input type="checkbox" name="is_true" value="1" checked required="true">
                            &nbsp; I hereby certify that the above given information is true and accurate<span
                                class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-12 mrg-20" align="center">
                        <div class="effect-1">
                            <input type="submit" class="btn btn-danger regsiter_button" name="Submit">
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