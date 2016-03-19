<head>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/edit_article.css"/>
</head>

<body>

	<?php

	include_once "connect_db.php";

	session_start();

	$articleID= $_POST['article_id'];

	$sql1= "SELECT * from article where ArticleID= '$articleID';";

	$result1= $conn->query($sql1);

	foreach($result1 as $value1)
	{
		$title= $value1['ArticleName'];
		$des= $value1['Description'];
		//$rating= $value1['AvgRating'];
		$link= $value1['VideoLink'];
	}

	echo "
		  <form action=\"update_article.php\" method=\"post\">
		  Name: <input type=\"text\" name=\"new_name\" value=\"$title\" <br><br><br>
		  Description: <input type=\"text\" class= \"des_box\" name=\"new_description\" value=\"$des\" <br><br><br>
		  Video Link: <input type=\"text\" class= \"link_box\" name=\"new_link\" value=\"$link\" <br><br>
		  <input type=\"hidden\" name=\"article_id\" value=\"$articleID\"/>
		  <input type=\"submit\" value=\"Update\"/>";

	?>

</body>