<?php 
 if(!isset($_SESSION['username']))
 {
     redirect(base_url());
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
    <link rel="icon" type="icon/png" href="<?=base_url('assets/img/implus.png');?>" />

    <title>Incubation Management | Software</title>
    <!-- PICK ONE OF THE STYLES BELOW -->
    <link href="<?=base_url('assets/');?>css/modern.css" rel="stylesheet">
    <link href="<?=base_url('assets/');?>css/style.css" rel="stylesheet">
    <style>
    body {
        opacity: 0;
    }

    .wrapper:before {
        background: url('<?=base_url('assets/img/bg.jpg');?>');
        background-size: cover;
        background-position: center;
    }

    .sidebar-brand,
    .sidebar-brand:hover {
        background: black;
    }

    .sidebar-user img {
        width: 110px;
    }

    .card-title a {
        color: black;
    }


    ._pagination a,
    ._pagination strong {
        background-color: #000 !important;
        color: white !important;
        text-decoration: none;
        display: inline-block;
        width: auto;
        height: auto;
        border: 1px solid #b2b2b2;
        font-size: 14px;
        font-weight: 700;
        line-height: 28px;
        text-align: center;
        padding: 10px 20px;
        margin-right: 16px;
        -webkit-transition: all, 0.3s;
        -moz-transition: all, 0.3s;
        -ms-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    ._pagination strong {
        background-color: white !important;
        color: black !important;
    }
    </style>
    <script src="js/settings.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
       
       $health = $this->db->get_where('startup',array('verticals_sectors'=>'Healthcare','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $agri = $this->db->get_where('startup',array('verticals_sectors'=>'Agriculture','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $it = $this->db->get_where('startup',array('verticals_sectors'=>'Information_Technology','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $cs = $this->db->get_where('startup',array('verticals_sectors'=>'Citizen_Services','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $sw = $this->db->get_where('startup',array('verticals_sectors'=>'Social_welfare_and_development','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $trans = $this->db->get_where('startup',array('verticals_sectors'=>'Transportation','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $legal = $this->db->get_where('startup',array('verticals_sectors'=>'Legal_Services','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $technical = $this->db->get_where('startup',array('verticals_sectors'=>'Technical_Services','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $marketing = $this->db->get_where('startup',array('verticals_sectors'=>'Marketing_and_Advertising','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $food = $this->db->get_where('startup',array('verticals_sectors'=>'Food_and_Beverage','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $commercial = $this->db->get_where('startup',array('verticals_sectors'=>'Commercial','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $import = $this->db->get_where('startup',array('verticals_sectors'=>'Import_and_Export','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $hr = $this->db->get_where('startup',array('verticals_sectors'=>'HR_Services','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       $others = $this->db->get_where('startup',array('verticals_sectors'=>'Other','delstatus'=>1,'is_graduate'=>0,'is_screened'=>1))->num_rows(); 
       
    
    ?>
</head>

<body>

    <div class="wrapper">