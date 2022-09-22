<?php
include 'include/connection2.php';
$id =$_GET['id'];
 mysqli_query($conn2, "UPDATE `log_in` SET `status`= '1' WHERE `id`='$id' ");
 header('location:testcreate.php');
 ?>
