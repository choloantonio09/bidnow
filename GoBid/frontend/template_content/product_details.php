<?php 
	include 'connect.php';
	session_start();
	if (!isset($_GET['prodid'])) 
 	{
 		header("Location: auction.php");
 	}

 	
 ?>
<!DOCTYPE html>
<html lang="en">
	<?php 
		if(isset($_GET['wsprodid']))
	 	{
	 		include 'connect.php';
	 		

	 		$wlprodid = $_GET['prodid'];
	 		$wlacctid = $_SESSION['acctinfo'];
	 		$rowcheckwl = mysql_num_rows(mysql_query("SELECT * FROM wishlist WHERE (product_id = '$wlprodid') AND (account_id = '$wlacctid');"));
	 		if($rowcheckwl == 0)
	 		{
	 			mysql_query("INSERT INTO wishlist VALUES ('$wlprodid','$wlacctid')");
	 			echo "
	 	

	 		<script> alert('Item added to wishlist!'); </script>

	 		";
	 		}
	 		else
	 		{
	 			echo "
	 	

	 		<script> alert('Item already on your wishlist!'); </script>

	 		";
	 		}
	 		
	 	}

	 	if(isset($_POST['bidsubmit']))
	 	{
	 		include 'connect.php';

	 		$bdprodid = $_GET['prodid'];
	 		$bdacctid = $_SESSION['acctinfo'];
	 		$newbid = $_POST['mybidamount'];

	 		$chkuser = "SELECT * FROM product WHERE product_id ='$bdprodid';";
	 		$getchkuser = mysql_query($chkuser);
	 		$rowchkuser = mysql_fetch_array($getchkuser);
	 		$chkownerid = $rowchkuser['account_id'];

	 		$getinfo = "SELECT * FROM account WHERE account_id = '$bdacctid';";
	 		$getinfoq = mysql_query($getinfo);
	 		$info = mysql_fetch_array($getinfoq);

	 		$geturpart = "SELECT * FROM participation WHERE (product_id = '$bdprodid') AND (account_id = '$bdacctid'); ";
	 		$geturpartq = mysql_query($geturpart);
	 		$rowurpart = mysql_fetch_array($geturpartq);

	 		$getpart = "SELECT * FROM participation WHERE (product_id = '$bdprodid') AND (account_id != '$bdacctid'); ";
	 		$getpartq = mysql_query($getpart);
	 		$numrowpart = mysql_num_rows($getpartq);

	 		if ($bdacctid == $rowchkuser['account_id']) 
	 		{
	 			echo "
		 	

		 		<script> alert('You cannot participate in this auction. You are the owner of the item.'); </script>

		 		";
	 		}
	 		else
	 		{	
	 			$rowcheckbd = mysql_num_rows(mysql_query("SELECT * FROM participation WHERE (product_id = '$bdprodid') AND (account_id = '$bdacctid');"));
		 		if($rowcheckbd == 0)
		 		{

		 			mysql_query("INSERT INTO participation (product_id,account_id,bid_amount) VALUES ('$bdprodid','$bdacctid',$newbid);");
		 			
		 			$subjectowner = "A new participant placed a bid!";
		 			$messageowner = $info['first_name'].' '.$info['last_name'].' placed a bid for your item '.$rowchkuser['product_name'].'. The amount of the placed bid is: Php '.$rowurpart['bid_amount'].'.';
		 				
		 			mysql_query("INSERT INTO notification (notif_subject,notif_to,notif_message,notif_status) VALUES ('$subjectowner','$chkownerid','$messageowner','UNREAD');");

		 			if($numrowpart > 0)
		 			{
		 				$subjectall = "A new person participated in the auction!";
			 			$messageall = $info['first_name'].' '.$info['last_name'].' placed a higher bid for the item '.$rowchkuser['product_name'].'. The amount of the placed bid is: Php '.$rowurpart['bid_amount'].' and it is now currently the new highest bid.';

			 			while($rowpart = mysql_fetch_array($getpartq))
			 			{
			 				$hisid = $rowpart['account_id'];
			 				mysql_query("INSERT INTO notification (notif_subject,notif_to,notif_message,notif_status) VALUES ('$subjectall','$hisid','$messageall','UNREAD');");
			 			}
		 			}
		 			
		 			

		 			echo 
		 			"
			 		<script> alert('Bid successfully placed! You will be notified for futher updates.'); </script>
			 		";
		 		}
		 		else
		 		{
		 			mysql_query("UPDATE participation SET bid_amount = '$newbid' WHERE (product_id = '$bdprodid') AND (account_id = '$bdacctid');");
		 			
		 			$subjectowner = "Someone updated his bid on your item!";
		 			$messageowner = $info['first_name'].' '.$info['last_name'].' updated his bid for your item '.$rowchkuser['product_name'].'. The amount of the placed bid is: Php '.$rowurpart['bid_amount'].'.';
		 			mysql_query("INSERT INTO notification (notif_subject,notif_to,notif_message,notif_status) VALUES ('$subjectowner','$chkownerid','$messageowner','UNREAD');");

		 			if($numrowpart > 0)
		 			{
		 				$subjectall = "A participant place a higher bid!";
			 			$messageall = $info['first_name'].' '.$info['last_name'].' placed a higher bid for the item '.$rowchkuser['product_name'].'. The amount of the placed bid is: Php '.$rowurpart['bid_amount'].' and it is now the new highest bid.';

			 			while($rowpart = mysql_fetch_array($getpartq))
			 			{
			 				$hisid = $rowpart['account_id'];
			 				mysql_query("INSERT INTO notification (notif_subject,notif_to,notif_message,notif_status) VALUES ('$subjectall','$hisid','$messageall','UNREAD');");
			 			}
		 			}

		 			echo "

		 		<script> alert('Bid successfully updated! You will be notified for futher updates.'); </script>

		 		";
		 		}
	 		}
	 		
	 	}

	 	if(isset($_POST['rate']))
	 	{
	 		include 'connect.php';

	 		$bdprodid = $_GET['prodid'];
	 		$bdacctid = $_SESSION['acctinfo'];

	 		$chkuser = "SELECT * FROM product WHERE product_id ='$bdprodid';";
	 		$getchkuser = mysql_query($chkuser);
	 		$rowchkuser = mysql_fetch_array($getchkuser);
	 		$chkownerid = $rowchkuser['account_id'];

	 		$getinfo = "SELECT * FROM account WHERE account_id = '$chkownerid';";
	 		$getinfonow = mysql_query($getinfo);
	 		$infonow = mysql_fetch_array($getinfonow);

	 		$crate = $infonow['ratings'];
	 		$nrate = $_POST['ratings'];

	 		if ($bdacctid == $rowchkuser['account_id']) 
	 		{
	 			echo "
		 	
		 		<script> alert('You cannot rate yourself!'); </script>

		 		";
	 		}
	 		else
	 		{
	 			if($crate==0)
		 		{
		 			$crate = $nrate;
		 		}
		 		else
		 		{
		 			$crate = ($crate + $nrate) / 2;
		 		}

		 		mysql_query("UPDATE account SET ratings = '$crate' WHERE account_id = '$chkownerid';");

		 		echo "

			 		<script> alert('Seller successfully rated! This will reflect on his personal rating.'); </script>

			 		";
	 		}
	 		
	 		
	 	}

	 	if(isset($_POST['send']))
	 	{
	 		include 'connect.php';

	 		$bdprodid = $_GET['prodid'];
	 		$bdacctid = $_SESSION['acctinfo'];

	 		$chkuser = "SELECT * FROM product WHERE product_id ='$bdprodid';";
	 		$getchkuser = mysql_query($chkuser);
	 		$rowchkuser = mysql_fetch_array($getchkuser);
	 		$chkownerid = $rowchkuser['account_id'];

	 		if ($bdacctid == $rowchkuser['account_id']) 
	 		{
	 			echo "
		 	
		 		<script> alert('You cannot send a message to yourself!'); </script>

		 		";
	 		}
	 		else
	 		{
	 			$chkuser = "SELECT * FROM product WHERE product_id ='$bdprodid';";
		 		$getchkuser = mysql_query($chkuser);
		 		$rowchkuser = mysql_fetch_array($getchkuser);
		 		$chkownerid = $rowchkuser['account_id'];


		 		$subject = $_POST['subject'];
		 		$message = $_POST['message'];

		 		mysql_query("INSERT INTO message (message_subject,message_content,message_to,message_from) VALUES ('$subject','$message','$chkownerid','$bdacctid');");
		 		echo "

			 		<script> alert('Message successfully sent!.'); </script>

			 		";
	 		}

	 		
	 	}
	 ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="bidnow - Online Auctions for Clothing Stuffs. Put your items up for bidding, or place your own bids and win!">
    <meta name="author" content="Adille & Antonio">
    <meta name="keyword" content="Online, Auction, Bid, GoBid,">
    <link rel="shortcut icon" href="img/bidnowicon.png">

    <title>Auction | BidNow</title>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets2/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets2/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet"/>
	
	<link href="assets2/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
    <link href="css2/image-crop.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />

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
              <!-- page start-->
              <div class="row">
                  
                  <div class="col-md-12">

                      <section class="panel">
                          <div class="panel-body">
                              <div class="col-md-6">
							  <center><i class=" icon-exclamation-sign"></i> Click and drag the image to zoom in</center>
                                  <div class="pro-img-details">

                                  	<?php 

                                  		if (isset($_GET['prodid'])) 
                                  		{
                                  			$prodid3 = $_GET['prodid'];
                                  			$product = "SELECT * FROM product WHERE product_id = '$prodid3';";
                                  			$getprod = mysql_query($product);
                                  			$rowprod = mysql_fetch_array($getprod);


                                  		}

                                  	 ?>
                                     
                                
                              <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['primary_img'] );?>" name="primary_img1" id="demo3" alt="Jcrop Example" width="100%" />
                         
                          <div class="col-md-6">
                              <div id="preview-pane"> 
                                  <div class="preview-container">
                                      <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['primary_img'] );?>" name="primary_img_view" id="img_view" class="jcrop-preview" alt="Preview"/>
									 
                                  </div>
								  
                              </div>
                          </div>
                          </div>
                     
                                  <div class="pro-img-list">
                                      <a href="#" onclick="changeimage('sec1','demo3')" >
                                          <img  src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['second_img1'] );?>" id="sec1" alt="" style="width: 72px;height: 72px;">
                                      </a>
                                      <a href="#" onclick="changeimage('sec2','demo3')">
                                          <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['second_img2'] );?>" id="sec2" alt="" style="width: 72px;height: 72px;">
                                      </a>
                                      <a href="#" onclick="changeimage('sec3','demo3')">
                                          <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['second_img3'] );?>" id="sec3" alt="" style="width: 72px;height: 72px;">
                                      </a>
                                      <a href="#" onclick="changeimage('sec4','demo3')">
                                          <img src="data:image/jpeg;base64,<?php echo base64_encode( $rowprod['second_img4'] );?>" id="sec4" alt="" style="width: 72px;height: 72px;">
                                      </a>
									  
                                  </div>
									<!-- <section class="panel">
										<div class="panel-body" style="padding-left:80px;">
											<input id="input-21b" value="0" type="number" class="rating" min=0 max=5 step=0.1 data-size="xs">
										</div>
									</section> -->
                              </div>
							  
                              <div class="col-md-6">
							  <br><br><br><br><br>
							  <br><br><br><br><br>
							  <br>
							  <br>
							  </div>
							  
                              <div class="col-md-6">
							  <div class="descproduct" >
                                  <h4 class="pro-d-title">
                                      
                                          <h4><?php echo $rowprod['product_name'] ?></h4>
                                          <?php 
                                          		$ai = $rowprod['account_id'];
                                          		$getowner = "SELECT * FROM account WHERE account_id = '$ai';";
                                          		$getownerq = mysql_query($getowner);
                                          		$rowowner = mysql_fetch_array($getownerq);
                                           ?>
											
										  <h5 class="postedby">posted by <?php echo $rowowner['first_name'].' '.$rowowner['last_name']; ?></h5>
                                      
                                  </h4>
                                  <p>
                                  		<?php echo $rowprod['product_description'] ?>
                                  </p>
								  <div class="m-bot15"> <strong>TIME LEFT : </strong>
								  	<?php 
								  		date_default_timezone_set("Asia/Manila");
	                                    $currentDatetime = time();
	                                    $datediff = abs(strtotime($rowprod['bid_expire']) - $currentDatetime);

		                                $mins = $datediff/60;
		                                $minsfinal=floor($mins);
		                                $secondsfinal=$datediff-($minsfinal*60);
		                                $hours=$minsfinal/60;
		                                $hoursfinal=floor($hours);
		                                $minssuperfinal=$minsfinal-($hoursfinal*60);
		                                $days=$hoursfinal/24;
		                                $daysfinal=floor($days);
		                                $hourssuperfinal=$hoursfinal-($daysfinal*24);
								  	 ?>
										<span><?php echo floor($datediff/(60*60*24)).' days, '.$hourssuperfinal.' hours, '.$minssuperfinal.' mins'; ?></span>
										
									</div>
								   
                                  <div class="product_meta">
                                      <span class="posted_in"> <strong>Categories  :  </strong> <a rel="tag" href="auction.php?category=<?php echo $rowprod['category']; ?>"><?php echo $rowprod['category']; ?></a>.</span>
                                  </div>

                                  <?php 
                                  	$pid = $rowprod['product_id'];
	                                $getparticipation = "SELECT * FROM participation WHERE product_id = '$pid' ORDER BY bid_amount LIMIT 1;";
	                                $rowparticipation = mysql_fetch_array(mysql_query($getparticipation));
	                                $numrowparticipation = mysql_num_rows(mysql_query($getparticipation));
	                                $oid = $rowparticipation['account_id'];
                                    $owner2 = "SELECT * FROM account WHERE account_id = '$oid';";
                                    $getowner2 = mysql_query($owner2);
                                    $rowgetowner = mysql_fetch_array($getowner2);

                                  ?>

                                  <?php if ($numrowparticipation==0): ?>

                                  	<div class="m-bot15"> <strong>Starting Price : </strong>
										<span class="pro-price"> PHP <?php echo $rowprod['starting_price'] ?></span>
										by <?php echo $rowowner['first_name'].' '.$rowowner['last_name']; ?>
									</div>

                                  <?php else: ?>


                                  	<div class="m-bot15"> <strong>Highest Bid : </strong>
										<span class="pro-price"> PHP <?php echo $rowparticipation['bid_amount'] ?></span>
										by <?php echo $rowgetowner['first_name'].' '.$rowgetowner['last_name']; ?>
									</div>

                                  <?php endif ?>

									
									<form class="form-inline" role="form" action="product_details.php?prodid=<?php echo $rowprod['product_id'] ?>" method="post">
	                                      <div class="form-group">
	                                          <label>Bid Amount: &nbsp; &nbsp;</label>
											  <div class="input-group m-bot15">
												  <span class="input-group-addon">P</span>
												  <?php if ($numrowparticipation==0): ?>
												  	<input type="hidden" name="currenthighestbid" id="origbid" value="<?php echo $rowprod['starting_price'] ?>">
												  <?php else: ?>
												  	<input type="hidden" name="currenthighestbid" id="origbid" value="<?php echo $rowparticipation['bid_amount'] ?>">
												  <?php endif ?>
												  
												  <input type="number" name="mybidamount" onkeyup="checkbid()" onchange="checkbid()" id="newbid" style="width: 200px;" class="form-control" placeholder=""><!--Lagyan mo ng placeholder na dapat above sa highest bid ung ieenter nya dapat o kaya lagay mo sa alert chuchu sa baba<3 -->
													
											  </div>
											  		<div id="bidalert" class="text-danger">
														
													</div>
	                                      </div>
	                                      <br>
	                                      <button type="submit" name="bidsubmit" id="submit" disabled class="btn btn-round btn-danger"><i class="icon-shopping-cart"></i>Place Bid</button>
                                     </form>

                                     <br>

                                     <form name="atwl" method="get">
                                     	<input type="hidden" name="prodid" value="<?php echo $prodid3; ?>">
                                     	<input type="hidden" name="wsprodid" value="<?php echo $prodid3; ?>">
                                     	<button id="wlsubmit" class="btn btn-round btn-danger" onclick="javascript:document.atwl.submit()"><i class="icon-heart"></i>Add to Wishlist</button>
                                     </form>
             
                                     
									
									
                                  
                              </div>
                          </div>
                      </section>

                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs ">
                                  <li>
                                      <a data-toggle="tab" href="#description" >
                                          Description
                                      </a>
                                  </li>
								  <li>
                                      <a data-toggle="tab" href="#user">
                                          About the Seller
                                      </a>
                                  </li>
								  <li class="active">
                                      <a data-toggle="tab" href="#bid" >
                                          Bids Ranking
                                      </a>
                                  </li>


                              </ul>
                          </header>
							<div class="panel-body">
								<div class="tab-content tasi-tab" >
									<div id="description" class="tab-pane">
										<div class="row">
											<div class="center">
												<h4 class="headlabel"><?php echo $rowprod["product_name"]; ?></h4>
												<p>posted by <?php echo $rowowner['first_name'].' '.$rowowner['last_name']; ?></p>
											</div>
											<div class="col-lg-3">
											
											<div class="m-bot15"> <strong>Category : </strong>
												<span class="valuelabel"> <?php echo $rowprod["category"]; ?></span>
											</div>
											<div class="m-bot15"> <strong>Date posted : </strong>
												<span class="valuelabel"> <?php echo $rowprod["datetime_posted"]; ?></span>
											</div>
											<div class="m-bot15"> <strong>Starting Bid : </strong>
												<span class="valuelabel"> PHP <?php echo $rowprod["starting_price"]; ?></span>
											</div>
											
											</div>
											<div class="col-lg-9">
												<div class="m-bot15"> <strong>Description : </strong><br><br>
													<span> <?php echo $rowprod["product_description"]; ?> </span>
												
												</div>
											
										  
											</div>
										</div>
								  </div>
									
								<div id="user" class="tab-pane" >
								<!--widget start-->
								<aside class="profile-nav alt green-border">
									<section class="panel">
									  <div class="user-heading alt green-bg" style="height: 150px;">
										  <a href="#">
											  <img alt="" src="data:image/jpeg;base64,<?php echo base64_encode( $rowowner['image'] ) ?>">
										  </a>
										  <h1><?php echo $rowowner['first_name'].' '.$rowowner['last_name']; ?></h1>
										  <p><?php echo $rowowner['email'] ?></p>
										  
									  </div>
										
										<div class="col-lg-12" >
											<ul class="nav nav-pills nav-stacked">
											<li><a> <i class=" icon-home"></i> Home Address  :   <?php echo $rowowner['home_address'] ?></a></li>  <!--bawal makita ng guest-->
											</ul>
										</div>
										<div class="col-lg-6">
											<ul class="nav nav-pills nav-stacked">
												<li><a> <i class="icon-male"></i> Sex  :   <?php echo $rowowner['gender'] ?></a></li>
												<li><a> <i class="icon-bell-alt"></i> Last Login  :   <?php echo $rowowner['last_login'] ?></a></li>
											</ul>
										  </div>
										  <div class="col-lg-6">
										  <ul class="nav nav-pills nav-stacked">
												<li><a> <i class="icon-mobile-phone"></i> Phone no :   <?php echo $rowowner['phone'] ?></a></li> <!--bawal makita ng guest-->
												<li><a> <i class="icon-star"></i> Ratings  :   <?php echo $rowowner['ratings'] ?></a></li>
												
											</ul>
										  </div>
											
										  
											  
												<div class="panel-body" style="padding-left:80px;">
													<form class="form-inline" role="form" action="product_details.php?prodid=<?php echo $rowprod['product_id'] ?>" method="post">
													Rate the seller here!<input name="ratings" id="input-21b" value="0" type="number" class="rating" min=0 max=5 step=0.1 data-size="xs">
													<input type="submit" name="rate" value="SUBMIT" class="btn btn-info">
													</form>
												</div>
											
											<a class="btn btn-compose pull-right" style="width:200px; " data-toggle="modal" href="#myModal">
												Send Message
											</a>
											<!-- Modal -->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														  <h4 class="modal-title">Send Seller a Message</h4>
														</div>
														<div class="modal-body">
															<form class="form-horizontal" role="form" method="post" action="product_details.php?prodid=<?php echo $rowprod['product_id'] ?>">
																<div class="form-group">
																	<label class="col-lg-2 control-label">Subject</label>
																	<div class="col-lg-10">
																		<input type="text" name="subject" class="form-control" id="inputPassword1" required placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-lg-2 control-label">Message</label>
																	<div class="col-lg-10">
																		<textarea name="message" id="" class="form-control" cols="30" rows="10" required></textarea>
																	</div>
																</div>
																<div class="form-group">
																	<div class="col-lg-offset-2 col-lg-10">
																		<button type="submit" name="send" class="btn btn-send">Send</button>
																	</div>
																</div>
															</form>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
							

									</section>
								</aside>
								<!--widget end-->
							
									</div>
								  <div id="bid" class="tab-pane active" >
                                        <div class="timeline-messages">
										  <!-- Comment -->

										  <?php 

										  	$getparticipation2 = "SELECT * FROM participation WHERE product_id = '$pid' ORDER BY bid_amount;";
										  	$executeparticipation = mysql_query($getparticipation2);
			                                
			                                $numrowparticipation2 = mysql_num_rows(mysql_query($getparticipation2));
			                                if ($numrowparticipation2==0) 
			                                {
			                                	echo "<h2 class='text-info'>There are no bids yet</h2>";
			                                }
			                                else
			                                {
			                                	while ($rowparticipation2 = mysql_fetch_array($executeparticipation)) 
			                                	{
			                                		$oid2 = $rowparticipation2['account_id'];
				                                    $owner3 = "SELECT * FROM account WHERE account_id = '$oid';";
				                                    $getowner3 = mysql_query($owner3);
				                                    $rowgetowner3 = mysql_fetch_array($getowner3);

				                                    if ($rowowner['account_id']==$rowgetowner3['account_id']) 
				                                    {
				                                    	echo '

				                                    	<div class="msg-time-chat">
															<a href="#" class="message-img"><img class="avatar" src="data:image/jpeg;base64,' . base64_encode( $rowowner['image'] ) . '" alt=""></a>
															<div class="message-body msg-out">
																<span class="arrow"></span>
																<div class="text">
																	<p class="attribution"> <a href="#">'.$rowowner['first_name'].' '.$rowowner['last_name'].'</a> at '.$rowparticipation2['dateissued'].' <button type="submit" class="btn icon-trash btn-danger pull-right"></button></p>
																	<p>Bid amount: Php '.$rowparticipation2['bid_amount'].' </p>
																		  
																</div>
																	  
															</div>
														</div>


				                                    	';
				                                    }
				                                    else
				                                    {
				                                    	echo '

				                                    		<div class="msg-time-chat">
																<a href="#" class="message-img"><img class="avatar" src="data:image/jpeg;base64,' . base64_encode( $rowgetowner3['image'] ) . '" alt=""></a>
																<div class="message-body msg-in">
																	<span class="arrow"></span>
																	<div class="text">
																		<p class="attribution"><a href="#">'.$rowgetowner3['first_name'].' '.$rowgetowner3['last_name'].'</a> at '.$rowparticipation2['dateissued'].'</p>
																		<p>Bid amount: Php '.$rowparticipation2['bid_amount'].' </p>
																	</div>
																</div>
															</div>

				                                    	';
				                                    }
			                                	}
			                                }
			                                

										   ?>

									  </div>
									  
                                  </div>
                              </div>
                          </div>
                      </section>

                     <div class="row product-list">
                          
											
					</div>
                  </div>
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

    <script src="js2/respond.min.js" ></script>

