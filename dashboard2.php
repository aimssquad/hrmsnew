<?php 
 include 'include/connection.php';
 include 'include/tconnection.php';
 include 'header_data.php';

                    
                    $today=date('Y-m-d');
                    $sql=mysqli_query( $conn,"SELECT present.*,emp.tl from `present`,emp WHERE present.emp_id=emp.emp_id and emp.tl='$username' and present.date='$today '");
                    $attandance=mysqli_num_rows($sql);

                    $sql=mysqli_query( $conn,"SELECT * FROM `emp` where status=0 and tl='$username'");
                    $employee=mysqli_num_rows($sql);
                    

                   // $today=date('Y-m-d');

                  ?>
                 
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="attend.php" class="btn-box big span4"><i class=" icon-group"></i><b><?php echo $attandance; ?></b>
                                        <p class="text-muted">
                                           Today's Attendance</p>
                                    </a><a href="employee.php" class="btn-box big span4"><i class="icon-user"></i><b><?php   echo $employee; ?></b>
                                        <p class="text-muted">
                                            Employees</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-group"></i><b>3</b>
                                        <p class="text-muted">
                                            Clients</p>
                                    </a>
                                </div>
                            
                            </div>

                            <div class="profile-tab-content tab-content">
                                     <h4 style="margin-left: 10px;"><b>Today's Attendance </b></h4>
                                    <div class="tab-pane fade active in">


                            <div class="module-option clearfix">
                              
                              
                            </div>


                                <table class="table table-striped table-bordered table-condensed">
                                  <thead>
                                    <tr>
                                      
                                      <th></th>
                                      <th>Present</th>
                                      <th>Absent</th>
                                      <th>Total</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php
                                   $today=date('Y-m-d');

                        // production start

                             $sql=mysqli_query( $conn,"SELECT * FROM `emp` WHERE `status`=0 and `roll`='Production' and tl='$username'");
                             $empproduction=mysqli_num_rows($sql);

                             $sql=mysqli_query( $conn,"SELECT present.*,emp.tl from `present`,emp WHERE `present`.emp_id=`emp`.emp_id and `emp`.tl='$username' and `present`.date='$today' and `present`.roll='Production'");
                             $prsentp=mysqli_num_rows($sql);

                             $absentp=($empproduction - $prsentp );

                        //production end


                         // Support start

                             $sql=mysqli_query( $conn,"SELECT * FROM `emp` WHERE `status`=0 and `roll`='Support' and tl='$username'");
                             $empsupport=mysqli_num_rows($sql);

                             $sql=mysqli_query( $conn,"SELECT present.*,emp.tl from `present`,emp WHERE `present`.emp_id=`emp`.emp_id and `emp`.tl='$username' and `present`.date='$today' and `present`.roll='Support'");
                             $prsents=mysqli_num_rows($sql);

                             $absents=($empsupport - $prsents );

                        //Support end


                             // total start

                             $totalpresent = ($prsentp + $prsents);
                             $toatlabsent= ($absentp + $absents);

                             $totalemp=($empproduction + $empsupport);


                             //total end



                                    ?>
             
              <tr>
                <th>Production</th>
                <td><?php echo $prsentp; ?></td>
                <td><?php echo $absentp; ?></td>
                <td><?php echo $empproduction; ?></td>
                </tr>
                <tr>
                <th>Support</th>
                 <td><?php echo $prsents; ?></td>
                <td><?php echo $absents; ?></td>
                <td><?php echo $empsupport; ?></td>
            </tr>
            <tr>
               <th>Total</th>
             <td> <a href="attend.php"><?php echo $totalpresent; ?></a></td>
                <td><a href="absent.php"><?php echo $toatlabsent; ?></a></td>
                <td><a href="credintial.php"><?php echo $totalemp; ?></a></td>
            </tr>
                
              
              

              

                 </tbody>
                                </table>

                                </div>

                            
                         
                   
                          
                         
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                    <?php
                     include 'footer.php';
						?>
  

   
