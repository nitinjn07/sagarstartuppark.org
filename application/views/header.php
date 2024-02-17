<?php include('title.php');?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="sagarstartuppark.org" />
    <meta name="author" content="sparkincubationcenter.org">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="description" content="<?=$desc?>">
    <meta name="keywords" content="<?=$key?>">
    <!-- favicon icon -->
    <?php include('css.php');?>
    <style>
    .social {
        list-style: none;

    }

    .navbar .navbar-nav .nav-link:hover {
        color: #3DB2FF !important;

    }

    .navbar .navbar-nav .nav-link {
        font-size: 15px !important;

    }

    .social li {
        float: left;
        padding: 0px 10px;
        font-size: 16px;
    }

    .search-form-icon {
        font-size: 16px;
    }

    .social li a {
        text-decoration: none;
        color: orange;
    }

    .navbar-brand {

        background: transperant;
        padding: 10px 20px;
        border-radius: 20px;
    }

    .fa-bars {
        color: black;
    }

    .feather:hover {
        color: black;
    }

    #popup {
        position: fixed;
        z-index: 1000;
    }
    </style>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Spark Incubation Center, Sagar (M.P)",
        "image": "https://www.sagarstartuppark.org/assets/images/logo.png",
        "@id": "",
        "url": "https://www.sagarstartuppark.org",
        "telephone": "93430 25833",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "New Collectorate Premises, Sagar Smart City Limited, 2nd Floor] Spark Incubation Centre, near Pilikoti Mazar",
            "addressLocality": "Sagar",
            "postalCode": "470001",
            "addressCountry": "IN"
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ],
            "opens": "10:30",
            "closes": "06:30"
        },
        "sameAs": [
            "https://www.facebook.com/SagarStartupPark",
            "https://twitter.com/S_StartupPark",
            "https://www.instagram.com/sagarstartuppark",
            "https://www.youtube.com/channel/UCeiQjoisFuHq4pYpbiuQzYg",
            "https://www.linkedin.com/company/sagarstartuppark/",
            "https://www.sagarstartuppark.org"
        ]
    }
    </script>


    <?php 
           if($pagename=="index")
           {
               $pagename="";
           }
           
         ?>
    <link rel="canonical" href="<?=base_url().$pagename;?>" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-37JNCN5J0P"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-37JNCN5J0P');
    </script>

</head>

<body data-mobile-nav-style="classic">


    <header>

        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark header-light fixed-top navbar-boxed header-reverse-scroll"
            style="background:#fff;">

            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 mr-auto pl-lg-0">
                    <a class="navbar-brand" href="<?=base_url();?>">
                        <!--  <img src="<?=base_url();?>assets/images/logobar.jpg" alt="Top incubation Center Of Madhya Pradesh" id=logo>-->

                        <img src="<?=base_url();?>assets/images/logo.png"
                            data-at2x="<?=base_url();?>assets/images/logo.png" class="default-logo"
                            alt="Incubation Center in Madhya Pradesh" id=logo>

                        <img src="<?=base_url();?>assets/images/logo.png"
                            data-at2x="<?=base_url();?>assets/images/logo.png" class="mobile-logo"
                            alt="Startup Incubation Center" id=logo>
                    </a>
                </div>
                <div class="col-auto col-lg-7 menu-order px-lg-0">
                    <button class="navbar-toggler float-right" type="button" data-toggle="collapse" id="collapsebutton"
                        data-target="#navbarNavs" aria-controls="navbarNavs" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavs">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item">
                                <a href="<?=base_url();?>" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url();?>About" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url();?>Services" class="nav-link">Services</a>
                            </li>


                            <li class="nav-item">
                                <a href="<?=base_url();?>Blog" class="nav-link">News and Events </a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url();?>Contact" class="nav-link">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url();?>Registration" class="nav-link" id="join">Join SPARK</a>
                            </li>



                            <!--<li class="nav-item bg-danger py-0">-->
                            <!--    <a href="<?=base_url();?>HackathonRegistration" class="nav-link text-white" id="join">-->
                            <!--        Hackathon 2.0-->
                            <!--    </a>-->
                            <!--</li>-->

                            <li class="nav-item">
                                <a href="<?=base_url();?>Arohini" class="nav-link" id="join"><img
                                        src="<?=base_url('assets/images/arohini.png');?>" width="90px" /></a>
                            </li>

                        </ul>


                    </div>
                </div>

                <div class="col-auto col-lg-3 text-right pr-0 font-size-0">

                    <div class="header-push-button d-none d-lg-inline-block hidden-xs">

                        <?php $sl = $this->db->get_where('sociallinks', array('id'=>1))->row(); ?>

                        <ul class="social">
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#mySearchbar"><i
                                        class="fa fa-search"></i></a></li>
                            <li><a href="<?= $sl->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?= $sl->instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li><a href="<?= $sl->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="<?= $sl->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?= $sl->youtube; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </nav>


    </header>
    <!-- end header -->