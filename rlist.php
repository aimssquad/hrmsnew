<?php

include 'include/connection.php';
include 'include/tconnection.php';
include 'header_data.php';

?>



						<div class="">
							
							<div class="">

									

									
                               <!-- add employee from -->

	

									<br>


				
									<!-- End Form -->


									<!-- Start View part -->




                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                                <form action="" method="post" id="form2">
                                <div class="input-append pull-left">
                                    <select name="filter" class="span3">
                                      <option value="">Select Selection Status</option>
                                      <option>Selected</option>
                                      <option>Not Selected</option>
                                      <option>Pending</option>
                                      
                                    </select>
                                    <button type="submit" class="btn" name="search">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                              <button  class="export-btn btn btn-primary">
                                        Export</button>
                                    
                                </div>
                            </div>
                                </form>
                                
                            </div>


                            	<table class="table table-striped table-bordered table-condensed" id="table_row">
								  <thead>
									<tr>
									 	<th>Name</th>
									  <th>Birth Date</th>
                    <th>Gender</th>
									  <th>Number</th>
									  <th>Email</th>
                    <th>Education</th>
									  <th>Work_Exp</th>
                    <th>Recommended By</th>
                    <th>Recently_Worked</th>
                    <th>Test Paper</th>
                    <th>Test Result</th>
									  <th>Selection Status</th>
                    <th>Remarks</th>
                    <th>Rejection Remarks</th>

									</tr>
								  </thead>
								  <tbody>
									<?php
                                     $sql="SELECT * from recruit_detail order by id desc" ;
                                     $res=mysqli_query($recruit,$sql);

              
                                  if(isset($_POST['search']))
               							 {
                   							 $filter=$_POST['filter'];

                    							if ($filter == '')
                   								 {
                        							$sql="SELECT * from recruit_detail order by id desc" ;
                       								 $res=mysqli_query($recruit,$sql);

                    							}
                    							elseif ($filter != '') 
                    							{
                    								$sql="SELECT * from recruit_detail where selection_status='$filter' order by id desc" ;
                       								 $res=mysqli_query($recruit,$sql);
                    							}
               							 }
                                  	
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                       <td> <?php  echo $row['first'].' '.$row['last'];  ?> </td>
                                       <td> <?php  echo $row['birthdate'];  ?> </td>
                                       <td> <?php  echo $row['gender'];  ?></td>
                                       <td> <?php  echo $row['ph_no'];  ?></td>
                                       <td> <?php  echo $row['email'];  ?></td>
                                       <td> <?php  echo $row['edq1'];  ?></td>
                                       <td> <?php  echo $row['work_exp']; ?></td>
                                       <td> <?php  echo $row['recommended_by'];  ?></td>
                                       <td> <?php  echo $row['recently_worked'];  ?></td>
                                       <td> <?php  echo $row['testpaper_no'];  ?></td>
                                       <td> <?php  echo $row['testresult'];  ?></td>
                                       <td> <?php  echo $row['selection_status'];  ?></td>
                                       <td> <?php  echo $row['remark'];  ?></td>
                                       <td> <?php  echo $row['rejection_reason'];  ?></td>
                                    
                                       
                                          
                                     
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

						
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" type="text/javascript"></script>
  

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