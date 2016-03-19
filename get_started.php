<?php 
include_once "includes/header.php";
?>
<br /><br /><br />


<div id="signup">
  <div id="signup_form">
      <h1 id="form_title">Create An Account</h1>
      <form>
          <br /><br /><b id="text_title">First Name</b><br />
          <input type="text" id="text_boxes"/><br /><br />
          <b id="text_title">Last Name</b><br />
          <input type="text" id="text_boxes"/><br /><br />
          <b id="text_title">Gender : </b>
          <input type="radio" name="gender" value="male" checked="checked"/> Male &nbsp;
          <input type="radio" name="gender" value="female"/> Female &nbsp; <br /><br />
          <b id="text_title">E-mail Address</b><br />
          <input type="text" id="text_boxes"/><br /><br />
          <b id="text_title">Username</b><br />
          <input type="text" id="text_boxes"/><br /><br />
          <b id="text_title">Password</b><br />
          <input type="password" id="text_boxes"/><br /><br />
          <b id="text_title">Re-type password</b><br />
          <input type="password" id="text_boxes"/><br /><br />
          <button id="submit_button">Sign Up</button>
          <button id="cancel_button">Cancel</button>
          <br /><br />
      
      </form>
    </div>
</div>

<br /><br />
<?php
include_once "includes/footer.php";
?>

