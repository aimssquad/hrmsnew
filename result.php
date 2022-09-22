<?php

include 'include/connection2.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

									
									

									<br>


									<!-- Start View part -->

									<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Result View</a></li>
                                 
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">

                                         <div class="btn-group pull-right" data-toggle="buttons-radio">
                              <button  class="export-btn btn btn-primary">
                                        Export</button>
                                    
                                </div>
                             <br>


                            	<table class="table table-striped table-bordered table-condensed" id="table_row">
								  <thead>
									<tr>
									  <th>Username</th>
                                                                          <th>Test Date</th>
									  <th>Test Paper</th>
									  <th>Total Marks</th>
									  <th>Wrong</th>
									  <th>Attempted </th>
                                                                          <th>Not Attempted </th>
									  
	
									</tr>
								  </thead>
								  <tbody>
<?php

                                      $date=date('Y-m-d');
                                     $sql="SELECT * from ans_table order by created_date desc" ;
                                     $res=mysqli_query($conn2,$sql);

                                     
                                  

                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                   
				       <td> <?php  echo $row['student_id'];  ?> </td>
                                       <td> <?php echo $row['created_date']; ?></td>
                                       <td> <?php  echo $row['type'];  ?> </td>
                                       <td> <?php  echo $row['f_right'];  ?></td>
                                       <td> <?php  echo $row['f_worng'];  ?></td>
				       <td> <?php  echo $row['f_att'];  ?></td>
                                       <td><?php echo $row['f_not_att'];?></td>
                                       
                                       
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
