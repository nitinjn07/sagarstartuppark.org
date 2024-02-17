<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add New Mentor
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Mentor/addMentor" method="post"
                                    enctype="multipart/form-data" id="mentor_registration">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Mentor Name <span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Mentor Name"
                                                name="name" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID <span
                                                    class='text-success'>(*)</span></label></label>
                                            <input type="text" class="form-control" placeholder="Email ID" name="email"
                                                required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number <span
                                                    class='text-danger'>*</span></label></label>
                                            <input type="text" class="form-control" placeholder="Mobile Number"
                                                name="mobile" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">
                                            <label class="form-label">Country<span class="text-danger">*</span></label>
                                            <select name="country" id="country" class="form-control" required>
                                                <option value="">Select Country</option>
                                                <?php 
                                                  $country = $this->db->get_where('countries')->result();
                                                  foreach($country as $c)
                                                  {
                                                 ?>
                                                <option value="<?=$c->id;?>"><?=$c->name;?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">State<span class="text-danger">*</span></label>
                                            <select name="state" id="state" class="form-control" required>
                                                <option value="">Select State</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">City<span class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control" required>
                                                <option value="">Select City</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL <span class='text-success'>
                                                    (optional)</span></label>
                                            <input type="text" class="form-control" name="linkedin"
                                                placeholder="LinkedIn URL" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Experiece <span class='text-danger'>*</span></label>
                                            <input type="number" class="form-control" name="exp"
                                                placeholder="Mentorship Experiece" />
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">

                                            <label class="pt-2">Experties In <span
                                                    class='text-success'>(optional)</span></label>
                                            <br />
                                            <label> <input type="checkbox" class="m-2" name="is_legal_expert"
                                                    value="1" />Legal
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_finance_expert"
                                                    value="1" />Finance
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_account_expert"
                                                    value="1" />Account
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_marketing_expert"
                                                    value="1" />Marketing
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_it_expert"
                                                    value="1" />IT
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2"
                                                    name="is_digital_marketing_expert" value="1" />Digital Marketing
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2"
                                                    name="is_business_strategy_expert" value="1" />Business Strategy
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_startup_expert"
                                                    value="1" />Startup
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_softskill_expert"
                                                    value="1" />Soft Skill
                                                Expert</label>
                                            <label> <input type="checkbox" class="m-2" name="is_hr" value="1" />Soft
                                                HR</label>
                                            <label> <input type="checkbox" class="m-2" name="is_ipr"
                                                    value="1" />IPR</label>


                                            <label> <input type="checkbox" class="m-2" name="is_social_media"
                                                    value="1" />Social Media
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_global_expansion"
                                                    value="1" />Glopal Expansion
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_funding_expert"
                                                    value="1" />Funding
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_sales_expert"
                                                    value="1" />Sales
                                                Expert</label>

                                            <label> <input type="checkbox" class="m-2" name="is_cloud_technlogy"
                                                    value="1" />Cloud Technology</label>

                                            <label> <input type="checkbox" class="m-2" name="is_export"
                                                    value="1" />Export</label>

                                            <label> <input type="checkbox" class="m-2" name="is_content"
                                                    value="1" />Content </label>

                                            <label> <input type="checkbox" class="m-2" name="is_story_telling"
                                                    value="1" />Stroy telling </label>

                                            <label> <input type="checkbox" class="m-2" name="is_product_development"
                                                    value="1" />Product Development </label>

                                            <label> <input type="checkbox" class="m-2" name="is_other" value="1"
                                                    checked />Other
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Profile Detail <span
                                                    class='text-danger'>*</span></label>
                                            <textarea class="form-control" name="summary"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2 ">Mentor Photo (JPG, PNG, JPEG format allowed) <span
                                                    class='text-success'>(*)</span></label>
                                            <input type="file" class="form-control" name="profile" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">MOU (PDF format allowed) <span
                                                    class='text-success'>(*)</span></label>
                                            <input type="file" class="form-control" name="mou" required />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block" value="Add" />
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>