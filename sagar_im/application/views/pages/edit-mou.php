<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add MoU
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $mou = $this->db->get_where('mou',array('id'=>$_GET['id']))->row(); 
                                
                                  $state= $this->db->get_where('states',array('id'=>$mou->state))->row();
                                  $city= $this->db->get_where('cities',array('id'=>$mou->city))->row();
                                ?>
                                <form action="<?=base_url();?>MoU/updateMou?editid=<?=$mou->id; ?>" method="post"
                                    enctype="multipart/form-data">

                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">MoU with </label>
                                            <select class="form-control" name="type_of_org">
                                                <option value="">Select</option>
                                                <option value="investor"
                                                    <?php if($mou->type_of_org=='investor'){ echo "selected"; }?>>
                                                    Investor</option>
                                                <option value="academic_institute"
                                                    <?php if($mou->type_of_org=='academic_institute'){ echo "selected"; }?>>
                                                    Academic Institute</option>
                                                <option value="mentors"
                                                    <?php if($mou->type_of_org=='mentors'){ echo "selected"; }?>>Mentors
                                                </option>
                                                <option value="startup_enabler"
                                                    <?php if($mou->type_of_org=='startup_enabler'){ echo "selected"; }?>>
                                                    Startup Enablers/Companies</option>
                                                <option value="others"
                                                    <?php if($mou->type_of_org=='others'){ echo "selected"; }?>>Others
                                                </option>

                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Name of Organisation</label>
                                            <input type="text" class="form-control" placeholder="Name of Organisation"
                                                name="name_of_org" value="<?=$mou->name_of_org; ?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Mobile Number"
                                                name="mobile_no" value="<?=$mou->mobile_no; ?>" />
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="mb-3 form-group col">
                            <label class="form-label py-2">Country<span class="text-danger">*</span></label>
                            <select name="country" id="country" class="form-control" required>
                                <option value="">Select Country</option>
                                <?php 
                                                  $country = $this->db->get_where('countries')->result();
                                                  foreach($country as $c)
                                                  {
                                                 ?>
                                <option value="<?=$c->id;?>" <?php if($mou->country==$c->id){echo "selected";}?>><?=$c->name;?></option>
                                <?php
                                                  }
                                                ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group col">
                            <label class="form-label py-2">State<span class="text-danger">*</span></label>
                            <select name="state" id="state" class="form-control" required>
                                <option value="">Select State</option>
                                <option value="<?=@$state->id;?>" selected> <?=@$state->name;?></option>

                            </select>
                        </div>
                        <div class="form-group col">
                            <label class="form-label py-2">City<span class="text-danger">*</span></label>
                            <select name="city" id="city" class="form-control" required>
                                <option value="">Select City</option>
                                 <option value="<?=@$city->id;?>" selected> <?=@$city->name;?></option>

                            </select>
                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">MoU Start Date</label>
                                            <input type="date" class="form-control" placeholder="Start Date"
                                                name="start_date" value="<?=$mou->start_date; ?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">MoU End Date (</label>
                                            <input type="date" class="form-control" placeholder="End Date"
                                                name="end_date" value="<?=$mou->end_date; ?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Respective Person Name</label>
                                            <input type="text" class="form-control" name="person_name"
                                                placeholder="Person Name" value="<?=$mou->person_name; ?>" />
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2 ">Email ID</label>
                                            <input type="text" class="form-control" name="email_id"
                                                placeholder="Email ID" value="<?=$mou->email_id; ?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">MoU Doc <a
                                                    href="<?=base_url('uploads/mou/').$mou->mou_doc;?>"
                                                    target="_blank"><i class="fa fa-file-pdf-o fa-2x text-danger"
                                                        aria-hidden="true"></i></a></label>

                                            <input type="file" class="form-control" name="mou_doc" />
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