<?php

include 'include/connection.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
  $emp_id=get_safe_value($conn,$_POST['emp_id']);
  $role=get_safe_value($conn,$_POST['role']);
	$name=get_safe_value($conn,$_POST['name']);
	$doj=get_safe_value($conn,$_POST['doj']);
	$dob=get_safe_value($conn,$_POST['dob']);
	$pm=get_safe_value($conn,$_POST['pmail']);
  $pmail = $pm.'@gmail.com';
	$om=get_safe_value($conn,$_POST['omail']);
  $omail = $om.'@ensomerge.com';
	$address=get_safe_value($conn,$_POST['address']);
  $pmaddress=get_safe_value($conn,$_POST['pmaddress']);
	$c=get_safe_value($conn,$_POST['contact']);
  $contact = '91'.$c;
	$pc=get_safe_value($conn,$_POST['pcontact']);
  $pcontact = '91'.$pc;

  $wnumuber=get_safe_value($conn,$_POST['wnumber']);

	$bloodg=get_safe_value($conn,$_POST['bgroup']);
  $gender=get_safe_value($conn,$_POST['gender']);
  $marital=get_safe_value($conn,$_POST['marital']);
  $bname=get_safe_value($conn,$_POST['bname']);
  $baccount=get_safe_value($conn,$_POST['baccount']);
  $bifc=get_safe_value($conn,$_POST['bifc']);

    $checkbox1=$_POST['chk'];  
    $chk="";  
        foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 

   // $photos = $_FILES['photos']['name'];
   // $target_dir = "https://wfm.ensomerge.com/hrms/uploadimage/";
    //$target_file = $target_dir . basename($_FILES["photos"]["name"]);
    //move_uploaded_file($_FILES['photos']['tmp_name'], $target_file);

    //$adhar = $_FILES['adhar']['name'];
   // $target_file = $target_dir . basename($_FILES["adhar"]["name"]);
    //move_uploaded_file($_FILES['adhar']['tmp_name'], $target_file);
    //$Pan = $_FILES['Pan']['name'];
   // $target_file = $target_dir . basename($_FILES["Pan"]["name"]);
    //move_uploaded_file($_FILES['Pan']['tmp_name'], $target_file);



  //die();
    

  //   if( in_array($imageFileType,$imageFileType1,$extensions_arr) ){



      mysqli_query($conn,"INSERT INTO `employee` (`id`,`emp_id`,`role`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `pmaddress`,`contact`, `pcontact`,`wnumber`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `status`) VALUES (NULL, '$emp_id','$role','$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$pmaddress','$contact', '$pcontact','$wnumuber', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk',0)");



     // move_uploaded_file($_FILES['photos']['tmp_name'],$target_dir.$photos);

     header('location:employee.php');
  }

  // else

  // {
  //        mysqli_query($conn,"INSERT INTO `employee` (`id`, `name`, `doj`, `dob`, `pmail`, `omail`, `address`, `contact`, `pcontact`, `bgroup`, `gender`, `marital`, `bname`, `baccount`, `bifc`, `documents`, `photos`, `adhar`, `pan`) VALUES (NULL, '$name', '$doj', '$dob', '$pmail', '$omail', '$address', '$contact', '$pcontact', '$bloodg', '$gender', '$marital', '$bname', '$baccount', '$bifc', '$chk', '$photos', 'null', 'null')");

  //        header('location:index.php');



  // }



// }
?>
