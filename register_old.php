<html>
<head>
	<title>Register |UGE</title>
	<link href="CSS/register.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="content-type" content="text/html" />
    <link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
    <link href="CSS/header.css" rel="stylesheet" type="text/css" />
    

	<script type="text/javascript">
		function validateForm()
		{
			
			var name=document.getElementById("name").value;
			var userName=document.getElementById("userName").value;
			var email=document.getElementById("email").value;
			var alternativeEmail=document.getElementById("alternativeEmail").value;
			var password=document.getElementById("password").value;
			var confirmPassword=document.getElementById("confirmPassword").value;
			var secretQuestion=document.getElementById("secretQuestion").value;
			var secretAnswer=document.getElementById("secretAnswer").value;
			var contactNo=document.getElementById("contactNo").value;
			var alternativeContactNo=document.getElementById("alternativeContactNo").value;
			var institution=document.getElementById("institution").value;
			var departmentName=document.getElementById("departmentName").value;
			var nationality=document.getElementById("nationality").value;
			var profession=document.getElementById("profession").value;
			//alert(alternativeEmail);
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

				//alert("Required");
				if(Required(name))
				{
					//alert("name");
					document.getElementById('nameInner').innerHTML = '* Name Required';
				}
				if(Required(userName))
				{
					//alert("name");
					document.getElementById('userNameInner').innerHTML = '* User Name Required';
				}
				//check duplicate username here
				/*
				else if(!Required(userName))
				{
					
				}*/

				if(Required(email))
				{
					document.getElementById('emailInner').innerHTML = '* Email Required';
				}
				else if(!emailValidation(email))
				{
					document.getElementById('emailInner').innerHTML = '* Wrong Email Format';
				}
				if(Required(alternativeEmail)===false)
				{
					if(!emailValidation(alternativeEmail))
					{
						document.getElementById('alternativeEmailInner').innerHTML = '* Wrong Email Format';
					}
				}
				
				if(Required(password))
				{
					document.getElementById('passwordInner').innerHTML = '* Password Required';
				}
				if(Required(confirmPassword))
				{
					document.getElementById('confirmPasswordInner').innerHTML = '* Confirm Password Required';
				}
				else if(password!==confirmPassword)
				{
					document.getElementById('confirmPasswordInner').innerHTML = '* Password & Confirm Password didn\'t match';
				}
				if(Required(secretAnswer))
				{
					document.getElementById('secretQuestionInner').innerHTML = '* Secret Question Required';
				}
				if(Required(secretAnswer))
				{
					document.getElementById('secretAnswerInner').innerHTML = '* Secret Answer Required';
				}
				if(Required(contactNo))
				{
					document.getElementById('contactNoInner').innerHTML = '* Contact Number Required';
				}
				if(Required(institution))
				{
					document.getElementById('institutionInner').innerHTML = '* Institution Required';
				}
				if(Required(departmentName))
				{
					document.getElementById('departmentNameInner').innerHTML = '* Department Name Required';
				}
				if(Required(nationality))
				{
					document.getElementById('nationalityInner').innerHTML = '* Nationality Required';
				}
				if(Required(profession))
				{
					document.getElementById('professionInner').innerHTML = '* Profession Required';
				}

				return false;

			}
			//check username available or not
			/*if()
			{

			}*/

			if(Required(alternativeEmail)===false)
			{
				//alert("hello");
				if(emailValidation(alternativeEmail))
				{
					document.getElementById('alternativeEmailInner').innerHTML = '* Wrong Email Format';
				}
			}
			return true;

		}
		/*function emailValidation(email) 
		{

		    //var email = document.getElementById('email');
		    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		    if (!filter.test(email.value)) 
		    {
			    //alert('Please provide a valid email address');
			    return true;
 			}
 			return false;
		}*/
		


		function emailValidation(str) {

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
	</script>
	<style type="text/css">
		#nameInner,#userNameInner , #passwordInner, #confirmPasswordInner,#emailInner,#alternativeEmailInner,
		#secretQuestionInner,#secretAnswerInner,#contactNo,#contactNoInner,#institutionInner,#departmentNameInner,
		#nationalityInner,#professionInner
		{
			display: inline-block;
			color: red;
		}
	</style>

</head>
<?php
//include_once "includes/header.php";
?>
<body>
	<div id="login_form_container">
	
	<form name="logInForm" class="form_body" onsubmit="return validateForm()" method="POST" action="register_action.php"enctype="multipart/form-data">
	<div>
		<div id="left_box">
			<b class="text_style"> Name : </b><br />
			<input type="text" name="name" id="name" class="textbox"/><div id="nameInner"></div><br />
			<br><b> User Name : </b><br />
			<input type="text" name="userName" id="userName" class="textbox"/><div id="userNameInner"></div><br />
			<br><b> Password : </b><br />
			<input type="password" name="password" id="password" class="textbox"/><div id="passwordInner"></div><br />
			<br><b> Confirm Password : </b><br />
			<input type="password" name="confirmPassword" id="confirmPassword" class="textbox"/><div id="confirmPasswordInner"></div><br />
			<br><b> E-mail Address : </b><br />
			<input type="text" name="email" id="email" class="textbox"/><div id="emailInner"></div><br />
			<br><b> Alternative Email : </b><br />
			<input type="text" name="alternativeEmail" id="alternativeEmail" class="textbox"/><div id="alternativeEmailInner"></div><br />
			<br><b>Nationality : </b><br />
			<input type="text" class="textbox" name="nationality" id="nationality"/><div id="nationalityInner"></div><br />
			<br><b class="text_style"> Date of Birth : </b><br /> 
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
		    <br><b> Secret Answer : </b><br />
		    <input type="text" name="secretAnswer" id="secretAnswer" class="textbox"/><div id="secretAnswerInner"></div><br />
			<br><b>Contact No : </b><br />
			<input type="text" name="contactNo" id="contactNo" class="textbox"/><div id="contactNoInner"></div><br />
			<br><b>Alternative Contact No : </b><br />
			<input type="text" name="alternativeContactNo" id="alternativeContactNo" class="textbox"/><div id="alternativeContactNoInner"></div><br />
		    <b>Institution : </b><br />
		    <input type="text" name="institution" id="institution" class="textbox"/><div id="institutionInner"></div><br />
			<br><b>Department Name : </b><br />
			<input type="text" name="departmentName" id="departmentName" class="textbox"/><div id="departmentNameInner"></div><br />
			<br><b>Profession : </b><br />
			<input type="text" name="profession" id="profession" class="textbox"/><div id="professionInner"></div><br />
			<br><b>Picture : </b><br />
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
</body>
</html>