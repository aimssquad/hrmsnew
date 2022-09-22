<?php

$conn=mysqli_connect('10.128.0.9','abbas','Abbas@1995','hrms');
//$conn=mysqli_connect('localhost','root','','hrms');

$month=30 ;
$month3=90;
$month6=180;
$year=365;
$year2=356*2;
$year3=365*3;
$year4=365*4;
$year5=365*5;
$year6=365*6;
$year7=365*7;
$year8=365*8;
$year9=365*9;
$year10=365*10;

$email="abbas.uddin@ensomerge.com";
$email1="jincy@ensomerge.com";


function dateDiffInDays($date1, $date2)
{
	$diff = strtotime($date2) - strtotime($date1);
	return abs(round($diff / 86400));
}

// $date1 = "2019-06-17";
// $date2 = date('Y-m-d');
// $dateDiff = dateDiffInDays($date1, $date2);


$sql=mysqli_query($conn,"SELECT * FROM `employee` where doj is not null and  status=0");

while ($row=mysqli_fetch_assoc($sql)) {
	
	$doj=$row['doj'];
	$name=$row['name'];

	 $date=date('Y-m-d');

	 $dateDiff = dateDiffInDays($doj, $date);

	   echo $dateDiff .' - Name :: ' .$name;
	   echo '<br>';

	 if ($dateDiff==$month) {
      
      $var2="1";
      $var3="Month";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


	 }

	 if ($dateDiff==$month3) {

	    $var2="3";
      $var3="Months";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	  if ($dateDiff==$month6) {
	   $var2="6";
      $var3="Months";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	  if ($dateDiff==$year) {
	   $var2="1";
      $var3="Year";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }


	   if ($dateDiff==$year2) {
	   $var2="2";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year3) {
	   $var2="3";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year4) {
	   $var2="4";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year5) {
	   $var2="5";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }


	    if ($dateDiff==$year6) {
	   $var2="6";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year7) {
	   $var2="7";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year8) {
	   $var2="8";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }


	    if ($dateDiff==$year9) {
	   $var2="9";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }

	    if ($dateDiff==$year10) {
	   $var2="10";
      $var3="Years";
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.msg91.com/api/v5/email/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"to\": [\n    {\n      \"name\": \"$name\",\n      \"email\": \"$email\"\n    }\n  ],\n  \"from\": {\n    \"name\": \"Ensomerge\",\n    \"email\": \"support@bookmysales.com\"\n  },\n  \"cc\": [\n    {\n      \"email\": \"$email1\"\n    }\n   \n  ],\n\n  \"domain\": \"bookmysales.com\",\n  \"mail_type_id\": \"1\",\n  \"template_id\": \"4364\",\n  \"variables\": {\n    \"VAR1\": \"$name\",\n    \"VAR2\": \"$var2\",\n    \"VAR3\": \"$var3\"\n  }\n}",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Content-Type: application/JSON",
    "authkey: 372323AjwXe2wBhWIR61efa85aP1"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

	 	
	 }






	 


	 
}




?>
