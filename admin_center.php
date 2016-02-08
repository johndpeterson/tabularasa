<?php
/*
Login System Modified from code available here:
http://code.google.com/p/php-login-script/
Admin Control Panel.
*/
//Do not remove - essential to login system
include_once "include/processes.php";
//include_once "include/admin_processes.php";
include "include/nav.php";
//If something isn't working, turn this on to see all form data.
#print_r($_POST);
//makes login a usable variable
$login=$_SESSION["login"];
//Verifies user is admin and logged in.
$Login_Process = new Login_Process;
$Login_Process->check_status($_SERVER['SCRIPT_NAME']);
$Table_Process = new Table_Process;
$Admin_Process = new Admin_Process;
$Admin_Process->check_status($_SERVER['SCRIPT_NAME']);
$New = $Admin_Process->Register($con,$_POST, $_POST['add_user']);
$Suspend = $Admin_Process->suspend_user($con,$_POST, $_POST['Suspend']);
$Change = $Admin_Process->update_user($con,$_POST, $_POST['Change']);
$hide_table = $Admin_Process->hide_table($con,$_POST, $_POST['hide_table']);
$delete_table = $Admin_Process->delete_table($con,$_POST, $_POST['delete_table']);
$create_db_table = $Admin_Process->create_db_table($con,$_REQUEST,$Table_Process,$_REQUEST['create_db_table']);
// Inserts Navigation Bar
?>
<title><?php print Site_Name; ?> | Admin | Control Panel</title>
<body>
<div align="center">
<div style="width:900px;">
<div class="red" align="center">
<?php  print $_GET['alert']; ?></div>
<div align="center">
<h1>
<a name="active" id="active"></a>Active Users</h1>
<?php $Admin_Process->active_users_table($con,$Table_Process)  ?>
</div><br />
<div align="center">
<h1> <a name="suspended" id="suspended"></a> Suspended Users </h1>
<?php $Admin_Process->suspended_users_table($con,$Table_Process)  ?>
</div><br>
<?php 
print'
<div align="center">
<h1> <a name="pending" id="pending"></a> Users Awaiting Approval </h1>';
$Admin_Process->pending_users_table($con,$Table_Process);
print'</div><br />';
?>
<form  action="<?php print $_SERVER['PHP_SELF'];?>" method="post" >
<h1>Create Data Set</h1>Create New Data Set. If Start Time is selected without End Time, the request will fail.  All others can be selected independently.
<div class="red"><?php print $create_db_table; ?> </div>
<div class="label">Table Name: <input name="table_name" type="text"> 
Fields: <?php $exclude = explode(' ',$Table_Process->create_exclude_statement($con,$Table_Process));$Admin_Process->list_fieldnames($con,$Table_Process,$exclude) ?>
</div>
<br />
<div>
<input type="hidden" name="create_db_table" value="$create_db_table" /><input name="create_table" type="submit" class="textfield" value="Create Data Set" />
</div>
</form>

<div style="width:600px; margin:0 auto; margin-bottom:20px;">
<div style="width:100px; float:left;">
<a name="add" id="add"></a><br />
<form action="<?php print $_SERVER['PHP_SELF']."#add"; ?>" method="post" >
<h1> Add User</h1>
<div class="red"><?php print $New; ?></div>
<div class="label">First Name:</div>
<input name="first_name" type="text" class="field" value="" />
<br />
<div class="label">Last Name:</div>
<input name="last_name" type="text" class="field" value="" />
<br />
<div class="label">Email Address:</div>
<input name="email_address" type="text" class="field" value="" />
<br />
<div class="label">Information:</div>
<input name="info" type="text" class="field" value="" />
<br /><br /><div class="label">Password:</div>
<input name="pass1" type="password" class="field"/>
<br />
<div class="label">Repeat Password:</div>
<input name="pass2" type="password" class="field"/>
<br /><br /><div class="label">Login:</div>
<input name="login" type="text" class="field" value="" />
<br />
<div class="right">
<input name="add_user" type="submit" id="add_user" value="Add User" />
</div>
</form><br />

</div>
<div style="width:350px; float:right; margin-top:0px;">
<a name="change" id="change"></a><br />
<form action="<?php print $_SERVER['PHP_SELF']."#change"; ?>" method="post" style="">
<h1> Change User Level</h1>Default user level is 1.  5 enables admin access.  <br />4 enables student admin access.
<div class="red"><?php print $Change; ?> </div>
<div class="label">Login Name: <?php $Admin_Process->list_users($con,$Table_Process) ?>
 Login Level: <select name="level" id="level">
                                  <option value="1">1</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
</div>
<br />
<div>
<input name="Change" type="submit" class="textfield" value="Update" />
</div>
</form><br />
<a name="suspend" id="suspend"></a>
<form  action="<?php print $_SERVER['PHP_SELF']."#suspend"; ?>" method="post" >
<h1> Enable/Suspend User</h1>Enable or temporary suspend members.
<div class="red"><?php print $Suspend; ?> </div>
<div class="label">Login Name: <?php $Admin_Process->list_users($con,$Table_Process) ?> Status: <select name="level" id="level">
                                  <option value="live">Live</option>
				  <option value="suspended">Suspended</option>
                                </select>
</div>
<br />
<div>
<input name="Suspend" type="submit" class="textfield" value="Update" />
</div>
</form><br />
<form  action="<?php print $_SERVER['PHP_SELF']."#hidetable"; ?>" method="post" >
<h1> Hide/Show Table</h1>Hide or Show Data Tables. Does not Delete.
<div class="red"><?php print $hide_table; ?> </div>
<div class="label">Table Name: <?php $Admin_Process->list_tables($con,$Admin_Process) ?> 
<br /><br />
Status: <select name="action" id="action">
                                  <option value="show_table">Live</option>
				  <option value="hide_table">Hidden</option>
                                </select>
</div>
<br /><br />
<div>
<input name="hide_table" type="submit" class="textfield" value="Update" />
</div>
</form><br /><br />
<form  action="<?php print $_SERVER['PHP_SELF']."#deletetable"; ?>" method="post" >
<h1> Delete Table</h1>Data cannot be restored if this function is used.
<div class="red"><?php print $delete_table; ?> </div>
<div class="label">Table Name: <?php $Admin_Process->list_tables($con,$Admin_Process) ?> 
<br /><br />Are You Sure You Want to Delete?</div>
<br /><br /><br />
<div>
<input name="delete_table" type="submit" class="textfield" value="Delete" />
</div>
</form>
</div>
</div>
</div>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php include "include/footer.php" ?></body></html>
