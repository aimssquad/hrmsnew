<?php
include 'include/connection.php';
include 'include/function.php';


//$conn=mysqli_connect("localhost","root","","hrms");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/hrms/');
define('SITE_PATH','http://localhost/hrms/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'uploadimage/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'uploadimage/');



// echo SERVER_PATH;

// echo '<br>';
// echo SITE_PATH;
// echo '<br>';
// echo PRODUCT_IMAGE_SERVER_PATH;
// echo '<br>';
// echo PRODUCT_IMAGE_SITE_PATH ;


// die();

//print_r($_POST);


if (isset($_POST['submit'])) {
	
   $username="Abbas";

  $post=get_safe_value($conn,$_POST['post']);
 
  //$image=get_safe_value($conn,$_POST['image']);


  	if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/gif'){
				$msg="Please select only png,,gif and jpeg image formate";
				echo $msg;
			}
		}


			if ($_FILES['image']['name']!='') {

			// $image=rand(1111111,9999999).'_'.$_FILES['image']['name'];
			// move_uploaded_file($_FILES['image']['tmp_name'],CATEGORY_IMAGE_SERVER_PATH.$image);


				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES["image"]["tmp_name"],PRODUCT_IMAGE_SERVER_PATH.$image);
				
				
				 $post_query="INSERT INTO `news_feed` (`id`, `username`, `post`, `image`, `status`, `created_at`, `updated_at`) VALUES (NULL, '$username', '$post', '$image', '0', current_timestamp(), current_timestamp());";


			if (mysqli_query($conn,$post_query)) {
  	               echo "post uploaded";
               }else{
  	         echo "post failed";
                }

			}



 


 

}




?>
