<?php

include_once "connect_db.php";

$name= $_POST['new_name'];
$email= $_POST['new_email'];
$altEmail= $_POST['new_altEmail'];
$con= $_POST['new_con'];
$altCon= $_POST['new_altCon'];
$nationality= $_POST['new_nationality'];
$ins= $_POST['new_ins'];
$prof= $_POST['new_prof'];
$dept= $_POST['new_dept'];
$id= $_POST['id'];
$n_pic= $_POST['new_pic'];
$fileName = $_FILES["new_pic"]["name"];
	$tempDirectory = $_FILES["new_pic"]["tmp_name"];
	$targetPath = 'upload/'.$fileName; 

	if(move_uploaded_file($tempDirectory,$targetPath))
	{
		//echo "success"." ".$targetPath;
	}
	else
	{
		//echo "Problem in Picture";
	}
	$picture=$targetPath;

$sql= "UPDATE user
	   set Name= '$name', Email= '$email', AlternativeEmail= '$altEmail', ContactNo= '$con', AlternativeContactNo= '$altCon', Institution= '$ins', DepartmentName= '$dept', Nationality= '$nationality', Picture= '$targetPath', Profession= '$prof' WHERE UserID='$id';";

if($conn->query($sql)== true)
{
	header("Location: account.php");
}
else
{
	echo "Error: ".$sql."<br>".$conn->error;
}

?>