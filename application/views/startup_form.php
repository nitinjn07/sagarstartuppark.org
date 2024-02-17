<?php include 'header.php';?>
<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Top Incubation Center in India">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" style="height: 100px ;margin-bottom:80px;">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">

                <h2
                    class="text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom mt-5">
                    Register as a Startup</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp; Startups</h1>
            </div>

        </div>
    </div>
</section>

<div class="container">
    <div class="row">


        <div class="col-lg-12 col-md-12 mt-5 mb-5">
            <div class="p-5 box-shadow"
                style="border:5px solid grey; border-radius: 20px; box-shadow: 2px 2px 10px grey;">
                <form method="post" action="<?=base_url();?>Startup_form/saveData" class="wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Startup Name <span class="text-danger">*</span></label>
                                    <input type="text" name="startup_name" class="form-control"
                                        placeholder="Startup Name" required="true" data-validation="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input name="email" type="email" class="form-control email_address" id="inputEmail3"
                                        placeholder="E-mail" required="true">
                                    <span id="email_result"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Mobile <span class="text-danger">*</span></label>
                                    <input name="mobile" type="text" class="form-control" id="inputEmail3"
                                        placeholder="9826******" required maxlength="10">
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">State<span class="text-danger">*</span></label>
                                    <select id="state" name="state" class="form-control" required="true"
                                        onchange="getDistrictList(this.value);">
                                        <option value="">Choose State</option>
                                        <option value="Andaman Nicobar Islands">Andaman Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra Nagar Haveli">Dadra Nagar Haveli</option>
                                        <option value="Daman Diu">Daman Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu Kashmir">Jammu Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    <!--<p class="help-block text-highlight">where Startup is registered</p>-->
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="City" placeholder="Enter the City"
                                        name="city" required="true" onkeypress="return blockSpecialChar_numbers(event)"
                                        maxlength="30">
                                    <!--<p class="help-block text-highlight">where Startup is registered</p>-->
                                </div>
                            </div>


                            <!--<div class="col-sm-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label>Founded In <span class="text-danger">*</span></label>-->


                            <!--                <select name="founded_month" id="monthpicker" ng-model="startup.startup_detail.founding_month" class="form-control ng-pristine ng-invalid ng-invalid-required ng-touched" required="true">-->
                            <!--                    <option value="? undefined:undefined ?"></option>-->
                            <!--                    <option value="" selected="selected">Select Month</option>-->
                            <!--                    <option value="0">January</option>-->
                            <!--                    <option value="1">February</option>-->
                            <!--                    <option value="2">March</option>-->
                            <!--                    <option value="3">April</option>-->
                            <!--                    <option value="4">May</option>-->
                            <!--                    <option value="5">June</option>-->
                            <!--                    <option value="6">July</option>-->
                            <!--                    <option value="7">August</option>-->
                            <!--                    <option value="8">September</option>-->
                            <!--                    <option value="9">October</option>-->
                            <!--                    <option value="10">November</option>-->
                            <!--                    <option value="11">December</option>-->
                            <!--                </select>-->

                            <!--                <input name="founded_year" class="form-control" id="inputEmail3" placeholder="Year" required="true" onkeypress="return blockAlphabets(event)" maxlength="4">-->


                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-sm-12" style=" padding-top: 10px;">
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"
                                        data-dj-validator-group="group" data-dj-validator="check"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!--<div class="col-sm-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="">zipcode <span class="text-danger">*</span></label>-->
                            <!--        <input type="number" class="form-control" id="zipcode" placeholder="Enter the zipcode" name="zipcode" required="true" minlength="6" data-validation="required">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Product/Service Summary <span
                                            class="text-danger">*</span> </label>
                                    <textarea name="product_service_summary" class="form-control" rows="5" cols=""
                                        placeholder="Provide Problem and Solution Statement of your Startup Idea."
                                        required="true" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">DPIIT Registration Number <span class="text-primary">
                                            (Optional)</span></label>
                                    <input type="number" class="form-control" placeholder="Enter DPIIT Registration"
                                        name="dpiit">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class=" control-label">Website Address <span class="text-primary">
                                            (Optional)</span></label>
                                    <input name="website_address" type="url" class="form-control"
                                        placeholder="Website Address">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Stage <span class="text-primary">
                                            (Optional)</span></label>
                                    <select name="stage" class="form-control">
                                        <option value="">Select Startup Stage</option>
                                        <option value="Ideation">Ideation</option>
                                        <option value="Proof_of_Concept">Proof of Concept</option>
                                        <option value="Beta_Launched">Beta Launched</option>
                                        <option value="Early_Revenues">Early Revenues</option>
                                        <option value="Steady_Revenues">Steady Revenues</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Sector <span class="text-primary">
                                            (Optional)</span></label>
                                    <select name="verticals_sectors" class="form-control">
                                        <option value="">Select Sector</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Citizen Services">Citizen Services</option>
                                        <option value="Social welfare and development">Social welfare and development
                                        </option>
                                        <option value="Transportation">Transportation</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </div>
                            </div>

                            <!--<div class="col-sm-12">-->
                            <!--    <div class="form-group">-->
                            <!--        <label class="control-label">Type of Business <span class="text-danger"></span></label>-->

                            <!-- <input type="text" class="form-control" id="inputEmail3" > -->
                            <!--        <select name="type_of_business" class="form-control">-->
                            <!--            <option value="">Select Business type</option>-->
                            <!--            <option value="B2B">B2B</option>-->
                            <!--            <option value="B2C">B2C</option>-->
                            <!--             <option value="B2C">B2G</option>-->
                            <!--            <option value="Others">Others</option>-->
                            <!--        </select>-->
                            <!-- <p class="help-block text-highlight">where Startup is registered</p> -->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <input type="checkbox" name="is_true" value="1" checked required="true">
                    &nbsp; I hereby certify that the above given information is true and accurate<span
                        class="text-danger">*</span>
                    <div class="col-md-12 mrg-20" align="center">
                        <div class="effect-1">
                            <input type="submit" class="btn btn-danger register_button" name="Submit" value="Submit"
                                id="regsiter_button">
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

    $('.email_address').change(function() {

        var email = $('.email_address').val();

        if (email != '') {
            $.ajax({

                url: '<?= base_url(); ?>Startup_form/check_email_avalibility',
                method: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    $('#email_result').html(response);
                }

            });
        }

    });

})
</script>