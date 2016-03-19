<html>
<head>
	<title>Create Article</title>
	<link rel="stylesheet" type="text/css" href="CSS/create.css"/>
</head>
<body>
	
	<?php
	include_once "includes/header.php";
	include 'connect_db.php';
	?>

	<div class="form_title">
		<span class="title">CREATE YOUR OWN ARTICLE . . .</span>
	</div>

	<div class= "form_container">
		<form name="createForm" method="POST" class= "create_form" action="">
		
		<?php 
		
		$sql="SELECT * from subject";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"Choose Subject Name: ";
			echo "<select class= \"style_select\" name=\"subject\" id=\"subject\">";
			echo "<option value=0>".""."</option>";	    		
	    	foreach($result as $value)
			{	
				echo "<option value=".$value['SubjectID'].">".$value['SubjectName']."</option>";	    		
	    	}	    	
	    	echo "</select>";
	    	echo"<br><br>";		
	 	}
	 	?>


	 	<input type="button" name="createSubjectButton" value="Create Subject" class="style_button" id="createSubjectButton"><br/>
	 	<div id="newSubject">
	 		<br>Subject Name:
	 		<input type="text" name="newSubjectName" id="newSubjectName" class="style_select">
	 		<input type="button" class="style_Cancel_button" name="cancelSubjectButton" value=" X " id="cancelSubjectButton"><br/>
	 	</div>


	 	<?php 
	 	$sql="SELECT * from book";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"<br><hr><br>Choose Book Name: ";
			echo "<select class= \"style_select\" name=\"book\" id=\"book\">";
			echo "<option value=0>".""."</option>";
	    	foreach($result as $value)
			{	
				echo "<option value=".$value['BookID'].">".$value['BookName']."</option>";	    		
	    	}	    	
	    	echo "</select>";
	    	echo"</br><br>";		
	 	}
	?>

	<input type="button" name="createBookButton" value="Create Book" class="style_button" id="createBookButton"><br/><br><br>
 	<div id="newBook">
 		Book Name:
 		<input type="text" name="newBookName" id="newBookName" class="style_select">
 		<input type="button" name="cancelBookButton" class="style_cancel_button" value=" X " id="cancelBookButton"><br/>
 	</div>


 	<?php 
	 	$sql="SELECT * from chapter";
 		$result = $conn->query($sql);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"<br><hr><br>Choose Chapter Name: ";
			echo "<select class =\"style_select\" name=\"chapter\" id=\"chapter\">";
			echo "<option value=0>".""."</option>";
	    	foreach($result as $value)
			{	
				echo "<option value=".$value['ChapterID'].">".$value['ChapterName']."</option>";	    		
	    	}	    	
	    	echo "</select>";
	    	echo"</br><br>";		
	 	}
	?>

	<input type="button" name="createChapterButton" class="style_button" value="Create Chapter"id="createChapterButton"><br/>
 	<div id="newChapter">
 		<br>Chapter Name:
 		<input type="text" name="newChapterName" id="newChapterName" class="style_select">
 		<input type="button" name="cancelChapterButton" class="style_Cancel_button" value=" X " id="cancelChapterButton"><br/>
 	</div>
 	<div id="newArticle">
	 	<br><hr><br>Article Name:
	 	<input type="text" class= "style_select" name="article" id="article"><br/><br><br><br>
	 	<div class="Submit_button_styling">
	 		<input type="submit" value="Submit" class="style_submit_button" id="submit">
	 	</div>
	</div>
	</form>

</div>
	 
	 <script type="text/javascript" src="js/jquery.js"></script>
	 <script type="text/javascript">
		$(document).ready(function(){
			$("#newSubject").hide();
			$("#newBook").hide();
			$("#newChapter").hide();

		});
		$("#createSubjectButton").click(function(){
			$("#newSubject").show();
		});
		$("#cancelSubjectButton").click(function(){
			$("#newSubject").hide();		
		});

		$("#createBookButton").click(function(){
			$("#newBook").show();
		});
		$("#cancelBookButton").click(function(){
			$("#newBook").hide();		
		});

		$("#createChapterButton").click(function(){
			$("#newChapter").show();
		});
		$("#cancelChapterButton").click(function(){
			$("#newChapter").hide();			
		});


		

	</script>

	<?php

	include_once "includes/footer.php";

	?>
</body>

</html>