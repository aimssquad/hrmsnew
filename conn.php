<?php
	//$conn = new mysqli('10.128.0.9', 'abbas', 'Abbas@1995', 'hrms');
	$conn = new mysqli('localhost:3307', 'root', '', 'hrms');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/hr/');
	define('SITE_PATH','https://wfm.ensomerge.com/hr/');
	//  define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
	//  //  define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
	//
	   define('ROASTER_SERVER_PATH',SERVER_PATH.'2023/');
	   define('ROASTER_SITE_PATH',SITE_PATH.'2023/');
	//
	    //echo ROASTER_SERVER_PATH ;
	    //echo "<br>";
	    //echo ROASTER_SITE_PATH;
	
?>
