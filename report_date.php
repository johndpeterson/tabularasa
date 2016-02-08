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

This file generates reports for individual days.
*/

//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";

//Sets what is excluded
$exclude = explode(' ',$Table_Process->create_exclude_admin_statement($con,$Table_Process));
// Actual rendered page starts here

if(($_REQUEST['year']) && ($_REQUEST['month']) && ($_REQUEST['date'])){$year=$_REQUEST['year'];$month=$_REQUEST['month'];$date=$_REQUEST['date']; $today="$year-$month-$date";}
if(!($_REQUEST['year']) && !($_REQUEST['month']) && !($_REQUEST['date'])){$today=date("Y-m-d");}
print('<b>Report from '.$today.' for: Circulation</b>');
// Drop Down form to select Year and Month - defaults to current year and month.
print"<br />Select Reporting Date";
print"<form action='".$_SERVER['PHP_SELF']."'><select name='year'><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".date("m")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select><select name='date'><option>".date("d")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,31); foreach ($range as $month) { print"<option value='$month'>$month</option>";} print"</select><input type='submit'></form>"; 

if($_SESSION['user_level'] >= 4)
{print"<br />Select Reporting Date";print"<form action='report_individual.php'><select name='year'><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".date("m")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select><select name='date'><option>".date("d")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,31); foreach ($range as $month) { print"<option value='$month'>$month</option>";} print"</select><select name='login_individual'><option".$login.">".$fullname."</option>"; $userpull = $con->query("SELECT login From users WHERE user_level<'5';");if ($userpull->rowCount()>0){ {while($row = $userpull->fetch(PDO::FETCH_ASSOC)) {$newlogin=$row['login'];$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$newlogin);print"<option value=".$newlogin.">".$fullname."</option>";}} print"</select><input type='submit'></form><br />"; }}
//Actual Report Starts Here
print"<div class='report'>";  

$Table_Process->datatable_admin_day($con,$Table_Process,$tablename,$exclude,$today);

print "</div>";
//End of Report.  
 
?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>