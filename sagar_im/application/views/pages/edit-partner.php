<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Update Partner
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $partner = $this->db->get_where('partner',array('id'=>$_GET['id']))->row(); 
                                ?>
                                <form action="<?=base_url();?>Partner/updatePartner?editid=<?=$partner->id;?>"
                                    method="post" enctype="multipart/form-data">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Firm Name </label>
                                            <input type="text" class="form-control" value="<?=$partner->firm_name;?>"
                                                placeholder="Mentor Name" name="firm_name" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID</label>
                                            <input type="text" class="form-control" value="<?=$partner->email;?>"
                                                placeholder="Email ID" name="email" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number</label>
                                            <input type="text" class="form-control" value="<?=$partner->mobile;?>"
                                                placeholder="Mobile Number" name="mobile" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Country</label>
                                            <select name="country" class="countries form-control" id="countryId"="true">
                                                <option value="">Select Country </option>
                                                <option value="<?=$partner->country; ?>" selected>
                                                    <?=$partner->country; ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> State </label>
                                            <select name="state" class="states form-control" id="stateId"="true">
                                                <option value="<?=$partner->state; ?>" selected><?=$partner->state; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> City </label>
                                            <select name="city" class="cities form-control" id="cityId"="true">
                                                <option value="<?=$partner->city; ?>" selected><?=$partner->city; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL</label>
                                            <input type="text" class="form-control" value="<?=$partner->linkedin_url;?>"
                                                name="linkedin" placeholder="LinkedIn URL" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Type of Firm</label>
                                            <select class="form-control" name="type_of_firm"="true">
                                                <option value="">Select One</option>
                                                <option value="corporate"
                                                    <?php if($partner->type_of_firm=='corporate'){echo "selected"; }?>>
                                                    Corporate
                                                </option>
                                                <option value="ecosystempartner"
                                                    <?php if($partner->type_of_firm=='ecosystempartner'){echo "selected"; }?>>
                                                    Ecosystem
                                                    Partner</option>
                                                <option value="serviceprovider"
                                                    <?php if($partner->type_of_firm=='serviceprovider'){echo "selected"; }?>>
                                                    Service Provider </option>
                                                <option value="Govt/NGO"
                                                    <?php if($partner->type_of_firm=='Govt/NGO'){echo "selected"; }?>>
                                                    Govt/NGO
                                                </option>
                                                <option value="internationalecosysytem"
                                                    <?php if($partner->type_of_firm=='internationalecosysytem'){echo "selected"; }?>>
                                                    International Ecosysytem</option>
                                                <option value="academic"
                                                    <?php if($partner->type_of_firm=='academic'){echo "selected"; }?>>
                                                    Academic
                                                </option>
                                                <option value="Others"
                                                    <?php if($partner->type_of_firm=='Others'){echo "selected"; }?>>
                                                    Others
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Password</label>
                                            <input type="password" class="form-control" value="<?=$partner->password;?>"
                                                name="password" placeholder="Password" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Describe about you</label>
                                            <textarea class="form-control"
                                                name="summary"><?=$partner->summary;?></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <img src="<?=base_url('uploads/partner/').$partner->user_pic_url; ?>"
                                                width="50px" />
                                            <label class="pt-2 ">Profile Image</label>
                                            <input type="file" class="form-control" name="profile" />
                                        </div>
                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block"
                                                value="Update" />
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