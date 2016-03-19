<html>
<head>
	<title>Attend Quiz</title>
	<link rel="stylesheet" type="text/css" href="CSS/mcq_exam.css"/>
	<style type="text/css">
		.answerInner
		{
			display: inline-block;
			color: red;
		}
	</style>
</head>

<body>
	<?php 
		include_once "includes/header.php";
		include 'connect_db.php';
		$ArticleID=$_POST['article'];
		//echo $ArticleID;
		$mcqTitle;
		$mcqID;
		$questionID=array();
		$question=array();
		$answerChoice=array();
		$choiceID=array();
		$choice=array(array());

		$questionCount=0;
		$choiceCount=0;
		$tempChoiceCount=0;
		$sql= "SELECT * FROM mcq WHERE ArticleID='$ArticleID';";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result)>0)
		{
			//echo "EXISTS";
			foreach ($result as $value) 
			{
				$mcqID=$value['MCQID'];
				$mcqTitle=$value['Title'];
			}
			echo "<div class=\"mcq_form\">";
			echo "<h3 style=\"font-size: 22px; color: maroon;\">".$mcqTitle."</h3><br><hr><br>	";
			//echo $mcqID." ".$mcqTitle."<br>";
			$sql="SELECT * FROM question where MCQID=$mcqID";
			$result=$conn->query($sql);
			$count=0;
			foreach ($result as $value) 
			{
				$questionID[$count]=$value['QuestionID'];
				$question[$count]=$value['QuestionDisplay'];
				$answerChoice[$count]=$value['AnswerChoice'];

				$sql2="SELECT * FROM choice where QuestionID=".$questionID[$count]."";
				//echo $sql2."<br>";
				$result2=$conn->query($sql2);
				foreach ($result2 as $value2) 
				{
					$choiceID[$tempChoiceCount]=$value2['ChoiceID'];
					$choice[$tempChoiceCount]=$value2['ChoiceDisplay'];

					$tempChoiceCount++;
				}
				$count++;

			}
			$questionCount=$count;
			$choiceCount=$tempChoiceCount/$questionCount;
			//echo $choiceCount." ".$questionCount;
			/*for ($i=0; $i <$count ; $i++) 
			{ 
				echo $questionID[$i]."<br> ";
				echo $question[$i]."<br> ";
				echo $answerChoice[$i]."<br> ";
			}*/
			$tempChoiceCount=0;
			for ($i=0; $i <$questionCount ; $i++) 
			{ 
					echo "<br><b>"."Q".($i+1).". ".$question[$i]."</b><br><br>";
					for ($j=0; $j <$choiceCount ; $j++) 
					{ 
						//if($j===0)
							//echo "<input type=\"radio\" name=\"choice$i\" value=\"male\" >".$choice[$tempChoiceCount++]."<br>";
						//else
							echo "<input type=\"radio\" id=\"choice$i\" name=\"choice$i\" value='".$choice[$tempChoiceCount]."' >".$choice[$tempChoiceCount++]."<br><br>";
						// /echo "Choice-".$j.": ".$choice[$tempChoiceCount++]." ";
					}
					
					echo"<div class =\"answerInner\"id=\"answerInner$i\"></div>";
					echo "<br>";
			}
			echo "<input type=\"button\" style=\"background-color: green; color: white; padding: 2px; margin: 10px; border-radius: 2px; \" name=\"btn\" id=\"btn\" value=\"Evaluate\">";
			echo"<div id=\"resultInner\"></div>";

			echo "</div>";

			echo "<input type=\"hidden\" name=\"hdn\" id=\"hdn\" value=\"$questionCount\">";
			echo "<input type=\"hidden\" name=\"hdnArticleID\" id=\"hdnArticleID\" value=\"$ArticleID\">";

		}
		else
		{
			echo "NO MCQ";
		}



	 ?>
	 
	 <script type="text/javascript" src="js/jquery.js"></script>
	 <script type="text/javascript">
	 $(document).ready(function() 
	 {
	 	$("#btn").on('click',function()
	 	{
	 		articleID=$("#hdnArticleID").val();
	 		//alert(articleID);
	 		answer=Array();
	 		value=Array();
	 		count=0;

	 		number=$("#hdn").val();
	 		//alert(number);
	 		for (var i =0; i < number; i++)
	 		{
	 			//alert("input:radio[name=choice"+i+"]");
	 			//$("input[type='radio'][name='rate']:checked").val();
	 			if($("input:radio[name=choice"+i+"]").is(':checked')) 
	 			{ 
	 				value[i]=$("input:radio[name=choice"+i+"]:checked").val();

	 			}
	 			else
	 			{
	 				str="Reqired!";
	 				$("#answerInner"+i).html(str);
	 			}
	 		}
	 		/*for (var i = 0; i < 4; i++) 
	 		{
	 			alert(value[i]);
	 		}*/
	 		$.ajax({
				url: "ajax_mcq_exam.php",
				type: "POST",
				async:false,
				data: {'AID':articleID},
				success: function(result)
				{
					result = JSON.parse(result);
					//console.log(result);
					for (var i = 0; i<result.length; i++)
					{
						answer[i]=result[i];
					};
					
				}
			});
			for (var i = 0; i < answer.length; i++) 
			{
				if(value[i]==answer[i])
				{
					count++;
					str="Your Answer is Correct";
	 				$("#answerInner"+i).html(str);
				}
				else
				{
					str="Your Answer is Wrong! Correct Answer is: "+answer[i];
	 				$("#answerInner"+i).html(str);
				}
			}
			str1="<br>Correct: "+count+"<br/>";
			str2="Wrong: "+(number-count)+"<br/>";
			str="Score: "+((count*100)/number)+"%";
			$("#resultInner").html(str1+str2+str);
	 	});

	 });

	 /*a = {'1':'1','2':'2'}
	 alert(a);
	 console.log(a)*/
	 </script>
</body>

</html>