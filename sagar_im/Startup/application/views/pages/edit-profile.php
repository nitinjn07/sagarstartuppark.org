<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Update your profile
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=base_url();?>Home/updateStartup?updateid=<?=$startup->id; ?>"
                                    method="post">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mt-2">
                                                <label>Startup ID</label>
                                                <input type="text" class="form-control mt-2"
                                                    value="<?=$startup->startup_id;?>" name="startup_id" readonly />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mt-2">
                                                <label>Email ID</label>
                                                <p class="pt-3"><?=$startup->email;?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mt-2">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control mt-2" name="mobile"
                                                    value="<?=$startup->mobile;?>" />
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mt-2">
                                                <label>Website Address/App Link</label>
                                                <input type="text" class="form-control mt-2" name="website_address"
                                                    value="<?=$startup->website_address;?>" />
                                            </div>
                                        </div>


                                        <div class="col-lg-4 pt-2">
                                            <div class="form-group pt-2">
                                                <label>DPIIT No</label>
                                                <input type="text" class="form-control mt-2"
                                                    value="<?=$startup->dpiit;?>" name="dpiit" />
                                            </div>
                                        </div>


                                        <div class="col-lg-12 pt-2">
                                            <div class="form-group pt-2">
                                                <label>Product / Services</label>
                                                <textarea class="form-control mt-2"
                                                    name="product_service_summary"><?=$startup->product_service_summary;?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-2">
                                            <div class="form-group pt-2">
                                                <label>About Us</label>
                                                <textarea class="form-control mt-2"
                                                    name="aboutus"><?=$startup->aboutus;?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 pt-2 pb-2 text-center">
                                            <input type="submit" class="btn btn-primary" value="Update Now" />

                                        </div>



                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <form action="<?=base_url();?>Dashboard/uploadLogo?id=<?=$startup->id;?>"
                                        method="post" enctype="multipart/form-data">
                                        <label><input type="file" name="profile_image" style="display: none;"
                                                onchange="readURL(this);" />

                                            <?php if($startup->logo != ''){ ?>
                                            <img alt="Admin Profile"
                                                src="<?= base_url('../uploads/logo/').$startup->logo; ?>"
                                                class="rounded-circle img-responsive mt-2" width="128" height="128"
                                                id="blah" />
                                            <?php } else { ?>
                                            <img alt="Admin Profile" src="<?= base_url('../assets/img/logo.jpg'); ?>"
                                                class="rounded-circle img-responsive mt-2" width="128" height="128"
                                                id="blah" />
                                            <?php } ?>
                                            <br />
                                            <button type="submit" value="Upload" class="btn btn-primary"> <i
                                                    class="fa fa-upload"></i> Upload</button>
                                        </label><br />
                                        <small>For best results, use an image at least 128px by 128px in .jpg </small>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3>Profile Status</h3>
                                <ul>
                                    <li
                                        <?php if($startup->logo!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        Logo
                                    </li>
                                    <li
                                        <?php if($startup->website_address!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        Website
                                    </li>
                                    <li
                                        <?php if($startup->dpiit!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        DPIIT
                                    </li>


                                    <li
                                        <?php if($startup->mobile!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        Startup Contact
                                    </li>


                                    <li
                                        <?php if($startup->product_service_summary!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        Product/Service Summary
                                    </li>
                                    <li
                                        <?php if($startup->aboutus!==""){ echo "class='text-success'"; } else { echo "class='text-danger'"; } ?>>
                                        About Us
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>