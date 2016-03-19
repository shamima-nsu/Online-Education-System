<?php 
include "connect_db.php";
?>
<html>
<head>
	<title><?php echo"Book| UGE "?></title>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/book.css"/>
</head>
<body>
	<?php 

		include_once "includes/header.php";
		echo "<div id=\"wrapper\">";
 		echo "<ul id=\"subject_list\">";
		if (isset($_GET['SubjectID'])) {
			$SubjectID=htmlspecialchars($_GET['SubjectID']);
			$SubjectID=(int)$SubjectID;
		}
		
		$sql="SELECT * from book where SubjectID='$SubjectID'";
 		$result = $conn->query($sql);

 		if(mysqli_fetch_row($result)!=null)
 		{
	 		foreach($result as $value)
			{
				echo "<li id=\"each_item\"><a href=\"chapter.php?BookID=".$value['BookID']."\">".$value['BookName']."</a></li><br/>";
				echo "<br>";
			}

			echo "</ul>";

			
			echo "</div>";
			echo "<div id=\"blank\"></div>";
		}

		

		else
		{
			echo "NO BOOK";
		}

		include_once "includes/footer.php";
	 ?>
</body>
</html>