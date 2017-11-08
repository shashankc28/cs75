<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Venue - Responsive HTML5 Template</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Venue - Responsive HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Fonts  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?> http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800"  type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,700,800,900" type="text/css">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/v-nav-menu.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/v-animation.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/v-bg-stylish.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/v-shortcodes.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/theme-responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/owl-carousel/owl.carousel.css"  />

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/rs-plugin/css/settings.css"  />
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/rs-plugin/css/custom-captions.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
    <link rel="stylesheet" href="<? php echo base_url(); ?>css/login.css">
     <link rel="stylesheet" href="<? php echo base_url(); ?>css/photos.css">
</head>

<body class="no-page-top">

    <!--Header-->
    <!--Set your own background color to the header-->
    <header class="semi-transparent-header" data-bg-color="rgba(9, 103, 139, 0.36)" data-font-color="#fff">
        <div class="container">

            <!--Site Logo-->
            <div class="logo" data-sticky-logo="img/logo-white.png" data-normal-logo="img/logo.png">
                <a href="index.html">
                    <img src="img/logo.png"  alt="Venue" data-logo-height="35">
                </a>
            </div>
            <!--End Site Logo-->

            <div class="navbar-collapse nav-main-collapse collapse">

                <!--Header Search-->
                <div class="search" id="headerSearch">
                    <a href="#" id="headerSearchOpen"><i class="fa fa-search"></i></a>
                    <div class="search-input">
                        <form id="headerSearchForm" action="#" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control search" name="q" id="q" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <span class="v-arrow-wrap"><span class="v-arrow-inner"></span></span>
                    </div>
                </div>
                <!--End Header Search-->

                <!--Main Menu-->
                <nav class="nav-main mega-menu one-page-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li class="active">
                            <a data-hash href="#home"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a data-hash href="#screenshots"><i class="fa fa-laptop"></i>blog</a>
                        </li>
                        <li>
                            <a data-hash href="#download"><i class="fa fa-download"></i>forum</a>
                        </li>
                         <li>
                            <a data-hash href="#download"><i class="fa fa-download"></i>video tutorials</a>
                        </li>

                        <li>
                        <!-- Button trigger modal -->
  <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</button>
  <!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Alias:</label>
              <div class="controls">
                <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="username" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="password" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                <label class="checkbox inline" for="rememberme-0">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                  Remember me
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-success">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal">
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="Email" class="form-control" type="text" placeholder="JoeSixpack@sixpacksrus.com" class="input-large" required="">
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Alias:</label>
              <div class="controls">
                <input id="userid" name="userid" class="form-control" type="text" placeholder="JoeSixpack" class="input-large" required="">
              </div>
            </div>
            
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>
            
            <!-- Multiple Radios (inline) -->
            <br>
            <div class="control-group">
              <label class="control-label" for="humancheck">Humanity Check:</label>
              <div class="controls">
                <label class="radio inline" for="humancheck-0">
                  <input type="radio" name="humancheck" id="humancheck-0" value="robot" checked="checked">I'm a Robot</label>
                <label class="radio inline" for="humancheck-1">
                  <input type="radio" name="humancheck" id="humancheck-1" value="human">I'm Human</label>
              </div>
            </div>
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
      </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div>
                        </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--End Header-->




::::::::::



     <!--Footer-Wrap-->
        <div class="footer-wrap">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <section class="widget">
                                <img alt="Venue" src="img/logo-white.png" style="height: 40px; margin-bottom: 20px;">
                                <p class="pull-bottom-small">
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra,
                                    per inceptos himenaeos. Nulla nunc dui, tristique in semper vel,
                                    congue sed ligula auctor fringill torquent per conubia nostra.
                                    Class aptent taciti sociosqu ad litora conubia nostra.
                                </p>
                                <p>
                                    <a href="page-about-us-2.html">Read More →</a>
                                </p>
                            </section>
                        </div>
                        <div class="col-sm-3">
                            <section class="widget">
                                <div class="widget-heading">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="footer-contact-info">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-building"></i>Your Company </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-map-marker"></i>1 Liberty St New York, NY 5006 </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-phone"></i><strong>Phone:</strong> (123) 456-7890</p>
                                        </li>
                                    </ul>
                                    <br />

                                    <ul class="social-icons standard">
                                        <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                                        <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                                        
                                        <li class="youtube"><a href="#" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                                        <li class="googleplus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
 
                        <div class="col-sm-3">
                            <section class="widget">
                                <div class="widget-heading">
                                    <h4>Recent Works</h4>
                                </div>
                                <ul class="portfolio-grid">
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-1.jpg" />
                                            <span class="tooltip">Phasellus enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-2.jpg" />
                                            <span class="tooltip">Phasellus enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-3.jpg" />
                                            <span class="tooltip">Phasellus enim<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-4.png" />
                                            <span class="tooltip">Lorem Imput<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-5.jpg" />
                                            <span class="tooltip">Phasellus Enim libero<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="portfolio-single.html" class="grid-img-wrap">
                                            <img src="img/thumbs/project-6.jpg" />
                                            <span class="tooltip">Phasellus Enim<span class="arrow"></span></span>
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright">
                <div class="container">
                    <p>© Copyright 2014 by Venue. All Rights Reserved.</p>
                    <nav class="footer-menu std-menu">
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!--End Footer-Wrap-->
    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Libs -->
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.easing.js"></script>
    <script src="<?php echo base_url();?>js/jquery.fitvids.js"></script>
    <script src="<?php echo base_url();?>js/jquery.carouFredSel.min.js"></script>
    <script src="<?php echo base_url();?>js/theme-plugins.js"></script>
    <script src="<?php echo base_url();?>js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url();?>js/imagesloaded.js"></script>

    <script src="<?php echo base_url();?>js/view.min.js?auto"></script>

    <script src="<?php echo base_url();?>plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo base_url();?>plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <script src="<?php echo base_url(); ?>js/theme-core.js"></script>
    <script src="<?php echo base_url(); ?>js/login.js"></script>

</body>
</html>
