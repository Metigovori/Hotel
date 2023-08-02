﻿<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-desktop"></i> News Letters</a>
                    </li>
					<li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
                    <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                   


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
                    $user = new RoomBook(); // Assuming you have a RoomBook class for handling database interactions

                    $c = 0;
                    foreach ($user->find_all() as $row) {
                        $new = $row->getStat();
                        $cin = $row->getCin();
                        $id = $row->getId();

                        if ($new == "Not Conform") {
                            $c = $c + 1;
                        }
                    }
                ?>


                

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<button class="btn btn-default" type="button">
												 New Room Bookings  <span class="badge"><?php echo $c ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
											<th>Room</th>
											<th>Bedding</th>
											<th>Meal</th>
											<th>Check In</th>
											<th>Check Out</th>
											<th>Status</th>
											<th>More</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
                                        $user = new RoomBook(); // Assuming you have a RoomBook class for handling database interactions

                                        foreach ($user->find_all() as $trow) {
                                            $co = $trow->getStat();
                                            
                                            if ($co == "Not Conform") {
                                                echo "<tr>";
                                                echo "<td>" . $trow->getId() . "</td>";
                                                echo "<td>" . $trow->getFName() . " " . $trow->getLName() . "</td>";
                                                echo "<td>" . $trow->getEmail() . "</td>";
                                                echo "<td>" . $trow->getCountry() . "</td>";
                                                echo "<td>" . $trow->getTRoom() . "</td>";
                                                echo "<td>" . $trow->getBed() . "</td>";
                                                echo "<td>" . $trow->getMeal() . "</td>";
                                                echo "<td>" . $trow->getCin() . "</td>";
                                                echo "<td>" . $trow->getCout() . "</td>";
                                                echo "<td>" . $trow->getStat() . "</td>";
                                                echo "<td><a href='roombook.php?rid=" . $trow->getId() . "' class='btn btn-primary'>Action</a></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>

                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  --> 
                                        </div>
                                    </div>
                                </div>
								<?php
                                $user = new RoomBook(); // Assuming you have a RoomBook class for handling database interactions

                                $r = 0;
                                foreach ($user->find_all() as $u) {
                                    $br = $u->getStat();
                                    if ($br == "Conform") {
                                        $r = $r + 1;
                                    }
                                }
                            ?>

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Booked Rooms  <span class="badge"><?php echo $r ; ?></span>
											</button>
											
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
										<?php
										$user = new RoomBook(); // Assuming you have a RoomBook class for handling database interactions

                                        foreach ($user->find_all() as $u) {
                                            $br = $u->getStat();
                                            if ($br == "Conform") {
                                                $fid = $u->getId();
                                    
                                                echo "<div class='col-md-3 col-sm-12 col-xs-12'>
                                                        <div class='panel panel-primary text-center no-boder bg-color-blue'>
                                                            <div class='panel-body'>
                                                                <i class='fa fa-users fa-5x'></i>
                                                                <h3>" . $u->getFName() . "</h3>
                                                            </div>
                                                            <div class='panel-footer back-footer-blue'>
                                                                <a href='show.php?sid=" . $fid . "'><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                                                                    Show
                                                                </button></a>
                                                                " . $u->getTRoom() . "
                                                            </div>
                                                        </div>
                                                    </div>";
                                            }
                                        }
										?>
                                           
										</div>
										
                                    </div>
									
                                </div>
                                <?php
                                $user = new Contact(); // Assuming you have a Contact class for handling database interactions

                                $f = 0;
                                foreach ($user->find_all() as $u) {
                                    $f = $f + 1;
                                }
                            ?>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
											<button class="btn btn-primary" type="button">
												 Followers  <span class="badge"><?php echo $f ; ?></span>
											</button>
											</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
											<th>Follow Start</th>
                                            <th>Permission status</th>
                                            
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php
                                        $user = new Contact(); // Assuming you have a Contact class for handling database interactions

                                        foreach ($user->find_all() as $u) {
                                            echo "<tr>";
                                            echo "<th>" . $u->getId() . "</th>";
                                            echo "<th>" . $u->getFullname() . "</th>";
                                            echo "<th>" . $u->getEmail() . "</th>";
                                            echo "<th>" . $u->getCdate() . "</th>";
                                            echo "<th>" . $u->getApproval() . "</th>";
                                            echo "</tr>";
                                        }
                                    ?>

                                        
                                    </tbody>
                                </table>
								<a href="messages.php" class="btn btn-primary">More Action</a>
                            </div>
                        </div>
                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
				<!-- DEOMO-->
				<div class='panel-body'>
                            <button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
                              Update 
                            </button>
                            <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Change the User name and Password</h4>
                                        </div>
										<form method='post>
                                        <div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change User name</label>
                                            <input name='usname' value='<?php echo $fname; ?>' class='form-control' placeholder='Enter User name'>
											</div>
										</div>
										<div class='modal-body'>
                                            <div class='form-group'>
                                            <label>Change Password</label>
                                            <input name='pasd' value='<?php echo $ps; ?>' class='form-control' placeholder='Enter Password'>
											</div>
                                        </div>
										
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
											
                                           <input type='submit' name='up' value='Update' class='btn btn-primary'>
										  </form>
										   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				
				<!--DEMO END-->
				
										
                    

                <!-- /. ROW  -->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>