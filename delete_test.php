<?php
include 'include/connection2.php';
$id =$_GET['id'];
 mysqli_query($conn2, "DELETE FROM `log_in` WHERE `id` ='$id' ");
 header('location:testcreate.php');
 ?>
