<?php 
    session_start();
    session_destroy();
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="bidnow - Online Auctions for Clothing Stuffs. Put your items up for bidding, or place your own bids and win!">
    <meta name="author" content="Adille & Antonio">
    <meta name="keyword" content="Online, Auction, Bid, GoBid,">
    <link rel="shortcut icon" href="img/logoGobid.png">

    <title>Login | GoBid</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />
	
	<link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">
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
                       

                        
                       
                        <li><a href="contact.php">Contact</a></li>
						 <li class="active"><a href="Login.php">Login</a></li>
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
                    <h1>Login</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
	
    <div class="container">

      <form class="form-signin" method="post" action="login.php">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">

            <?php 

                include 'connect.php';

                if(isset($_POST["submit"]))
                {
                    $yourun = $_POST["username"];
                    $yourpw = $_POST["password"];

                    $unquery = "SELECT username FROM account WHERE username = '$yourun'";
                    $pwquery = "SELECT password FROM account WHERE password = '$yourpw'";
                    $user = "SELECT * FROM account WHERE username = '$yourun'";

                    $getun = mysql_query($unquery);
                    $getpw = mysql_query($pwquery);
                    $getuser = mysql_query($user);
                    

                    $welcome = mysql_fetch_array($getuser);
                    $acctid = $welcome['account_id'];

                    if (mysql_num_rows($getun)>0) 
                    {

                        if (mysql_num_rows($getpw)>0) 
                        {
                            
                            if ($yourun == "admin" && $yourpw == "admin")
                            {
                                
                                  $_SESSION["Login"] = "ADMIN";
                                  $_SESSION["acctinfo"] = $welcome['account_id'];
                                  $_SESSION["name"] = $welcome['first_name'];
                                  date_default_timezone_set("Asia/Manila");
                                  $currentDatetime = date("Y-m-d H:i:s");

                                  $updatetimestamp = "UPDATE account SET last_login = '$currentDatetime' WHERE account_id = '$acctid';";
                                  mysql_query($updatetimestamp);
                                  if(isset($_SESSION['redirectURL']))
                                  {
                                    header("Refresh:3; url=".$_SESSION['redirectURL']."", true, 303);
                                  }
                                  else
                                  {
                                    
                                    echo'<script> location.replace("index.php"); </script>';

                                  }
                                    
                                  
                                 
                            }

                            else
                            {

                                
                                  $_SESSION["Login"] = "USER";
                                  $_SESSION["acctinfo"] = $welcome['account_id'];
                                  $_SESSION["name"] = $welcome['first_name'];

                                  date_default_timezone_set("Asia/Manila");
                                  $currentDatetime = date("Y-m-d H:i:s");

                                  //echo $currentDatetime;

                                  $updatetimestamp = "UPDATE account SET last_login = '$currentDatetime' WHERE account_id = '$acctid';";
                                  mysql_query($updatetimestamp);

                                  if(isset($_SESSION['redirectURL']))
                                  {
                                    header("Refresh:3; url=".$_SESSION['redirectURL']."", true, 303);
                                  }
                                  else
                                  {
                                    
                                    echo'<script> location.replace("index.php"); </script>';
                                  }
                                  
                            }
                        }
                        else
                        {
                            echo "<h5 class='text-danger'>*Invalid Password</h5>";
                            
                        }
                        
                    }
                    else
                    {
                        echo "<h5 class='text-danger'>*Account does not exist; Invalid Username & Password</h5>";
                            
                    }
                }

                mysql_close();

             ?>

            <input type="text" name="username" class="form-control" placeholder="Username" autofocus required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <label class="checkbox">
                <!-- <input type="checkbox" value="remember-me"> Remember me -->
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" name="submit" type="submit">Sign in</button>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.php">
                    Create an account
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>
	
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


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
