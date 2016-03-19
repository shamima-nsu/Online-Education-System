<?php

	include_once "connect_db.php";
	$mcqID= $_POST['mcqid'];
	$questionNum= $_POST['questionNum'];
	$choiceNum= $_POST['choiceNum'];
	global $qid;
	session_start();
	echo "mcqID ". $mcqID ."<br/>";
	echo "question number ".$questionNum ."<br/>";
	echo "choice number ".$choiceNum ."<br/>";
	//print_r($_POST);
	$q=array();
	$qa=array();
	$qc=array();
	$findAnswer;
	//$sql2=array();
	$qid;
	$count=0;
	for ($i=1; $i <=$questionNum ; $i++) 
	{ 
		
		$q[$i]= $_POST["questionNumber$i"];
		//echo $q[$i];
		$qa[$i]= $_POST["questionAnswer$i"];
		//echo $q[$i]."<br/>";
		echo $qa[$i]."<br/>";
		$sql= "INSERT into question(MCQID, AnswerChoice, QuestionDisplay) VALUES ($mcqID,'".$qa[$i]."', '".$q[$i]."')";
		$result=$conn->query($sql);
		$s= "SELECT * from question where QuestionDisplay='".$q[$i]."';";
		$r= $conn->query($s);

		foreach ($r as $value)
		{
			$qid= $value['QuestionID'];
		}
		for ($j=1; $j <=$choiceNum ; $j++) 
		{ 
		
			$qc[$j]= $_POST["choiceNumber$i$j"];
			$sql2= "INSERT into choice(QuestionID, ChoiceDisplay) VALUES (".$qid.", '".$qc[$j]."')";
			$result2=$conn->query($sql2);
			//echo $qc[$i]."<br/>";
			if(intval($qa[$i])===$j)
			{
				$findAnswer=$qc[$j];
				//echo "WROKING<br>".$findAnswer."<br>";
			}
		}
		$sql = "UPDATE question SET AnswerChoice='$findAnswer' WHERE QuestionID=$qid";
		$conn->query($sql);
	}
	

	/*for($i=1; $i<=$n; $i++)
	{
		
		
			for($j=1; $j<$c; $j++)
			{
			$qc= $_POST["ch$i$j"];
			echo$_POST["ch$i$j"];
			$s= "SELECT * from question where QuestionDisplay='".$q[$i]."';";
			$r= $conn->query($s);
			foreach ($r as $value)
			{
				$qid[$count]= $value['QuestionID'];
				$sql2= "INSERT into choice(QuestionID, ChoiceDisplay) VALUES (".$qid[$count].", '".$qc[$j]."')";
				//echo $sql2;
				$result2=$conn->query($sql2);
				$count++;
			}
			

			$count=0;
		}


	}*/
	/*for($i=1; $i<=$n; $i++)
	{
		$q[$i]= $_POST["q$i"];
		//echo $q[$i];
		$qa[$i]= $_POST["qans$i"];
		$sql= "INSERT into question(MCQID, AnswerChoice, QuestionDisplay) VALUES ($id,'".$qa[$i]."', '".$q[$i]."')";
		$result=$conn->query($sql);
			for($j=1; $j<$c; $j++)
			{
			$qc= $_POST["ch$i$j"];
			echo$_POST["ch$i$j"];
			$s= "SELECT * from question where QuestionDisplay='".$q[$i]."';";
			$r= $conn->query($s);
			foreach ($r as $value)
			{
				$qid[$count]= $value['QuestionID'];
				$sql2= "INSERT into choice(QuestionID, ChoiceDisplay) VALUES (".$qid[$count].", '".$qc[$j]."')";
				//echo $sql2;
				$result2=$conn->query($sql2);
				$count++;
			}
			

			$count=0;
		}


	}*/



?>