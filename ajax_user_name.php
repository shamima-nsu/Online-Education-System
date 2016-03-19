<?php 
	include'connect_db.php';
	$name=$_POST['value'];
	$data;
	$sql="SELECT * from user where UserName='$name'";
	$result = $conn->query($sql);
	if( mysqli_num_rows($result) > 0)
	{
		$data=1;
	}
	else
	{
		$data=0;
	}
	echo $data;

 ?>