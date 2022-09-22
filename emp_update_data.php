<?php

include 'include/connection.php';
include 'include/function.php';




if (isset($_POST['submit'])) {
  // $id=get_safe_value($conn,$_POST['id']);
	$name=get_safe_value($conn,$_POST['name']);
	$pmail=get_safe_value($conn,$_POST['pmail']);
  // $pmail = $pm.'@gmail.com';
	$omail=get_safe_value($conn,$_POST['omail']);
  // $omail = $om.'@ensomerge.com';
	$address=get_safe_value($conn,$_POST['address']);
	$c=get_safe_value($conn,$_POST['contact']);
  $contact = '91'.$c;
	$pc=get_safe_value($conn,$_POST['pcontact']);
  $pcontact = '91'.$pc;
  $bname=get_safe_value($conn,$_POST['bname']);
  $baccount=get_safe_value($conn,$_POST['baccount']);
  $bifc=get_safe_value($conn,$_POST['bifc']);

    $checkbox1=$_POST['chk'];  
    $chk="";  
        foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   } 
   echo $chk;
    $photos = $_FILES['photos']['name'];
    echo $photos;
    // $target_dir = "uploadimage/";
    // $target_file = $target_dir . basename($_FILES["photos"]["name"]);
    // move_uploaded_file($_FILES['photos']['tmp_name'], $target_file);

    // $adhar = $_FILES['adhar']['name'];
    // $target_file = $target_dir . basename($_FILES["adhar"]["name"]);
    // move_uploaded_file($_FILES['adhar']['tmp_name'], $target_file);
    // $Pan = $_FILES['Pan']['name'];
    // $target_file = $target_dir . basename($_FILES["Pan"]["name"]);
    // move_uploaded_file($_FILES['Pan']['tmp_name'], $target_file);



       mysqli_query($conn,"UPDATE `employee` SET (`id` = '$id', `name`='$name',  `pmail`='$pmail', `omail`='$omail', `address`='$address', `contact`='$contact', `pcontact`='$pcontact',`bname`='$bname', `baccount`='$baccount', `bifc`='$bifc', `documents`='$chk' where `id` = '$id' ) ");


      header('location:employee.php');
  }

?>