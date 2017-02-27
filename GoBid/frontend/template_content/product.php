<?php 
  session_start();
  $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];

  include 'connect.php';

  if (!isset($_SESSION['Login'])) {
     header("Location: login.php");
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

    <title>Product | GoBid</title>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets2/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="assets2/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets2/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />

	<!--Upload-->
	<link rel="stylesheet" type="text/css" href="assets2/bootstrap-fileupload/bootstrap-fileupload.css" />

    <!-- Custom styles for this template -->
    <link href="css2/style.css" rel="stylesheet">
    <link href="css2/style-responsive.css" rel="stylesheet" />

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
			  <section class="panel">

                          <div class="panel-body">
                              
                              <?php 
                              date_default_timezone_set("Asia/Manila");

                                  include 'connect.php';

                                  if (isset($_POST['submit'])) {
                                    
                                    $name = $_POST['name'];
                                    $acctID = $_SESSION['acctinfo'];

                                    $Pimgname = $_FILES["primary"]["name"];
                                    $Pimage = addslashes(file_get_contents($_FILES['primary']['tmp_name']));
                                    $Pimgtype = $_FILES["primary"]["type"];

                                    $Simgname1 = $_FILES["sec1"]["name"];
                                    $Simage1 = addslashes(file_get_contents($_FILES['sec1']['tmp_name']));
                                    $Simgtype1 = $_FILES["sec1"]["type"];

                                    $Simgname2 = $_FILES["sec2"]["name"];
                                    $Simage2 = addslashes(file_get_contents($_FILES['sec2']['tmp_name']));
                                    $Simgtype2 = $_FILES["sec2"]["type"];

                                    $Simgname3 = $_FILES["sec3"]["name"];
                                    $Simage3 = addslashes(file_get_contents($_FILES['sec3']['tmp_name']));
                                    $Simgtype3 = $_FILES["sec3"]["type"];

                                    $Simgname4 = $_FILES["sec4"]["name"];
                                    $Simage4 = addslashes(file_get_contents($_FILES['sec3']['tmp_name']));
                                    $Simgtype4 = $_FILES["sec4"]["type"];

                                    
                                    $category = $_POST['chosenCategory'];
                                    $condition = $_POST['chosenCondition'];
                                    $location = $_POST['chosenLocation'];
                                    $sex = $_POST['chosenSex'];
                                    $expire = $_POST['chosenExpiration'];

                                    $auction_price = $_POST['auction_price'];
                                    //$special_price = $_POST['special_price'];

                                    $Pdetails = $_POST['description'];

                                    //echo $description;

                                    $currentDatetime = date("Y-m-d H:i:s");

                                    if($expire == "3 days from now")
                                    {
                                      $expiredate = $currentDatetime;
                                      $expiredate = strtotime($expiredate);
                                      $expiredate = strtotime("+3 day", $expiredate);
                                      $expireDatetime = date('Y-m-d H:i:s', $expiredate);
                                    }
                                    elseif ($expire == "5 days from now")
                                    {
                                      $expiredate = $currentDatetime;
                                      $expiredate = strtotime($expiredate);
                                      $expiredate = strtotime("+5 day", $expiredate);
                                      $expireDatetime = date('Y-m-d H:i:s', $expiredate);
                                    }
                                    elseif ($expire == "7 days from now") 
                                    {
                                      $expiredate = $currentDatetime;
                                      $expiredate = strtotime($expiredate);
                                      $expiredate = strtotime("+7 day", $expiredate);
                                      $expireDatetime = date('Y-m-d H:i:s', $expiredate);
                                    }

                                    if($category == "Select a Category")
                                    {
                                      echo "<h3 class='text-danger'>*You did not select a category</h3>";
                                    }
                                    else
                                    {
                                      if($condition=="Select a Condition")
                                      {
                                        echo "<h3 class='text-danger'>*You did not select a condition</h3>";
                                      }
                                      else
                                      {
                                        if($location=="Select a Location")
                                        {
                                          echo "<h3 class='text-danger'>*You did not select a location</h3>";
                                        }
                                        else
                                        {
                                          if($sex=="Select a Sex/Gender")
                                          {
                                            echo "<h3 class='text-danger'>*You did not select a Sex</h3>";
                                          }
                                          else
                                          {
                                            if($location=="Select an Expiration")
                                            {
                                              echo "<h3 class='text-danger'>*You did not select an expiration</h3>";
                                            }
                                            else
                                            {
                                              $check = "SELECT * FROM product WHERE product_name = '$name';";
                                              $checkresult = mysql_query($check);

                                              if (mysql_num_rows($checkresult)>0) {
                                                  echo '<h3 class="text-danger"> You entered an existing product! </h3>';
                                                }
                                              else
                                              {
                                                if((substr($Pimgtype,0,5) == 'image') && (substr($Simgtype1,0,5) == 'image') && (substr($Simgtype2,0,5) == 'image') && (substr($Simgtype3,0,5) == 'image'))
                                                {
                                                  if(($_FILES["sec1"]["size"] > 1048576) && ($_FILES["sec2"]["size"] > 1048576) && ($_FILES["sec3"]["size"] > 1048576) && ($_FILES["sec4"]["size"] > 1048576))
                                                  {
                                                    echo "<h3 class='text-danger'> The file uploaded is more than 1MB!</h3>";
                                                  }
                                                  else
                                                  {
                                                    $addtoprod = "INSERT INTO product (product_name,account_id,category,sex,primary_img,second_img1,second_img2,second_img3,second_img4,starting_price,datetime_posted,bid_expire,product_condition,product_description) VALUES ('$name','$acctID','$category','$sex','$Pimage','$Simage1','$Simage2','$Simage3','$Simage4','$auction_price','$currentDatetime','$expireDatetime','$condition','$Pdetails');";
                                                    mysql_query($addtoprod);
                                                    echo "<h3 class='text-success'>Product successfully added!</h3>";
                                                  }
                                                  
                                                }
                                                else
                                                {
                                                  echo "<h3 class='text-danger'> The file uploaded is not an Image!</h3>";
                                                }
                                              }
                                            }
                                          }
                                          
                                        }
                                      }
                                    }
                                  }
                                ?>

                              <a href="#myModal-1" data-toggle="modal" class="btn btn-md btn-primary pull-right">
                                  Auction an Item 
                              </a>
                 
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Auction an Item</h4> <!-- idisable mo to pag ibang user ung magvview sa user profile ng iba-->
											  
											 
											  
                                          </div>
                                          <div class="modal-body">
										 
                        											<!-- <i class="fa fa-user"></i><?php //echo $_SESSION['name']; ?> -->  <!-- kahit di mo na isama to <3 -->
                        											<div class="pull-right">
                        											<i class="fa fa-clock-o"></i>
                                              <?php 
                                                
                                                echo date("h:ia"); 
                                              ?>  &nbsp; &nbsp;<!-- kahit di mo na isama to <3 -->
                        											
                        											<i class="fa fa-calendar-o"></i><?php echo date("Y/m/d"); ?></a></li><!-- current date--> <!-- kahit di mo na isama to <3 -->
                        											</div>
												
                                              <form class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                                                  <div class="form-group ">
                                                      <label class="col-lg-3 col-sm-2 control-label">Item Name</label>
                                                      <div class="col-lg-9">
                                                          <input type="text" required name="name" class="form-control" placeholder="Item Name">
                                                      </div>
                                                  </div>
                                                  <div class="form-group ">
													  <label class="control-label col-md-3">Primary Image</label>
													  <div class="col-md-9">
														  <div class="fileupload fileupload-new" data-provides="fileupload">
															  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
															  </div>
															  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
															  <div>
															   <span class="btn btn-white btn-file">
															   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
															   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
															   <input type="file" name="primary" class="default" required/>
															   </span>
																  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
															  </div>
														  </div>
													  </div>
												  </div>
												  
												   <!--collapse start-->
												  <div class="panel-group m-bot20" id="accordion">
													  <div class="panel panel-default">
														  <div class="panel-heading">
															  <h4 class="panel-title">
																  <a class="accordion-toggle"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																	  Secondary Image
																  </a>
															  </h4>
														  </div>
														  <div id="collapseOne" class="panel-collapse collapsed">
															  <div class="panel-body">
																<div class="col-lg-6">
																	<div class="fileupload fileupload-new" data-provides="fileupload">
																		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																		  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
																		<div>
																			<span class="btn btn-white btn-file">
																			<span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
																			<span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
																			<input type="file" name="sec1" class="default" required/>
																			</span>
																			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
																	  </div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="fileupload fileupload-new" data-provides="fileupload">
																		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																		  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
																		<div>
																			<span class="btn btn-white btn-file">
																			<span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
																			<span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
																			<input type="file" name="sec2" class="default" required />
																			</span>
																			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
																	  </div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="fileupload fileupload-new" data-provides="fileupload">
																		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																		  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
																		<div>
																			<span class="btn btn-white btn-file">
																			<span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
																			<span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
																			<input type="file" name="sec3" class="default" required/>
																			</span>
																			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
																	  </div>
																	</div>
																</div>
																<div class="col-lg-6">
																	<div class="fileupload fileupload-new" data-provides="fileupload">
																		<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
																		  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
																		</div>
																		<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
																		<div>
																			<span class="btn btn-white btn-file">
																			<span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
																			<span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
																			<input type="file" name="sec4" class="default" required/>
																			</span>
																			<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
																	  </div>
																	</div>
																</div>
															  </div>
														  </div>
													  </div>
												  </div>
												  <!--collapse end-->
												  
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Caterogy (Select one)</label>
														<div class="col-lg-9">
															<p>
															    <select class="form-control" id="category" onchange="getCategory()">
                                    <option value="Select a Category">Select a Category</option>
                                    <?php 

                                      $select = "SELECT * FROM category";
                                      $rs = mysql_query($select);
                                      while ($row = mysql_fetch_array($rs)) 
                                      {
                                        echo "<option value='".$row['category_name']."'>".$row['category_name']."</option>";
                                      }

                                     ?>
                                  </select>
                                  <input type="hidden" id="chosenCategory" name="chosenCategory" value="Select a Category">															</p>
														</div>
													</div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Condition (Select one)</label>
														<div class="col-lg-9">
															<p>
															    <select class="form-control" id="condition" onchange="getCondition()">
                                    <option value="Select a Condition">Select a Condition</option>
                                    <option>Brand New</option>
                                    <option>Secondhand</option>
                                    <option>Others</option>
                                  </select>
                                  <input type="hidden" id="chosenCondition" name="chosenCondition" value="Select a Condition">
															</p>
														</div>
													</div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Location (Select one)</label>
														<div class="col-lg-9">
															<p>
															    <select class="form-control" id="location" onchange="getLocation()">
                                    <option value="Select a Location">Select a Location</option>
                                    <option>Marikina</option>
                                    <option>Quezon</option>
                                    <option>Manila</option>
                                    <option>Basta Lugar</option>
                                  </select>
                                  <input type="hidden" id="chosenLocation" name="chosenLocation" value="Select a Location">
															</p>
														</div>
													</div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Sex/Gender (Select one)</label>
                            <div class="col-lg-9">
                              <p>
                                  <select class="form-control" id="sex" onchange="getSex()">
                                    <option value="Select a Sex/Gender">Select a Sex/Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Unisex</option>
                                  </select>
                                  <input type="hidden" id="chosenSex" name="chosenSex" value="Select a Sex/Gender">
                              </p>
                            </div>
                          </div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Bid Expiration (Select one)</label>
														<div class="col-lg-9">
															<select class="form-control" id="expire" onchange="getExpire()">
                                    <option value="Select an Expiration">Select an Expiration</option>
                                    <option>3 days from now</option>
                                    <option>5 days from now</option>
                                    <option>7 days from now</option>
                                  </select>
                                  <input type="hidden" id="chosenExpiration" name="chosenExpiration" value="Select an Expiration">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Auction Price</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
															  <span class="input-group-addon">P</span>
															  <input type="text" name="auction_price" required class="form-control">
														  </div>
														</div>
													</div>
													<!-- <div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Selling Price (Optional)</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
															  <span class="input-group-addon">$</span>
															  <input type="text" name="special_price" class="form-control">
														  </div>
														</div>
													</div> -->
													<div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Description</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
																<textarea name="description" required id="" class="form-control" cols="60" rows="5"></textarea>

														  </div>
														</div>
													</div>
													<button type="clear" class="btn btn-info">Clear</button> &nbsp;&nbsp;
													<button type="submit" name="submit" class="btn btn-success">Submit</button> &nbsp;&nbsp;
													<button type="cancel" class="btn btn-danger" data-dismiss="modal" >Cancel</button>
                                              </form>

                                          </div>

                                      </div>
                                  </div>
                              </div>
                 
                          </div>
                      </section>

                     <!--  -------    EDIT ITEMS    --------- -->
                    <!--  <section class="panel">

                          <div class="panel-body">
                              
                             
                    
                 
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-2" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Edit an Item</h4>  
                       
                        
                                          </div>
                                          <div class="modal-body">
                     
                                             
                                              <div class="pull-right">
                                              <i class="fa fa-clock-o"></i>
                                              <?php 
                                                /*date_default_timezone_set("Asia/Manila");
                                                echo date("h:ia");*/ 
                                              ?>  &nbsp; &nbsp;
                                              
                                              <i class="fa fa-calendar-o"></i><?php //echo date("Y/m/d"); ?></a></li>
                                              </div>
                        
                                              <form class="form-horizontal" role="form" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                                                  <div class="form-group ">
                                                      <label class="col-lg-3 col-sm-2 control-label">Item Name</label>
                                                      <div class="col-lg-9">
                                                          <input type="text" name="name" class="form-control" placeholder="Item Name">
                                                      </div>
                                                  </div>
                                                  <div class="form-group ">
                            <label class="control-label col-md-3">Primary Image</label>
                            <div class="col-md-9">
                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                 <span class="btn btn-white btn-file">
                                 <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                 <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                 <input type="file" name="primary" class="default" />
                                 </span>
                                  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                           
                          <div class="panel-group m-bot20" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a class="accordion-toggle"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    Secondary Image (Optional)
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                <div class="col-lg-6">
                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                      <span class="btn btn-white btn-file">
                                      <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                      <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                      <input type="file" name="sec1" class="default" />
                                      </span>
                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                      <span class="btn btn-white btn-file">
                                      <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                      <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                      <input type="file" name="sec2" class="default" />
                                      </span>
                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                      <span class="btn btn-white btn-file">
                                      <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                      <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                      <input type="file" name="sec3" class="default" />
                                      </span>
                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                      <span class="btn btn-white btn-file">
                                      <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                      <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                      <input type="file" name="sec4" class="default" />
                                      </span>
                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Caterogy (Select one)</label>
                            <div class="col-lg-9">
                              <p>
                                  <select class="form-control" id="category" onchange="getCategory()">
                                    <option value="Select a Category">Select a Category</option>
                                    <?php 

                                     /* $select = "SELECT * FROM category";
                                      $rs = mysql_query($select);
                                      while ($row = mysql_fetch_array($rs)) 
                                      {
                                        echo "<option value='".$row['category_name']."'>".$row['category_name']."</option>";
                                      }*/

                                     ?>
                                  </select>
                                  <input type="hidden" id="chosenCategory" name="chosenCategory" value="Select a Category">                             </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Condition (Select one)</label>
                            <div class="col-lg-9">
                              <p>
                                  <select class="form-control" id="condition" onchange="getCondition()">
                                    <option value="Select a Condition">Select a Condition</option>
                                    <option>Brand New</option>
                                    <option>Secondhand</option>
                                    <option>Others</option>
                                  </select>
                                  <input type="hidden" id="chosenCondition" name="chosenCondition" value="Select a Condition">
                              </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Location (Select one)</label>
                            <div class="col-lg-9">
                              <p>
                                  <select class="form-control" id="location" onchange="getLocation()">
                                    <option value="Select a Location">Select a Location</option>
                                    <option>Marikina</option>
                                    <option>Quezon</option>
                                    <option>Manila</option>
                                    <option>Basta Lugar</option>
                                  </select>
                                  <input type="hidden" id="chosenLocation" name="chosenLocation" value="Select a Location">
                              </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Sex/Gender (Select one)</label>
                            <div class="col-lg-9">
                              <p>
                                  <select class="form-control" id="sex" onchange="getSex()">
                                    <option value="Select a Sex/Gender">Select a Sex/Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Unisex</option>
                                  </select>
                                  <input type="hidden" id="chosenSex" name="chosenSex" value="Select a Sex/Gender">
                              </p>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Bid Expiration (Select one)</label>
                            <div class="col-lg-9">
                              <select class="form-control" id="expire" onchange="getExpire()">
                                    <option value="Select an Expiration">Select an Expiration</option>
                                    <option>3 days from now</option>
                                    <option>5 days from now</option>
                                    <option>7 days from now</option>
                                  </select>
                                  <input type="hidden" id="chosenExpiration" name="chosenExpiration" value="Select an Expiration">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Auction Price</label>
                            <div class="col-lg-9">
                              <div class="input-group m-bot15">
                                <span class="input-group-addon">P</span>
                                <input type="text" name="auction_price" required class="form-control">
                              </div>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-3 col-sm-2 control-label">Description (Optional)</label>
                            <div class="col-lg-9">
                              <div class="input-group m-bot15">
                                <textarea name="description" id="" class="form-control" cols="60" rows="5"></textarea>

                              </div>
                            </div>
                          </div>
                          <button type="clear" class="btn btn-info">Clear</button> &nbsp;&nbsp;
                          <button type="submit" name="submit" class="btn btn-success">Submit</button> &nbsp;&nbsp;
                          <button type="cancel" class="btn btn-danger" data-dismiss="modal" >Cancel</button>
                                              </form>

                                          </div>

                                      </div>
                                  </div>
                              </div>
                 
                          </div>
                      </section> -->

                      <!-- ------     END OF EDIT ITEMS     ------ -->
			  
              <section class="panel">
                  <header class="panel-heading">
                      Your items are listed below.
                  </header>
                  <div class="panel-body">
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                <tr>
                                    <th class="hide">Date Posted</th>
                                    <th class="hide">Item ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th class='hide'>Sex</th>
                                    <th class='hide'>Starting Price</th>
                                    <th>Condition</th>
                                    <th class='hide'>Participants No.</th>
                                    <th>Sold</th>
                                    <th>Status</th>
                                    <th class="hide">Description</th>
                                    <th >Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php 

                                    $acctid = $_SESSION['acctinfo'];
                                    $sql="SELECT * FROM product WHERE account_id = '$acctid';";
                                    $rs = mysql_query($sql);

                                    while ($row = mysql_fetch_array($rs))
                                    {
                                      echo "
                                      <tr class='gradeX'>
                                          <td class='hide'>".$row['datetime_posted']."</td>
                                          <td class='hide'>".$row['product_id']."</td>
                                          <td><a href='product_details.php?prodid=".$row['product_id']."'>".$row['product_name']."</a></td>
                                          <td>".$row['category']."</td>
                                          <td class='hide'>".$row['sex']."</td>
                                          <td class='hide'>".$row['starting_price']."</td>
                                          <td>".$row['product_condition']."</td>
                                          <td class='hide'>".$row['participants_no']."</td>
                                          <td class='center'>".$row['sold']."</td>
                                          <td>".$row['product_status']."</td>
                                          <td class='hide'>".$row['product_description']."</td>
                                          <td class='center'><a href='#myModal-2' data-toggle='modal' class='btn btn-sm btn-primary'>
                                  <span class='glyphicon glyphicon-edit'></span>
                              </a></td>
                                        </tr>
                                      ";
                                    }

                                  ?>

                                </tbody>
                            </table>

                        </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
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
    <!--<script src="js/jquery.js"></script>-->
    <script type="text/javascript" language="javascript" src="assets2/advanced-datatable/media/js/jquery.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js2/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js2/jquery.scrollTo.min.js"></script>
    <script src="js2/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js2/respond.min.js" ></script>
    <script type="text/javascript" language="javascript" src="assets2/advanced-datatable/media/js/jquery.dataTables.js"></script>

	<!--Upload-->
	<script type="text/javascript" src="assets2/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	
    <!--common script for all pages-->
    <script src="js2/common-scripts.js"></script>

    <script type="text/javascript">
      /* Formating function for row details */
      function fnFormatDetails ( oTable, nTr )
      {
          var aData = oTable.fnGetData( nTr );
          var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
           sOut += '<tr><td>Item ID:</td><td>'+aData[2]+'</td></tr>';
          sOut += '<tr><td>Datetime Posted:</td><td>'+aData[1]+'</td></tr>';
          sOut += '<tr><td>Sex/Gender:</td><td>'+aData[5]+'</td><td>Starting Price:&nbsp;&nbsp;&nbsp;&nbsp;P '+aData[6]+'</td><td>Number of Participants:&nbsp;&nbsp;&nbsp;&nbsp;'+aData[8]+'</td></tr>';
          sOut += '<tr><td>Ad details:</td><td colspan="5">'+aData[11]+'</td></tr>';
          sOut += '</table>';

          return sOut;
      }

      $(document).ready(function() {
          /*
           * Insert a 'details' column to the table
           */
          var nCloneTh = document.createElement( 'th' );
          var nCloneTd = document.createElement( 'td' );
          nCloneTd.innerHTML = '<img src="assets2/advanced-datatable/examples/examples_support/details_open.png">';
          nCloneTd.className = "center";

          $('#hidden-table-info thead tr').each( function () {
              this.insertBefore( nCloneTh, this.childNodes[0] );
          } );

          $('#hidden-table-info tbody tr').each( function () {
              this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
          } );

          /*
           * Initialse DataTables, with no sorting on the 'details' column
           */
          var oTable = $('#hidden-table-info').dataTable( {
              "aoColumnDefs": [
                  { "bSortable": false, "aTargets": [ 0 ] }
              ],
              "aaSorting": [[1, 'asc']]
          });

          /* Add event listener for opening and closing details
           * Note that the indicator for showing which row is open is not controlled by DataTables,
           * rather it is done here
           */
          $('#hidden-table-info tbody td img').live('click', function () {
              var nTr = $(this).parents('tr')[0];
              if ( oTable.fnIsOpen(nTr) )
              {
                  /* This row is already open - close it */
                  this.src = "assets2/advanced-datatable/examples/examples_support/details_open.png";
                  oTable.fnClose( nTr );
              }
              else
              {
                  /* Open this row */
                  this.src = "assets2/advanced-datatable/examples/examples_support/details_close.png";
                  oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
              }
          } );
      } );
  </script>


  </body>
</html>

<script type="text/javascript">
  function getCategory() 
  {
    var chosenOne = document.getElementById('category').value;

    document.getElementById('chosenCategory').value = chosenOne;
  }

  function getCondition() 
  {
    var chosenOne = document.getElementById('condition').value;

    document.getElementById('chosenCondition').value = chosenOne;
  }

  function getLocation() 
  {
    var chosenOne = document.getElementById('location').value;

    document.getElementById('chosenLocation').value = chosenOne;
  }

  function getSex() 
  {
    var chosenOne = document.getElementById('sex').value;

    document.getElementById('chosenSex').value = chosenOne;
  }

  function getExpire() 
  {
    var chosenOne = document.getElementById('expire').value;

    document.getElementById('chosenExpiration').value = chosenOne;
  }
</script>