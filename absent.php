<?php

include 'include/connection.php';
include 'header_data.php';

?>



						<div class="module">
							
							<div class="module-body">

									

									
                               <!-- add employee from -->

								

									<br>


				
									<!-- End Form -->


									<!-- Start View part -->

									<ul class="profile-tab nav nav-tabs">
                                    <li class="active"><a href="#activity" data-toggle="tab">Table View</a></li>
                                   
                                </ul>



                                   <!-- Table View part -->

                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                                <form action="absent.php" method="post" id="form2">
                                <div class="input-append pull-left">
                                    <input type="date" class="span3" placeholder="Filter by id..." name="date">
                                    <button type="submit" class="btn" name="submit">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                              <button  class="export-btn btn btn-primary" onclick="ExportToExcel('xlsx')">
                                        Export</button>
                                    
                                </div>
                            
                                </form>
                                
                            </div>


                            	<table class="table table-striped table-bordered table-condensed" id="tbl_exporttable_to_xls">
								  <thead>
									<tr>
									
									  <th>EMPID</th>
									  <th>EMPNAME</th>
									  <th>DATE</th>
									  <th>Roll</th>
									
									  
									</tr>
								  </thead>
								  <tbody>
									<?php

									$date=date('Y-m-d');
                                     $sql="SELECT emp.emp_id,emp.emp,emp.roll from emp where status=0 AND emp.emp_id NOT IN (SELECT present.emp_id from present where present.date='$date')" ;
                                     $res=mysqli_query($conn,$sql);

                                    
                                      if (isset($_POST['submit']))
                                        {
                                            	$date= $_POST['date'];
                                            	//$todate  = $_POST['enddate'];
                                            	$sql = "SELECT emp.emp_id,emp.emp,emp.roll from emp where status=0 AND emp.emp_id NOT IN (SELECT present.emp_id from present where present.date='$date') ";
                                            	$res=mysqli_query($conn,$sql);
                                         }else{
                                            $sql="SELECT emp.emp_id,emp.emp,emp.roll from emp where status=0 AND emp.emp_id NOT IN (SELECT present.emp_id from present where present.date='$date')" ;
                                     $res=mysqli_query($conn,$sql);

                                         }
                                     
                                  	
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                      
                                       <td> <?php  echo $row['emp_id'];  ?> </td>
                                       <td> <?php  echo $row['emp'];  ?></td>
                                       <td> <?php  echo $date ?></td>
                                       <td> <?php  echo $row['roll'];  ?></td>
                                             
                                     
                                    
                                       
                                          
                                     
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

						

  

    <script>

  $(document).ready(function() {
  $("#search").click(function() {
    $("#form2").toggle();
  });
});
</script>

   <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


        <script>

          function ExportToExcel(type, fn, dl) {
              var elt = document.getElementById('tbl_exporttable_to_xls');
              var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
              return dl ?
                  XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                  XLSX.writeFile(wb, fn || ('absent.' + (type || 'xlsx')));
          }

        </script>



