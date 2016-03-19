<?php 
	include 'connect_db.php';
	$subjectID=$_POST['subject'];
	$bookName=$_POST['bookName'];
	$sql="INSERT INTO book (`BookName`,`SubjectID`) VALUES ('$bookName','$subjectID')";
	if($conn->query($sql)===true)
		echo"Success";
	else
		echo "error";
	$conn->close();
		
 ?>