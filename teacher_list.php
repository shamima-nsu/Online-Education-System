<html>
<head>
	<title>Teacher List |UGE</title>
	<link rel="stylesheet" type="text/css" href="CSS/list.css"/>
</head>
<body>
	<?php 
		//session_start();
		include 'connect_db.php';
		include_once "includes/header.php";

	    if(isset($_SESSION['username']))
	    {
		$us=$_SESSION['username'];
		

		$sql="SELECT * FROM user WHERE UserName='$us'";
		$result= $conn->query($sql);
		$uri=-1;
		foreach ($result as $value) 
		{
			$uri=$value['UserRoleID'];

		}
		
		if( intval($uri)>=3)
		{
			$count=0;
			$UserID=array();
			$UserName=array();
			$name=array();
			$UserRoleID=array();
			$sql="SELECT * from user where UserRoleID=2";
			$result=$conn->query($sql);

			foreach ($result as $value) 
			{
				$UserID[$count]=$value['UserID'];
				$UserName[$count]=$value['UserName'];
				$UserRoleID[$count]=$value['UserRoleID'];
				$name[$count]=$value['Name'];
				$count++;
			}
			echo "<div class=\"form_title\"> All Teachers </div><br><br><br>";
			echo "<div class= \"table\">";
			echo "<table border=\"2\">
						<thead>
							<tr>
								<th>User Name </th>
								<th>Name</th>
								<th>Change User Role</th>
								<th>User Role Change Status</th>
							</tr>
						</thead>
						<tbody>";

			for ($i=0; $i <$count ; $i++) 
			{ 
				
			
				echo "<tr>
						<td>".$UserName[$i]."</td>
						<td>".$name[$i]."</td>
						<td>
							<select id=\"userRoleSelect$UserID[$i]\">
		 						<option value=1>Student</option>
		 						<option value=2>Teacher</option>
		 						<option value=3>Admin</option>
		 						<option value=4>Remove</option>

							</select>
							<input type=\"button\" value=\"Change\" name=\"$UserID[$i]\" id=\"change$UserID[$i]\">

						</td>
						<td><div id=\"$UserID[$i]\"></div></td>
					</tr>";
			}
			echo "</tbody></table>";
			echo "</div>";


		}
		else
			{
				echo "YOU DON'T HAVE ACCESS";
			}
	}
		

	 ?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	 	$(document).ready(function(){
	 		
			temp='';
			
			$("input").click(function(){
				option='';
	 			optionText='';
				userId=$(this).prop("name");
				//alert(userId);
				
				option=$("#userRoleSelect"+userId).val();

				if(option==="1")
					optionText="Student";
				else if(option==="2")
					optionText="Teacher";
				else if(option==="3")
					optionText="Admin";
				else if(option==="4")
					optionText="Remove";
				//alert(option);
				//alert(optionText);
				
				
				
				$.ajax({
					url: "ajax_student_list.php",
					type: "POST",
					async:false,
					data: {'UID':userId,'URI': option,'status':optionText},
					success: function(result)
					{
			
						temp=result;
						//alert(temp);
						if(temp==="1")
						{
								
							$("#"+userId).html("User Role Changed to "+optionText);

						}

						else
						{
							$("#"+userId).html("User Has been Removed "+optionText);
						}
						
					}
				});
			});
		});

	</script>
</body>
</html>