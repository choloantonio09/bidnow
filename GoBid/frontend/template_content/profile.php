<?php 
  session_start();
  include 'connect.php';

  if(!isset($_SESSION['Login']))
  {
    header('Location: login.php');
  }

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

    <title>Profile | BidNow</title>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets2/font-awesome/css/font-awesome.css" rel="stylesheet" />
    
	
	<!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />
	
	<!--Upload-->
	<link rel="stylesheet" type="text/css" href="assets2/bootstrap-fileupload/bootstrap-fileupload.css" />
   
		<link rel="stylesheet" type="text/css" href="css/star-rating.css" />
	<link rel="stylesheet" type="text/css" href="css/star-rating.min.css" />   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <!-- ---------------------------------------------------------------------------------------------------- -->

      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >bid<span>NOW</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              
              <!-- inbox dropdown start-->
              <?php if (isset($_SESSION['Login'])): ?>
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-alt"></i>
                        
                          <?php 
                              $currentacctid = $_SESSION['acctinfo'];
                              $messagebadge="SELECT * FROM message WHERE (message_to = '$currentacctid') AND (message_status = 'UNREAD');";
                              $rs = mysql_query($messagebadge);
                              $mnumrows = mysql_num_rows($rs);

                              
                                if($mnumrows>0)
                                {
                                  echo '
                                  <span class="badge bg-important">
                                  '.$mnumrows.'
                                  </span>
                                  ';
                                }

                           ?>
                        
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red">You have <?php echo $mnumrows; ?> new messages</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="photo"><img alt="avatar" src="./img2/avatar-mini.jpg"></span>
                                      <span class="subject">
                                      <span class="from">Jonathan Smith</span>
                                      <span class="time">Just now</span>
                                      </span>
                                      <span class="message">
                                          Hello, this is an example msg.
                                      </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all messages</a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon-bell-alt"></i>
                        
                          <?php 
                    
                              $notifbadge="SELECT * FROM notification WHERE (notif_to = '$currentacctid') AND (notif_status = 'UNREAD');";
                              $rs2 = mysql_query($notifbadge);
                              $nnumrows = mysql_num_rows($rs2);

                              
                                if($nnumrows>0)
                                {
                                  echo '
                                  <span class="badge bg-warning">
                                  '.$nnumrows.'
                                  </span>
                                  ';
                                }
                           ?>
                        
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow">You have <?php echo $nnumrows; ?> new notifications</p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="icon-plus"></i></span>
                                New user registered.
                                <span class="small italic">Just now</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">See all notifications</a>
                        </li>
                    </ul>
                </li>
              <?php endif ?>
              
              <!-- notification dropdown end -->
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search an Item">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <?php 

                          if (!isset($_SESSION['Login'])) 
                          {
                            echo '

                             <img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" style ="width: 29px; height: 29px;">
                              <span class="username">GUEST</span>

                            ';
                          }
                          else
                          {
                              $getuser = "SELECT * FROM account WHERE account_id = '$currentacctid';";
                              $rs3 = mysql_query($getuser);
                              $row3 = mysql_fetch_array($rs3);

                              echo '

                                <img alt="" src="data:image/jpeg;base64,' . base64_encode( $row3['image'] ) . '" style ="width: 29px; height: 29px;">
                                <span class="username">'.$row3["first_name"].'</span>

                              ';
                          }

                         ?>
                          
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>

                          <?php if (isset($_SESSION['Login'])): ?>
                            <li><a href="profile.php"><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                            <li><a href="product.php"><i class="icon-archive"></i> My Products</a></li>
                            <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
                          <?php else: ?>
                            <li><a href="login.php"><i class="icon-key"></i> Log In</a></li>
                          <?php endif ?>
                          
                          
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>

          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="Auction.php">
                          <i class="icon-dashboard"></i>
                          <span>Auction Home</span>
                      </a>
                  </li>

                  <?php 

                   

                    if(isset($_SESSION['Login']))
                    {
                      $getcurrentbid="SELECT * FROM participation WHERE account_id = '$currentacctid';";
                      $currentbidquery = mysql_query($getcurrentbid);
                      $bidnum = mysql_num_rows($currentbidquery);

                      echo '

                        <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-shopping-cart"></i>
                            <span>Current Bid</span>
                            <span class="badge bg-success">'.$bidnum.'</span>
                            <span class="icon-angle-down pull-right"></span>
                        </a>
                        <ul class="sub">
                      ';

                      if ($bidnum>0) 
                      {
                        while ($bidrow=mysql_fetch_array($currentbidquery)) 
                        {
                          $prodid = $bidrow['product_id'];
                          $selectbiditem = "SELECT * FROM product WHERE (product_id = '$prodid') AND (product_status = 'ACTIVE');";
                          $getselectedbititem = mysql_query($selectbiditem);
                          $rowselectbiditem = mysql_fetch_array($getselectedbititem);
                          echo '<li><a  href="product_details.php?prodid='.$rowselectbiditem['product_id'].'">'.$rowselectbiditem['product_name'].'</a></li>';
                        }
                      }
                      else
                      {
                        echo '<li><a  href="">You have no bids yet.</a></li>';
                      }

                      echo '

                        </ul>
                       </li>

                      ';

                      $wishlistselect = "SELECT * FROM wishlist WHERE account_id = $currentacctid;";
                      $wishlistquery = mysql_query($wishlistselect);
                      $wishlistnum = mysql_num_rows($wishlistquery);
                      
                      echo '
                         <li class="sub-menu">
                          <a href="javascript:;">
                              <i class="icon-heart"></i>
                              <span>Wishlist</span>
                              <span class="badge bg-success">'.$wishlistnum.'</span>
                              <span class="icon-angle-down pull-right"></span>
                          </a>
                          <ul class="sub">

                      ';

                      if ($wishlistnum>0) 
                      {
                          while ($wsrow=mysql_fetch_array($wishlistquery)) 
                          {
                            $prodid2 = $wsrow['product_id'];
                            $selectwsitem = "SELECT * FROM product WHERE (product_id = '$prodid2') AND (product_status = 'ACTIVE');";
                            $getselectedwsitem = mysql_query($selectwsitem);
                            $rowselectwsitem = mysql_fetch_array($getselectedwsitem);
                            echo '<li><a  href="product_details.php?prodid='.$rowselectwsitem['product_id'].'">'.$rowselectwsitem['product_name'].'</a></li>';
                          }
                        
                        
                      }
                      else
                      {
                        echo '<li><a  href="">Your wishlist is empty.</a></li>';
                      }

                      echo '

                        </ul>
                        </li>

                      ';
                      
                    }
                    else
                      echo '

                      <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-shopping-cart"></i>
                            <span>Current Bid</span>
                        </a>
                        <ul class="sub">

                          <li><a  href="login.php">Login First!</a></li>
                        </ul>
                      </li>

                      <li class="sub-menu">
                          <a href="javascript:;">
                              <i class="icon-heart"></i>
                              <span>Wishlist</span>
                          </a>
                          <ul class="sub">

                            <li><a  href="login.php">Login First!</a></li>
                          </ul>
                      </li>


                    ';

                   ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!-- ---------------------------------------------------------------------------------------------------- -->
                      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round">
                            <?php 

                              $acctselect = "SELECT * FROM account WHERE account_id = '$currentacctid';";
                              $acctquery = mysql_query($acctselect);
                              $rowacct = mysql_fetch_array($acctquery);

                              echo '

                                <a href="#">
                                  <img src="data:image/jpeg;base64,' . base64_encode( $rowacct['image'] ) . '" alt="">
                              </a>
                              <h1>'.$rowacct['first_name'].' '.$rowacct['last_name'].'</h1>
                              <p>'.$rowacct['email'].'</p>


                              ';

                             ?>
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="profile.php"> <i class="icon-user"></i> Profile</a></li>
                              <li><a href="profile-edit.php"> <i class="icon-edit"></i> Edit profile</a></li>
                            
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      <section class="panel">
                          <div class="bio-graph-heading">
							 User Rating : <?php echo $rowacct['ratings']; ?> 
							<br>
							<section class="panel">
								<div class="panel-body" style="padding-left:80px;">
								    <input id="input-21b" value="<?php echo $rowacct['ratings']; ?>" type="number"  readonly=“readonly” class="rating" min=0 max=5 step=0.2 data-size="sm">
								</div>
							</section>
							</div>
							<div class="panel-body bio-graph-info">
								<h1>Bio Graph</h1>
								<div class="row">
									<div class="bio-row">
										<p><span>First Name </span>: <?php echo $rowacct['first_name']; ?> </p>
									</div>
									<div class="bio-row">
										<p><span>Last Name </span>: <?php echo $rowacct['last_name']; ?> </p>
									</div>
									<div class="bio-row">
										<p><span>Email </span>: <?php echo $rowacct['email']; ?> </p>
									</div>
									<div class="bio-row">
										<p><span>Mobile </span>: <?php echo $rowacct['phone']; ?> </p>  <!-- bawal to makita ng Guest ha <3-->
									</div>
									<div class="bio-row">
										<p><span>Home Address </span>: <?php echo $rowacct['home_address']; ?> </p> <!-- bawal to makita ng Guest ha <3-->
                                  </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="row"><center><h3>Latest Auction</h3></center>
                              <?php 

                                $latest = "SELECT * FROM product WHERE account_id = '$currentacctid' ORDER BY product_id DESC LIMIT 4;";
                                $getlatest = mysql_query($latest);
                                while ($rowlatest = mysql_fetch_array($getlatest)) 
                                {
                                  echo '

                                    <div class="col-lg-6">
                                                      <div class="panel">
                                                          <div class="panel-body">
                                        <div class="bio-chart">
                                                              <a href="product_details.php?prodid='.$rowlatest["product_id"].'">
                                          <img src="data:image/jpeg;base64,' . base64_encode( $rowlatest['primary_img'] ) . '" width="160px" height ="160px" alt="">
                                        </a>
                                        </div>
                                        <div class="bio-desk">
                                          <a href="product_details.php?prodid='.$rowlatest["product_id"].'" ><h4 class="red"> '.$rowlatest["product_name"].' </h4></a>
                                          <p>Started : '.$rowlatest["datetime_posted"].'</p>';

                                          $prodidnow = $rowlatest["product_id"];
                                          $highest="SELECT * FROM participation WHERE product_id = '$prodidnow' ORDER BY bid_amount LIMIT 1;";
                                          $gethighest = mysql_query($highest);
                                          $numhighest = mysql_num_rows($gethighest);
                                          $rowhighest = mysql_fetch_array($gethighest);

                                          if ($numhighest>0) 
                                          {
                                            $haid = $rowhighest['account_id'];
                                            $highacct = "SELECT * FROM account WHERE account_id = '$haid';";
                                            $getha = mysql_query($highacct);
                                            $rowha = mysql_fetch_array($getha);


                                            echo '
                                          <p>Highest Bid : PHP '.$rowhighest["bid_amount"].' </p>
                                          <p>Highest Bidder :  '.$rowha["first_name"].' '.$rowha["last_name"].'</p>
                                          <p>Selling Price : '.$rowlatest["starting_price"].'</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>';


                                  
                                          }
                                          else
                                          {
                                            echo '
                                          <p>Highest Bid : n/a </p>
                                          <p>Highest Bidder :  n/a</p>
                                          <p>Selling Price : '.$rowlatest["starting_price"].'</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>';
                                          }

                                          
                                }

                               ?>
                                  
                          </div>
						  <div class="text-center">
                          <a class="btn btn-danger" href="product.php">All Auction Item</a>
                      </div>
                      </section>
                  </aside>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 GoBid Adille Antonio
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js2/jquery.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js2/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js2/jquery.scrollTo.min.js"></script>
    <script src="js2/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets2/jquery-knob/js/jquery.knob.js"></script>
    <script src="js2/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="js2/common-scripts.js"></script>
		
	<!--Upload-->
	<script type="text/javascript" src="assets2/bootstrap-fileupload/bootstrap-fileupload.js"></script>

		<script src="js/star-rating.js"></script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
