<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        New Job opening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>JobOpening/AddNewJob" method="post"
                                    enctype="multipart/form-data" id="partner_reg">
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Select Startups<span
                                                    class="text-danger">(*)</span></label>
                                            <select name="startupid" class="form-control" required>
                                                <option value="">Select</option>
                                                <?php
                                                  $startup = $this->db->get_where('startup',array('delstatus'=>1,'startup_type'=>'Physical','is_graduate'=>0))->result(); 
                                                  foreach($startup as $s)
                                                  {
                                                 ?>
                                                <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col" data-bs-toggle="tooltip"
                                            title="Example: Social Media Marketing Intern">
                                            <label class="pt-2"> Job Title <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="job_title"
                                                placeholder="Job Title" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Type of Employment<span
                                                    class="text-danger">(*)</span></label>
                                            <select name="type_of_emp" id="typeofemp" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Intern">Intern</option>
                                                <option value="FullTime">Full Time</option>
                                                <option value="PartTime">Part Time</option>
                                                <option value="wfhparttime">Work From Home - Part Time</option>
                                                <option value="wfhfulltime">Work From Home - Full Time</option>
                                                <option value="wfhintern">Work From Home - Intern</option>
                                            </select>
                                        </div>
                                        <div class="col" id="assignment">
                                            <label class="pt-2 ">Assigment Duaration (No of Month) <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" id="ass" name="assignment" min="0" max="100000"
                                                class="form-control" />
                                        </div>

                                    </div>



                                    <div class="row">

                                        <div class="col">
                                            <label class="pt-2 ">Total Years of Experience <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="year_of_exp" min="0" max="20"
                                                class="form-control" required />
                                        </div>
                                        <div class="col">
                                            <br />
                                            <label class="pt-2 ">Min-Max Stipend or Salary /Month <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="min_salary" min="0" max="100000"
                                                placeholder="Min" required /> -
                                            <input type="number" name="max_salary" min="0" placeholder="Max"
                                                max="100000" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Country <span class="text-danger">(*)</span></label>
                                            <select name="country" class="countries form-control" id="countryId"
                                                required>
                                                <option value="">Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> State <span class="text-danger">(*)</span></label>
                                            <select name="state" class="states form-control" id="stateId" required>
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> City <span class="text-danger">(*)</span></label>
                                            <select name="city" class="cities form-control" id="cityId" required>
                                                <option value="">Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label class="pt-2 ">Average Working Hours/Day <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="avg_working_hours" min="0" max="20"
                                                class="form-control" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Designation <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="designation" class="form-control" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Industry Type<span
                                                    class="text-danger">(*)</span></label>
                                            <select name="industry_type" class="form-control" required>
                                                <option value="">Select Sectors</option>
                                                <option value="Healthcare">
                                                    Healthcare</option>
                                                <option value="Agriculture">
                                                    Agriculture</option>
                                                <option value="Information_Technology">
                                                    Information Technology
                                                </option>
                                                <option value="Citizen_Services">
                                                    Citizen Services</option>
                                                <option value="Social_welfare_and_development">
                                                    Social welfare and
                                                    development
                                                </option>
                                                <option value="Education">
                                                    Education
                                                </option>
                                                <option value="Finance">
                                                    Finance
                                                </option>
                                                <option value="Transportation">
                                                    Transportation</option>
                                                <option value="Legal_Services">
                                                    Legal Services</option>

                                                <option value="Technical_Services">
                                                    Technical Services</option>


                                                <option value="Marketing_and_Advertising">
                                                    Marketing and Advertising</option>

                                                <option value="Food_and_Beverage">
                                                    Food and Beverage</option>

                                                <option value="Commercial">
                                                    Commercial</option>

                                                <option value="Import_and_Export">
                                                    Import and Export</option>

                                                <option value="HR_Services">
                                                    HR Services</option>
                                                <option value="Other">
                                                    Other
                                                </option>
                                            </select>
                                        </div>



                                    </div>
                                    <div class="row">



                                        <div class="col">
                                            <label class="pt-2 ">Minimum Education Required<span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" name="minimum_edu" class="form-control" required>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">No of Openings<span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="no_of_openings" class="form-control" required>
                                        </div>



                                    </div>
                                    <div class="row">

                                        <div class="col-2 mt-3">
                                            <label class="pt-2 ">Skills<span class="text-danger">(*)</span></label>
                                        </div>
                                        <div class="col mt-3">
                                            <input type="text" class="form-control my-2" name="skill1" placeholder="1."
                                                required />
                                            <input type="text" class="form-control my-2" name="skill2" placeholder="2."
                                                required />
                                            <input type="text" class="form-control my-2" name="skill3"
                                                placeholder="3." />
                                            <input type="text" class="form-control my-2" name="skill4"
                                                placeholder="4." />
                                            <input type="text" class="form-control my-2" name="skill5"
                                                placeholder="5." />
                                        </div>




                                    </div>

                                    <div class="row">

                                        <div class="col-2 mt-3">
                                            <label class="pt-2 ">Contact Person<span
                                                    class="text-danger">(*)</span></label>
                                        </div>
                                        <div class="col mt-3">
                                            <input type="text" class="form-control my-2" name="name" placeholder="Name"
                                                required />
                                            <input type="text" class="form-control my-2" name="email"
                                                placeholder="Email" required />
                                            <input type="number" minlength="10" maxlength="10" class="form-control my-2"
                                                name="contact" placeholder="Contact" required />

                                        </div>




                                    </div>
                                    <div class="row">
                                        <label for="">Job Description <span class="text-danger">(*)</span></label>
                                        <textarea name="job_description" class="form-control my-2" required> </textarea>
                                    </div>
                                    <div class="row">
                                        <label for="">Comment or Remark</label>
                                        <textarea name="comment" class="form-control my-2"> </textarea>
                                    </div>
                                    <div class="row">
                                        <input type="submit" class="btn btn-primary" value="List Job" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        $(document).ready(function() {
            $('#assignment').hide();
            $("#ass").removeAttr("required");
            $('#typeofemp').on('change', function() {

                var a = $('#typeofemp').val();

                if (a.match("Intern")) {
                    $('#assignment').show();
                    $("#ass").attr("required", "true");
                } else {
                    $('#assignment').hide();
                    $("#ass").removeAttr("required");
                }

            });
        });
        </script>