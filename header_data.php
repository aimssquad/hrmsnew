<?php
   session_start();
   include 'include/connection.php';
  include 'conn.php'; 
   if ($_SESSION['items'] == true   ) {
   	echo " ";
     } else {
   	header('location:index.php');
     }
     
     
     
     $username = $_SESSION['items'][0];
     
     $role = $_SESSION['items'][1];
     
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ensomerge</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
      <script src="ckeditor/ckeditor.js"></script>
      <!-- <script src="ckfinder/ckfinder.js"></script> -->
   </head>
   <body>
      <div class="navbar navbar-fixed-top">
         <div class="navbar-inner">
            <div class="container">
               <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
               <i class="icon-reorder shaded"></i>
               </a>
               <a class="brand" href="index.php">
               Ensomerge
               </a>
               <div class="nav-collapse collapse navbar-inverse-collapse">
                  <ul class="nav nav-icons">
                     <li class="active"><a href="#">
                        <i class="icon-envelope"></i>
                        </a>
                     </li>
                     <li><a href="#">
                        <i class="icon-eye-open"></i>
                        </a>
                     </li>
                     <li><a href="#">
                        <i class="icon-bar-chart"></i>
                        </a>
                     </li>
                  </ul>
                  <form class="navbar-search pull-left input-append" action="#">
                     <input type="text" class="span3">
                     <button class="btn" type="button">
                     <i class="icon-search"></i>
                     </button>
                  </form>
                  <ul class="nav pull-right">
                     <li><a href="#">
                        <?php echo $username; ?>
                        </a>
                     </li>
                     <li class="nav-user dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="images/user.png" class="nav-avatar" />
                        <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                           <li><a href="#">Your Profile</a></li>
                           <li><a href="#">Edit Profile</a></li>
                           <li class="divider"></li>
                           <li><a href="logout.php">Logout</a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <!-- /.nav-collapse -->
            </div>
         </div>
         <!-- /navbar-inner -->
      </div>
      <!-- /navbar -->
      <div class="wrapper">
      <div class="container">
      <div class="row">
      <div class="span3">
         <div class="sidebar">
             <?php if($role==1) {?>
            <ul class="widget widget-menu unstyled">
               <li class="active"><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Attandance"><i class="menu-icon icon-book">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Attandance</a>
                  <ul id="Attandance" class="collapse unstyled">
                     <li><a href="datewise.php"><i class="icon-inbox"></i>Attandance Info</a></li>
                     <li><a href="add_attendance.php"><i class="icon-inbox"></i>Add Attandance</a></li>
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Employee"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Employee</a>
                  <ul id="Employee" class="collapse unstyled">
                     <li><a href="credintial.php"><i class="menu-icon icon-bullhorn"></i>Create Employee</a></li>
                     <li><a href="employee.php"><i class="icon-inbox"></i>Employee List</a></li> 
                     <li><a href="#"><i class="icon-inbox"></i>Create HRMS/Access</a></li>    
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Leave"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Leave</a>
                  <ul id="Leave" class="collapse unstyled">
                     <li><a href="leave.php"><i class="menu-icon icon-bar-chart"></i>Leave Requests</a></li>
                     <li><a href="leave_balnce.php"><i class="menu-icon icon-bullhorn"></i>Leave Balance </a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#CMReport"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Call Monitoring</a>
                  <ul id="CMReport" class="collapse unstyled">
                     <li><a href="cmreport.php"><i class="menu-icon icon-bullhorn"></i>Call Report</a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Post"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Enso Post</a>
                  <ul id="Post" class="collapse unstyled">
                     <li><a href="create_post.php"><i class="menu-icon icon-bullhorn"></i>Create Post</a></li> 
                     <li><a href="post.php"><i class="menu-icon icon-bar-chart"></i>Show Post</a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Process"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Process</a>
                  <ul id="Process" class="collapse unstyled">
                     <li><a href="process.php"><i class="menu-icon icon-bullhorn"></i>Process Update</a></li> 
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Organization"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Organization</a>
                  <ul id="Organization" class="collapse unstyled">
                     <li><a href="info_org.php"><i class="menu-icon icon-bar-chart"></i>Organization Info</a></li> 
           
                  </ul>
               </li>
            </ul>
   
            <ul class="widget widget-menu unstyled">
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#organization"><i class="menu-icon icon-cog">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Company Policies </a>
                  <ul id="organization" class="collapse unstyled">
                     <li><a href="pdf/MobilePhoneRechargereimburceme.pdf" target="_blank"><i class="icon-inbox"></i>Mobile Phone Recharge Bill Reimbursement Policy </a></li>
                  </ul>
               </li>
	       <li><a href="<?php echo SITE_PATH ?>pdf/Holiday_list.pdf" target="_blank"><i class="icon-inbox"></i>Holidays </a></li>
	       <li><a href="<?php echo ROASTER_SITE_PATH ?>may23/may23.htm" target="_blank"><i class="menu-icon icon-bullhorn"></i>Monthly Roster</a></li>
               <li><a href="https://wfm.ensomerge.com/recruit/dashboard.php" target="_blank"><i class="icon-inbox"></i>Recruitment Panel</a></li>
               <li><a href="https://wfm.ensomerge.com/ensotest/adminpanel/admin/home.php" target="_blank"><i class="icon-inbox"></i>Online Test Portal </a></li>
               <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
            </ul>
             <?php }else{ ?>
               <ul class="widget widget-menu unstyled">
               <li class="active"><a href="dashboard2.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Attandance"><i class="menu-icon icon-book">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Attandance</a>
                  <ul id="Attandance" class="collapse unstyled">
                     <li><a href="datewise.php"><i class="icon-inbox"></i>Attandance Info</a></li>
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Employee"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Employee</a>
                  <ul id="Employee" class="collapse unstyled">
                     <li><a href="credintial.php"><i class="menu-icon icon-bullhorn"></i>Create Employee</a></li>
                     <li><a href="employee.php"><i class="icon-inbox"></i>Employee List</a></li> 
                     <li><a href="#"><i class="icon-inbox"></i>Create HRMS/Access</a></li>    
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Leave"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Leave</a>
                  <ul id="Leave" class="collapse unstyled">
                     <li><a href="leave2.php"><i class="menu-icon icon-bar-chart"></i>Leave Requests</a></li>
                     <li><a href="leave_balnce.php"><i class="menu-icon icon-bullhorn"></i>Leave Balance </a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#CMReport"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Call Monitoring</a>
                  <ul id="CMReport" class="collapse unstyled">
                     <li><a href="cmreport.php"><i class="menu-icon icon-bullhorn"></i>Call Report</a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Post"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Enso Post</a>
                  <ul id="Post" class="collapse unstyled">
                     <li><a href=" create_post.php"><i class="menu-icon icon-bullhorn"></i>Create Post</a></li> 
                     <li><a href="post.php"><i class="menu-icon icon-bar-chart"></i>Show Post</a></li>   
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Process"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Process</a>
                  <ul id="Process" class="collapse unstyled">
                     <li><a href="process.php"><i class="menu-icon icon-bullhorn"></i>Process Update</a></li> 
                  </ul>
               </li>
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#Organization"><i class="menu-icon icon-paste">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Organization</a>
                  <ul id="Organization" class="collapse unstyled">
                     <li><a href="info_org.php"><i class="menu-icon icon-bar-chart"></i>Organization Info</a></li>    
                  </ul>
               </li>
            </ul>
   
            <ul class="widget widget-menu unstyled">
               <li>
                  <a class="collapsed" data-toggle="collapse" href="#organization"><i class="menu-icon icon-cog">
                  </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                  </i>Company Policies </a>
                  <ul id="organization" class="collapse unstyled">
                     <li><a href="pdf/MobilePhoneRechargereimburceme.pdf" target="_blank"><i class="icon-inbox"></i>Mobile Phone Recharge Bill Reimbursement Policy </a></li>
                  </ul>
               </li>
	       <li><a href="<?php echo SITE_PATH ?>pdf/Holiday_list.pdf" target="_blank"><i class="icon-inbox"></i>Holidays </a></li>
	       <li><a href="<?php echo ROASTER_SITE_PATH ?>may23/may23.htm" target="_blank"><i class="menu-icon icon-bullhorn"></i>Monthly Roster</a></li>
               <li><a href="https://wfm.ensomerge.com/ensotest/adminpanel/admin/home.php" target="_blank"><i class="icon-inbox"></i>Online Test Portal </a></li>
               <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
            </ul>

            <?php } ?>
         </div>
         <!--/.sidebar-->
      </div>
      <!--/.span3-->
      <div class="span9">
      <div class="content">
