<?php
include 'include/connection.php';
$id =$_GET['id'];
 mysqli_query($conn, "DELETE FROM `employee` WHERE `id` ='$id' ");
 header('location:employee.php');
 ?>