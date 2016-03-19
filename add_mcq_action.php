<head>

</head>
<body>

	<?php

	include_once "includes/header.php";
	//session_start();
	include_once "connect_db.php";

	$mcqTitle= $_POST['mcqTitle'];
	$articleID= $_POST['articleID'];
	$questionNumber= $_POST['questionNumber'];
	$choiceNumber= $_POST['choiceNumber'];
	$mcqID;
	//print_r($_POST);
	//echo $articleID." ".$mcqTitle." ".$questionNumber." ".$choiceNumber;

	$sql= "INSERT into mcq (`ArticleID`, `Title`) values ($articleID, '$mcqTitle')";
	$conn->query($sql);
	$sql2= "SELECT * from mcq where ArticleID=$articleID and Title= '$mcqTitle'";
	


	$result2= $conn->query($sql2);
	foreach ($result2 as $value)
	{
		$mcqID= $value['MCQID'];
	}
	//echo $mcqID;
	
	echo "<form action= \"submit_mcq_ques.php\" method=\"post\" style=\"padding: 30px; margin: 30px; color: darkgreen; background-color: azure; font-size: 18px;\">";

	for($i=1; $i<=$questionNumber; $i++)
	{
		echo "Q".$i.": <input type= \"text\" name=\"questionNumber".$i."\"/><br><br>";
			
			for($j=1; $j<=$choiceNumber; $j++)
			{
				echo "Choice ".$j.": <input type= \"text\" name=\"choiceNumber".$i."".$j."\"/><br><br>";
			}

		echo "Right Answer: <input type=\"number\" required=\"required\" name=\"questionAnswer".$i."\"/><br><br>";
	}
		
	echo "<input type=\"hidden\" name=\"mcqid\" value=\"$mcqID\"/>
		  <input type=\"hidden\" name=\"questionNum\" value=\"$questionNumber\"/>
		  
	      <input type=\"hidden\" name=\"choiceNum\" value=\"$choiceNumber\"/>
		  <input type=\"submit\" value=\"Submit\" style=\"background-color: green; color: white; padding: 2px; margin: 10px\"/></form>";


	?>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$()

	</script>

</body>