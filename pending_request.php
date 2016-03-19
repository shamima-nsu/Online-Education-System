<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include "connect_db.php";
		$UserID=array();
		$UserName=array();
		$name=array();
		$count=0;
		$count2=0;
		$sql= "SELECT * from changeuserrole";
		$result= $conn->query($sql);
		foreach($result as $value)
		{
			$UserID[$count++]= $value['UserID'];
			
		}
		for ($i=0; $i <$count ; $i++) 
		{ 
			$sql="SELECT * From user Where UserID=$UserID[$i]";
			//echo $sql;
			$result= $conn->query($sql);
			foreach($result as $value)
			{
				$UserName[$count2]= $value['UserName'];
				$name[$count2]= $value['Name'];
				$count2++;				
			}
		}
		echo "<table border=\"2\">
				<thead>
					<tr>
						<th>User Name </th>
						<th>Name </th>
						<th>Aprroval </th>
					</tr>
				</thead>
				<tbody>";
		for ($i=0; $i <sizeof($UserName) ; $i++) 
		{ 
			echo 
			"<tr>
				<td>$UserName[$i]</td>
				<td>$name[$i]</td>
				<td>
					<input type=\"button\" value=\"Accept\" name=\"$UserID[$i]\" id=\"accept$UserID[$i]\"/>
					<input type=\"button\" value=\"Reject\" name=\"$UserID[$i]\" id=\"reject$UserID[$i]\"/>
					<div id=\"$UserID[$i]\"></div>
				</td>
			</tr>";
			
		}
		echo "</tbody></table>";
		
	 ?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			temp='';
			$("input").click(function(){

				id=$(this).prop("name");
				alert(id);
				//$("#accept"+id).hide();
				btnValue=$(this).val();
				$.ajax({
					url: "ajax_pending_request.php",
					type: "POST",
					async:false,
					data: {'UID':id,'btnValue': btnValue},
					success: function(result)
					{
			
						temp=result;
						alert(temp);
						if(temp==="1")
						{
							$("#accept"+id).hide();
							$("#reject"+id).hide();
							$("#"+id).html("Accepted");

						}
						else
						{
							$("#"+id).html("Rejected");
						}
					}
				});
			});
			
			/*$("#accept").click(function(){
				alert($(this).prop("name"));
			});
			$("#reject").click(function(){
				alert($(this).prop("name"));
			});*/




		});


	</script>
</body>
</html>