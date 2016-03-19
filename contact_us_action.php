<?php

include_once "connect_db.php";

$name= $_POST['name'];
$email= $_POST['email'];
$message= $_POST['query'];

$header= "From: ".$email. "\r\n ";

$sql= "SELECT * from user where UserRoleID=2;";

$result= $conn->query($sql);

foreach($result as $value)
{
	$to= $value['Email'];
	$subject= "Query From UGE visitor";
}

mail($to, $subject, $message, $header);




?>