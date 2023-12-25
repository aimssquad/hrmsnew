<?php
include 'include/connection.php';
include 'include/function.php';

if (isset($_POST['submit'])) {
	
$username=get_safe_value($conn,$_POST['username']);
$post=get_safe_value($conn,$_POST['post']);
 
 $sql_user_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `admin_new` WHERE `username`='$username'"));
 $user_id = $sql_user_id['user_id'];
				
$post_query="INSERT INTO `news_feed` (`id`, `username`, `post`, `image`, `status`, `created_at`, `updated_at`, `type`, `emp_id`)
 VALUES (NULL, '$username', '$post', NULL, '0', current_timestamp(), current_timestamp(), '0', '$user_id')";
if (mysqli_query($conn,$post_query)) {
				echo '<script>';
				echo 'alert("Post Cretaed Sucessfully");';
				echo 'window.location.href = "post.php";';
				echo '</script>';
    }else{
				echo '<script>';
				echo 'alert("Something went wrong !");';
				echo 'History.back();';
				echo '</script>';
    }


}




?>
