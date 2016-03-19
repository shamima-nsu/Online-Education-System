<?php
	include "connect_db.php";
	$UserID=$_POST['UID'];
	
	$UserRoleID=$_POST['URI'];

	$status=$_POST['status'];
	
	$data=0;
	
 	$sql = "UPDATE user SET UserRoleID=$UserRoleID WHERE UserID=$UserID";

	if($status !=="Remove")
	{
		$conn->query($sql);
		$data=1;
	}
 	else
 	{
 		$sql = "DELETE FROM user Where UserID=$UserID";
		$result=$conn->query($sql);
		$data=0;
 	}
 		

	echo $data;
	
	


?>