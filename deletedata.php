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
//calls configuration file - do not remove this line.
include_once 'include/processes.php';
$Login_Process = new Login_Process;
$Login_Process->check_status($_SERVER['SCRIPT_NAME']); 
//May not be necessary but system works better with it active.
// Inserts Navigation Bar
include "include/nav.php";
// Sets Username as variable for SQL input.
$who=$_REQUEST["name"];
// Conditional Statements start here.  If values are defined, SQL input is sent.  If SQL input works, message prints.  If no input, page is blank.
if((($_REQUEST['delcheckbox'])))
{$deltaskname = $_REQUEST['deltaskname']; 
$delyear = $_REQUEST['delyear']; $delmonth = $_REQUEST['delmonth']; $deldate = $_REQUEST['deldate']; $delhour = $_REQUEST['delhour']; $delminute = $_REQUEST['delminute']; $delsecond = $_REQUEST['delsecond']; $deldatetime = "$delyear-$delmonth-$deldate $delhour:$delminute:$delsecond"; $delPerson = $_REQUEST['delPerson']; 
$sqldel = "DELETE FROM $deltaskname WHERE `Submitted` = '$deldatetime' and `Person` = '$delPerson'; " ;
$con->query($sqldel); print("Successful Deleted Data Entry in <b>".$deltaskname."</b>.<br>");}
//End of Report.  Line below closes the database connection.
 ?>
<!-- Below is the barebones needed for an html page.  Output will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?> | Admin Data</title></head><body><?php include "include/footer.php" ?></body></html>