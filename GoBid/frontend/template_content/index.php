<?php 
    
  session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Home | GoBid</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="assets/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	
	
    <link href="css/footer.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<a class="navbar-brand" href="index.php"><img src="img/bidnowlogo.png" width="145px" height="40px"></a>
                    <!--<a class="navbar-brand" href="index.php">Go<span>Bid</span></a>-->
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="Auction.php">Auction</a></li>
                       

                        
                        
                        <li><a href="contact.php">Contact</a></li>
						<li><a href="Login.php">
                          <?php if (isset($_SESSION['Login'])): ?>
                            Logout
                          <?php else: ?>
                            Login
                          <?php endif ?>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!-- revolution slider start -->
    <div class="fullwidthbanner-container main-slider">
        <div class="fullwidthabnner">
            <ul id="revolutionul" style="display:none;">
                <!-- 1st slide -->
                <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                    <div class="caption lfl slide_item_left"
                        data-x="10"
                        data-y="70"
                        data-speed="400"
                        data-start="1500"
                        data-easing="easeOutBack">
                        <img src="img/banner/ban2.png" alt="Image 1">
                    </div>
                    <div class="caption lfr slide_title"
                        data-x="670"
                        data-y="120"
                        data-speed="400"
                        data-start="1000"
                        data-easing="easeOutExpo">
						BIDNOW
                    </div>

                    <div class="caption lfr slide_subtitle dark-text"
                        data-x="670"
                        data-y="190"
                        data-speed="400"
                        data-start="2000"
                        data-easing="easeOutExpo">
                        AN ONLINE AUCTION FOR CLOTHING
                    </div>
                    <div class="caption lfr slide_desc"
                        data-x="670"
                        data-y="260"
                        data-speed="400"
                        data-start="2500"
                        data-easing="easeOutExpo">
						Enjoy the best items for fashion, sports, and anything <br>
						under wearing apparel! Items from brand new to secondhand, <br>
						all posted by different people around NCR! <br>
                    </div>
                    <a class="caption lfr btn yellow slide_btn" href="auction.php" target="_self"
                        data-x="670"
                        data-y="400"
                        data-speed="400"
                        data-start="3500"
                        data-easing="easeOutExpo">
                        SHOP HERE!
                    </a>

                 </li>

                 <!-- 2nd slide  -->
                 <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                     <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                     <img src="img/banner/banner_bg.jpg" alt="">
                     <div class="caption lft slide_title"
                          data-x="10"
                          data-y="125"
                          data-speed="400"
                          data-start="1500"
                          data-easing="easeOutExpo">
                         YES! GREAT DEALS EVERYWHERE!
                     </div>
                     <div class="caption lft slide_subtitle dark-text"
                          data-x="10"
                          data-y="180"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutExpo">
                         Comunicate and meet sellers for awesome items
                     </div>
                     <div class="caption lft slide_desc dark-text"
                          data-x="10"
                          data-y="240"
                          data-speed="400"
                          data-start="2500"
                          data-easing="easeOutExpo">
                         Need clothes, new pair of shoes or accessories? <br>
						Great deals are found here at BIDNOW! <br>
						Shop here and place your bids and win great items!
                     </div>
                     <a class="caption lft slide_btn btn red slide_item_left" href="bestdeals.php" target="_self"
                        data-x="10"
                        data-y="360"
                        data-speed="400"
                        data-start="3000"
                        data-easing="easeOutExpo">
                        Best Seller
                     </a>
                     <div class="caption lft start"
                          data-x="640"
                          data-y="55"
                          data-speed="400"
                          data-start="2000"
                          data-easing="easeOutBack"  >
                         <img src="img/banner/man.png" alt="man">
                     </div>
                     <div class="caption lft slide_item_right"
                          data-x="330"
                          data-y="20"
                          data-speed="500"
                          data-start="5000"
                          data-easing="easeOutBack">
                         <img src="img/banner/test_man.png" id="rev-hint2" alt="txt img">
                     </div>

                 </li>

                 <!-- 3rd slide  -->
                 <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="">
                     <img src="img/banner/red-bg.jpg" alt="">
                     <div class="caption lfl slide_item_right"
                          data-x="10"
                          data-y="105"
                          data-speed="1200"
                          data-start="1500"
                          data-easing="easeOutBack">
                         <img src="img/banner/imac.png" alt="Image 1">
                     </div>
                     <div class="caption lfl slide_item_right"
                          data-x="165"
                          data-y="30"
                          data-speed="500"
                          data-start="5000"
                          data-easing="easeOutBack">
                         <img src="img/banner/text_imac.png" id="rev-hint1" alt="Image 1">
                     </div>

                     <div class="caption lfr slide_title slide_item_left yellow-txt"
                          data-x="670"
                          data-y="145"
                          data-speed="400"
                          data-start="3500"
                          data-easing="easeOutExpo">
                         SELL YOUR ITEMS
                     </div>
                     <div class="caption lfr slide_subtitle slide_item_left"
                          data-x="670"
                          data-y="200"
                          data-speed="400"
                          data-start="4000"
                          data-easing="easeOutExpo">
                         and place them up for biddings
                     </div>
                     <div class="caption lfr slide_desc slide_item_left"
                          data-x="670"
                          data-y="280"
                          data-speed="400"
                          data-start="4500"
                          data-easing="easeOutExpo">
                         You can sell your clothes, bags, or accessories here at bid now! <br>
						Register now and post your offers! <br>
						Join us now!
                     </div>
					<a class="caption lfr btn yellow slide_btn" href="registration.php" target="_self"
                        data-x="670"
                        data-y="400"
                        data-speed="400"
                        data-start="3500"
                        data-easing="easeOutExpo">
                        SIGN UP HERE
                    </a>

                 </li>

             </ul>
            <div class="tp-bannertimer tp-top"></div>
         </div>
     </div>
     <!-- revolution slider end -->

    <!--container start-->
    <div class="container">
        <div class="row">
            <!--feature start-->
            <div class="text-center feature-head">
                <h1>welcome to gobid</h1>
                <p>An Online Auction</p>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box active">
                        <i class=" icon-desktop"></i>
                        <h2>Online Auction</h2>
                    </div>
                    <p class="f-text">Place your items up for bid
