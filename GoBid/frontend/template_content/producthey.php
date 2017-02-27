<?php 
  session_start();
  $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];

  if (!isset($_SESSION['Login'])) {
     header("Location: login.php");
   } 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Online Auction">
    <meta name="author" content="Adill & Antonio">
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
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo" >Go<span>Bid</span></a>
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
                          <a href="#">See all messages</a>
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
                          <li><a href="product.html"><i class="icon-archive"></i> My Products</a></li>
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
          <div id="sidebar"  class="nav-collapse">
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
              <!-- page start-->
			  <section class="panel">

                          <div class="panel-body">
                              
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
										 
											<i class="fa fa-user"></i>EUGEN  <!-- kahit di mo na isama to <3 -->
											<div class="pull-right">
											<i class="fa fa-clock-o"></i>12:41 PM  &nbsp; &nbsp;<!-- kahit di mo na isama to <3 -->
											
											<i class="fa fa-calendar-o"></i>31 DEC 2014 <!-- kahit di mo na isama to <3 -->
											</div>
												
                                              <form class="form-horizontal" role="form">
                                                  <div class="form-group ">
                                                      <label class="col-lg-3 col-sm-2 control-label">Item Name</label>
                                                      <div class="col-lg-9">
                                                          <input type="text" class="form-control" placeholder="Item Name">
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
															   <input type="file" class="default" />
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
																	  Secondary Image (Optional)
																  </a>
															  </h4>
														  </div>
														  <div id="collapseOne" class="panel-collapse collapse">
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
																			<input type="file" class="default" />
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
																			<input type="file" class="default" />
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
																			<input type="file" class="default" />
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
																			<input type="file" class="default" />
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
															    <select class="form-control" id="sel1">
																    <option>Shoes and Footwear</option>
																    <option>Clothes</option>
																    <option>Luggages, Bags, and Wallets</option>
																    <option>Jewelry and Watches</option>
																    <option>Accessories and Sunglasses</option>
																    <option>Others</option>
															    </select>
															</p>
														</div>
													</div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Condition (Select one)</label>
														<div class="col-lg-9">
															<p>
															    <select class="form-control" id="sel1">
																    <option>Brand New</option>
																    <option>Secondhand</option>
																    <option>Others</option>
															    </select>
															</p>
														</div>
													</div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Location (Select one)</label>
														<div class="col-lg-9">
															<p>
															    <select class="form-control" id="sel1">
																    <option>Marikina</option>
																    <option>Quezon</option>
																    <option>Manila</option>
																    <option>Basta Lugar</option>
															    </select>
															</p>
														</div>
													</div>
													<div class="form-group">
												    <label class="col-lg-3 col-sm-2 control-label">Bid Expiration (Select one)</label>
														<div class="col-lg-9">
															<select class="form-control" id="sel1">
																    <option>3 days from now</option>
																    <option>5 days from now</option>
																    <option>7 days from now</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Auction Price</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
															  <span class="input-group-addon">$</span>
															  <input type="text" class="form-control">
														  </div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Selling Price (Optional)</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
															  <span class="input-group-addon">$</span>
															  <input type="text" class="form-control">
														  </div>
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-3 col-sm-2 control-label">Description (Optional)</label>
														<div class="col-lg-9">
															<div class="input-group m-bot15">
																<textarea name="" id="" class="form-control" cols="60" rows="5"></textarea>

														  </div>
														</div>
													</div>
													<button type="clear" class="btn btn-info">Clear</button> &nbsp;&nbsp;
													<button type="submit" class="btn btn-success">Submit</button> &nbsp;&nbsp;
													<button type="cancel" class="btn btn-danger" data-dismiss="modal" >Cancel</button>
                                              </form>

                                          </div>

                                      </div>
                                  </div>
                              </div>
                 
                          </div>
                      </section>
			  
              <section class="panel">
                  <header class="panel-heading">
                      DataTables hidden row details example
                  </header>
                  <div class="panel-body">
                        <div class="adv-table">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                <thead>
                                <tr>
                                    <th class="hide">Date Posted</th>
                                    <th>Item ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th class="hide">Sex</th>
                                    <th class="hide">Starting Price</th>
                                    <th>Condition</th>
                                    <th class="hide">Participants No.</th>
                                    <th>Sold</th>
                                    <th>Status</th>
                                    <th class="hide">Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 

                                    include 'connect.php';

                                    $acctid = $_SESSION['acctinfo'];
                                    $sql="SELECT * FROM product WHERE account_id = '$acctid';";
                                    $rs = mysql_query($sql);

                                    while ($row = mysql_fetch_array($rs))
                                    {
                                      echo "
                                      <tr class='gradeX'>
                                        <td class='hide'>".$row['datetime_posted']."</td>
                                        <td class='center'>".$row['product_id']."</td>
                                        <td>".$row['product_name']."</td>
                                        <td>".$row['category']."</td>
                                        <td class='hide'>".$row['sex']."</td>
                                        <td class='hide'>".$row['starting_price']."</td>
                                        <td>".$row['product_condition']."</td>
                                        <td class='hide'>".$row['participants_no']."</td>
                                        <td class='center'>".$row['sold']."</td>
                                        <td>".$row['product_status']."</td>
                                        <td class='hide'>".$row['product_description']."</td>
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
          sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[4]+'</td></tr>';
          sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
          sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
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
