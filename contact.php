<html>
<head>
<title>Contact US</title>
<link href="CSS/contact.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="content-type" content="text/html" />
<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
<link href="CSS/header.css" rel="stylesheet" type="text/css" />
    
</head>


<?php
include_once "includes/header.php";
?>
<br /><br /><br />
<div id="contact_form">
<h2><b id="form_title"> Contact us </b></h2><br /><br />

<form method="post" action="contact_us_action.php" id="con">
<b id="text_title">Name: <br /></b><input type="text" name= "name" required="required"/><br /><br />
<b id="text_title">E-mail Address: <br /></b><input id="textboxes" type="email" name="email" required="required"/><br /><br />

<b id="text_title">Your Query <br /></b><input type="text" name= "query" id="textbox1"/><br /><br /><br />

<input type="submit" id="submit_button" value="Submit"/><br /><br />
</form>
</div>



</body>
<div id="blank_space"></div>
</html>

<?php 
include_once "includes/footer.php";
?>