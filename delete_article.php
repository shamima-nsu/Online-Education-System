<?php

include_once "connect_db.php";

$id= $_POST['article_id'];

$sql= "DELETE from article where ArticleID= '$id';";

if($conn->query($sql)== true)
{
	header("Location: view_article.php");
}



?>