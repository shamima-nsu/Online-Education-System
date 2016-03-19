<?php 
		include "connect_db.php";
		//session_start();
		if (isset($_GET['ArticleID'])) {
			$ArticleID=htmlspecialchars($_GET['ArticleID']);
			$ArticleID=(int)$ArticleID;
		} 
		
		$sql="SELECT * from article where ArticleID='$ArticleID'";
 		$result = $conn->query($sql);
 		global $title, $uploaderID, $uploaderName;
 		foreach($result as $value)
		{
			$title= $value['ArticleName'];
			$uploaderID= $value['UserID'];
		}

		$sql1= "SELECT * from user where UserID='$uploaderID';";
		$res= $conn->query($sql1);
		foreach($res as $val)
		{
			$uploaderName= $val['UserName'];
		}




?>
<html>
<head>
	<title><?php echo $title."| UGE "?></title>
	<link rel="stylesheet" type="text/css" href="CSS/article_details.css"/>
</head>
<body>
	<?php 

		include_once "includes/header.php";
		
		global $u, $uid;
		if(isset($_SESSION['username']))
		{
			$u= $_SESSION['username'];
		}
		$new_sql= "SELECT * from user where UserName= '$u';";
		$r= $conn->query($new_sql);
		foreach($r as $v)
		{
			$uid= $v['UserID'];
		}
 		echo "<div class=\"container\">";
 		foreach($result as $value)
		{
			$aid= $value['ArticleID'];
			echo "<span class= \"text_style\">Article Name : </span>".$value['ArticleName']."<br/><br>";
			echo "<span class= \"text_style\">Uploaded by : </span>".$uploaderName."<br/><br>";
			echo "<span class= \"text_style\">Description : </span>".$value['Description']."<br/><br>";
			echo "<span class= \"text_style\">Youtube Link : </span>".$value['VideoLink']."<br/><br><br><br>";
			echo "<object width=\"500\" height=\"450\" data='".$value['VideoLink']."' type=\"application/x-shockwave-flash\">
				<param name=\"src\" value='".$value['VideoLink']."' />
				</object>";

			echo "<form action=\"wishlist_action.php\" method=\"post\">
				  <input type=\"hidden\" name=\"user\" value=\"$uid\"/>
				  <input type=\"hidden\" name=\"article\" value=\"$aid\"/>
				  <input type= \"submit\" style=\"background-color: green; color: white; padding: 2px; margin: 10px\" value=\" + Add to Wishlist\"></form>";
			echo "<form action=\"mcq_exam.php\" method=\"post\">
				  <input type=\"hidden\" name=\"user\" value=\"$uid\"/>
				  <input type=\"hidden\" name=\"article\" value=\"$aid\"/>
				  <input type= \"submit\" style=\"background-color: green; color: white; padding: 2px; margin: 10px\" value=\" Attend Quiz\"></form>";
			$nextArticle=$ArticleID+1;
			$previousArticle=$ArticleID-1;
			$sql="SELECT * from article where ArticleID='$nextArticle'";
			$result = $conn->query($sql);



			if(mysqli_fetch_row($result)!=null && $ArticleID+1>0)
 			{
 				//echo "<a href=\"article_details.php?ArticleID=".$value['ArticleID']."\">"."Next Article"."</a><br/>";
 			}

 			$sql="SELECT * from article where ArticleID='$previousArticle'";
			$result = $conn->query($sql);
			if(mysqli_fetch_row($result)!=null && $ArticleID-1>0)
 			{
 				//echo "<a href=\"article_details.php?ArticleID=".$value['ArticleID']."\">".$value['ArticleName'].">Previous Article</a><br/>";
 			}
			
			
		}

		echo "</div>";

	 ?>
</body>
</html>
