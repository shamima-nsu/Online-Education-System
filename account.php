<head>
	<link rel="stylesheet" type="text/css" href="CSS/account.css"/>
</head>

<body>

	<?php

	include_once "includes/header.php";
	include_once "connect_db.php";

	//session_start();

	if(isset($_SESSION['username']))
	{


		$username= $_SESSION['username'];

		$s= "SELECT * from user where UserName= '$username';";
		$picture="";

		$r= $conn->query($s);
		foreach($r as $v)
		{
			$UserID= $v['UserID'];
			$role= $v['UserRoleID'];
			$username=$v['UserName'];
			$name=$v['Name'];
			$email= $v['Email'];
			$alterEmail= $v['AlternativeEmail'];
			$contact= $v['ContactNo'];
			$alterContact= $v['AlternativeContactNo'];
			$ins= $v['Institution'];
			$dept= $v['DepartmentName'];
			$prof= $v['Profession'];
			$nationality= $v['Nationality'];
			$pic= $v['Picture'];
			//echo $pic;

		}

		$default_pic= "upload/default.jpg";

		if($pic=="upload/" ||$pic==null || $pic==="")
		{
			$picture= $default_pic;
		}
		else
		{
			$picture=$pic;
		}

	

		echo "<div class=\"form_title\"> My Profile Info </div>";

		
		echo "<br><br><br><div class=\"my_info\">";
		echo "<img src=\"$picture\" style=\"width: 100px; height: 100px; float: right; margin-left: 50px;\"/><br><br><br>";
			
			echo "<br><br><br>Name : ".$name."<br><br>Email Address : ".$email."<br><br>Alternative Email Address : ".$alterEmail."<br><br>Contact No. : ".$contact."<br><br>";
			echo "Alternative Contact No. : ".$alterContact."<br><br>Nationality : ".$nationality."<br><br>Institution : ".$ins."<br><br>Department Name : ".$dept."<br><br>Profession : ".$prof."<br><br><br>";

			echo "<br><br><form action=\"edit_profile.php\" method=\"post\">
				  <input type=\"hidden\" name=\"id\" value=\"$UserID\"/>
				  <input type=\"hidden\" name=\"name\" value=\"$name\"/>
				  <input type=\"hidden\" name=\"email\" value=\"$email\"/>
				  <input type=\"hidden\" name=\"altEmail\" value=\"$alterEmail\"/>
				  <input type=\"hidden\" name=\"con\" value=\"$contact\"/>
				  <input type=\"hidden\" name=\"altCon\" value=\"$alterContact\"/>
				  <input type=\"hidden\" name=\"nationality\" value=\"$nationality\"/>
				  <input type=\"hidden\" name=\"institution\" value=\"$ins\"/>
				  <input type=\"hidden\" name=\"profession\" value=\"$prof\"/>
				  <input type=\"hidden\" name=\"dept\" value=\"$dept\"/>
				  <input type=\"hidden\" name=\"pic\" value=\"$pic\"/>
				  

				  <input type=\"submit\" class= \"style_submit_button\" value=\"Edit My Profile\"></form>";
		echo "</div>";

		
		echo "<div class=\"actions_buttons\"><br>";


		if($role==2)
		{
			echo "<br><br><br><br><br><form action= \"view_article.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View my Articles\"/></form><br>";
			echo "<form action= \"view_wishlist.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View my Wishlist\"/></form><br>";
			echo "<form action= \"create.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"Create Article\"/></form><br>";
		  	echo "<form action= \"student_list.php\" method=\"post\">
		  	
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View Pending Requests\"/></form><br>";
	
		}

		else if($role==1)
		{
			
			echo "<br><br><br><br><br><form action= \"view_wishlist.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View my Wishlist\"/></form><br>";
		

		  	echo "<form action= \"user_role_change_request.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"Request for Teaching Role\"/></form><br>";
		}

		else if($role==3)
		{
			echo "<form action= \"view_article.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View my Articles\"/></form><br>";
			echo "<form action= \"create.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"Create Article\"/></form><br>";
		  	echo "<form action= \"view_wishlist.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View my Wishlist\"/></form><br>";
		  	echo "<form action= \"student_list.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View Students\"/></form><br>";
		  	echo "<form action= \"teacher_list.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View Teachers\"/></form><br>";
		  	echo "<form action= \"all_list.php\" method=\"post\">
		  	<input type=\"submit\" class=\"style_action_buttons\" value=\"View All Users\"/></form><br>";
		}

		echo "</div>";
}
	
	?>

	<br><br>
	<?php
	//include_once "includes/footer.php";
	?>
</body>