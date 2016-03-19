<?php

	include 'connect_db.php';

	if(isset($_POST['sub_id']))
	{
		$id = $_POST['sub_id'];

		$result = $conn->query("SELECT BookName,BookID FROM book WHERE SubjectID = ".$id);

		$data = array();

		foreach($result as $value)
		{
				$data[] = $value; 		
	    }	

		$data = json_encode($data);

		echo $data;
	}

?>