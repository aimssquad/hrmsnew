<?php

include 'include/connection.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

									
									

									<br>


									<!-- Start View part -->

									<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Attendance View</a></li>
                                 
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
									  <th>Login</th>
									  <th>Logout</th>
									  
	
									</tr>
								  </thead>
								  <tbody>
<?php

                                      $date=date('Y-m-d');
                                     $sql="SELECT * from present where date='$date'" ;
                                     $res=mysqli_query($conn,$sql);

                                     
                                  

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                   
                                       <td> <?php  echo $row['emp_id'];  ?> </td>
                                       <td> <?php  echo $row['emp_name'];  ?> </td>
                                       <td> <?php  echo $row['date'];  ?></td>
                                       <td> <?php  echo $row['login'];  ?></td>
                                       <td> <?php  echo $row['logout'];  ?></td>
                                       
                                       
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
