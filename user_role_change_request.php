<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	include 'connect_db.php';
		session_start();

		$username= $_SESSION['username'];
		$sql_id= "SELECT * from user where UserName= '$username';";
		$result= $conn->query($sql_id);

		foreach($result as $value)
		{
			$UserID= $value['UserID'];
		}
		//echo $UserID;
		echo "<input type=\"hidden\" name=\"hiddenUserID\" value='$UserID' id=\"hiddenUserID\">"
	 ?>

	<p>Do You want to be a teacher?</p>
	<input type='button' value='Yes' id='btn'><div id="btnInner"></div>
	<script src="js/jquery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			


			$("#btn").click(function(){
				var temp;
				UserID=$("#hiddenUserID").val();
				currentValue=$("#btn").val();
				//alert(currentValue);
				
				$.ajax({
					url: "ajax_user_role_change_request.php",
					type: "POST",
					async:false,
					data: {'UID':UserID,'btnValue': currentValue},
					success: function(result)
					{
			
						temp=result;
					}
				});
				//alert(temp);
				if(temp==="1")
				{
					
					$("#btn").val('Cancel');
					str="You Have Already send request."
					$("#btnInner").html(str);
				}
				if(temp==="2")
				{
					$("#btn").val('Yes');
					str="You Request has been canceled"
					$("#btnInner").html(str);
				}
				if(temp==="0")
				{
					$("#btn").val('Cancel');
					str="You request have been sent."
					$("#btnInner").html(str);
				}
			});
		});


	</script>
</body>
</html>