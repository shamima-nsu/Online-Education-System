<?php 
	include 'connect_db.php';

	$articleID=$_POST['AID'];
	$mcqID;
	$count=0;
	$answerChoice=array();
	$sql= "SELECT * FROM mcq WHERE ArticleID=$articleID";
	$result=$conn->query($sql);
	foreach ($result as $value) 
	{
		$mcqID=$value['MCQID'];
	}
	$sql="SELECT * FROM question where MCQID=$mcqID";
	$result=$conn->query($sql);
	foreach ($result as $value) 
	{		
		$answerChoice[$count++]=$value['AnswerChoice'];
	}

	$data = json_encode($answerChoice);
	echo $data;
	/*javascript
	consjson_parse()*/
 ?>