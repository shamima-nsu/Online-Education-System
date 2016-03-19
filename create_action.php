<?php
	include "connect_db.php";
	session_start();

	if(isset($_SESSION['username']))
	{


		$username= $_SESSION['username'];

		$s= "SELECT * from user where UserName= '$username';";

		$r= $conn->query($s);
		foreach($r as $v)
		{
			$UserID= $v['UserID'];
		}

		$subject=$_POST['subject'];
		$book=$_POST['book'];
		$chapter=$_POST['chapter'];
		$newSubjectName=$_POST['newSubjectName'];
		$newBookName=$_POST['newBookName'];
		$newChapterName=$_POST['newChapterName'];
		$articleName=$_POST['article'];
		$articleDescription=$_POST['articleDescription'];
		$Link=$_POST['articleVideoLink'];

		$link_parts= explode("watch?v=", $Link);
		$articleVideoLink= implode("v/", $link_parts);
		//echo $articleVideoLink;
		$sql;
		$SubjectID;
		$BookID;
		$ChapterID;
		
		if($subject ==="0" && $newSubjectName!=="")
		{
			
			$sql = "INSERT INTO subject (`SubjectName`) VALUES ('$newSubjectName')";
			$conn->query($sql);
			//subject insert hoise
			$sql="SELECT * from subject where SubjectName='$newSubjectName'";
	 		$result = $conn->query($sql);
	 		foreach($result as $value)
			{
				$SubjectID=$value['SubjectID'];
			}
			$sql = "INSERT INTO book (`BookName`,`SubjectID`) VALUES ('$newBookName','$SubjectID')";
			$conn->query($sql);
			//book insert hoise


			$sql="SELECT * from book where BookName='$newBookName'";
	 		$result = $conn->query($sql);
	 		foreach($result as $value)
			{
				$BookID=$value['BookID'];
			}
			$sql = "INSERT INTO chapter (`ChapterName`,`BookID`) VALUES ('$newChapterName','$BookID')";
			$conn->query($sql);
			//new chapter insert holo


			$sql="SELECT * from chapter where ChapterName='$newChapterName'";
	 		$result = $conn->query($sql);
	 		foreach($result as $value)
			{
				$ChapterID=$value['ChapterID'];
			}

			$sql = "INSERT INTO article (`ArticleName`,`Description`,`ChapterID`,`UserID`,`VideoLink`) VALUES ('$articleName','$articleDescription','$ChapterID','$UserID','$articleVideoLink')";
			$conn->query($sql);
			
		}
		else
		{

			if($book ==="0" && $newBookName!=="")
			{
				//subject ase but book new..so book,chapter insert korte hobe
				$SubjectID=$subject;
				$sql = "INSERT INTO book (`BookName`,`SubjectID`) VALUES ('$newBookName','$SubjectID')";
				$conn->query($sql);

				$sql="SELECT * from book where BookName='$newBookName'";
		 		$result = $conn->query($sql);
		 		foreach($result as $value)
				{
					$BookID=$value['BookID'];
				}
				$sql = "INSERT INTO chapter (`ChapterName`,`BookID`) VALUES ('$newChapterName','$BookID')";
				$conn->query($sql);
				//new chapter insert holo


				$sql="SELECT * from chapter where ChapterName='$newChapterName'";
		 		$result = $conn->query($sql);
		 		foreach($result as $value)
				{
					$ChapterID=$value['ChapterID'];
				}

				$sql = "INSERT INTO article (`ArticleName`,`Description`,`ChapterID`,`UserID`,`VideoLink`) VALUES ('$articleName','$articleDescription','$ChapterID','$UserID','$articleVideoLink')";
				$conn->query($sql);
			}
			else
			{

				$SubjectID=$subject;
				$BookID=$book;
				if($chapter ==="0" && $newChapterName!=="")
				{
					//subject,book ase...so chapter create korte hobe
					$sql = "INSERT INTO chapter (`ChapterName`,`BookID`) VALUES ('$newChapterName','$BookID')";
					$conn->query($sql);
					//new chapter insert hobe


					$sql="SELECT * from chapter where ChapterName='$newChapterName'";
			 		$result = $conn->query($sql);
			 		foreach($result as $value)
					{
						$ChapterID=$value['ChapterID'];
					}

					$sql = "INSERT INTO article (`ArticleName`,`Description`,`ChapterID`,`UserID`,`VideoLink`) VALUES ('$articleName','$articleDescription','$ChapterID','$UserID','$articleVideoLink')";
					$conn->query($sql);

				}
				else
				{
					$ChapterID=$chapter;
					$sql = "INSERT INTO article (`ArticleName`,`Description`,`ChapterID`,`UserID`,`VideoLink`) VALUES ('$articleName','$articleDescription','$ChapterID','$UserID','$articleVideoLink')";
					$conn->query($sql);
				}
			}

		}

		header("Location: view_article.php");
	}

?>