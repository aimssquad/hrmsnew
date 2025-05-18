<?php
   include 'include/connection.php';
   include 'header_data.php';


   $date_check = date('m/Y');

   $update_balance = mysqli_query($conn,"SELECT * FROM `update_balance_status` WHERE `month_yr`='$date_check'");
   $count_update = mysqli_num_rows($update_balance);

   $updated_result = mysqli_fetch_assoc($update_balance);
   $updated_date = $updated_result['updated_at'];
   
   ?>
<div class="module">
<div class="module-head">
   <button type="button" id="formButton" style="display: block; border:none; " class="btn-success">Add Leave Balance</button>
</div>
<div class="module-body">
<!-- add employee from  -->
<form name="myForm" action="insertleavebalance.php" method="post" class="form-horizontal row-fluid" id="form1" style="display: none;" enctype="multipart/form-data" >
   <div class="control-group">
      <label class="control-label" for="basicinput">Employee Name</label>
      <div class="controls">
         <select tabindex="1" data-placeholder="Select here.." class="span8" name="emp_id" required>
            <option value="">Select here..</option>
            <?php  
               $sql=mysqli_query($conn,"SELECT `emp`,`emp_id` FROM `emp` WHERE `status`=0");
               
               while($row=mysqli_fetch_assoc($sql)){
               
               
               ?>
            <option value="<?php echo $row['emp_id'] ?>"><?php echo $row['emp']; ?></option>
            <?php
               }
               
               	?>
         </select>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="basicinput">Leave Balance</label>
      <div class="controls">
         <input data-title="A tooltip for the input" type="number"  data-original-title="" name="balance"  class="span8" required>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="basicinput">Leave Balance Type</label>
      <div class="controls">
      <select name="leave_balance_type" id="" class="span8" required>
         <option value="">Select..</option>
         <?php 
            $sql_type = mysqli_query($conn,"SELECT * FROM `leave_balance_type`");
            while ($row_type = mysqli_fetch_assoc($sql_type)) {
               echo '<option value="' . $row_type['name'] . '">' . $row_type['name'] . '</option>';
            }
         ?>
         </select>
      </div>
   </div>
   <div class="control-group">
      <label class="control-label" for="basicinput">Remarks</label>
      <div class="controls">
         <textarea name="remarks" id="" cols="20" rows="6" class="span8" required></textarea>
      </div>
   </div>
   <div class="control-group">
      <div class="controls">
         <button type="submit" class="btn btn-info" name="submit">Submit Form</button>
      </div>
   </div>
</form>
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
      <div class="btn-group pull-right " data-toggle="buttons-radio">
        <?php
          if($count_update > 0){ ?>
          <a href="#" class="btn btn-success">
         Last Updated Leave Balance - <?php echo $updated_date ?></a>
         <?php  }else{ ?>
          <a href="update_balance.php" class="btn btn-success">
          Update Leave Balnce(Monthly)</a>
        <?php  }
        ?>
         
      </div>
   </div>
   <table class="table table-striped table-bordered table-condensed">
      <thead>
         <tr>
            <th>Emp_ID</th>
            <th>Emp_Name</th>
            <th>Total Addition</th>
            <th>Total Substarction</th>
            <th>Leave Balance</th>
            <th>Update_at</th>
            <th>Action</th>

         </tr>
      </thead>
      <tbody>
         <?php
            $sql="SELECT emp.emp_id, emp.emp,leave_balance.`update_at`,leave_balance.`id`, SUM(CASE WHEN leave_balance.type = 1 THEN leave_balance.balance ELSE 0 END) AS total_addition, SUM(CASE WHEN leave_balance.type = 0 THEN leave_balance.balance ELSE 0 END) AS total_subtraction, (SUM(CASE WHEN leave_balance.type = 1 THEN leave_balance.balance ELSE 0 END) - SUM(CASE WHEN leave_balance.type = 0 THEN leave_balance.balance ELSE 0 END)) AS balance FROM leave_balance JOIN emp ON leave_balance.emp_id = emp.emp_id WHERE leave_balance.status = 0 GROUP BY leave_balance.emp_id ORDER BY emp.emp asc" ;
            $res=mysqli_query($conn,$sql);
            
            
            
            
            while($row=mysqli_fetch_assoc($res)) { ?>
         <tr>
            <td> <?php  echo $row['emp_id'];  ?> </td>
            <td> <?php  echo $row['emp'];  ?> </td>
            <td> <?php  echo $row['total_addition'];  ?> </td>
            <td> <?php  echo $row['total_subtraction'];  ?> </td>
            <td> <?php  echo $row['balance'];  ?></td>
            <td> <?php  echo $row['update_at'];  ?></td>
            <td> 
               <?php
                  
                   echo "<span class='badge badge-edit' ><a href='leave_history.php?emp_id=".$row['emp_id']."' class='text-color' class='text-color'>View</a></span>";
                  ?>
            </td>
         </tr>
         <?php   }  ?>
      </tbody>
   </table>
</div>
<!-- End Table View  -->
<!-- End List View part -->
<?php
   include 'footer.php';
   ?>
<script>
   $(document).ready(function() {
   $("#formButton").click(function() {
     $("#form1").toggle();
   });
   });
</script>