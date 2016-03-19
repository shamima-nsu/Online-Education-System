<html>
<head>
	<title>Register |UGE</title>
	<link href="CSS/register.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="content-type" content="text/html" />
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
    <link href="CSS/header.css" rel="stylesheet" type="text/css" />
    
		
	<style type="text/css">
		#nameInner,#userNameInner , #passwordInner, #confirmPasswordInner,#emailInner,#alternativeEmailInner,
		#secretQuestionInner,#secretAnswerInner,#contactNoInner,#institutionInner,#departmentNameInner,
		#nationalityInner,#professionInner
		{
			display: inline-block;
			color: red;
		}
	</style>

</head>
<?php
include_once "includes/header.php";
?>
<body>
	<div id="login_form_container">
	
	<form name="logInForm" class="form_body" onsubmit="return validateForm()" method="POST" action="register_action.php" enctype="multipart/form-data">
	<div>
		<div id="left_box">
			<b class="text_style"> Name : </b><br />
			<input type="text" name="name" id="name" class="textbox"/><div id="nameInner"></div><br />
			<b> User Name : </b><br />
			<input type="text" name="userName" id="userName" class="textbox"/><div id="userNameInner"></div><br />
			<b> Password : </b><br />
			<input type="password" name="password2" id="password2" class="textbox" /><div id="passwordInner"></div><br/>
			<b> Confirm Password : </b><br />
			<input type="password" name="confirmPassword" id="confirmPassword" class="textbox"/><div id="confirmPasswordInner"></div><br />
			<b> E-mail Address : </b><br />
			<input type="text" name="email" id="email" class="textbox"/><div id="emailInner"></div><br />
			<b> Alternative Email : </b><br />
			<input type="text" name="alternativeEmail" id="alternativeEmail" class="textbox"/><div id="alternativeEmailInner"></div><br />

			<b class="text_style"> Date of Birth : </b><br /> 
			<select name="month" id="month">
				<?php $month=0;$day=0 ?>
			    <option value="1" <?PHP if($month==1) echo "selected";?>>January</option>
			    <option value="2" <?PHP if($month==2) echo "selected";?>>February</option>
			    <option value="3" <?PHP if($month==3) echo "selected";?>>March</option>
			    <option value="4" <?PHP if($month==4) echo "selected";?>>April</option>
			    <option value="5" <?PHP if($month==5) echo "selected";?>>May</option>
			    <option value="6" <?PHP if($month==6) echo "selected";?>>June</option>
			    <option value="7" <?PHP if($month==7) echo "selected";?>>July</option>
			    <option value="8" <?PHP if($month==8) echo "selected";?>>August</option>
			    <option value="9" <?PHP if($month==9) echo "selected";?>>September</option>
			    <option value="10" <?PHP if($month==10) echo "selected";?>>October</option>
			    <option value="11" <?PHP if($month==11) echo "selected";?>>November</option>
			    <option value="12" <?PHP if($month==12) echo "selected";?>>December</option>
	    	</select>
		    <select name="day">
			    <?PHP for($i=1; $i<=31; $i++)
			    	echo "<option value='$i'>$i</option>";
			    ?>
		    </select>
	    
		    <select name="year" id="year" >
			    <?PHP 
			    	$year=date("Y");
				    for($i=date("Y")-100; $i<=date("Y"); $i++)
					    echo "<option value='$i' selected>$i</option>";
			    ?>
		    </select><br/><br /> <div id="dateOfBirth"></div>
		</div>
	    <div id="right_box">	    
		    <b> Secret Question : </b><br />
		    <input type="text" class="textbox" name="secretQuestion" id="secretQuestion"/><div id="secretQuestionInner"></div><br />
		    <b> Secret Answer : </b><br />
		    <input type="text" name="secretAnswer" id="secretAnswer" class="textbox"/><div id="secretAnswerInner"></div><br />
		    <b>Contact No : </b><br />
			<input type="text" name="contactNo" id="contactNo" class="textbox"/><div id="contactNoInner"></div><br />
			<b>Alternative Contact No : </b><br />
			<input type="text" name="alternativeContactNo" id="alternativeContactNo" class="textbox"/><div id="alternativeContactNoInner"></div><br />
		    <b>Institution : </b><br />
		    <input type="text" name="institution" id="institution" class="textbox"/><div id="institutionInner"></div><br />
			<b>Department Name : </b><br />
			<input type="text" name="departmentName" id="departmentName" class="textbox"/><div id="departmentNameInner"></div><br />
			<b>Nationality : </b><br />
			<input type="text" class="textbox" name="nationality" id="nationality"/><div id="nationalityInner"></div><br />
			<b>Profession : </b><br />
			<input type="text" name="profession" id="profession" class="textbox"/><div id="professionInner"></div><br />
			<b>Picture : </b><br />
			<input type="file" name="picture" id="picture"/><div id="pictureInner"></div><br />
		</div>
	</div>
		<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>
