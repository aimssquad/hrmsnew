<?php

include 'include/connection.php';
include 'header_data.php';

?>




						<div class="module">
							
							<div class="module-body">


                                 <div class="profile-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="activity">


                            <div class="module-option clearfix">
                                <form action="" method="post">
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filter by name..." name="filter">
                                    <button type="submit" class="btn" name="search">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                </form>
                                <form method="post" action="">
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                	  
                                    <button type="submit" class="btn btn-info" name="all">
                                        All</button>
                                    <button type="submit" class="btn btn-success" name="male">
                                        Male</button>
                                    <button type="submit" class="btn btn-warning" name="female">
                                        Female</button>
                                    <button type="submit" class="btn btn-danger" name="deactive">
                                        Deactive</button>
                                     <button type="submit" class="btn btn-success" name="active">
                                        Active</button>
                                </div>
                                </form>



                            </div>


                            	<table class="table table-striped table-bordered table-condensed">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Name</th>
								
									  <th>Contact</th>
									  <th>Email</th>
									  <th></th>
									</tr>
								  </thead>
								  <tbody>
									<?php

                             if ($role!=2) {
                              $sql="SELECT * from employee where status=0  order by id desc" ;
                                   

                              if (isset($_POST['all'])) {
                                   $sql="SELECT * from employee  order by name asc" ;
                              }

                                if (isset($_POST['male'])) {
                                   $sql="SELECT * from employee where gender='male' and status=0  order by name asc" ;
                              }

                                if (isset($_POST['female'])) {
                                   $sql="SELECT * from employee where gender='female'  and status=0 order by name asc" ;
                              }

                               if (isset($_POST['deactive'])) {
                                   $sql="SELECT * from employee where status=1  order by id desc" ;
                              }
                                if (isset($_POST['active'])) {
                                   $sql="SELECT * from employee where status=0  order by name asc" ;
                              }



                              if (isset($_POST['search'])) {
                                $filter=$_POST['filter'];

                                if ($filter == '') {
                                  $sql="SELECT * from employee where status=0 order by name asc" ;
                                    

                                }
                                elseif ($filter != '') {
                                 $sql="SELECT * from employee where name='$filter' order by name asc" ;
                                  
                                }
                              }
                              
                             }else{
                              $sql="SELECT * from employee where status=0 and tl='$username'  order by id desc" ;
                                   

                              if (isset($_POST['all'])) {
                                   $sql="SELECT * from employee where  tl='$username'  order by name asc" ;
                              }

                                if (isset($_POST['male'])) {
                                   $sql="SELECT * from employee where gender='male' and tl='$username' and status=0  order by name asc" ;
                              }

                                if (isset($_POST['female'])) {
                                   $sql="SELECT * from employee where gender='female' and tl='$username'  and status=0 order by name asc" ;
                              }

                               if (isset($_POST['deactive'])) {
                                   $sql="SELECT * from employee where status=1 and tl='$username'  order by id desc" ;
                              }
                                if (isset($_POST['active'])) {
                                   $sql="SELECT * from employee where status=0 and tl='$username'  order by name asc" ;
                              }



                              if (isset($_POST['search'])) {
                                $filter=$_POST['filter'];

                                if ($filter == '') {
                                  $sql="SELECT * from employee where status=0 and tl='$username' order by name asc" ;
                                    

                                }
                                elseif ($filter != '') {
                                 $sql="SELECT * from employee where name='$filter' and tl='$username' order by name asc" ;
                                  
                                }
                              }
                             }
                                   
                                  
                                     $res=mysqli_query($conn,$sql);
                                     while($row=mysqli_fetch_assoc($res)) { ?>
                                    <tr>
                                       
                                      
                                       <td> <?php  echo $row['id'];  ?> </td>
                                       <td> <?php  echo $row['name'];  ?> </td>
                                     
                                       <td> <?php  echo $row['contact'];  ?></td>
                                       <td> <?php  echo $row['omail'];  ?></td>
                                       <td> 
                                          <?php
                                              if ($row['status'] == 0) {
                                                 echo "<span class='badge badge-complete' >
                                                 <a href='status_operation.php?status=".$row['status']." &id=".$row['emp_id']." ' class='text-color'>Active</a></span>&nbsp;";
                                              }
                                              else
                                              {
                                                echo "<span class='badge badge-delete' >
                                                 <a href='status_operation.php?status=".$row['status']." &id=".$row['emp_id']." ' class='text-color'>Deactive</a></span>&nbsp;";

                                              }

                                               echo "<span class='badge badge-edit' ><a href='employee2.php?id=".$row['id']."' class='text-color' class='text-color'>Update</a></span>";
                                              if($role!=2){
                                               echo "&nbsp;<span class='badge badge-delete' > <a href='delete_operation.php?id=".$row['id']."' class='text-color'>Delete</a></span> &nbsp;";
                                              }
                                               echo "<span class='badge badge-views' >
                                                 <a href='view.php?id=".$row['id']."' class='text-color'>View</a></span>&nbsp;";

                                              
                                          ?>

                                        </td>
                                     
                                    </tr>

                                 <?php   }  ?>
								  </tbody>
								</table>

                                </div>

                    </div>
							</div>

                                <!-- End Table View  -->

                                <!-- List View part -->


                                    <!-- End List View part -->
						<?php
                     include 'footer.php';
						?>
  



