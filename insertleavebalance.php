<?php

include 'include/connection.php';
include 'include/function.php';
if (isset($_POST['submit'])) {
	$emp_id=get_safe_value($conn,$_POST['emp_id']);
	$balance=get_safe_value($conn,$_POST['balance']);
  $leave_balance_type=get_safe_value($conn,$_POST['leave_balance_type']);
  $remarks=get_safe_value($conn,$_POST['remarks']);
  $date =  date("Y-m-d");
  $sql = "INSERT INTO `leave_balance` (`id`, `emp_id`, `balance`,`leave_balance_type`,`remarks`,`date`,`update_at`, `status`) VALUES (NULL, '$emp_id', '$balance','$leave_balance_type',' $remarks','$date', current_timestamp(), '0')";
  if(mysqli_query($conn,$sql)){
    echo '<script>alert("Record Added successfully");';
    echo 'window.location.href = "leave_balnce.php";</script>';
    exit;
  }else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
 
  }