<script src="js2/form-image-crop.js"></script>
  <script src="assets2/jcrop/js/jquery.color.js"></script>
  <script src="assets2/jcrop/js/jquery.Jcrop.min.js"></script>
    <!--common script for all pages-->
    <script src="js2/common-scripts.js"></script>

    <script src="js2/sliders.js" type="text/javascript"></script>
	<script src="js/star-rating.js"></script>
      <script type="text/javascript">

          $(document).ready(function() {

              $(function(){
                  $('select.styled').customSelect();
              });
          });


      </script>
	  <script>
      jQuery(document).ready(function() {
          // initiate layout and plugins
          FormImageCrop.init();
      });
  </script>

  </body>
</html>

<script type="text/javascript">

	function changeimage (id,id2) {
		var temp = document.getElementById(id).src;
		
		document.getElementById(id).src = document.getElementById(id2).src;
		document.getElementById(id2).src = temp;
		document.getElementById("img_view").src = temp;
		
	}

	function checkbid () {
		var cb = Number(document.getElementById("origbid").value);
		var nb = Number(document.getElementById("newbid").value);

		if(document.getElementById("newbid").value=="")
		{
			document.getElementById("bidalert").innerHTML = "";
			document.getElementById("submit").disabled = true;
		}
		else if (nb <= cb) 
		{
			document.getElementById("bidalert").innerHTML = "*Enter a bid higher than the current highest bid.";
		}
		else
		{
			document.getElementById("bidalert").innerHTML = "";
			document.getElementById("submit").disabled = false;
		}
	}

	$('#newbid').keypress(function(e) 
	{
	    var a = [];
	    var k = e.which;
	    
	    for (i = 48; i < 58; i++)
	        a.push(i);
	    
	    if (!(a.indexOf(k)>=0))
	        e.preventDefault();
    
	});

</script>

