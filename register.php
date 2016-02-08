<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Registration Page - Account Creation.
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
include "include/nav.php";
// Inserts Navigation Bar
//Makes Sure User is Logged In
$Login_Process = new Login_Process;
$New = $Login_Process->Register($con,$_POST, $_POST['process']);
// Inserts Navigation Bar
?>
<title><?php print Site_Name; ?> | Register</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<div align="center">
<div style=" width:200px;">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<h1>Register</h1>
<div class="red">
<?php  print $New; ?>
</div>
<div class="label">First Name:</div>
<input name="first_name" type="text" class="field" value="<? print $_POST['first_name']; ?>" />
<div class="label">Last Name:</div>
<input name="last_name" type="text" class="field" value="<? print $_POST['last_name']; ?>" />
<div class="label">Email Address:</div>
<input name="email_address" type="text" class="field" value="<? print $_POST['email_address']; ?>" />
<div class="label">Information:</div>
<input name="info" type="text" class="field" value="<? print $_POST['info']; ?>" />
<br /><br />
<div class="label">Password:</div>
<input name="pass1" type="password" class="field"/>
<div class="label">Repeat Password:</div>
<input name="pass2" type="password" class="field"/>
<br /><br />
<div class="label">login:</div>
<input name="login" type="text" class="field" value="<? print $_POST['login']; ?>" />
<div class="right">
  <input name="process" type="submit" id="process" value="Register"/>
</div>
</form>
</div></div>
</body>
</html>