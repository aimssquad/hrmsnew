<?php

include 'include/connection.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">


                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                            <form action="" method="post" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
										
                                 

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
                                               <button type="submit" class="btn" name="search" id="submit">Search</button>
                                           </div>
                                       </div>
                                       <div class="btn-group pull-right" data-toggle="buttons-radio">
                              <button  class="export-btn btn btn-primary">
                                        Export</button>
                                    
                                </div>
                                   </form>
                                
                            </div>


                            	<table class="table table-striped table-bordered table-condensed" id="table_row">
								  <thead>
									<tr>
									
									  <th>EMPID</th>
				      <th>EMPNAME</th>
                                                                          <th>PROCESS</th>
									  <th>DATE</th>
									  <th>CALL START</th>
									  <th>CALL END</th>
									  <th>CALL DURATION</th>
                                      <th>DISPOSITION</th>
                                      <th>REMARKS</th>
									  
									</tr>
								  </thead>
								  <tbody>
									<?php
                                    if($role!=2){
										$sql="SELECT nonactivity.*,emp.emp,emp.process FROM `nonactivity`,`emp` WHERE nonactivity.lead=emp.emp_id order by id DESC LIMIT 30" ;
										$res=mysqli_query($conn,$sql);
   
									   
										 if (isset($_POST['search']))
										   {
												   $checkdate = $_POST['startdate'];
												   $todate  = $_POST['enddate'];
                                                   $sql="SELECT nonactivity.*,emp.emp,emp.process FROM `nonactivity`,`emp` WHERE nonactivity.`date` BETWEEN '$checkdate' and '$todate' and nonactivity.lead=emp.emp_id order by id DESC " ;
                                                   $res=mysqli_query($conn,$sql);
											}
									
   

									}else{
										$sql="SELECT nonactivity.*,emp.emp,emp.process FROM `nonactivity`,`emp` WHERE nonactivity.lead=emp.emp_id order by id DESC LIMIT 30" ;
										$res=mysqli_query($conn,$sql);
   
									   
										 if (isset($_POST['submit']))
										   {
												   $checkdate = $_POST['startdate'];
												   $todate  = $_POST['enddate'];
												   $sql = "SELECT present.*,emp.tl from present,emp where present.emp_id=emp.emp_id and emp.tl='$username' and present.date BETWEEN '$checkdate' and '$todate' order by date desc limit 100 ";
												   $res=mysqli_query($conn,$sql);
											}
										  else if(isset($_POST['search']))
											   {
												   $filter=$_POST['filter'];
   
												   if ($filter == '')
													   {
														$sql="SELECT present.*,emp.tl from present,emp where present.emp_id=emp.emp_id and emp.tl='$username' order by date desc limit 100" ;
														   $res=mysqli_query($conn,$sql);
   
												   }
												   elseif ($filter != '') 
												   {
													   $sql="SELECT * from present where emp_id='$filter' order by date asc" ;
														   $res=mysqli_query($conn,$sql);
												   }
											   }
   
									}

                                  

                                  	
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                      
                                       <td> <?php  echo $row['lead'];  ?> </td>
				       <td> <?php  echo $row['emp'];  ?></td>
                                       <td> <?php  echo $row['process']; ?> </td>
                                       <td> <?php  echo $row['date'];  ?></td>
                                       <td> <?php  echo $row['time'];  ?></td>
                                       <td> <?php  echo $row['callend'];  ?></td>
                                       <td> <?php  echo $row['cduration'];  ?></td>
                                       <td> <?php  echo $row['disposition'];  ?></td>
                                       <td> <?php  echo $row['remarks'];  ?></td>
        
                                     
                                    
                                       
                                          
                                     
                                    </tr>


                                 <?php  }  ?>
								  </tbody>
								</table>

                                </div>


                                <!-- End Table View  -->


                                    <!-- End List View part -->
							</div>
						</div>

			</form>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>

						
	<script src="test.js" type="text/javascript"></script>
  

    <script>

  $(document).ready(function() {
  $("#search").click(function() {
    $("#form2").toggle();
  });
});
</script>


<script src="https://gitcdn.xyz/repo/FuriosoJack/TableHTMLExport/v1.0.0/src/tableHTMLExport.js"></script>

<script>
  $(document).ready(function(){
   $(".export-btn").click(function(){  
     $("#table_row").tableHTMLExport({
      type:'csv',
      filename:'excel.csv',
    });
  });
});
</script>
