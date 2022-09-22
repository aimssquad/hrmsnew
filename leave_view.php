<?php

include 'include/connection.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

                               	<form action="leave_view.php" method="post" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
										
                                 

										 <div class="control-group">
											<label class="control-label" for="basicinput">From Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input"  type="date" name="startdate" placeholder="" data-original-title="" class="span6 ">
											</div>
										</div>

										 <div class="control-group">
											<label class="control-label" for="basicinput">To Date</label>
											<div class="controls">
												<input data-title="A tooltip for the input" type="date" name="enddate" placeholder="" data-original-title="" class="span6 ">
											</div>
										</div>
										

										<div class="control-group">
											<div class="controls">
												<button type="submit" class="btn" name="submit" id="submit">Search</button>
											</div>
										</div>
									</form>

									<br>

									
									

									<br>


									<!-- Start View part -->

									<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Approved Leave View</a></li>
                                 
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            


                            	<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>EmpID</th>
									  <th>EmpName</th>
									  <th>Date</th>
									  <th>Todate</th>
									  <th>No Of Leaves</th>
									  <th>Remarks</th>
									  <th>Status</th>
									  
	
									</tr>
								  </thead>
								  <tbody>
<?php

                                      $date=date('Y-m-d');
                                     $sql="SELECT * FROM `leavea` WHERE (`date`='$date' OR `todate`='$date') and `status`=1" ;

                                      //$sql="SELECT * FROM `leavea` WHERE `status`=1" ;
                                     $res=mysqli_query($conn,$sql);
                                 
                                    

                                       if (isset($_POST['submit']))
                                        {
                                            	$checkdate = $_POST['startdate'];
                                            	$todate  = $_POST['enddate'];
                                            	$sql = "SELECT * from leavea where ((date Between '$checkdate' and '$todate') or (`todate` Between '$checkdate' and '$todate')) and (`status`=1) order by date ";


                                            	$res=mysqli_query($conn,$sql);


                                            	  //print_r ($res);

                                                                          

                                         }

                                     
                                  
                                      //echo <pre>;

                                     echo 'Number of Leaves:'.	$number_of_row=mysqli_num_rows($res);

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                   
                                       <td> <?php  echo $row['emp_id'];  ?> </td>
                                       <td> <?php  echo $row['emp_name'];  ?> </td>
                                       <td> <?php  echo $row['date'];  ?></td>
                                       <td> <?php  echo $row['todate'];  ?></td>
                                       <td> <?php  echo $row['no_of_days'];  ?></td>
                                       <td> <?php  echo $row['remarks'];  ?></td>

                                           <?php 


                                       if ($row['status']==0) {
                                 	    echo "<td>" . "Pending". "</td>";
                                        }elseif ($row['status']==1) {
                                     	echo "<td>" . "Approved". "</td>";
                                       }else{
                                    	echo "<td>" . "Rejectd". "</td>";
                                      }


                                      ?>
                                       
                                       
                                    </tr>

                                 <?php   }  ?>
								  </tbody>
								</table>

                                </div>


                                <!-- End Table View  -->

                                
							</div>
						</div>

			

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>

						
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" type="text/javascript"></script>
  

    <script>

  $(document).ready(function() {
  $("#formButton").click(function() {
    $("#form1").toggle();
  });
});
</script>
