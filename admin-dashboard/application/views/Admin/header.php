<?php 
  if(!$this->session->userdata('username'))
  {
     session_destroy();
     echo "<script> window.location.href='CDAdmin'; </script>";
  }
  
?>
<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Sagar Startup DASHBOARD | ADMIN PANEL</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <style type="text/css">
    .btn-primary
    {
      min-width: 200px;
    }
    table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before,
    table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after
    {
      display: none;
    }
    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting
    {
      padding: 10px;
    }
    table.table-bordered.dataTable th, table.table-bordered.dataTable td
    {
      border-left-width: 0;
    }
    .review
    {
      width: 50px;
      text-align: center;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
      
    <div class="float-right">
      <a href="<?= base_url('../'); ?>" class="btn btn-primary" target="_blank">View Website</a>
    </div>
  </nav>
 
  
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <div class="text-center">
      <a href="<?= base_url(); ?>Dashboard" class="brand-link">
        <img src="<?= base_url(); ?>assets/images/logo.png" alt="#"  width="100px" />
      </a>
   </div>

    
    <?php include('sidebar.php'); ?>
    
  </aside>