and let BIDNOW be the auctioneer.
You can also shop here and bid
to win your desired items.</p>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box active">
                        <i class=" icon-envelope"></i>
                        <h2>MESSAGING</h2>
                    </div>
                    <p class="f-text">Communicate with sellers
to establish a good deal between them.
Online messaging / chat in an email - like
interface will also be provided to you.
by BIDNOW.</p>
                </section>
            </div>
            <div class="col-lg-4 col-sm-4">
                <section>
                    <div class="f-box active">
                        <i class=" icon-bell-alt"></i>
                        <h2>REAL TIME NOTIFS</h2>
                    </div>
                    <p class="f-text">Keep in-touch with BIDNOW
and you will receive notifications
from your offered items, your participated biddings,
and even from us in real time!</p>
                </section>
            </div>
            <!--feature end-->
        </div>
        <div class="row">
            <!--quote start-->
            <div class="quote">
                <div class="col-lg-9 col-sm-9">
                    <div class="quote-info">
                        <h1>SHOP HERE AND PLACE YOUR BIDS</h1>
                        <p>Join the auctions to win your desired items. All wearing apparels offered here are available only within NCR.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <a href="auction.php" class="btn btn-danger purchase-btn">Bid now</a>
                </div>
            </div>
            <!--quote end-->
        </div>
    </div>


    <!--property start-->
    <div class="property gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 text-center">
                    <img src="img/propertyimg.png" alt="">
                </div>
                <div class="col-lg-6 col-sm-6">
                    <h1>Online Auction</h1>
                    <p>Need clothes, new pair of shoes or accessories? Great deals are found here at BIDNOW! Shop here and place your bids and win great items!.</p>
                    <a href="auction.php" class="btn btn-purchase">Bid now</a>
                </div>
            </div>
        </div>
    </div>
    <!--property end-->



     <!--parallax start-->
     <section class="parallax1">
         <div class="container">
             <div class="row">
                 <h1>“Enjoy the best items for
fashion, sports, and anything
under wearing apparel! Items from 
brand new to secondhand, all posted by
different people around NCR!”</h1>
             </div>
         </div>
     </section>
     <!--parallax end-->

     <div class="container">
        <div class="row">
            <div class="text-center feature-head">
                <h1> Meet Our Team </h1>
                <p>We work with forward thinking clients to create beautiful, trusted and amazing online auction.</p>
            </div>
            <div class="col-lg-4">
                <div class="person text-center">
                    <img src="img/team/canlasimg.jpg" alt="">
                </div>
                <div class="person-info text-center">
                    <h4>
                        <a href="javascript:;">Arlene Canlas</a>
                    </h4>
                    <p class="text-muted"> Web Development Professor </p>
                    <div class="team-social-link">
                        <a href="https://www.facebook.com/abcanlas"><i class="icon-facebook"></i></a>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="person text-center">
                    <img src="img/team/maryimg.jpg" alt="">
                </div>
                <div class="person-info text-center">
                    <h4>
                        <a href="javascript:;">Maryrose Liezel Adille</a>
                    </h4>
                    <p class="text-muted"> Web Designer </p>
                    <div class="team-social-link">
                        <a href="https://www.facebook.com/MaryroseAdille" target="_blank"><i class="icon-facebook"></i></a>
                       
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="person text-center">
                    <img src="img/team/choloimg.jpg" alt="">
                </div>
                <div class="person-info text-center">
                    <h4>
                        <a href="javascript:;">Cholo Miguel Antonio</a>
                    </h4>
                    <p class="text-muted"> Web Developer </p>
                    <div class="team-social-link">
                        <a href="https://www.facebook.com/cholomiguel" target="_blank"><i class="icon-facebook"></i></a>
                        <a href="https://twitter.com/heyimcholo" target="_blank"><i class="icon-twitter"></i></a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container end-->

   <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
					
					<a href="index.php"><h1>About us</h1></a>
                    <a href="contact.php"><h1>Contact Us</h1></a>
                    <address>
                        <p>Address: No. 123 Street</p>
                        <p>Quezon City, Philippines</p>

                        <p>Phone : 09123456789</p>
                       
                        <p>Email : <a href="javascript:;">bidnowph@gmail.com</a></p>
                    </address>
                </div>
                <div class="col-lg-5 col-sm-5">
					
                    
                    <h1>latest tweet</h1>
                    <div class="tweet-box">
                        <i class="icon-twitter"></i>
                        <em>Please follow <a href="javascript:;">@bidnowph</a> for all future updates of us! <a href="javascript:;">twitter.com/bidnowph</a></em>
                    </div>
					<br>
					 <a href="Auction.php"><h1>Bid now</h1></a>
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
					 <a href="login.php"><h1>Login</h1></a>
                     <a href="registration.php"><h1>Sign Up now</h1></a>
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="https://www.facebook.com/bidnowph/" target="_blank"><i class="icon-facebook"></i></a></li>
                        
                        <li><a href="https://twitter.com/bidnowph"  target="_blank"><i class="icon-twitter"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>

    <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script src="js/revulation-slide.js"></script>


  <script>

      RevSlide.initRevolutionSlider();

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      jQuery(".fancybox").fancybox();



  </script>

  </body>
</html>
