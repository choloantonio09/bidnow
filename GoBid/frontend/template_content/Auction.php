<?php 
  
  session_start();
  include 'connect.php';
   $current_url = $_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING'];
   if (isset($_GET['category'])) 
   {
      $category = $_GET['category'];
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

    <title>Auction | BidNew</title>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets2/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets2/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet"/>
    <!--gallery-->
    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

	
	<!--carousel-->
    <link rel="stylesheet" type="text/css" href="css/carousel.css" />
	
    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	
	
  </style>
  
  
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
                            
                              <?php 

                                while($rowrs = mysql_fetch_array($rs))
                                {

                                  $from = $rowrs['message_from'];
                                  $getfrom = "SELECT * FROM account WHERE account_id = '$from';";
                                  $rsfrom = mysql_query($getfrom);
                                  $rowfrom = mysql_fetch_array($rsfrom);

                                  date_default_timezone_set("Asia/Manila");
                                  $currentDatetime = time();
                                  $datediff = abs($currentDatetime - strtotime($rowrs['message_time']));
                                  $mins = $datediff/60;
                                    $minsfinal=floor($mins);
                                      $secondsfinal=$datediff-($minsfinal*60);
                                  $hours=$minsfinal/60;
                                    $hoursfinal=floor($hours);
                                      $minssuperfinal=$minsfinal-($hoursfinal*60);
                                    $days=$hoursfinal/24;
                                      $daysfinal=floor($days);
                                      $hourssuperfinal=$hoursfinal-($daysfinal*24);


                                  if($mins<1)
                                  {
                                    $showing = $datediff . " seconds ago";
                                  }
                                  else
                                  {
                                    $minsfinal=floor($mins);
                                    $secondsfinal=$datediff-($minsfinal*60);
                                    $hours=$minsfinal/60;
                                    if($hours<1)
                                    {
                                      $showing= $minsfinal . " minutes and " . $secondsfinal. " seconds ago";

                                    }
                                    else
                                    {
                                      $hoursfinal=floor($hours);
                                      $minssuperfinal=$minsfinal-($hoursfinal*60);
                                      $days=$hoursfinal/24;
                                      if($days<1)
                                      {
                                        $showing= $hoursfinal . "hours, " . $minssuperfinal . " minutes and " . $secondsfinal. " seconds ago";

                                      }
                                      else 
                                      {
                                        $daysfinal=floor($days);
                                        $hourssuperfinal=$hoursfinal-($daysfinal*24);
                                        $showing= $daysfinal. "days, " .$hourssuperfinal . " hours, " . $minssuperfinal . " minutes and " . $secondsfinal. " seconds ago";
                                      }
                                    }
                                  }

                                  echo 
                                  '
                                    <a href="#">
                                    <span class="photo"><img alt="avatar" src="data:image/jpeg;base64,' . base64_encode( $rowfrom['image'] ) . '"></span>
                                      <span class="subject">
                                      <span class="from">'.$rowfrom['first_name'].' '.$rowfrom['last_name'].'</span>
                                      <span class="time">'.$showing.'</span>
                                      </span>
                                      <span class="message">
                                          '.$rowrs["message_content"].'
                                      </span>
                                      </a>

                                  ';
                                }

                               ?>
                            
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
                        <?php 
                          while($rowrs2 = mysql_fetch_array($rs2))
                          {
                            date_default_timezone_set("Asia/Manila");
                            $currentDatetime = time();
                            $datediff = abs($currentDatetime - strtotime($rowrs2['notif_time']));
                            $mins = $datediff/60;
                              $minsfinal=floor($mins);
                                $secondsfinal=$datediff-($minsfinal*60);
                            $hours=$minsfinal/60;
                              $hoursfinal=floor($hours);
                                $minssuperfinal=$minsfinal-($hoursfinal*60);
                              $days=$hoursfinal/24;
                                $daysfinal=floor($days);
                                $hourssuperfinal=$hoursfinal-($daysfinal*24);


                            if($mins<1)
                            {
                              $showing = $datediff . " seconds ago";
                            }
                            else
                            {
                              $minsfinal=floor($mins);
                              $secondsfinal=$datediff-($minsfinal*60);
                              $hours=$minsfinal/60;
                              if($hours<1)
                              {
                                $showing= $minsfinal . " minutes and " . $secondsfinal. " seconds ago";

                              }
                              else{
                                $hoursfinal=floor($hours);
                                $minssuperfinal=$minsfinal-($hoursfinal*60);
                                $days=$hoursfinal/24;
                                if($days<1)
                                {
                                  $showing= $hoursfinal . "hours, " . $minssuperfinal . " minutes and " . $secondsfinal. " seconds ago";

                                }
                                else 
                                {
                                  $daysfinal=floor($days);
                                  $hourssuperfinal=$hoursfinal-($daysfinal*24);
                                  $showing= $daysfinal. "days, " .$hourssuperfinal . " hours, " . $minssuperfinal . " minutes and " . $secondsfinal. " seconds ago";
                                }
                              }
                            }

                            echo '

                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    '.$rowrs2["notif_subject"].'
                                    <span class="small italic">'.$showing.'</span>
                                </a>
                            </li>

                            ';
                          }
                         ?>
                        
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
                  <!-- <li>
                    <form action="auction.php" method="get" accept-charset="utf-8">
                      <input type="text" name="query" class="form-control " placeholder="Search an Item">
                  </li>
                  <li><input type="submit" name="submit" value="Go" class="form-control"></li>
                  </form> -->
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
					 <section id="slider" ><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>GO<span>BID</span></h1>
									<h2>An Online Auction</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="img/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="img/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>GO<span>BID</span></h1>
									<h2>An Online Auction</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="img/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="img/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>GO<span>BID</span></h1>
									<h2>An Online Auction</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="img/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="img/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
			
 
			<br>
		  
		  
              <!-- page start-->
              <div class="row">
                  <div class="col-md-3">
                      <section class="panel">
                          <div class="panel-body">
                            <form action="auction.php" method="post" accept-charset="utf-8">                  
                              <input type="text" name="query" placeholder="Keyword Search" class="form-control">
                              <input type="submit" name="submit" value="Go" class="form-control btn-warning">
                            </form>
                          </div>
                      </section>
                      <section class="panel">
                          <header class="panel-heading">
                              Category
                          </header>
                          <div class="panel-body">
                              <ul class="nav prod-cat">
                                  <li><a href="auction.php" class=""><i class="icon-certificate"></i> All</a></li>
                                  <li><a href="auction.php?category=Clothes" class=""><i class="icon-certificate"></i> Clothes</a></li>
                                  <li><a href="auction.php?category=Shoes and Footwear"><i class="icon-certificate"></i> Shoes and Footwear</a></li>
                                  <li><a href="auction.php?category=Luggages and Bags"><i class="icon-certificate"></i> Luggages and Bags</a></li>
                                  <li><a href="auction.php?category=Wallets"><i class="icon-certificate"></i> Wallets</a></li>
                                  <li><a href="auction.php?category=Sunglasses"><i class="icon-certificate"></i> Sunglasses</a></li>
                                  <li><a href="auction.php?category=Jewelry"><i class="icon-certificate"></i> Jewelry</a></li>
                                  <li><a href="auction.php?category=Watches"><i class="icon-certificate"></i> Watches</a></li>
                                  <li><a href="auction.php?category=Accessories"><i class="icon-certificate"></i> Accessories</a></li>
                                  <li><a href="auction.php?category=Others"><i class="icon-certificate"></i> Others</a></li>
                                  
                              </ul>
                          </div>
                      </section>
                      <!-- <section class="panel">
                          <header class="panel-heading">
                              Price Range
                          </header>
                          <div class="panel-body sliders">
                              <div id="slider-range" class="slider"></div>
                              <div class="slider-info">
                                  <span id="slider-range-amount"></span>
                              </div>
                          </div>
                      </section> -->
                      <section class="panel">
                          <header class="panel-heading">
                              Most Popular Items
                          </header>
                          <div class="panel-body">
                              <div class="best-seller">
                                <?php 
                                  $bestseller = "SELECT * FROM product ORDER BY participants_no LIMIT 4;";
                                  $getbest = mysql_query($bestseller);
                                  while($rowbest = mysql_fetch_array($getbest))
                                  {
                                    echo '

                                      <article class="media">
                                        <a class="pull-left thumb p-thumb">
                                            <img src="data:image/jpeg;base64,' . base64_encode( $rowbest['primary_img'] ) . '">
                                        </a>
                                        <div class="media-body">
                                            <a href="#" class=" p-head">'.$rowbest['product_name'].'</a>
                                            <p>'.$rowbest['category'].'</p>
                                        </div>
                                      </article>

                                    ';
                                  }
                                 ?>
                                  
                              </div>
                          </div>
                      </section>
                  </div>
                  <div class="col-md-9">
                      <section class="panel">
                          <div class="panel-body">
                              <div class="pro-sort">
                                <form name="myform">
                                  <label class="pro-lab">Sort By</label>
                                  
                                    <select name="sort" class="styled" onchange="javascript:document.myform.submit()">
                                        <option value="default">Default Sorting</option>
                                        <option value="popular">Popularity</option>
                                        <option value="new">Newest</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="unisex">Unisex</option>
                                        <option value="brandnew">Brand New</option>
                                        <option value="secondhand">Secondhand</option>
                                    </select>
                                    <?php if (isset($_GET['category'])): ?>
                                      <input type="hidden" name="category" value="<?php echo $category; ?>">
                                    <?php endif ?>
                                    
                                  <form>
                              </div>
                              

                              <!-- <div class="pull-right">
                                  <ul class="pagination pagination-sm pro-page-list">

                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">»</a></li>
                                  </ul>
                              </div> -->
                          </div>
                      </section>

                      <div class="row product-list">
					  
						
					<div class="row product-list">
            <?php 
              if (isset($_POST['submit'])) 
              {
                $searchquery = $_POST['query'];
                $search = "SELECT * 
                FROM  product 
                WHERE (
                CONVERT(  `product_name` 
                USING utf8 ) LIKE  '%".$searchquery."%'
                OR CONVERT(  `category` 
                USING utf8 ) LIKE  '%".$searchquery."%'
                OR CONVERT(  `sex` 
                USING utf8 ) LIKE  '%".$searchquery."%'
                OR CONVERT(  `product_condition` 
                USING utf8 ) LIKE  '%".$searchquery."%'
                OR CONVERT(  `product_description` 
                USING utf8 ) LIKE  '%".$searchquery."%'
                ) AND `product_status` != 'INACTIVE'";
          
                $rssearch = mysql_query($search);
                $numrowssearch=mysql_num_rows($rssearch);

                if($numrowssearch==0)
                {
                  echo "<p><h2 class='text-warning'>NO RESULT!<br>The item you are searching for is unavailable / out of stock.<h2></p>";
                }
                else
                {
                  while($rowsearch = mysql_fetch_array($rssearch))
                  {
                    echo '

                      <div class="col-md-4">
                          <section class="panel">
                              <div class="pro-img-box">
                                  <img src="data:image/jpeg;base64,' . base64_encode( $rowsearch['primary_img'] ) . '" alt=""/>
                                  
                                  <a href="product_details.php?prodid='.$rowsearch["product_id"].'" class="adtocart2">
                                      <i>view</i>
                                  </a>
                              </div>

                              <div class="panel-body text-center">
                                  <h4>
                                    <a href="product_details.php" class="pro-title">
                                        '.$rowsearch["product_name"].'
                                    </a>
                                  </h4>
                                  <div>
                                    ';

                                    $pid = $rowsearch["product_id"];
                                    $getparticipation = "SELECT * FROM participation WHERE product_id = '$pid' ORDER BY bid_amount LIMIT 1;";
                                    $rowparticipation = mysql_fetch_array(mysql_query($getparticipation));
                                    $numrowparticipation = mysql_num_rows(mysql_query($getparticipation));

                                    if($numrowparticipation==0)
                                    {
                                      $oid = $rowsearch['account_id'];
                                      $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                      $getowner = mysql_query($owner);
                                      $rowgetowner = mysql_fetch_array($getowner);

                                    echo '<p class="price">P'.$rowsearch["starting_price"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                    }
                                    else
                                    {
                                      $oid = $rowparticipation['account_id'];
                                      $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                      $getowner = mysql_query($owner);
                                      $rowgetowner = mysql_fetch_array($getowner);
                                      echo '<p class="price">P'.$rowparticipation["bid_amount"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                    }

                                    

                                    echo '</p>';
                                    date_default_timezone_set("Asia/Manila");
                                    $currentDatetime = time();
                                    $datediff = abs(strtotime($rowallprod['bid_expire']) - $currentDatetime);

                                  $mins = $datediff/60;
                                  $minsfinal=floor($mins);
                                  $secondsfinal=$datediff-($minsfinal*60);
                                  $hours=$minsfinal/60;
                                  $hoursfinal=floor($hours);
                                  $minssuperfinal=$minsfinal-($hoursfinal*60);
                                  $days=$hoursfinal/24;
                                  $daysfinal=floor($days);
                                  $hourssuperfinal=$hoursfinal-($daysfinal*24);



                                  echo floor($datediff/(60*60*24));

                                  echo'
                                   days, '.$hourssuperfinal.' hrs and '.$minssuperfinal.' mins remaining
                                  </div>
                              </div>
                          </section>
                      </div>

                    ';
                  }
                }
              }
              elseif(isset($_GET['category']))
              {
               
                if (isset($_GET['sort'])) 
                {
                  $sort = $_GET['sort'];
                  if($sort=='popular')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_status = 'ACTIVE') ORDER BY participants_no;";
                  }
                  elseif ($sort=='new') 
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='female')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (sex = 'Female') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='male')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (sex = 'Male') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='unisex')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (sex = 'Unisex') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='brandnew')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_condition = 'Brand New') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='secondhand')
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_condition = 'Secondhand') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  else
                  {
                    $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                }
                else
                {
                  $allprod = "SELECT * FROM product WHERE (category = '$category') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                }
                
                $getallprod = mysql_query($allprod);
                if(mysql_num_rows($getallprod)==0)
                {
                  echo '<div class="col-md-12"><h2 class="text-warning center">No items found.</h2></div>';
                }
                else
                {
                  while($rowallprod = mysql_fetch_array($getallprod))
                  {
                    echo '

                      <div class="col-md-4">
                          <section class="panel">
                              <div class="pro-img-box">
                                  <img src="data:image/jpeg;base64,' . base64_encode( $rowallprod['primary_img'] ) . '" alt=""/>
                                  
                                  <a href="product_details.php?prodid='.$rowallprod["product_id"].'" class="adtocart2">
                                      <i>view</i>
                                  </a>
                              </div>

                              <div class="panel-body text-center">
                                  <h4>
                                    <a href="product_details.php" class="pro-title">
                                        '.$rowallprod["product_name"].'
                                    </a>
                                  </h4>
                                  <div>
                                    ';

                                    $pid = $rowallprod["product_id"];
                                    $getparticipation = "SELECT * FROM participation WHERE product_id = '$pid' ORDER BY bid_amount LIMIT 1;";
                                    $rowparticipation = mysql_fetch_array(mysql_query($getparticipation));
                                    $numrowparticipation = mysql_num_rows(mysql_query($getparticipation));

                                    if($numrowparticipation==0)
                                    {
                                      $oid = $rowallprod['account_id'];
                                      $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                      $getowner = mysql_query($owner);
                                      $rowgetowner = mysql_fetch_array($getowner);

                                    echo '<p class="price">P'.$rowallprod["starting_price"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                    }
                                    else
                                    {
                                      $oid = $rowparticipation['account_id'];
                                      $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                      $getowner = mysql_query($owner);
                                      $rowgetowner = mysql_fetch_array($getowner);
                                      echo '<p class="price">P'.$rowparticipation["bid_amount"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                    }

                                    

                                    echo '</p>';
                                    date_default_timezone_set("Asia/Manila");
                                    $currentDatetime = time();
                                    $datediff = abs(strtotime($rowallprod['bid_expire']) - $currentDatetime);

                                  $mins = $datediff/60;
                                  $minsfinal=floor($mins);
                                  $secondsfinal=$datediff-($minsfinal*60);
                                  $hours=$minsfinal/60;
                                  $hoursfinal=floor($hours);
                                  $minssuperfinal=$minsfinal-($hoursfinal*60);
                                  $days=$hoursfinal/24;
                                  $daysfinal=floor($days);
                                  $hourssuperfinal=$hoursfinal-($daysfinal*24);



                                  echo floor($datediff/(60*60*24));

                                  echo'
                                   days, '.$hourssuperfinal.' hrs and '.$minssuperfinal.' mins remaining
                                  </div>
                              </div>
                          </section>
                      </div>

                    ';
                  }
                }
                

              }
              else
              {

                if (isset($_GET['sort'])) 
                {
                  $sort = $_GET['sort'];
                  if($sort=='popular')
                  {
                    $allprod = "SELECT * FROM product WHERE product_status = 'ACTIVE' ORDER BY participants_no;";
                  }
                  elseif ($sort=='new') 
                  {
                    $allprod = "SELECT * FROM product WHERE product_status = 'ACTIVE' ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='female')
                  {
                    $allprod = "SELECT * FROM product WHERE (sex = 'Female') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='male')
                  {
                    $allprod = "SELECT * FROM product WHERE (sex = 'Male') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='unisex')
                  {
                    $allprod = "SELECT * FROM product WHERE (sex = 'Unisex') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='brandnew')
                  {
                    $allprod = "SELECT * FROM product WHERE (product_condition = 'Brand New') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  elseif ($sort=='secondhand')
                  {
                    $allprod = "SELECT * FROM product WHERE (product_condition = 'Secondhand') AND (product_status = 'ACTIVE') ORDER BY product_id DESC;";
                  }
                  else
                  {
                    $allprod = "SELECT * FROM product WHERE product_status = 'ACTIVE' ORDER BY product_id DESC;";
                  }
                }
                else
                {
                  $allprod = "SELECT * FROM product WHERE product_status = 'ACTIVE' ORDER BY product_id DESC;";
                }

                $getallprod = mysql_query($allprod);
                while($rowallprod = mysql_fetch_array($getallprod))
                {
                  echo '

                    <div class="col-md-4">
                        <section class="panel">
                            <div class="pro-img-box">
                                <img src="data:image/jpeg;base64,' . base64_encode( $rowallprod['primary_img'] ) . '" alt=""/>
                               
                                  
                                  
                                
                                <a href="product_details.php?prodid='.$rowallprod["product_id"].'" class="adtocart2">
                                    <i>view</i>
                                </a>
                            </div>

                            <div class="panel-body text-center">
                                <h4>
                                  <a href="product_details.php" class="pro-title">
                                      '.$rowallprod["product_name"].'
                                  </a>
                                </h4>
                                <div>
                                  ';

                                  $pid = $rowallprod["product_id"];
                                  $getparticipation = "SELECT * FROM participation WHERE product_id = '$pid' ORDER BY bid_amount LIMIT 1;";
                                  $rowparticipation = mysql_fetch_array(mysql_query($getparticipation));
                                  $numrowparticipation = mysql_num_rows(mysql_query($getparticipation));

                                  if($numrowparticipation==0)
                                  {
                                    $oid = $rowallprod['account_id'];
                                    $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                    $getowner = mysql_query($owner);
                                    $rowgetowner = mysql_fetch_array($getowner);

                                  echo '<p class="price">P'.$rowallprod["starting_price"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                  }
                                  else
                                  {
                                    $oid = $rowparticipation['account_id'];
                                    $owner = "SELECT * FROM account WHERE account_id = '$oid';";
                                    $getowner = mysql_query($owner);
                                    $rowgetowner = mysql_fetch_array($getowner);
                                    echo '<p class="price">P'.$rowparticipation["bid_amount"].' by '.$rowgetowner['first_name'].' '.$rowgetowner['last_name'];
                                  }

                                  

                                  echo '</p>';
                                  date_default_timezone_set("Asia/Manila");
                                  $currentDatetime = time();

                                  $datediff = abs(strtotime($rowallprod['bid_expire']) - $currentDatetime);

                                  $mins = $datediff/60;
                                  $minsfinal=floor($mins);
                                  $secondsfinal=$datediff-($minsfinal*60);
                                  $hours=$minsfinal/60;
                                  $hoursfinal=floor($hours);
                                  $minssuperfinal=$minsfinal-($hoursfinal*60);
                                  $days=$hoursfinal/24;
                                  $daysfinal=floor($days);
                                  $hourssuperfinal=$hoursfinal-($daysfinal*24);



                                  echo floor($datediff/(60*60*24));

                                  echo'
                                   days, '.$hourssuperfinal.' hrs and '.$minssuperfinal.' mins remaining
                                </div>
                            </div>
                        </section>
                    </div>

                  ';
                }
              }

              


             ?>
            
          </div>
					<!--ads start-->
					<div class="col-md-12">
                      <section class="panel">
                        
						<center>Ads</center>
					 
					  </section>
				</div>
				<!--ads end-->
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
    <script src="assets2/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="js2/jquery.ui.touch-punch.min.js"></script>
    <script src="js2/jquery.customSelect.min.js" ></script>

    <script src="js/respond.min.js" ></script>
   <!--gallery-->
	<script src="js/modernizr.custom.js"></script>
    <script src="js/toucheffects.js"></script>
    <script src="js/carousel.js"></script>
	
	
	
	
    <!--common script for all pages-->
    <script src="js2/common-scripts.js"></script>

    <script src="js2/sliders.js" type="text/javascript"></script>
	
    <script type="text/javascript">
          $(document).ready(function() {

              $(function(){
                  $('select.styled').customSelect();
              });
          });
		  
		  
    </script>
	  
	<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
	</script>

  <script>
    
  function addtowishlist(id,acct)
  {
    var prodid = id;
    var acctid = acct;

          $.post("addtowishlist.php",
          {
              prodidselected: prodid,
              accountselected: acctid
          },
          function()
          {
              alert("Item successfully added to wishlist!");
          });

  }
        
        
    
  </script>
  


  </body>
</html>
