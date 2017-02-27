<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Contact | Gobid</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />


      <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

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
                    <a class="navbar-brand" href="index.php">Go<span>Bid</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Auction.php">Auction</a></li>
                       

                        
                        
                        <li class="active"><a href="contact.php">Contact</a></li>
						<li><a href="Login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Contacts</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Contacts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--google map start-->
     <div class="contact-map">
         <div id="map-canvas" style="width: 100%; height: 400px"></div>
     </div>
     <!--google map end-->

     <!--container start-->
    <div class="container">


        <div class="row">
            <div class="col-lg-5 col-sm-5 address">
                <h4>Philippines</h4>
                <p>
                    Adille and Antonio<br/>
                    Manila Philippines <br/>
                    
                </p>
                <br>
                <br>
                <br>
                <p>
                    Phone <br/>
                    <span class="muted">09123456789/span><br/>
                    Email <br/>
                    <span class="muted">maryrosecholo@gmail.com</span>
                </p>
            </div>
            <div class="col-lg-7 col-sm-7 address">
                <h4>Send us a Message</h4>
                <div class="contact-form">
                    <form role="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" placeholder="" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" placeholder="" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Message</label>
                            <textarea placeholder="" rows="5" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-danger" type="submit">Submit</button>
                    </form>

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
                    <h1>contact info</h1>
                    <address>
                        <p>Address: No. 123 Street</p>
                        <p>Quezon City, Philippines</p>

                        <p>Phone : 09123456789</p>
                       
                        <p>Email : <a href="javascript:;">maryrosecholo@gmail.com</a></p>
                    </address>
                </div>
                <div class="col-lg-5 col-sm-5">
                    <h1>latest tweet</h1>
                    <div class="tweet-box">
                        <i class="icon-twitter"></i>
                        <em>Please follow <a href="javascript:;">@gobid</a> for all future updates of us! <a href="javascript:;">twitter.com/gobidteam</a></em>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>


    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


  <script>

      //google map
      function initialize() {
          var myLatlng = new google.maps.LatLng(-37.815207, 144.963937);
          var mapOptions = {
              zoom: 15,
              center: myLatlng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: 'Hello World!'
          });
      }
      google.maps.event.addDomListener(window, 'load', initialize);



  </script>

  </body>
</html>
