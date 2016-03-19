<?php 
	include 'connect_db.php'
 ?>

 <html>
 <head>
 	<title><?php echo"Subject| UGE "?></title>
 	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
 	<link href="CSS/subject.css" rel="stylesheet" type="text/css"/>
 	<meta http-equiv="content-type" content="text/html" />
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
    <link href="CSS/header.css" rel="stylesheet" type="text/css" />
    
 </head>
 <body>

 	<?php 
 	include_once "includes/header.php";
 	echo "<div id=\"wrapper\">";
	 	echo "<div id=\"left_side\">";
		 	echo "<ul id=\"subject_list\">";
			 	$sql="SELECT * from subject";
			 	
			 	$result = $conn->query($sql);
			 	foreach($result as $value)
				{
					//echo "<br>";
					echo "<li id=\"each_item\"><a href=\"book.php?SubjectID=".$value['SubjectID']."\">".$value['SubjectName']."</a></li>";
					echo "<br>";
				}

			echo "</ul>";
		echo "</div>";
		echo "<div id=\"img1\">";
			echo "<img src=\"images/sub.jpg\" style=\"width: 350px; height: 350px; border-radius: 20px; margin-left: 200px;\"/>";
		echo "</div>";
	echo "</div>";

	echo "<div id=\"blank\"></div>";

	include_once "includes/footer.php";

 	?>
 </body>
 </html>