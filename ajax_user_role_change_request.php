<?php
	include "connect_db.php";
	$UserID=$_POST['UID'];
	$btnValue=$_POST['btnValue'];
	$data=0;
	$sql= "SELECT * from changeuserrole where UserID=$UserID";
	//echo $sql;
 	$result = $conn->query($sql);

 	if(mysqli_num_rows($result) >0)
	{
		if($btnValue==="Cancel")
		{
			$sql = "DELETE FROM changeuserrole Where UserID=$UserID";
			$conn->query($sql);
			$data=2;
		}
		else
			$data=1;
	}
	else
	{
		$sql = "INSERT INTO changeuserrole (`UserID`) VALUES ('$UserID')";
		$conn->query($sql);

		$data=0;
	}
	echo $data;
		


?>