<?php
	include "connect_db.php";
	$UserID=$_POST['UID'];
	//$UserID=intval($UserID);
	$ArticleID=$_POST['AID'];
	//$ArticleID=intval($ArticleID);
	$data=0;
	
 	$sql = "DELETE FROM wishlist Where UserID=$UserID AND ArticleID=$ArticleID";

	if($conn->query($sql))
		$data=1;
 	else
 		$data=0;

	echo $data;
	
	


?>