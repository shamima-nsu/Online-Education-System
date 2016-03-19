<?php

include_once "connect_db.php";

$id= $_POST['article_id'];

$name= $_POST['new_name'];
$des= $_POST['new_description'];
$link= $_POST['new_link'];

$sql= "UPDATE article
SET ArticleName= ('$name'), Description= ('$des'), VideoLink= ('$link')
WHERE ArticleID=('$id');";

if($conn->query($sql)== true){
	
	header("Location: view_article.php");
}

else{
	echo "Error: ".$sql."<br>".$conn->error;
}


?>