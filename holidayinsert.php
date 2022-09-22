<?php
include "include/connection.php";

	$_POST['type'];
	$_POST['description'];
	$_POST['date'];

	if(isset($_POST['submit']))
	{
		$newq = "insert into holiday values('','".$_POST['type']."','".$_POST['description']."','".$_POST['date']."') ";
		//echo $newq;

		if ($conn->query($newq) == true)
		{
			echo "<script> alert('Data Is Saved'); </script>";
			echo "<script> window.location.href ='insert1.php' ;</script>";
		}
	}



?>
