<?php 
include "connect_db.php";
?>
<html>
<head>
	<title><?php echo"Article| UGE "?></title>
	<meta http-equiv="content-type" content="text/html" />
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/article.css"/>
    
</head>

<body>

	<?php 

		include_once "includes/header.php";


		if (isset($_GET['ChapterID'])) {
			$ChapterID=htmlspecialchars($_GET['ChapterID']);
			$ChapterID=(int)$ChapterID;
		} 
		
		echo "<div id=\"wrapper\">";
			echo "<div style=\"float: left; width: 30%;\">";
	 		echo "<ul id=\"subject_list\">";

			$sql="SELECT * from article where ChapterID='$ChapterID'";
	 		$result = $conn->query($sql);
	 		if(mysqli_fetch_row($result)!=null)
	 		{
		 		foreach($result as $value)
				{
					echo "<li id=\"each_item\"><a href=\"article_details.php?ArticleID=".$value['ArticleID']."\">".$value['ArticleName']."</a></li>";
				}

				echo "</ul>";
				echo "</div";
				
			echo "</div>";
			echo "<div id=\"blank\"></div>";
		}
		else
		{
			echo "NO ARTICLE";
		}
	 ?>
</body>
</html>
