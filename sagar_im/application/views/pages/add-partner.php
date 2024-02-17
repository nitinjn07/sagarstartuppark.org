<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add New Partner
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Partner/addPartner" method="post"
                                    enctype="multipart/form-data" id="partner_reg">
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Firm Name <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="firm_name"
                                                placeholder="Mentor Name" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Email ID <span
                                                    class="text-success">(optional)</span></label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="Email ID" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="mobile"
                                                placeholder="Mobile Number" />
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">

                                        <div class="col">
                                            <label class="form-label">Country<span class="text-danger">*</span></label>
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
                                            <label class="form-label">State<span class="text-danger">*</span></label>
                                            <select name="state" id="state" class="form-control">
                                                <option value="">Select State</option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="form-label">City<span class="text-danger">*</span></label>
                                            <select name="city" id="city" class="form-control">
                                                <option value="">Select City</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">LinkedIn URL <span
                                                    class="text-success">(optional)</span></label>
                                            <input type="text" class="form-control" placeholder="LinkedIn URL"
                                                name="linkedin" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Type of Firm <span
                                                    class="text-danger">(*)</span></label>
                                            <select class="form-control" name="type_of_firm">
                                                <option value="">Select One</option>
                                                <option value="corporate">Corporate </option>
                                                <option value="ecosystempartner">Ecosystem Partner</option>
                                                <option value="serviceprovider">Service Provider </option>
                                                <option value="Govt/NGO">Govt/NGO</option>
                                                <option value="internationalecosysytem">International Ecosysytem
                                                </option>
                                                <option value="academic">Academic</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Address <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Address" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Describe about you <span
                                                    class="text-success">(optional)</span></label>
                                            <textarea class="form-control" name="summary"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2 ">Profile Image <span
                                                    class="text-success">(optional)</span></label>
                                            <input type="file" class="form-control" name="profile" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Owner Name <span class="text-danger">(*)</span></label>
                                            <input type="text" name="ownername" class="form-control" />
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