<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Admin users can use this page to edit user information (not password).
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
include "include/nav.php";
//Verifies user is admin and logged in.
$Admin_Process = new Admin_Process;
$Admin_Process->check_status($_SERVER['SCRIPT_NAME']);
$edit_user = $Admin_Process->edit_user($con,$_POST, $_POST['edit']);
$row = $Admin_Process->edit_request($con,$_POST['edit']);
// Inserts Navigation Bar

?>
<title><?php echo Site_Name; ?> | Admin | Edit User Details</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<div align="center">
<div style="width:200px;">
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?login=".$_GET['login']; ?>">
<h1>Edit User Details: <?php echo $_GET['login']; ?></h1>
<div class="red"><?php  echo $edit_user; ?></div>
<div class="label">First Name :</div>
<input name="first_name" type="text" class="field" id="first_name2" value="<?php echo $row['first_name']; ?>"/>
<div class="label">Last Name :</div>
<input name="last_name" type="text" class="field" id="last_name" value="<?php echo $row['last_name']; ?>" />
<div class="label">Email Address :</div>
<input name="email_address" type="text" class="field" id="email_address" value="<?php echo $row['email_address']; ?>" />
<div class="label">Information  </div>
<input name="info" type="text" class="field" id="info" value="<?php echo $row['info']; ?>"/>
<div class="label">Username :</div>
<input name="username" type="text" class="field" id="username" value="<?php echo $row['username']; ?>" />
<div >
<input name="login" type="hidden" id="login" value="<?php echo $row['login']; ?>" />
<input name="edit" type="submit"  value="Save Changes" />
</div>
</form>
</div>
</body>
</html>