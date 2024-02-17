<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Update Investor
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $invester = $this->db->get_where('investor',array('id'=>$_GET['id']))->row(); 
                                ?>
                                <form action="<?=base_url();?>Investor/updateInvestor?editid=<?=$invester->id;?>"
                                    method="post" enctype="multipart/form-data">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Company Name </label>
                                            <input type="text" class="form-control" value="<?=$invester->compay_name;?>"
                                                placeholder="Company Name" name="compay_name" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID</label>
                                            <input type="text" class="form-control" value="<?=$invester->email;?>"
                                                placeholder="Email ID" name="email" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number</label>
                                            <input type="text" class="form-control" value="<?=$invester->mobile;?>"
                                                placeholder="Mobile Number" name="mobile" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Country</label>
                                            <select name="country" class="countries form-control" id="countryId">
                                                <option value="">Select Country</option>
                                                <option value="<?=$invester->country; ?>" selected>
                                                    <?=$invester->country; ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> State </label>
                                            <select name="state" class="states form-control" id="stateId">
                                                <option value="<?=$invester->state; ?>" selected><?=$invester->state; ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> City </label>
                                            <select name="city" class="cities form-control" id="cityId">
                                                <option value="<?=$invester->city; ?>" selected><?=$invester->city; ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL</label>
                                            <input type="text" class="form-control" name="linkedin"
                                                value="<?=$invester->linkedin_url;?>" placeholder="LinkedIn URL" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Type of Invester</label>
                                            <select name="type_of_invester" class="form-control">
                                                <option value="">Select Invester</option>
                                                <option value="Seed Investor"
                                                    <?php if($invester->type_of_invester=='Seed Investor'){ echo "selected"; }; ?>>
                                                    Seed Invester</option>
                                                <option value="Angel Investor"
                                                    <?php if($invester->type_of_invester=='Angel Investor'){ echo "selected"; }; ?>>
                                                    Angel Invester</option>
                                                <option value="Venture Capatilist"
                                                    <?php if($invester->type_of_invester=='Venture Capatilist'){ echo "selected"; }; ?>>
                                                    Venture Capatilist</option>
                                                <option value="Other"
                                                    <?php if($invester->type_of_invester=='Other'){ echo "selected"; }; ?>>
                                                    Other
                                                </option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Owner Name</label>
                                            <input type="text" class="form-control" value="<?=$invester->name;?>"
                                                name="ownername" placeholder="Owner Name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">No of Company Founded</label>
                                            <input type="number" class="form-control"
                                                value="<?=$invester->company_funded;?>" name="company_funded"
                                                placeholder="No of Company Funded" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Total Amount Invested</label>
                                            <input type="text" class="form-control" name="amount_invested"
                                                placeholder="Total Amount Invested"
                                                value="<?=$invester->total_amount_invested;?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Password</label>
                                            <input type="password" class="form-control"
                                                value="<?=$invester->password;?>" name="password"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">

                                            <label class="pt-2">Choice of startup stage for investing</label>
                                            <br />
                                            <label> <input type="checkbox" class="m-2" name="stage_ideation" value="1"
                                                    <?php if($invester->stage_ideation==1){echo "checked"; } ?> />Ideation</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_conception" value="1"
                                                    <?php if($invester->stage_conception==1){echo "checked"; } ?> />Conception</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_commitment" value="1"
                                                    <?php if($invester->stage_commitment==1){echo "checked"; } ?> />Commitment</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_validation" value="1"
                                                    <?php if($invester->stage_validation==1){echo "checked"; } ?> />Validation</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_launch" value="1"
                                                    <?php if($invester->stage_launch==1){echo "checked"; } ?> />Launch</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_scaling" value="1"
                                                    <?php if($invester->stage_scaling==1){echo "checked"; } ?> />Scaling</label>
                                            <label> <input type="checkbox" class="m-2" name="stage_establishing"
                                                    value="1"
                                                    <?php if($invester->stage_establishing==1){echo "checked"; } ?> />Establishment</label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Describe about you</label>
                                            <textarea class="form-control"
                                                name="summary"><?=$invester->description;?></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="<?=base_url('uploads/invester/').$invester->logo; ?>"
                                                width="50px" />
                                            <label class="pt-2 ">Profile Image</label>
                                            <input type="file" class="form-control" name="profile" />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block"
                                                value="Update Invester" />
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