<div id="blank_space"></div>

		<input type="submit" name="submit" value="SUBMIT" id="submit_button"/>
	</form>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript">
		
		function validateForm()
		{
			var name=$("#name").val();
			var userName=$("#userName").val();
			var email=$("#email").val();
			var alternativeEmail=$("#alternativeEmail").val();
			var password=$("#password2").val();
			var confirmPassword=$("#confirmPassword").val();
			var secretQuestion=$("#secretQuestion").val();
			var secretAnswer=$("#secretAnswer").val();
			var contactNo=$("#contactNo").val();
			var alternativeContactNo=$("#alternativeContactNo").val();
			var institution=$("#institution").val();
			var departmentName=$("#departmentName").val();
			var nationality=$("#nationality").val();
			var profession=$("#profession").val();
			var track=0;//didn't use the track variable anywhere..
			var a="";
			
			if(
				Required(name) ||
				Required(userName)||
				Required(email) ||
				Required(password) ||
				Required(confirmPassword) ||
				Required(secretQuestion) ||
				Required(secretAnswer) ||
				Required(contactNo) ||
				Required(institution) ||
				Required(departmentName) ||
				Required(nationality) ||
				Required(profession)
			  )
			{
				if(Required(name))
				{
					str = '* Name Required';
					$("#nameInner").html(str);
					track=1;
				}
				else
				{
					str = '';
					$("#nameInner").html(str);
				}
				if(Required(userName))
				{
					str = '* User Name Required';
					$("#userNameInner").html(str);
					track=1;
							
				}
				
				else
				{
					str = '';
					$("#userNameInner").html(str);
				}
				if(Required(password))
				{
					//alert(password)
					str =  '* Password Required';
					$("#passwordInner").html(str);
					track=1;
				}
				else
				{
					str =  '';
					$("#passwordInner").html(str);
				}
				if(Required(confirmPassword))
				{
					str = '* Confirm Password Required';
					$("#confirmPasswordInner").html(str);
					track=1;
					
				}
				else if(password!==confirmPassword)
				{
					//alert(password+" "+confirmPassword)
					str =  '* Password & Confirm Password didn\'t match';
					$("#confirmPasswordInner").html(str);
					track=1;
					
				}
				else
				{
					str =  '';
					$("#confirmPasswordInner").html(str);
				}
				if(Required(email))
				{
					str = '* Email Required';
					$("#emailInner").html(str);
					track=1;
				}
				else if(!emailValidation(email))
				{
					str = '* Wrong Email Format';
					$("#emailInner").html(str);
					track=1;
				}
				else
				{
					str = '';
					$("#emailInner").html(str);
				}
				if(Required(alternativeEmail)===false)
				{
					if(emailValidation(alternativeEmail))
					{
						str =  '* Wrong Email Format';
						$("#alternativeEmailInner").html(str);
						track=1;
					}
				}
				else
				{
					str =  '';
					$("#alternativeEmailInner").html(str);
				}
				
				
				if(Required(secretQuestion))
				{
					//alert(secretAnswer)
					str =  '* Secret Question Required';
					$("#secretQuestionInner").html(str);
					track=1;
					
				}
				else
				{
					str =  '';
					$("#secretQuestionInner").html(str);
					
				}
				if(Required(secretAnswer))
				{
					str = '* Secret Answer Required';
					$("#secretAnswerInner").html(str);
					track=1;
					
				}
				else
				{
					str = '';
					$("#secretAnswerInner").html(str);
				}
				if(Required(contactNo))
				{
					str =  '* Contact Number Required';
					$("#contactNoInner").html(str);
					track=1;				
				}
				else
				{
					str =  '';
					$("#contactNoInner").html(str);
				}
				if(Required(institution))
				{
					str = '* Institution Required';
					$("#institutionInner").html(str);
					track=1;
					
				}
				else
				{
					str = '';
					$("#institutionInner").html(str);

				}
				if(Required(departmentName))
				{
					str = '* Department Name Required';
					$("#departmentNameInner").html(str);
					track=1;
					
				}
				else
				{
					str = '';
					$("#departmentNameInner").html(str);

				}
				if(Required(nationality))
				{
					str = '* Nationality Required';
					$("#nationalityInner").html(str);
					track=1;
				}
				else
				{
					str = '';
					$("#nationalityInner").html(str);
				}
				if(Required(profession))
				{
					str = '* Profession Required';
					$("#professionInner").html(str);
					track=1;
				}
				else
				{
					str = '';
					$("#professionInner").html(str);
				}

				if(Required(userName)===false)
				{
					$.ajax({
						url: "ajax_user_name.php",
						type: "POST",
						async:false,
						data: {"value" : userName },
						success: function(result)
						{
							a = result;
							if(result==="1")
							{
								str = '* User Name Already Exists';
								$("#userNameInner").html(str);
							}
						}
					});

					return false;
				}
				return false;
				

			}
			if(password!==confirmPassword ||!Required(userName))
			{
				track=0;
				//alert(password+" "+confirmPassword)
				if(password!==confirmPassword)
				{
					track=10;
					str =  '* Password & Confirm Password didn\'t match';
					$("#confirmPasswordInner").html(str);
				}
				
				
				if(!Required(userName)){
					$.ajax({
							url: "ajax_user_name.php",
							type: "POST",
							async:false,
							data: {"value" : userName },
							success: function(result)
							{
								a = result;
								if(result==="1")
								{
									track=10;
									str = '* User Name Already Exists';
									$("#userNameInner").html(str);
								}
							}
						});
				}
				if(track===10)
					return false;
			}

			return true;
		}

		function Required (value) 
		{
			//alert("a"+value+"a");
			if(value==="" || value ===null)
			{
				//alert("TRUEEEE");
				return true;
			}				
			return false;
		
		}
		/*function emailValidation(str) {

			var at="@"
			var dot="."
			var lat=str.indexOf(at)
			var lstr=str.length
			var ldot=str.indexOf(dot)
			if (str.indexOf(at)==-1){
			   //alert("Invalid E-mail ID 1")
			   return false
			}

			if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
			   //alert("Invalid E-mail ID 2")
			   return false
			}

			if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
			    //alert("Invalid E-mail ID 3")
			    return false
			}

			 if (str.indexOf(at,(lat+1))!=-1){
			    //alert("Invalid E-mail ID 4")
			    return false
			 }

			 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
			    //alert("Invalid E-mail ID 5")
			    return false
			 }

			 if (str.indexOf(dot,(lat+2))==-1){
			    //alert("Invalid E-mail ID 6")
			    return false
			 }
			
			 if (str.indexOf(" ")!=-1){
			    //alert("Invalid E-mail ID 7")
			    return false
			 }

	 		 return true					
		}*/
		function emailValidation(sEmail) {
			var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
			if (filter.test(sEmail)) 
			{
				return true;
			}
			else 
			{
				return false;
			}
		}


	</script>
</body>
</html>