<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Inbox</title>

    <!-- Bootstrap core CSS -->
    <link href="css2/bootstrap.min.css" rel="stylesheet">
    <link href="css2/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets2/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets2/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" >
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
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips" style="margin-right:-15px; margin-left:10px;"></div>
          </div>
          <!--logo start-->
			<a href="index.php" class="logo" ><a class="navbar-brand" href="index.php"><img src="img/bidnowlogo.png" width="100px" height="30px"></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
              
              <!-- inbox dropdown start-->
              <li id="header_inbox_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                      <i class="icon-envelope-alt"></i>
                      <span class="badge bg-important">5</span>
                  </a>
                  <ul class="dropdown-menu extended inbox">
                      <div class="notify-arrow notify-arrow-red"></div>
                      <li>
                          <p class="red">You have 5 new messages</p>
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
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="./img2/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jhon Doe</span>
                                    <span class="time">10 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, Jhon Doe Bhai how are you ?
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="./img2/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jason Stathum</span>
                                    <span class="time">3 hrs</span>
                                    </span>
                                    <span class="message">
                                        This is awesome dashboard.
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="photo"><img alt="avatar" src="./img2/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Jondi Rose</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is metrolab
                                    </span>
                          </a>
                      </li>
                      <li>
                          <a href="inbox.php">See all messages</a>
                      </li>
                  </ul>
              </li>
              <!-- inbox dropdown end -->
              <!-- notification dropdown start-->
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                      <i class="icon-bell-alt"></i>
                      <span class="badge bg-warning">7</span>
                  </a>
                  <ul class="dropdown-menu extended notification">
                      <div class="notify-arrow notify-arrow-yellow"></div>
                      <li>
                          <p class="yellow">You have 7 new notifications</p>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-danger"><i class="icon-bolt"></i></span>
                              Server #3 overloaded.
                              <span class="small italic">34 mins</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-warning"><i class="icon-bell"></i></span>
                              Server #10 not respoding.
                              <span class="small italic">1 Hours</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-danger"><i class="icon-bolt"></i></span>
                              Database overloaded 24%.
                              <span class="small italic">4 hrs</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-success"><i class="icon-plus"></i></span>
                              New user registered.
                              <span class="small italic">Just now</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <span class="label label-info"><i class="icon-bullhorn"></i></span>
                              Application error.
                              <span class="small italic">10 mins</span>
                          </a>
                      </li>
                      <li>
                          <a href="#">See all notifications</a>
                      </li>
                  </ul>
              </li>
              <!-- notification dropdown end -->
          </ul>
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <img alt="" src="img/team/maryimg.jpg" style ="width: 29px; height: 29px;">
                          <span class="username">Maryrose</span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="profile.php"><i class=" icon-suitcase"></i>Profile</a></li>
                          <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                          <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                          <li><a href="product.php"><i class="icon-archive"></i> My Products</a></li>
                          <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>

          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class=" nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a href="Auction.php">
                          <i class="icon-dashboard"></i>
                          <span>Auction Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="active">
                          <i class="icon-shopping-cart"></i>
                          <span>Current Bid</span>
						  <span class="badge bg-success">3</span>
						  <span class="icon-angle-down pull-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="">Leopard Shirt Dress 1st</a></li>
                          <li><a  href="">Leopard Shirt Dress </a></li>
                          <li><a  href="product_details.php">Leopard Shirt Dress 6x</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="icon-heart"></i>
                          <span>Bid History</span>
						  <span class="badge bg-success">3</span>
						  <span class="icon-angle-down pull-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a  href="">Leopard Shirt Dress 1</a></li>
                          <li><a  href="">Leopard Shirt Dress 2x</a></li>
                          <li><a  href="product_details.php">Leopard Shirt Dress 6x</a></li>
                      </ul>
                  </li>

					
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--mail inbox start-->
              <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a href="javascript:;" class="inbox-avatar">
                              <img src="img/team/maryimg.jpg" alt="" style="width:60px; height:60px;">
                          </a>
                          <div class="user-name">
                              <h5><a href="profile.php">Maryrose Adille</a></h5>
                              
                          </div>
                          
                      </div>
                      <div class="inbox-body">
                          <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                              Compose
                          </a>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Compose</h4>
                                      </div>
                                      <div class="modal-body">
                                          <form class="form-horizontal" role="form">
                                              <div class="form-group">
                                                  <label  class="col-lg-2 control-label">To</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control" id="inputEmail1" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" class="form-control" id="inputPassword1" placeholder="">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Message</label>
                                                  <div class="col-lg-10">
                                                      <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <button type="submit" class="btn btn-send">Send</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="#"><i class="icon-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>

                          </li>
                          <li>
                              <a href="#"><i class="icon-envelope-alt"></i> Sent Mail</a>
                          </li>
                          <li>
                              <a href="#"><i class=" icon-trash"></i> Trash</a>
                          </li>
                      </ul>

                     

                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          <h3>Inbox</h3>
                          <form class="pull-right position" action="#">
                              <div class="input-append">
                                  <input type="text"  placeholder="Search Mail" class="sr-input">
                                  <button type="button" class="btn sr-btn"><i class="icon-search"></i></button>
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
                         <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                                 <div class="btn-group" >
                                     <a class="btn mini all" href="#" data-toggle="dropdown">
                                         All
                                         <i class="icon-angle-down "></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                         <li><a href="#"> None</a></li>
                                         <li><a href="#"> Read</a></li>
                                         <li><a href="#"> Unread</a></li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="btn-group">
                                 <a class="btn mini tooltips" href="#" data-toggle="dropdown" data-placement="top" data-original-title="Refresh">
                                     <i class=" icon-refresh"></i>
                                 </a>
                             </div>
                            

                             <ul class="unstyled inbox-pagination">
                                 <li><span>1-50 of 234</span></li>
                                 <li>
                                     <a href="#" class="np-btn"><i class="icon-angle-left  pagination-left"></i></a>
                                 </li>
                                 <li>
                                     <a href="#" class="np-btn"><i class="icon-angle-right pagination-right"></i></a>
                                 </li>
                             </ul>
                         </div>
                          <table class="table table-inbox table-hover">
                            <tbody>
                              <tr class="unread">
                                  <td class="inbox-small-cells">
                                      <a href="inbox_details.php"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td><!--di ko inalis to kasi masisira ung bilang ng table nakaset na kasi sya gagalawin ko dapat lahat pag may time ayusin ko-->
                                  <td class="view-message  dont-show"><a href="inbox_details.php">Vector Labs</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor</td>
                                  <td class="view-message  inbox-small-cells"></td> <!--di ko inalis to kasi masisira ung bilang ng table nakaset na kasi sya gagalawin ko dapat lahat pag may time ayusin ko-->
                                  <td class="view-message  text-right">9:27 AM</td>
                              </tr>
                              
                              <tr class="unread">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Mosaddek Hossain</a></td>
                                  <td class="view-message inboxmsg">Hi Bro, How are you?</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 15</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Dulal khan</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor sit amet</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">June 15</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Facebook</a></td>
                                  <td class="view-message inboxmsg">Dolor sit amet, consectetuer adipiscing</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">April 01</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Mosaddek</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor sit amet</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">May 23</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Facebook</a></td>
                                  <td class="view-message inboxmsg">Dolor sit amet, consectetuer adipiscing</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 14</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Rafiq</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor sit amet</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">January 19</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Facebook</a></td>
                                  <td class="view-message inboxmsg">Dolor sit amet, consectetuer adipiscing</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 04</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Mosaddek</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor sit amet</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">June 13</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Facebook</a></td>
                                  <td class="view-message inboxmsg">Dolor sit amet, consectetuer adipiscing</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 24</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show"><a href="inbox_details.php">Mosaddek</a></td>
                                  <td class="view-message inboxmsg">Lorem ipsum dolor sit amet</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">March 09</td>
                              </tr>
                              <tr class="">
                                  <td class="inbox-small-cells">
                                      <a href="#"><i class="icon-trash"></i></a>
                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="dont-show"><a href="inbox_details.php">Facebook</a></td>
                                  <td class="view-message inboxmsg">Dolor sit amet, consectetuer adipiscing</td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right">May 14</td>
                              </tr>
                          </tbody>
                          </table>
                      </div>
                  </aside>
              </div>
              <!--mail inbox end-->
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
	  <br><br>
	 
      <footer class="site-footer navbar-fixed-bottom">
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

  <!-- BEGIN:File Upload Plugin JS files-->
  <script src="assets2/jquery-file-upload/js/vendor/jquery.ui.widget.js"></script>
  <!-- The Templates plugin is included to render the upload/download listings -->
  <script src="assets2/jquery-file-upload/js/vendor/tmpl.min.js"></script>
  <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
  <script src="assets2/jquery-file-upload/js/vendor/load-image.min.js"></script>
  <!-- The Canvas to Blob plugin is included for image resizing functionality -->
  <script src="assets2/jquery-file-upload/js/vendor/canvas-to-blob.min.js"></script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
  <script src="assets2/jquery-file-upload/js/jquery.iframe-transport.js"></script>
  <!-- The basic File Upload plugin -->
  <script src="assets2/jquery-file-upload/js/jquery.fileupload.js"></script>
  <!-- The File Upload file processing plugin -->
  <script src="assets2/jquery-file-upload/js/jquery.fileupload-fp.js"></script>
  <!-- The File Upload user interface plugin -->
  <script src="assets2/jquery-file-upload/js/jquery.fileupload-ui.js"></script>


    <!--common script for all pages-->
    <script src="js2/common-scripts.js"></script>


  </body>
</html>
