<?php if($this->session->userdata('uid') != ''){
  redirect(base_url().'dashboard','refresh');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Business Plan Generator</title>

    <link rel="stylesheet" href="<?=base_url('assets/');?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url('assets/');?>vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="<?=base_url('assets/');?>css/vertical-layout-light/style.css">

    <link rel="shortcut icon" href="<?=base_url('assets/');?>images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <h2>Business Model Creation</h2>
                                <p>$300 </p>

                            </div>
                            <?php
                                  $u = base64_decode($_GET['uid']);
                                  $p = $_GET['auth'];
                            ?>


                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" action="<?= base_url(); ?>Upload/user_login" method="post"
                                id="loginform">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email" value="<?=$u;?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" value="<?=$p;?>"
                                        name="password">
                                </div>
                                <div class="mt-3">
                                    <input type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        value="SIGN IN">
                                </div>


                                <!-- <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="signup" class="text-primary">Create</a>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?=base_url('assets/');?>vendors/js/vendor.bundle.base.js"></script>

    <script src="<?=base_url('assets/');?>js/off-canvas.js"></script>
    <script src="<?=base_url('assets/');?>js/hoverable-collapse.js"></script>
    <script src="<?=base_url('assets/');?>js/template.js"></script>
    <script src="<?=base_url('assets/');?>js/settings.js"></script>
    <script src="<?=base_url('assets/');?>js/todolist.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <?php if($this->session->flashdata('success_message') != ""): ?>

    <script type="text/javascript">
    swal({
        title: "Thank you!",
        text: "<?= $this->session->flashdata('success_message'); ?>",
        icon: "success",
        button: "Go Back!",
    });
    </script>

    <?php endif; ?>

    <?php if($this->session->flashdata('error_message') != ""): ?>

    <script type="text/javascript">
    swal({
        title: "Error !",
        text: "<?= $this->session->flashdata('error_message'); ?>",
        icon: "error",
        button: "Go Back!",
    });
    </script>

    <?php endif; ?>

    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        document.createElement('form').submit.call(document.getElementById('loginform'));
    });
    </script>
</body>

</html>