<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Investor
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Investor/addInvester" method="post"
                                    enctype="multipart/form-data" id="invester_reg">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Company Name"
                                                name="compay_name" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Email ID"
                                                name="email" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Mobile Number"
                                                name="mobile" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="form-label">Country<span
                                                    class="text-danger">*</span></label>
                                            <select name="country" id="country" class="form-control">
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
                                            <label class="form-label">State<span
                                                    class="text-danger">*</span></label>
                                            <select name="state" id="state" class="form-control">
                                                <option value="">Select State</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">City<span
                                                    class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="">Select City</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="linkedin"
                                                placeholder="LinkedIn URL"  required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Type of Invester <span
                                                    class="text-danger">*</span></label>
                                            <select name="type_of_invester" class="form-control">
                                                <option value="">Select Invester</option>
                                                <option value="Seed Invester">Seed Invester</option>
                                                <option value="Angel Invester">Angel Invester</option>
                                                <option value="Venture Capatilist">Venture Capatilist</option>
                                                <option value="Other">Other</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Owner Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="ownername"
                                                placeholder="Owner Name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">No of Company Funded <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="company_funded"
                                                placeholder="No of Company Funded"  required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Total Amount Invested <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="amount_invested"
                                                placeholder="Total Amount Invested"  required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">

                                            <label class="pt-2">Choice of startup stage for investing <span
                                                    class="text-danger">*</span></label>
                                            <br />
                                            <label> <input type="checkbox" class="m-2" name="stage_ideation"
                                                    value="1" />Ideation</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_conception"
                                                    value="1" />Conception</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_commitment"
                                                    value="1" />Commitment</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_validation"
                                                    value="1" />Validation</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_launch"
                                                    value="1" />Launch</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_scaling"
                                                    value="1" />Scaling</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_establishing"
                                                    value="1" />Establishment</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Describe about you <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control" name="summary"  required ></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2 ">Profile Image <span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="profile"  required />
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