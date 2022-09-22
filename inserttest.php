<?php

include 'include/connection2.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
	$name=get_safe_value($conn2,$_POST['name']);
	$password=get_safe_value($conn2,$_POST['password']);
	$mail=get_safe_value($conn2,$_POST['mail']);
	$paper=get_safe_value($conn2,$_POST['paper']);
 





    

  //   if( in_array($imageFileType,$imageFileType1,$extensions_arr) ){



      mysqli_query($conn2,"INSERT INTO `log_in` (`id`, `user_name`, `email_id`, `paper`, `password`, `status`) VALUES (NULL, '$name', '$mail', '$paper', '$password', '0')");



     

     header('location:testcreate.php');
  }

  // else

  // {
  //        mysqli_query($conn,"INSERT INTO `employee` (`id`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `contact`, `pcontact`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `photos`, `adhar`, `pan`) VALUES (NULL, '$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$contact', '$pcontact', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk', '$photos', 'null', 'null')");

  //        header('location:index.php');



  // }



// }
?>
