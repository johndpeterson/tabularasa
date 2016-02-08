<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Sends email to user with link to reset password.
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
//Makes Sure User is Logged In
$Login_Process = new Login_Process;
$Check = $Login_Process->Forgot_Password($con,$_GET, $_POST);
$Request = $Login_Process->Request_Password($con,$_POST, $_POST['Request']);
$Reset = $Login_Process->Reset_Password($con,$_POST, $_POST['Reset']);
?>
<title><?php print Site_Name; ?> | Forgot Password</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<?php 
switch($Check) {
	case "<!-- !-->":
?>
<div align="center">
<div style=" width:200px;">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<a href="index.php">Log In</a>
<h1>Reset Password</h1>
<div class="red"><?php  print $Check.$Reset; ?></div>
<div class="label">New Password:</div>
<input name="pass1" type="password" class="field"/>
<div class="label">Confirm New Password:</div>
<input name="pass2" type="password" class="field"/>
<div>
<input name="login" type="hidden" id="login" value="<? print $_GET['login']; ?>" />
<input name="code" type="hidden" id="code" value="<? print $_GET['code']; ?>" />
<input name="Reset" type="submit" value="Reset Password" id="Reset"/>
</div>
</form>
</div></div>
<?php 
		break;
	default:
?>
<div align="center">
<div style=" width:200px;">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
<a style="font-size:20px;" href="index.php">Log In</a><br /><br />
<b><span style="font-size:20px;">Request Password Reset</span></b>
<div class="red"><?php  print $Check.$Request; ?></div>
<div class="label">Email Address:</div>
<input name="email" type="text" class="field" id="email" />
<div class="label"><b>Login:</b></div>
<input name="login" type="text" class="field" id="login" />
<div class="label">
<input name="Request" type="submit" value="Request Reset Email" id="Request"/>        </td>
</div>
</form>
</div></div>
<?php 
}
?>
</body>
</html>