<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Reset Password if Known
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
//Makes Sure User is Logged In
$Login_Process = new Login_Process;
$Login_Process->check_status($_SERVER['SCRIPT_NAME']);
$Edit = $Login_Process->edit_password($con,$_POST, $_POST['process']);
?>
<title><?php print Site_Name; ?> | Edit Password</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<div align="center" style="width:200px;">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<div><a href="form.php">Back to Form</a></div>
<h1>Change Password</h1>
<div class="red"><?php print $Edit; ?></div>
<div class="label">Current Password:</div>
<input name="pass" type="password" class="field" />
<div class="label">New Password:</div>
<input name="pass1" type="password" class="field" />
<div class="label">Confirm New Password:</div>
<input name="pass2" type="password" class="field"/>
<div >
<input name="login" type="hidden" value="<?php print $_SESSION['login']; ?>" size="50" />
<input name="process" type="submit" class="textfield" id="process" value="Save Changes"/>
</div>
</form>
</div>
</body>
</html>