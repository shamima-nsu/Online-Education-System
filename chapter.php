<?php 
include "connect_db.php";
?>
<html>
<head>
	<title><?php echo"Chapter| UGE "?></title>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/chapter.css"/>
</head>
<body>
	<?php

		include_once "includes/header.php";

		if (isset($_GET['BookID'])) {
			$BookID=htmlspecialchars($_GET['BookID']);
			$BookID=(int)$BookID;
		} 

		echo "<div id=\"wrapper\">";
 		echo "<ul id=\"subject_list\">";

		$sql="SELECT * from chapter where BookID='$BookID'";
 		$result = $conn->query($sql);
 		if(mysqli_fetch_row($result)!=null)
 		{
	 		foreach($result as $value)
			{
				echo "<li id=\"each_item\"><a href=\"article.php?ChapterID=".$value['ChapterID']."\">".$value['ChapterName']."</a></li>";
				echo "<br>";
			}

			echo "</ul>";
			echo "</div>";
			echo "<div id=\"blank\"></div>";
		}
		else
		{
			echo "NO CHAPTER";
		}



	include_once "includes/footer.php";

	 ?>
</body>
</html>