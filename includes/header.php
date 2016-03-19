<head>
	<link rel="stylesheet" type="text/css" href="CSS/Reset.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/header.css"/>
</head>

<body>

	<?php

	session_start();
	if(isset($_SESSION['username'])){?>
		<div id="website_name">

	        <span id="title">UGE</span>
	        <span id="sub_title">University Grade Education</span>

	    </div>

		<div id="top-bar-out">
	    
	    	<ul>
	    		<li><a href="index.php">HOME</a></li>
	    		<li><a href="subject.php">SUBJECTS</a></li>
	    		<li><a href="evaluation.php">EVALUATION</a></li>
	    		<li><a href="#">FORUM</a></li>
	    		<li><a href="contact.php">CONTACT US</a></li>
	    		<li><a href="account.php">MY PROFILE</a></li>
	    		<li class="Right_element"><?php echo $_SESSION['username'];?><a href="sign_out_action.php"> | Sign Out</a></li>
	    	</ul>
	    </div>
	    <?php
	}
	else
	{?>

		<div id="website_name">
	        <span id="title">UGE</span>
	        <span id="sub_title">University Grade Education</span>

	    </div>

		<div id="top-bar-out">
	    
	    	<ul>
	    		<li><a href="index.php">HOME</a></li>
	    		<li><a href="subject.php">SUBJECTS</a></li>
	    		<li><a href="#">EVALUATION</a></li>
	    		<li><a href="forum.php">FORUM</a></li>
	    		<li><a href="contact.php">CONTACT US</a></li>
	    		<li class="Right_element"><a href="signin.php">Sign In</a></li>
	    	</ul>
	    </div>

	    


	<?php
}?>
    		


<br><br><br>
