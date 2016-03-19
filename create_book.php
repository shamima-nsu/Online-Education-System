<html>
<head>
	<title>Create Book |UGE</title>
	<link rel="stylesheet" type="text/css" href="CSS/create_book.css"/>
</head>
<body>

	<?php
	include_once "includes/header.php";
	?>

	<div class= "form_container">
		<form class= "book_form" name="createBookForm" method="POST" action="create_book_action.php">


	<?php 
		include 'connect_db.php';
		

		$sql="SELECT * from subject";
 		$result = $conn->query($sql);
 		//mysqli_num_rows($result);
 		if(mysqli_num_rows($result)>0)
 		{
 			
 			echo"Subject Name: ";
			echo "<select name=\"subject\" class=\"style_select\">";
	    	foreach($result as $value)
			{	
				echo "<option value=".$value['SubjectID'].">".$value['SubjectName']."</option>";	    		
	    	}	    	
	    	echo "</select>";
	    	echo"<br><br><br>";		
	 	}
	 ?>
	 Book Name: 
	 <input type="text" name="bookName" class="book_name" required="required"></br><br><br>
	 <input type="submit" name="submit" value="Create" class="submit_button">
	</form>
</div>
</body>
</html>