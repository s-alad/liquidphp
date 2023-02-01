<?php

	function url(){
		return sprintf("%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			''
		);
	}

	$get_dir = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
	//echo print_r(basename($get_dir));
	$baseuri = url();
?>

<?php require_once 'connection.php';?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liquid Barrier</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $baseuri ?>/assets/img/logo/li1.jpg">
<link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/slick.min.css">
    <!-- Odometer css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/odometer.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/animate.css">
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/style.css">
      <style>

.main-menu ul li a {
  transition:all .3s ease !important;

}
.main-menu ul li a:hover {

border-bottom:2px solid #0056b3 !important;
}
.main-menu ul li ul.dropdown {
  border-bottom: 2px solid #0056b3 !important;
}

.main-menu ul li ul.dropdown li:hover > a {
  color: black !important;
background: white !important;
}
.main-menu ul li ul.dropdown {
border: none !important;
}
</style>
    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun:300,300i,400,400i,500,600,700,800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/slick.min.css">
    <!-- Odometer css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/odometer.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/plugins/animate.css">
    <!-- main style css -->
    <link rel="stylesheet" href="<?php echo $baseuri ?>/assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css1/bootstrap.min.css"> -->

<style>

body {
    background: url("<?php echo $baseuri ?>/assets/img/xs-insight-ideas-bg.jpg") no-repeat center center;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

#x_page_image_wrapper{
    max-width: 1200px;
    margin: 0 auto;
    /* padding: 5em 1em 0; */
}

#x_page_image_wrapper .x_page_image_container{
    width: 100%;
    /* background-repeat: no-repeat;
    background-position: center top; */
    text-align: center;
    padding-top: 5em;
    /* text-shadow: 0px 0px 15px #fff; */
    /* font-size: 1.5em; */
    font-size: 1.3em;
}
#x_page_image_wrapper p{
    margin: 2.5em auto;
}
#x_page_image_wrapper a{
    font-weight: bold;
    padding: 1em;
}
#x_page_image_wrapper a:hover{
    text-decoration: underline;
}
#x_page_image_wrapper .link, #x_page_image_wrapper .link:visited{
    /* color: #000000; */
    color: #dc3545;
}

.border-line-footer-lbs-wrapper{
    width: inherit;
    padding: 0 1em;
}

.border-line-footer-lbs{
    width: inherit;
    max-width: 1200px;
}

.mobile-header{
    box-shadow: 0 0 5px #000;
}

@media screen and (max-width: 990px) {
    #x_page_image_wrapper .x_page_image_container {
        margin-top: -15%;
    }
}

@media screen and (max-width: 690px) {
    #x_page_image_wrapper .x_page_image_container {
        margin-top: -27%;
    }
}

/* Extra small devices (phones, 768px and down) */
@media only screen and (max-width: 768px) {
    .border-line-footer-lbs{
        margin-top: 5em;
    }
		/* #x_page_image_wrapper {
			margin: -3.8em auto;
		} */

    #x_page_image_wrapper p{
        margin: 1.5em auto;
    }
    #x_page_image_wrapper .x_page_image_container{
        /* background-image: url("<?php echo $baseuri ?>/assets/img/xs-insight-ideas-bg.jpg"); */
        min-height: 768px;
        /* padding-top: 6em; */
    }
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    #x_page_image_wrapper .x_page_image_container{
        /* background-image: url("<?php echo $baseuri ?>/assets/img/insight-ideas-bg.jpg"); */
        min-height: 1200px;
    }
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    #x_page_image_wrapper .x_page_image_container{
        /* background-image: url("<?php echo $baseuri ?>/assets/img/insight-ideas-bg.jpg"); */
        min-height: 1400px;
    }

    #x_page_image_wrapper{
        /* padding: 10em 1em 0; */
        padding: 2em 0 0 0;
    }
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    #x_page_image_wrapper .x_page_image_container{
        /* background-image: url("<?php echo $baseuri ?>/assets/img/insight-ideas-bg.jpg"); */
        min-height: 1683px;
    }
    #x_page_image_wrapper{
        /* padding: 10em 0 0; */
        padding: 2em 0 0 0;
    }
}
</style>

<script src="<?php echo $baseuri ?>/assets/js1/bootstrap.min.js">
</script>
<script src="<?php echo $baseuri ?>/assets/js/main.js">
</script>
<script src="<?php echo $baseuri ?>/assets/js/vendor/jquery-3.3.1.min.js">
</script>
</head>

