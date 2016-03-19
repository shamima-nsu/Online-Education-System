<?php

include_once "connect_db.php";

$name= $_POST['name'];
$email= $_POST['email'];
$altEmail= $_POST['altEmail'];
$con= $_POST['con'];
$altCon= $_POST['altCon'];
$nationality= $_POST['nationality'];
$ins= $_POST['institution'];
$prof= $_POST['profession'];
$dept= $_POST['dept'];
$id= $_POST['id'];
$new_pic= $_POST['pic'];

echo "<form action=\"update_profile.php\" method=\"post\" enctype=\"multipart/form-data\"/>
	  Name : <input type=\"text\" name=\"new_name\" value=\"$name\"/><br><br>
	  Email Address : <input type=\"text\" name=\"new_email\" value=\"$email\"/><br><br>
	  Alternative Email Address : <input type=\"text\" name=\"new_altEmail\" value=\"$altEmail\"/><br><br>
	  Contact No. : <input type=\"text\" name=\"new_con\" value=\"$con\"/><br><br>
	  Alternative Contact No. : <input type=\"text\" name=\"new_altCon\" value=\"$altCon\"/><br><br>
	  Nationality : <input type=\"text\" name=\"new_nationality\" value=\"$nationality\"/><br><br>
	  Institution : <input type=\"text\" name=\"new_ins\" value=\"$ins\"/><br><br>
	  Profession : <input type=\"text\" name=\"new_prof\" value=\"$prof\"/><br><br>
	  Department Name : <input type=\"text\" name=\"new_dept\" value=\"$dept\"/><br><br><br>
	  Picture: <input type=\"file\" name=\"new_pic\" value=\"$new_pic\"/><br><br><br>
	  <input type=\"hidden\" name=\"id\" value=\"$id\"/>
	  <input type=\"submit\" value=\"Update Profile\"/>
	  </form>"


?>