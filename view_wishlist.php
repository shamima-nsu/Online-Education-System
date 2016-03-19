<html>
<head>
	<title>My Wishlist</title>
	<link rel="stylesheet" type="text/css" href="CSS/list.css"/>
</head>
<body>
	<?php
	include 'connect_db.php';
	include_once "includes/header.php";
	//session_start(); 
	//echo $_SESSION['username'];
	if(isset($_SESSION['username']))
	{
		$article_id=array();
		$article_name=array();
		$count=0;
		$u= $_SESSION['username'];
		//echo $u;

		$sql= "SELECT * from user where UserName= '$u'";

		$result= $conn->query($sql);

		foreach($result as $value)
		{
			$id= $value['UserID'];
		}

		$sql2= "SELECT * from wishlist where UserID= $id";

		$result2= $conn->query($sql2);

		foreach($result2 as $value2)
		{
			$article_id[$count]= $value2['ArticleID'];
			$count++;
			
		}
		for ($i=0; $i <$count ; $i++) { 
			# code...
			$sql= "SELECT * from article where ArticleID= $article_id[$i]";	
			$result= $conn->query($sql);
			foreach($result as $value)
			{
				$article_name[$i]= $value['ArticleName'];	
			}
		}
		
		//echo $article_name[1];
		//echo $count;
		echo "<div class=\"form_title\"> My Wishlist </div><br><br><br>";
		echo "<div class= \"table3\">";
		echo "<table border=\"2\">
					<thead>
						<tr>
							<th>Article Name </th>
							<th>Cancel Wish List</th>
						</tr>
					</thead>
					<tbody>";

		for ($i=0; $i <$count ; $i++) 
		{ 
			# code...
		
			echo "<tr>
					<td><a href=\"article_details.php?ArticleID=".$article_id[$i]."\" >".$article_name[$i]."</a></td>
					<td>
						<input type=\"button\" value=\"Cancel\" name=\"$id\" id=\"cancel$article_id[$i]\">
						
						<div id=\"".$article_id[$i]."\"></div>
					</td>
				</tr>";
		}
		echo "</tbody></table>";
		echo "</div>";
	}
?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			temp='';
			$("input").click(function(){

				userId=$(this).prop("name");
				//alert(userId);
				//$("#accept"+id).hide();
				articleId=$(this).attr('id');
				//alert(userId);
				articleId=articleId.charAt(6);
				//alert(articleId);
				$.ajax({
					url: "ajax_cancel_wishlist.php",
					type: "POST",
					async:false,
					data: {'UID':userId,'AID': articleId},
					success: function(result)
					{
			
						temp=result;
						//alert(temp);
						if(temp==="1")
						{
							$("#cancel"+articleId).hide();
							
							$("#"+articleId).html("Canceled!");

						}
						
					}
				});
				
				
			});
			
		});


	</script>
</body>
</html>
