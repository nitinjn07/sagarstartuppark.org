<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hackplpus 1.0</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/');?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/ionicons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/responsive.css" rel="stylesheet">


</head>

<body>
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="logo">
                    <a href="#">
                        <strong class="logo_icon">
                            <img alt="" src="<?=base_url('assets/');?>assets/images/small-logo.html">
                        </strong>
                        <span class="logo-default">
                            <img alt="" src="<?=base_url('assets/');?>assets/images/logo.png" width="200px">
                        </span>
                    </a>
                </div>
                <div class="login-form">
                    <form action="<?=base_url();?>Admin/AdminLogin" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?=base_url('assets/');?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>assets/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url('assets/');?>assets/js/custom.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    <?php 
         if(isset($_SESSION['success']))
         {
            ?>
    swal({
        title: "Good job!",
        text: "<?=$_SESSION['success'];?>",
        icon: "success",
        button: "Ok",
    });
    <?php

         }
         if(isset($_SESSION['failed']))
         {
            ?>
    swal({
        title: "Sorry!",
        text: "<?=$_SESSION['failed'];?>",
        icon: "warning",
        button: "Ok",
    });
    <?php

         }
         ?>
    </script>
</body>

</html>