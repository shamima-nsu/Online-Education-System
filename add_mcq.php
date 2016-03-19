<head>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/add_mcq.css"/>
</head>

<body>

	<?php

	include_once "includes/header.php";
	include_once "connect_db.php";

	//session_start();

	$id= $_POST['article_id'];
	//$id=4;
	//echo $id;

	

	

	

		  

	echo "<form action= \"add_mcq_action.php\" method=\"post\" style=\"margin: 20px; color: darkgreen; font-size: 18px; padding: 30px; background-color: aliceblue;\"/>
		Title of MCQ set : 
		<input type=\"text\" name=\"mcqTitle\"/><br><br>
		Number of Questions: 
		<input type=\"number\" name=\"questionNumber\" required= \"required\"/><br><br>
		Number of Choices per Question: 
		<input type=\"number\" name=\"choiceNumber\" required= \"required\"/><br><br>

		<input type=\"hidden\" name=\"articleID\" value=\"$id\"/><br><br>
		<input type=\"submit\" value=\"Add Questions\" style=\"background-color: green; color: white; padding: 2px; margin: 10px\"/>
	</form>";

echo "</body>";