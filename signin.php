<html>

<head>
<link href="CSS/signin.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="content-type" content="text/html" />
<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'/>
<link href="CSS/header.css" rel="stylesheet" type="text/css" />
    
<title>UGE | Sign in</title>
</head>
<?php 
include_once "includes/header.php";
?>


<br /><br /><br />
<div id="signin">
  <div id="signin_form">

  <div id="form_title">Welcome Back !! </div>
  <form action="signin_action.php" method="post">
  <br /><br /><b>Username</b><br />
  <input type="text" id="text_boxes" name="username"/><br /><br />
  <b>Password</b><br />
  <input type="password" id="text_boxes" name="password"/><br /><br />
  <input type="checkbox"/> Remember me<br /><br />
  <input type="submit" value="Sign in" id="submit_button"/>
  <a href="index.php" id="cancel_button">Cancel</a><br /><br />
  <em>No account?? Sign up <a href="register.php">here</a></em><br /><br />
  <br /><br />
  
  </form>
    </div>
</div>

<div id="blank_space"></div>
<?php
include_once "includes/footer.php";
?>

</html>