<?php

	include_once "connect_db.php";

	$id= $_POST['user'];

	$aid= $_POST['article'];
	//echo $id;
	$sql="SELECT * FROM wishlist where UserID=$id AND ArticleID=$aid";
	$result=$conn->query($sql);
	//$row_cnt = mysqli_num_rows($result);

	if(mysqli_num_rows($result) > 0)
	{
		echo "This is already in your Wish List";
	}
	else
	{
		$sql= "INSERT into wishlist(`ArticleID`, `UserID`) Values ('$aid', '$id')";
		$conn->query($sql);
		echo "Added in your Wishlist";
	}

?>