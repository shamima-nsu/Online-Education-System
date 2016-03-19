
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href= "CSS/Reset.css" rel="stylesheet" type="text/css"/>
<link href= "CSS/header.css" rel="stylesheet" type="text/css"/>
<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/Signin-Dropdown-box-twitter-style/index.html" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
$('.active-links').click(function () {
        if ($('#signin-dropdown').is(":visible")) {
            $('#signin-dropdown').hide()
			$('#session').removeClass('active');
        } else {
            $('#signin-dropdown').show()
			$('#session').addClass('active');
        }
		return false;
    });
	$('#signin-dropdown').click(function(e) {
        e.stopPropagation();
    });
    $(document).click(function() {
        $('#signin-dropdown').hide();
		$('#session').removeClass('active');
    });
});     
</script>
</head>
<body>

	<div id="top-bar-out">
    
    	<ul>
    		<li><a href="index.php">HOME</a></li>
    		<li><a href="subjects.php">COURSES</a></li>
    		<li><a href="#">EVALUATION</a></li>
    		<li><a href="forum.php">FORUM</a></li>
    		<li><a href="contact.php">CONTACT US</a></li>
    		<li>
        <div class="active-links">
            <div id="session">
            <a id="signin-link" href="#">
            <em>Have an account?</em>
            <strong>Sign in</strong>
            </a>
            </div>
            	<div id="signin-dropdown">
        		<form method="post" class="signin" action="#">
                <fieldset class="textbox">
            	<label class="username">
                <span>Username or email</span>
                <input id="username" name="username" value="" type="text" autocomplete="on">
                </label>
                
                <label class="password">
                <span>Password</span>
                <input id="password" name="password" value="" type="password">
                </label>
                </fieldset>
                
                <fieldset class="remb">
                <label class="remember">
                <input type="checkbox" value="1" name="remember_me" />
                <span>Remember me</span>
                </label>
                <button class="submit button" type="button">Sign in</button>
                </fieldset>
                <p>
                <a class="forgot" href="#">Forgot your password</a>
                <br>
                <a class="mobile" href="#">Already using Twitter via SMS?</a>
                </p>
                </form>
         		</div>
        		</div>
        	</li>
        </ul>
               	
    </div>

</body>
</html>
