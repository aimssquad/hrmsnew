<?php

include 'include/connection.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
	$emp_id=get_safe_value($conn,$_POST['emp_id']);
	$balance=get_safe_value($conn,$_POST['balance']);

 





    

  //   if( in_array($imageFileType,$imageFileType1,$extensions_arr) ){



      mysqli_query($conn,"INSERT INTO `leave_balance` (`id`, `emp_id`, `balance`, `update_at`, `status`) VALUES (NULL, '$emp_id', '$balance', current_timestamp(), '0')");



     

     header('location:leave_balnce.php');
  }

  // else

  // {
  //        mysqli_query($conn,"INSERT INTO `employee` (`id`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `contact`, `pcontact`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `photos`, `adhar`, `pan`) VALUES (NULL, '$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$contact', '$pcontact', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk', '$photos', 'null', 'null')");

  //        header('location:index.php');



  // }



// }
?>
