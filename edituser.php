<?
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Change User information (not password)
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
//Makes Sure User is Logged In
$Login_Process = new Login_Process;
$Login_Process->check_status($_SERVER['SCRIPT_NAME']);
$Edit = $Login_Process->edit_details($_POST, $_POST['process']);
?>
<title><?php print Site_Name; ?> | Edit User</title>
<body>
<div style="width:200px;">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<div style="margin-top:-8px; margin-right:-6px;"><a href="form.php">Back to Form</a></div>
<h1>Edit Account Details</h1>
<div class="red"><?php print $Edit; ?></div>
<div class="label">First Name:</div>
<input name="first_name" type="text" class="field" value="<? print $_SESSION['first_name']; ?>" />
<div class="label">Last Name:</div>
<input name="last_name" type="text" class="field" value="<? print $_SESSION['last_name']; ?>" />
<div class="label">Email Address:</div>
<input name="email_address" type="text" class="field" value="<? print $_SESSION['email_address']; ?>" />
<div class="label">Information:</div>
<input name="info" type="text" class="field" value="<? print $_SESSION['info']; ?>"  />
<div>
<input name="login" type="hidden" id="login" value="<? print $_SESSION['login']; ?>" />
<input name="process" type="submit" class="textfield" value="Save Changes" id="process"/></td>
</div>
</form>
</div>
</body>
</html>