<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/images/logosepuh.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/nice-select.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/gijgo.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/slick.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/slicknav.css') ?>">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css') ?>">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

   






</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="<?php echo base_url('assets/images/logosepuh.png') ?>" width="80" height="60" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="<?php echo site_url('beranda_user') ?>">Beranda</a></li>

                                            <li><a class="" href="<?php echo site_url('wisata_user') ?>">Destinasi</a></li>
                                            <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="destination_details.html">Destinations details</a></li>
                                                    <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo site_url('admin')?>">Login Admin</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                   <span class="mr-4"> <a href="<?php echo site_url('beranda_user/logout')?>"> <i class="fa fa-sign-out"></i>Logout</a>
                                   </span>

    
                                    <div class="social_links d-none d-xl-block">
                                        <i class="fa fa-user"></i><span class="ml-2"><?= $user['username'] ?></span>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->