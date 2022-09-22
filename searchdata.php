<?php

include 'include/connection.php';

?>

<html>
	<head>
		<title>ERP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ERP</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<style>
			body
			{
					background-color: whitesmoke;
			}
			input
			{
				width: 40%;
				height: 5%;
				border: 1px;
				border-radius: 05px;
				padding: 8px 15px 8px 15px;
				margin: 10px 0px 15px 0px;
				box-shadow: 1px 1px 2px 1px grey;
			}
		</style>
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		MUKUTMONI
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav nav-icons">
						<li class="active"><a href="#">
							<i class="icon-envelope"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-eye-open"></i>
						</a></li>
						<li><a href="#">
							<i class="icon-bar-chart"></i>
						</a></li>
					</ul>

					<form class="navbar-search pull-left input-append" action="#">
						<input type="text" class="span3">
						<button class="btn" type="button">
							<i class="icon-search"></i>
						</button>
					</form>
				
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Item No. 1</a></li>
								
								<li><a href="#">Don't Click</a></li>
								<li class="divider"></li>
								<li class="nav-header">Example Header</li>
								<li><a href="#">A Separated link</a></li>
															</ul>
						</li>
						
						<li><a href="#">
							Support
						</a></li>
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li><a href="#">Account Settings</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					  <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                                </li>

                                 <li><a class="collapsed" data-toggle="collapse" href="#organization"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Organization </a>
                                    <ul id="organization" class="collapse unstyled">
                                        <li><a href="#"><i class="icon-inbox"></i>Company </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Location </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Department </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Designation </a></li>

                                        <li><a href="#"><i class="icon-inbox"></i>Expense </a></li>


                                    </ul>
                                </li>
                                <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b class="label green pull-right">
                                    11</b> </a></li>
                               
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                                 <li><a class="collapsed" data-toggle="collapse" href="#Attandance"><i class="menu-icon icon-book">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Time Sheet </a>
                                    <ul id="Attandance" class="collapse unstyled">
                                        <li><a href="attend.php"><i class="icon-inbox"></i>Attandance </a></li>
                                        <li><a href="datewise.php"><i class="icon-inbox">Date wise Attandance</i></a></li>
                                        <li><a href="searchdata.php"><i class="icon-inbox"></i>Update Attandance </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Import Attandance </a></li>
                                        <li><a href="leave.php"><i class="icon-inbox"></i>Leave </a></li>
                                        <li><a href="holiday.php"><i class="icon-inbox"></i>Holidays </a></li>


                                    </ul>
                                </li>
                                 <li><a class="collapsed" data-toggle="collapse" href="#Employee"><i class="menu-icon icon-paste">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Employee </a>
                                    <ul id="Employee" class="collapse unstyled">
                                        <li><a href="#"><i class="icon-inbox"></i>Employees </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Awards </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Resignation </a></li>
                                       


                                    </ul>
                                </li>
                                 <li><a class="collapsed" data-toggle="collapse" href="#Requirement"><i class="menu-icon icon-table">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Requirement </a>
                                    <ul id="Requirement" class="collapse unstyled">
                                        <li><a href="#"><i class="icon-inbox"></i>Requirement </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Requirement List </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>Selected List </a></li>
                                        <li><a href="#"><i class="icon-inbox"></i>New Registration </a></li>

                                       


                                    </ul>
                                </li>
                                 <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
                                    19</b> </a></li>
                               
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#Payroll"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Payroll </a>
                                    <ul id="Payroll" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Payroll Templates</a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Generate Payslips </a></li>
                                       
                                    </ul>
                                </li>

                                 <li><a class="collapsed" data-toggle="collapse" href="#Productivity"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Productivity </a>
                                    <ul id="Productivity" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Dashboard</a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>B2B</a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>B2C</a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i></a></li>
                                       
                                    </ul>
                                </li>

                                      <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Ticketing </a></li>
                               
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div><!--/.sidebar-->
				</div><!--/.span3-->

			<div class="span9">
				<div class="content">
					<div class="module">
							<div class="module-body">
							<form action="" method="GET" class="form-horizontal row-fluid" id="form1"  enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label" for="basicinput">Employee ID</label>
									<div class="controls">
										<input data-title="A tooltip for the input" type="text" placeholder="Enter ID to be searched.." data-original-title="" name="emp_id" class="span8 ">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn" name="search">Submit Form</button>
									</div>
								</div>
								
							</form>
							<?php
								$query = "SELECT * FROM emp";
								$query_run = mysqli_query($conn,$query);
								if(isset($_GET['search']))
								{
									$id=$_GET['emp_id'];
									$query = "SELECT * FROM emp where emp_id='$id'";
									$query_run = mysqli_query($conn,$query);
					
								while($row=mysqli_fetch_array($query_run))
								{
								?>
							<form action="update.php" method="POST" class="form-horizontal row-fluid" id="form1"  enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label" for="basicinput">Employee ID</label>
									<div class="controls">
										<input data-title="A tooltip for the input" type="text" placeholder="Enter ID to be searched.." data-original-title="" name="emp_id" class="span8 " value="<?php echo $row['emp_id'] ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Employee Name</label>
									<div class="controls">
										<input data-title="A tooltip for the input" type="text" placeholder="Eamployee Name" data-original-title="" name="emp_name" class="span8 " value="<?php echo $row['emp'] ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Date</label>
										<div class="controls">
											<input data-title="A tooltip for the input"  type="date" name="date" placeholder="" data-original-title="" class="span6 ">
										</div>
									</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Login</label>
									<div class="controls">
										<input data-title="A tooltip for the input" type="Time" placeholder="" data-original-title="" name="login" class="span8">
									</div>
								</div>
							<div class="control-group">
									<label class="control-label" for="basicinput">Logout</label>
									<div class="controls">
										<input data-title="A tooltip for the input" type="Time" placeholder="" data-original-title="" name="logout" class="span8 ">
									</div>
								</div>
								<div class="control-group">
											<label class="control-label" for="basicinput">Attendance</label>
											<div class="controls">
												<select tabindex="1" data-placeholder="Select here.." class="span8" name="type">
													<option value="">Select here..</option>
													<option value="present">Present</option>
													<option value="leave">Leave</option>
												</select>
											</div>
										</div>
							<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn" name="update">Update Form</button>
									</div>
								</div>	
							
							</form> 
						<?php
					}
				}
				
			?>
			
		</center>
		

	</body>
</html>
