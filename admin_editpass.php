<?php
/*
Tabula Rasa was originally developed as a student productivity tracker 
for use by the Public Services Department at Pitts Theology Library at 
Emory University, Atlanta, Georgia, USA 
by John Peterson http://github.com/johndpeterson/tabularasa

Tabula Rasa is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Tabula Rasa is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Tabula Rasa.  If not, see <http://www.gnu.org/licenses/>.
*/
//Do not remove - essential to login system
include_once 'include/processes.php';
include "include/nav.php";

//Verifies user is admin and logged in.
$Admin_Process = new Admin_Process;
$Admin_Process->check_status($_SERVER['SCRIPT_NAME']);
$editpass = $Admin_Process->edit_pass($con,$_POST, $_POST['editpass']);
// Inserts Navigation Bar
?>
<title><?php echo Site_Name; ?> | Admin | Edit Password</title>
<link href="include/style.css" rel="stylesheet" type="text/css">
<body>
<div align="center">
<div style="width:200px;">
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?login=".$_GET['login']; ?>">
<h1>Edit Password : <?php echo $_GET['login']; ?></h1>
<div class="red"><?php  echo $editpass; ?></div>
<div class="label">New Password :</div>
<input name="pass1" type="password" class="field" />
<div class="label">Confirm New :</div>
<input name="pass2" type="password" class="field" />
<div >
<input name="login" type="hidden" id="login" value="<?php echo $_GET['login']; ?>" />
<input name="editpass" type="submit" class="textfield" value="Save Changes" />
</div>
</form>
</div>
</body>
</html>