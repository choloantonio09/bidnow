<?php 
  session_start();
  include 'connect.php';

  $currentacctid = $_SESSION['acctinfo'];

  if(isset($_POST['psubmit']))
  {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $homeaddress = $_POST['homeaddress'];
    $phone = $_POST['phone'];

    $update = "UPDATE account SET first_name = '$firstname', last_name = '$lastname', email = '$email', home_address = '$homeaddress', phone = '$phone' WHERE account_id='$currentacctid';";
    mysql_query($update);
    $updatealert = 1;
    
   //echo ' <meta http-equiv="Refresh" content="5; url=profile-edit.php">';
  }

  if (isset($_POST['submit'])) 
  {
    $cpw = $_POST['c-pwd'];
    $npw = $_POST['n-pwd'];
    
    

    $getcpw="SELECT * FROM account WHERE account_id = '$currentacctid';";
    $getcpwquery = mysql_query($getcpw);
    $rowcpw = mysql_fetch_array($getcpwquery);

    if ($cpw!=$rowcpw['password']) 
    {
      $updatealert = 0;
      //echo "<h3 class='text-success'>You entered the wrong current password.</h3>";
    }
    else
    {
      if (!isset($_POST['newimg'])) 
      {
        $update2="UPDATE account SET password = '$npw' WHERE account_id = '$currentacctid';";
        mysql_query($update2);
        $updatealert = 1;
      }
      else
      {
        $imgname = $_FILES["newimg"]["name"];
        $image = addslashes(file_get_contents($_FILES['newimg']['tmp_name']));
        $imgtype = $_FILES["newimg"]["type"];

        if($_FILES["newimg"]["size"] > 1048576)
        {
          $updatealert=2;
        }
        else
        {
          $update2="UPDATE account SET password = '$npw', image = '$image' WHERE account_id = '$currentacctid';";
          mysql_query($update2);
          $updatealert = 1;
        }
        
      }
      
      
      //echo ' <meta http-equiv="Refresh" content="5; url=profile-edit.php">';
    }
  }

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

    <title>Profile Edit</title>

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
                              <li ><a href="profile.php"> <i class="icon-user"></i> Profile</a></li>
                              <li class="active"><a href="profile-edit.php"> <i class="icon-edit"></i> Edit profile</a></li>
                            
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
                              <h1> Profile Info</h1>

                              <?php 

                              if (isset($updatealert)) 
                              {

                                if ($updatealert==1) 
                                {
                                  echo "<h3 class='text-success'>Account successfully updated!</h3>";
                                }
                                elseif ($updatealert==2) {
                                  echo "<h3 class='text-success'>The image selected is more than 1MB!</h3>";
                                }
                                else
                                {
                                  echo "<h3 class='text-warning'>You entered the wrong current password.</h3>";
                                }
                              }

                               ?>
                              <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" role="form">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">First Name</label>
                                      <div class="col-lg-6">
                                          <input name="firstname" type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $rowacct['first_name']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Last Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="lastname" class="form-control" id="l-name" placeholder=" " value="<?php echo $rowacct['last_name']; ?>">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="email" class="form-control" id="email" placeholder=" " value="<?php echo $rowacct['email']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Mobile</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="phone" class="form-control" id="mobile" placeholder=" " value="<?php echo $rowacct['phone']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Home Address</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="homeaddress" class="form-control" id="c-name" placeholder=" " value="<?php echo $rowacct['home_address']; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" name="psubmit" class="btn btn-success" name="personal">Save</button>
                                          <a href="profile.php" title=""><button type="button" class="btn btn-default">Cancel</button></a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                      <section>
                          <div class="panel panel-primary">
                              <div class="panel-heading"> Sets New Password & Avatar</div>
                              <div class="panel-body">
                                  <form class="form-horizontal" action="profile-edit.php" method="post" role="form">
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Current Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" onkeyup="repassword()" onchange="repassword()" name="c-pwd" class="form-control" id="c-pwd" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" onkeyup="repassword()" onchange="repassword()" name="n-pwd" class="form-control" id="n-pwd" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Re-type New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" name="rt-pwd" onkeyup="repassword()" onchange="repassword()" onkeyup="repassword" class="form-control" id="rt-pwd" placeholder=" ">
                                          </div>
                                      </div>
                                      <div id="warning"></div>

                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Change Avatar</label>
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
															<input type="file" name="newimg" class="default" />
														</span>
                            <br>
                            <span class="text-info">*Select an image with a size less than 1MB.</span>
													</div>
												</div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" id="submit" name="submit" class="btn btn-info">Save</button>
                                              <a href="profile.php" title=""><button type="button" class="btn btn-default">Cancel</button></a>
                                          </div>
                                      </div>
                                  </form>
                              </div>
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

  </body>
</html>

<script type="text/javascript">
    function repassword() 
    {
        var cpassword = document.getElementById("c-pwd").value;
        var password = document.getElementById("n-pwd").value;
        var checkpass = document.getElementById("rt-pwd").value;

        if (cpassword =="") 
        {
          document.getElementById("submit").disabled = true;
          document.getElementById("warning").className="text-warning";
          document.getElementById("warning").innerHTML = "*Current Password is empty.";
        }
        else if(password=="")
        {
            var x = 1;
            document.getElementById("submit").disabled = true;
            document.getElementById("warning").className="text-warning";
            document.getElementById("warning").innerHTML = "*Your new password is empty.";
        }
        else if(document.getElementById("rt-pwd").value=="")
        {
          document.getElementById("submit").disabled = true;
            document.getElementById("warning").className="text-danger";
            document.getElementById("warning").innerHTML = "";
        }
        else if(checkpass!=password)
        {
            document.getElementById("submit").disabled = true;
            document.getElementById("warning").className="text-danger";
            document.getElementById("warning").innerHTML = "*It doesn't match your new password.";
        }
        else
        {
            document.getElementById("submit").disabled = false;
            document.getElementById("warning").className="text-success";
            document.getElementById("warning").innerHTML = "*Success, it matches your new password.";
        }

    }
</script>