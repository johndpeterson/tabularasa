<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Admin users can use this page to delete users.
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
include "include/nav.php";

//Verifies user is admin and logged in.
$Admin_Process = new Admin_Process;
$Admin_Process->check_status($_SERVER['SCRIPT_NAME']);
$delete = $Admin_Process->delete_user($con,$_POST, $_POST['delete']);
// Inserts Navigation Bar
?>
<title><?php echo Site_Name; ?> | Admin | Delete User</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<div align="center">
<div style="width:200px;">
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?login=".$_GET['login']; ?>">
<b>Delete User : <?php echo $_GET['login']; ?></b>
<div class="red"><?php echo $delete; ?></div>
<div class="label">Yes <input name="check" type="radio" value="yes" /> No <input name="check" type="radio" value="no" />
<div >
<input name="login" type="hidden" class="textfield" id="textfield" value="<?php echo $_GET['login']; ?> " />
<input name="delete" type="submit" class="textfield" id="delete" value="Continue" />
</div>
</form>
</div>
</body>
</html>