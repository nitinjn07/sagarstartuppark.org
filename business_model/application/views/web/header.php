<?php if($this->session->userdata('uid') == ''){
  redirect('../startup-login', 'refresh');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .error {
        color: red;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="<?=base_url();?>dashboard"><img
                        src="<?=base_url('assets/images/im.png');?>" alt="logo"></a>
                <a class="navbar-brand brand-logo-mini" href="<?=base_url();?>dashboard"><img
                        src="<?=base_url('assets/images/im.png');?>" alt="logo"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">

                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li>
                        <a href="<?= base_url(); ?>Upload/logout" class="btn btn-outline-dark mt-2">Logout</a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">

            <?php include('sidebar.php'); ?>
            <div class="main-panel">