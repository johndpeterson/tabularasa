<?php
/*
Framework Name: Tabula Rasa 
Developed for: Pitts Theology Library, 2012
Filename:	index.php
Author:		John Peterson
Description:
This file is a hybrid report and login form.  Some sections are set with conditional variables based on the needs of our circulation department. 
*/
//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
//Checks if user is logged in.
$exclude = explode(' ',$Table_Process->create_exclude_statement($con,$Table_Process));
$Login_Process = new Login_Process;$Login_Process->check_status($_SERVER['SCRIPT_NAME']);$Table_Process = new Table_Process; 
$Login = $Login_Process->log_in($con,$_POST['user'], $_POST['pass'], $_POST['page'], $_POST['submit']); 
$New = $Login_Process->Register($con,$_POST, $_POST['process']);
	
?>
<!-- Site_Name is registered in constants.php and is used in the title tag of every page -->

<!-- Login Form -->
<?php
//Variables needed for conditional processing
//Rendered Code Starts Here.
if(!$con)
{print"<title>".Site_Name." | Welcome</title><body>";
print"<div style='width:600px;'>Welcome to Tabula Rasa. Here are a few things you will need to know as you configure the system:<br /><br />
You will first need a server running PHP 5.5 or above, preferably PHP 7.  You will need a server running MySQL.  Instructions on how to install MySQL can be found here: <a href='http://dev.mysql.com/doc/refman/5.6/en/installing.html'>Installing and Upgrading MySQL</a>.<br/>
Once you have MySQL up and running, there is a database schema in the include folder of this directory with a .sql extension.  Importing this file will set up everything needed for this system to run.<br />
<br />
Once you create the database, you will need to tell the system where to find it by opening /include/constants.php and supplying the information requested. Constants.php also contains variables for naming your system.<br />
Once the system knows where to find the database, this documentation will only be viewable when editing the index.php file. For more detailed information, please open README.md.<br /><br />
Tabula Rasa is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.<br /><br />

Tabula Rasa is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.<br /><br />

You should have received a copy of the GNU General Public License
along with Tabula Rasa.  If not, see <http://www.gnu.org/licenses/>.<br />
<br /><br />
<br /></div>";}

if($con)
{$queryusertable="SELECT * FROM `".DBTBLE."`;";$queryuser=$con->query($queryusertable);$queryusernum=$queryuser->rowCount();
if ($queryusernum<1){print"
<div align='center'><div style='width:200px;'><form action='".$_SERVER['PHP_SELF']."' method='post'><br /><br /><h1>Create Admin User</h1>If you are seeing this screen, your database connection is working.<br />Use the Admin User to configure your system. Once the first user is created, this screen will become a login page.<br /><div class='red'><?php  print $New; ?></div><div class='label'>First Name:</div><input name='first_name' type='text' class='field' value='".$_POST['first_name']."' /><div class='label'>Last Name:</div><input name='last_name' type='text' class='field' value='".$_POST['last_name']."' /><div class='label'>Email Address:</div><input name='email_address' type='text' class='field' value='".$_POST['email_address']."' /><div class='label'>Information:</div><input name='info' type='text' class='field' value='".$_POST['info']."' /><br /><div class='label'>Password:</div><input name='pass1' type='password' class='field'/><div class='label'>Repeat Password:</div><input name='pass2' type='password' class='field'/><br /><div class='label'>Login:</div><input name='login' type='text' class='field' value='".$_POST['login']."' /><div class='right'><input name='process' type='submit' id='process' value='Register'/></div></form></div></div>";}
else
{if ($queryusernum>0){print"<title>".Site_Name." | Login</title><body onload='document.loginform.user.focus()'>";
	print"<form method='post' action='".$_SERVER['PHP_SELF']."' name='loginform'><table ><tr><td >Login:</td><td><input name='user' type='text' id='user'/></td></tr><tr><td>Password:</td><td><input name='pass' type='password'  id='pass' value='' /></td></tr><input name='page' type='hidden' value='".$_GET['page'] .  "' /><tr><td></td><td><input name='submit' type='submit' class='button' value='Log In' /></td></tr></form><tr><td colspan=2><a href='forgotpassword.php'>Password Recovery</a> | <a href='register.php'>Sign Up</a></td></tr></table>";
	print"<br />";
print"<div class='report'>";
$Table_Process->datatabletoday($con,$Table_Process,$tablename,$exclude);
}}}
	

?>
</body></html>