

<head>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css">
	<link rel="stylesheet" type="text/css" href="CSS/view_article.css">
</head>

<body>

<?php

include_once "connect_db.php";
//session_start();
include_once "includes/header.php";

$name= $_SESSION['username'];
$sql1= "SELECT UserID from user where UserName= '$name';";

global $id;

$result1= $conn->query($sql1);

foreach ($result1 as $value1)
{
	$id= $value1['UserID'];
}

$sql2= "SELECT * from article where UserID= '$id';";

$result2= $conn->query($sql2);

echo "<div class=\"container\">";



	foreach($result2 as $value2)
	{

		echo "<div class=\"each_link\">";
			$article_id= $value2['ArticleID'];
			$new_sql= "SELECT * from mcq where ArticleID=$article_id";
			$new_result= $conn->query($new_sql);
			echo "<u class=\"title\">Name: </u>".$value2['ArticleName']."<br><br>";
			echo "<u class=\"title\">Description: </u>".$value2['Description']."<br><br>";
			//echo "<u class=\"title\">Average Rating: </u>".$value2['AvgRating']."<br><br>";
			echo "<object width=\"425\" height=\"350\" data='".$value2['VideoLink']."' type=\"application/x-shockwave-flash\">
				<param name=\"src\" value='".$value2['VideoLink']."' />
			</object>";
			//echo "<u class=\"title\">Video Link: </u>".$value2['VideoLink']."<br><br>";

			echo "<form action= \"edit_article.php\" method=\"post\">
				  <input type= \"hidden\" name=\"article_id\" value=\"$article_id\">	
				  <input type=\"submit\" class=\"style_button\" value=\" Edit \"/></form>";

			echo "<form action= \"delete_article.php\" method=\"post\">
				  <input type= \"hidden\" name=\"article_id\" value=\"$article_id\">	
				  <input type=\"submit\" class=\"style_cancel_button\" value=\" Delete \"/></form>";
				  //echo $article_id;
			if(mysqli_num_rows($new_result)<1){
				echo "<form action= \"add_mcq.php\" method=\"post\">
				  <input type= \"hidden\" name=\"article_id\" value=\"$article_id\">	
				  <input type=\"submit\" class=\"style_button\" value=\" Add Questions \"/></form>";
				}
		echo "</div>";
		
		echo "<br><br><hr><br><br>";

	}

	echo "</div>";

	?>

	</body>


<?php

include_once "includes/footer.php";


?>