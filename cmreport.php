<?php
   include 'include/connection.php';
   include 'header_data.php';
   $username="Riya";
   ?>
<div class="module">
<div class="module-body">
<div class="module-body">
   <form action="cmreport.php" method="post" class="form-horizontal row-fluid" id="form1" enctype="multipart/form-data">
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
         <label class="control-label" for="basicinput">Employee</label>
         <div class="controls">
            <select name="emp" >
               <option value="">Please select Employee..</option>
               <?php 
                  $emp_sql=mysqli_query($conn,"SELECT * FROM `emp` WHERE `status`=0");
                  while ($emp_row=mysqli_fetch_assoc($emp_sql)) { ?>
               <option value="<?php echo $emp_row['emp_id'] ?>"><?php echo $emp_row['emp'] ?></option>
               <?php }
                  ?>
            </select>
         </div>
      </div>
      <div class="control-group">
         <div class="controls">
            <button type="submit" class="btn" name="submit" id="submit">Search</button>
         </div>
      </div>
   </form>
   <br>
   <div class="btn-group pull-right" data-toggle="buttons-radio">
      <a href="cm_Form.php"><button type="submit" class="btn btn-success" name="active">
      Add New</button></a>
   </div>
   <div class="profile-tab-content tab-content">
      <div class="tab-pane fade active in" id="activity">
         <div class="module-option clearfix">
         </div>
         <table class="table table-striped table-bordered table-condensed">
            <thead>
               <tr>
                  <th>Associate</th>
                  <th>Audit Date</th>
                  <th>Call Date</th>
                  <th>Company/Customer</th>
                  <th>Total</th>
                  <th>Score</th>
                  <th>Percentage(%)</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $sql="SELECT cmreport.*,emp.emp as name FROM `cmreport`,emp where cmreport.cm_empid=emp.emp_id and cmreport.cm_tl='$username' order by cmreport.id desc" ;
                  if (isset($_POST["submit"])) {
                     $checkdate = $_POST['startdate'];
                     $todate  = $_POST['enddate'];
                     $emp_id = $_POST['emp'];
                     if ($emp_id=='' && $checkdate !='' && $todate!='') {
                        $sql="SELECT cmreport.*, emp.emp AS name
                        FROM `cmreport`, emp
                        WHERE cmreport.cm_empid = emp.emp_id
                            AND cmreport.cm_tl = '$username'
                            AND cmreport.cm_auditdate BETWEEN '$checkdate' AND '$todate'
                        ORDER BY cmreport.id DESC" ;
                     }elseif($emp_id!='' && $checkdate !='' && $todate!=''){
                     $sql="SELECT cmreport.*, emp.emp AS name
                     FROM `cmreport`, emp
                     WHERE cmreport.cm_empid = emp.emp_id
                         AND cmreport.cm_tl = '$username'
                         AND cmreport.cm_auditdate BETWEEN '$checkdate' AND '$todate' and cmreport.cm_empid='$emp_id'
                     ORDER BY cmreport.id DESC" ;
                     }elseif($emp_id!='' && $checkdate =='' && $todate==''){
                        $sql="SELECT cmreport.*,emp.emp as name FROM `cmreport`,emp where cmreport.cm_empid=emp.emp_id and cmreport.cm_tl='$username' and cmreport.cm_empid='$emp_id' order by cmreport.id desc" ;
                        }
                     else{
                        $sql="SELECT cmreport.*,emp.emp as name FROM `cmreport`,emp where cmreport.cm_empid=emp.emp_id and cmreport.cm_tl='$username'  order by cmreport.id desc" ;
                     }
                  }
                  
                  $res=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($res)) { ?>
               <tr>
                  <td> <?php  echo $row['name'];  ?> </td>
                  <td> <?php  echo $row['cm_auditdate'];  ?></td>
                  <td> <?php  echo $row['cm_date'];  ?></td>
                  <td> <?php  echo $row['cm_company'];  ?> </td>
                  <td> <?php  echo $total =$row['total'];  ?> </td>
                  <td> <?php  echo $score=$row['score'];  ?> </td>
                  <td>
                     <?php 
                        $percentage =ceil(100*$score/$total) ;
                        echo $percentage.'%' ;
                        
                        ?>
                  </td>
                  <?php 
                     if($percentage >=80){?>
                  <td style="background: green;color: white;">Pass</td>
                  <?php 
                     }else{
                         ?>
                  <td style="background: red;color: white;">Failed</td>
                  <?php 
                     }
                     
                         ?>
                  <td> 
                     <?php
                        echo "<span class='badge badge-views' >
                          <a href='cm_form_view.php?id=".$row['id']."' class='text-color'>View</a></span>&nbsp;";
                        
                        
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