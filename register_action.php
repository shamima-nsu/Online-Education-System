<?php 
	include 'connect_db.php';

	$key= md5('Bangladesh');


	function encrypt($string, $key)
	{
		$string= rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
		return $string;
	}

	$name=$_POST['name'];
	$userName=$_POST['userName'];
	function FixDate($value)
	{
		$temp=(int)$value;
		if($temp<10)
		{
			$value="0".$value;
		}
		return $value;
	}

	//print_r($_POST);



	$password=$_POST['password2'];
	$email=$_POST['email'];
	$alternativeEmail=$_POST['alternativeEmail'];
	$year=$_POST['year'];
	$month=$_POST['month'];
	$day=$_POST['day'];
	$year=FixDate($year);
	$month=FixDate($month);
	$day=FixDate($day);
	$dateOfBirth=$year."-".$month."-".$day;
	//echo $dateOfBirth;
	//$dateOfBirth=$_POST['dateOfBirth'];
	$secretQuestion=$_POST['secretQuestion'];
	$secretAnswer=$_POST['secretAnswer'];
	$contactNo=$_POST['contactNo'];
	$alternativeContactNo=$_POST['alternativeContactNo'];
	$institution=$_POST['institution'];
	$departmentName=$_POST['departmentName'];
	$nationality=$_POST['nationality'];
	$profession=$_POST['profession'];
	


	$fileName = $_FILES["picture"]["name"];
	$tempDirectory = $_FILES["picture"]["tmp_name"];
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

	
	
	//$encrypted_password= encrypt($password, $key);

	$sql="INSERT INTO user (`Name`,`UserName`,`Password`,`Email`,`AlternativeEmail`,`DateOfBirth`,`SecretQuestion`,`SecretAnswer`,`ContactNo`,`AlternativeContactNo`,`Institution`,`DepartmentName`,`Nationality`,`Profession`,`Picture`,`UserRoleID`)
	VALUES ('$name','$userName','$password','$email','$alternativeEmail','$dateOfBirth','$secretQuestion','$secretAnswer','$contactNo','$alternativeContactNo','$institution','$departmentName','$nationality','$profession','$picture','1')";
	
	if($conn->query($sql)===true)
	{
		echo"Registration Successful.";
		echo"<a href=\"signin.php\">Please Click here to Signin</a>";
	}
	else
	{
		echo"Registration Failed.";
		echo"<a href=\"register.php\">Try Again</a>";
	}

		
	$conn->close();

 ?>
 