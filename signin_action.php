<?php

include_once "connect_db.php";

$key= md5('Bangladesh');

function decrypt($string, $key)
{
	$string= rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
	return $string;
}

$username= $_POST['username'];
$password= $_POST['password'];

session_start();

global $p;

$sql= "SELECT Password from user where UserName='$username';";
$result= $conn->query($sql);

foreach($result as $value)
{
	//$p= decrypt($value['Password'], $key);
	$p= $value['Password'];
}

if($conn->query($sql)==true && $p==$password)
{
	//session_start();
	$_SESSION['username']= $username;
	header("Location: index.php");
}
else
{
	echo "Failed to sign in";
	echo $p;
	echo"<br><a href=\"index.php\">Try again</a>";
	//echo "Error".$sql."<br>".$con->error;
	//header("Location: sign_in.php");
}

$conn->close();

?>