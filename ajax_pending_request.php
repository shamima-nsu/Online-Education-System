<?php
	include "connect_db.php";
	$UserID=$_POST['UID'];
	$btnValue=$_POST['btnValue'];
	$data=0;
	if($btnValue==="Accept")
	{
		//$sql= "SELECT * from user where UserID=$UserID";
	 	//$result = $conn->query($sql);
	 	$sql = "UPDATE user SET UserRoleID=2 WHERE UserID=$UserID";
	 	$conn->query($sql);
	 	$sql = "DELETE FROM changeuserrole Where UserID=$UserID";
		$conn->query($sql);
	 	$data=1;
	}
	else
	{
		$sql = "DELETE FROM changeuserrole Where UserID=$UserID";
		$conn->query($sql);
		$data=0;
	}
	echo $data;
		


?>