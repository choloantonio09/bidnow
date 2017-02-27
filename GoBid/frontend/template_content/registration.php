<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="bidnow - Online Auctions for Clothing Stuffs. Put your items up for bidding, or place your own bids and win!">
    <meta name="author" content="Adille & Antonio">
    <meta name="keyword" content="Online, Auction, Bid, GoBid,">
    <link rel="shortcut icon" href="img/logoGobid.png">

    <title>Registration | GoBid</title>

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
    <link rel="stylesheet" type="text/css" href="assets2/bootstrap-fileupload/bootstrap-fileupload.css" />
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
                    <h1>Sign Up</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">SignUp</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
	
    <div class="container">
        <?php 

            include 'connect.php';

            if(isset($_POST['submit']))
            {
                $imgname = $_FILES["dp"]["name"];
                $image = addslashes(file_get_contents($_FILES['dp']['tmp_name']));
                $imgtype = $_FILES["dp"]["type"];

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $homeaddress = $_POST['homeaddress'];
                $email = $_POST['email'];
                $city = $_POST['city'];
                $gender = $_POST['gender'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $check = "SELECT * FROM account WHERE username = '$username';";
                $checkresult = mysql_query($check);

                $check2 = "SELECT * FROM account WHERE email = '$email';";
                $checkresult2 = mysql_query($check2);

                if (mysql_num_rows($checkresult)>0) 
                {
                    echo '<h3 class="text-danger"> *The username you entered is already taken. </h3>';
                }
                elseif (mysql_num_rows($checkresult2)>0)
                {
                    echo '<h3 class="text-danger"> *The email you entered is already taken. </h3>';
                }
                else
                {
                    if(substr($imgtype,0,5) == 'image')
                    {
                        if($_FILES['dp']['size'] > 1048576)
                        {
                            echo "<h2 class='text-danger'>You selected an image more than 1MB!</h2>";
                        }
                        else
                        {
                            $addtoacc = "INSERT INTO account (image,first_name,last_name,phone,home_address,email,city,gender,username,password,account_type,ratings,probation) VALUES ('$image','$firstname','$lastname','$phone','$homeaddress','$email','$city','$gender','$username','$password',0,0,0);";
                
                            if(mysql_query($addtoacc))
                            {
                                echo "<h2 class='text-success'>Account successfully added!</h2>";

                            }
                            else
                            {
                                echo "<h2 class='text-danger'>Account unsuccessfully added!</h2>";
                            }
                        }   
                        

                    }
                    else
                    {
                        echo "<h3 class='text-danger'> The file uploaded is not an Image!</h3>";
                    }
                }

            }
         ?>
      <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" align="center"> <!-- Lagyan mo ng label na successful ung pag register nya <3 -->
        <h2 class="form-signin-heading" >Sign Up now</h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>

                    <span class="btn btn-white btn-file">

                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                        <input type="file" accept="image/jpeg" name="dp" class="default" />

                    </span>
                    <br>
                    <span class="text-info">*Select an image with a size less than 1MB.</span>
                   <!--  <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a> -->
                </div>
            </div>
            <input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus>
            <input type="text" name="lastname" class="form-control" placeholder="Last Name" required autofocus>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required autofocus>
            <input type="text" name="homeaddress" class="form-control" placeholder="Home Address" required autofocus>
            <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
            <input type="text" name="city" class="form-control" placeholder="City/Town" required autofocus>
            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                    <input name="gender" id="radio-01" value="Male" type="radio" checked /> Male
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                    <input name="gender" id="radio-02" value="Female" type="radio" /> Female
                </label>
            </div>

            <p> Enter your account details below</p>
            <input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>
            <input type="password" name="password" id="password1" class="form-control" required placeholder="Password">
            <input type="password" id="password2" required onkeypress="repassword()" onkeyup="repassword()" class="form-control" placeholder="Re-type Password">
            <!-- <label class="checkbox">
                <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
            </label> -->
            <div id="warning"></div>
            <button name="submit" id="submit" class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

            <div class="registration">
                Already Registered?
                <a class="" href="login.php">
                    Login
                </a>
            </div>

        </div>

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

    <script type="text/javascript" src="assets2/bootstrap-fileupload/bootstrap-fileupload.js"></script>


  </body>
</html>
<script type="text/javascript">
    function repassword() 
    {
        var password = document.getElementById("password1").value;
        var checkpass = document.getElementById("password2").value;

        if(password==null)
        {
            var x = 1;
            document.getElementById("warning").innerHTML = null;
        }
        else if(checkpass!=password)
        {
            document.getElementById("submit").disabled = true;
            document.getElementById("warning").className="text-danger";
            document.getElementById("warning").innerHTML = "*It doesn't match your password.";
        }
        else
        {
            document.getElementById("submit").disabled = false;
            document.getElementById("warning").className="text-success";
            document.getElementById("warning").innerHTML = "*Success, it matches your password.";
        }

    }
</script>