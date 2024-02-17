<?php
  if(!isset($_SESSION['admin_username']))
  {
    redirect(base_url().'home');
  } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Hackplpus</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/');?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/ionicons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/');?>assets/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/weather-icons.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/header.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/menu.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/index.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/responsive.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
    .highlight {
        background: lightgreen;
    }
    </style>
</head>

<body>
    <div class="wrapper dark_blue_color">
        <!-- header -->
        <div class="header-bg">
            <header class="main-header">
                <div class="container_header phone_view border_top_bott">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="logo d-flex align-items-center">
                                <a href="#">
                                    <h3 class="text-white">ADMIN</h3>
                                </a>

                            </div>

                            <div class="right_detail">
                                <div class="row d-flex align-items-center justify-content-end">
                                    <div class="col-xl-7 col-12 d-flex justify-content-end">
                                        <div class="right_bar_top d-flex align-items-center">


                                            <!-- Dropdown_User -->
                                            <div class="dropdown dropdown-user">
                                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                                                    data-hover="dropdown" data-close-others="true" aria-expanded="true">
                                                    <img class="img-circle pro_pic"
                                                        src="<?=base_url('assets/');?>assets/images/about-1.jpg" alt="">
                                                    <span class="name_admin">Hackplpus <i class="fa fa-angle-down"
                                                            aria-hidden="true"></i></span> </a>
                                                <ul class="dropdown-menu dropdown-menu-default">

                                                    <li>
                                                        <a href="<?=base_url();?>Admin/logout"> <i
                                                                class="icon-logout"></i> Log Out
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </header>



        </div>