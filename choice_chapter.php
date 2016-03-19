<?php

	include 'connect_db.php';

	if(isset($_POST['book_id']))
	{
		$id = $_POST['book_id'];

		$result = $conn->query("SELECT ChapterName,ChapterID FROM chapter WHERE BookID = ".$id);

		$data = array();

		foreach($result as $value)
		{
				$data[] = $value; 		
	    }
		$data = json_encode($data);

		echo $data;
	}

?>