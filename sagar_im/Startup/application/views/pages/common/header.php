<?php 
 if(!isset($_SESSION['username']))
 {
     redirect(base_url().'Home/logout');
 }
 if(isset($_GET['viewed']))
 {
    $id = $_GET['viewed'];
    $data = array('is_viewed'=>1);

    $this->db->update('notification',$data,array('id'=>$id));
 }
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Incubation Management | Software</title>
    <!-- PICK ONE OF THE STYLES BELOW -->
    <link href="<?=base_url('assets/');?>css/modern.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <script src="js/settings.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>

    <div class="wrapper">