<body class="" style="background-color: #2f3e51;">



    <!-- Start Header Area -->
        <header class="header-area">
        <div class="main-header d-none d-lg-block">
            <!--  -->
            <!-- header top start -->

            <!-- main menu start -->
            <div class="main-menu-wrapper sticky header-transparent" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <!-- logo area start -->
                            <div class="brand-logo">
                                <a href="/">
                                    <img style="height: 60px;" src="<?php echo $baseuri ?>/assets/img/logo/li1.jpg" alt="brand logo">
                                </a>
                            </div>
                            <!-- logo area end -->
                        </div>
                        <div class="col-lg-9">
                            <div class="main-menu-inner">
                                <!-- main menu navbar start -->
                                <nav class="main-menu">
                                    <ul>

                                        <li class="<?php echo (basename($get_dir) == 'about-us' || basename($get_dir) == 'company-history' || basename($get_dir) == 'diversity-inclusion')?'active':''; ?>">
										<a href="<?php echo $baseuri ?>/about-us">About</a>
                                        <ul class="dropdown">
                                                <li><a href="<?php echo $baseuri ?>/company-history"> Company History</a></li>
                                                <li><a href="<?php echo $baseuri ?>/diversity-inclusion">Diversity &amp; Inclusion</a></li>
                                            </ul>
                                          </li>
                                        <li class="<?php echo (basename($get_dir) == 'our-services')?'active':''; ?>"><a href="<?php echo $baseuri ?>/our-services">Services</a></li>
                                        <li class="<?php echo (basename($get_dir) == 'team')?'active':''; ?>"><a href="<?php echo $baseuri ?>/team">Our Team</a>
                                            <!-- <ul class="dropdown">
                                                <li><a href="team.html">Team</a></li>
                                                <li><a href="team-2.html">Team Style 02</a></li>
                                                <li><a href="team-details.html">Team Details</a></li>
                                            </ul> -->
                                        </li>
                                       <!--  <li><a href="blog-left-sidebar.html">Blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                <li><a href="blog-grid-full-width.html">Blog No Sidebar</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="blog-details-left.html">Blog Details Left Sidebar</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="<?php echo (basename($get_dir) == 'insights' || basename($get_dir) == 'writing-samples' || basename($get_dir) == 'use' || basename($get_dir) == 'press')?'active':''; ?>"><a href="<?php echo $baseuri ?>/insights"> Insights &amp; Ideas </a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo $baseuri ?>/writing-samples">Writing Samples</a></li>
                                                <!-- <li><a href="<?php echo $baseuri ?>/use">Case Studies</a></li> -->
                                                <li><a href="<?php echo $baseuri ?>/press">News</a></li>
                                            </ul>
                                        </li>
                                        <li class="<?php echo (basename($get_dir) == 'contact')?'active':''; ?>"><a href="<?php echo $baseuri ?>/contact">Contact Us</a></li>

                            <a href="https://www.facebook.com/liquidbarrier/"><i style="font-size:28px; padding-right: 10px; padding-top: 10px; color: black;" class=" fa fa-facebook"></i></a>
							<a href="https://www.twitter.com"><i style="font-size:28px; padding-right: 10px; padding-top: 10px; color: black;" class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/liquidbarrier/"><i style="font-size:28px; padding-right: 10px; padding-top: 10px; color: black;" class="fa fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/liquidbarrier"><i style="font-size:28px; padding-top: 10px; color: black; " class="fa fa-linkedin"></i></a>


                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu end -->
        </div>

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="/">
                                    <img style="height: 70px;" src="<?php echo $baseuri ?>/assets/img/logo/li1.jpg" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <!-- <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search Here...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div> -->
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="<?php echo $baseuri ?>/">Home</a>
                                   <!--  <ul class="dropdown">
                                        <li><a href="index.">Home version 01</a></li>
                                        <li><a href="index-2.html">Home version 02</a></li>
                                    </ul> -->
                                </li>
                                <li class="menu-item-has-children"><a href="<?php echo $baseuri ?>/about-us">about us</a>
                                <ul class="dropdown">
                                        <li><a href="<?php echo $baseuri ?>/company-history"> Company History</a></li>
                                        <li><a href="<?php echo $baseuri ?>diversity-inclusion">Diversity &amp; Inclusion</a></li>
                                    </ul>
                                  </li>
                                <li class="menu-item-has-children">
									<a href="<?php echo $baseuri ?>/our-services">Services</a>
                                </li>
                                <li class="menu-item-has-children"><a href="<?php echo $baseuri ?>/team">Our Team</a>
                                   <!--  <ul class="dropdown">
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="team-2.html">Team Style 02</a></li>
                                        <li><a href="team-details.html">Team Details</a></li>
                                    </ul> -->
                                </li>
                                <!-- <li class="menu-item-has-children"><a href="blog-left-sidebar.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-grid-full-width.html">blog no sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-details-left.html">blog details left sidebar</a></li>
                                    </ul>
                                </li> -->
                                <li class="menu-item-has-children"><a href="<?php echo $baseuri ?>/insights">Insights &amp; Ideas</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo $baseuri ?>/writing-samples">Writing Samples</a></li>
                                        <li><a href="<?php echo $baseuri ?>/use">Case Studies</a></li>
                                        <li><a href="<?php echo $baseuri ?>/press">Press / Media</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo $baseuri ?>/contact">Contact Us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <!-- <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="#">0123456789</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#">info@yourdomain.com</a>
                                </li>
                            </ul>
                        </div> -->
                        <div class="off-canvas-social-widget">
                             <a href="https://www.facebook.com/liquidbarrier/"><i style="" class=" fa fa-facebook"></i></a>


                            <a href="https://www.instagram.com/liquidbarrier/"><i style="" class="fa fa-instagram"></i></a>

                            <a href="https://www.linkedin.com/company/liquidbarrier"><i style=" " class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->

    </header>
<!--  -->
