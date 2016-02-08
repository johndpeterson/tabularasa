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

Generates a daily report for the specified user.
*/
//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
//Checks if user is logged in.
$exclude = explode(' ',$Table_Process->create_exclude_admin_statement($con,$Table_Process));
// Actual rendered page starts here


function datatable_admin_day($con,$Table_Process,$tablename,$exclude,$today){$Table_Process=new Table_Process;$table_exclude=explode(' ',$Table_Process->create_exclude_table_statement($con,$Table_Process));$Table_list=$Table_Process->create_table_statement_exclude($con, $table_exclude);$querytable=$con->query("select table_name from information_schema.tables where table_schema= DATABASE() {$Table_list};");while($row=$querytable->fetch(PDO::FETCH_ASSOC)){foreach($row as $tablename){$querynull="SELECT * FROM $tablename WHERE `Submitted` LIKE '$today%';";$nullrc=$con->query($querynull);$null=$nullrc->rowCount();if($null>0){$stmt_list = $Table_Process->create_statement($con, $tablename, $exclude);print "<table border='1'>";$tablenameucfirst=$Table_Process->titlecase($tablename);$prettytablename=str_replace('_', ' ', $tablenameucfirst);print"<tr><th colspan=8>{$prettytablename}</th></tr>";$query="SELECT {$stmt_list} FROM $tablename WHERE `Submitted` LIKE '$today%';";$result=$con->query($query);$row=$result->fetch(PDO::FETCH_ASSOC);print"<tr>";foreach($row as $field =>$value){$fieldnameucfirst=$Table_Process->titlecase($field);$prettyfieldname=str_replace('_', ' ',$fieldnameucfirst);print"<th>$prettyfieldname</th>";}print"</tr>";$data=$con->query($query);if($data->rowCount()>0){$data->setFetchMode(PDO::FETCH_ASSOC);foreach($data as$row){print"<tr> \n";foreach($row as$name=>$value){print"<td>$value</td>";}print"</tr>";}}print "</table><br />";}}}}
if(($_REQUEST['login_individual'])){$login=(($_REQUEST['login_individual']));}$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$login);

if(($_REQUEST['year']) && ($_REQUEST['month']) && ($_REQUEST['date'])){$year=$_REQUEST['year'];$month=$_REQUEST['month'];$date=$_REQUEST['date']; $today="$year-$month-$date";}
if(!($_REQUEST['year']) && !($_REQUEST['month']) && !($_REQUEST['date'])){$today=date("Y-m-d");}
print('<b>Report from '.$today.' for '.$fullname.'</b>');
// Drop Down form to select Year and Month - defaults to current year and month.

if($_SESSION['user_level'] >= 4)
{print"<br />Select Reporting Date and Person";print"<form action='".$_SERVER['PHP_SELF']."'><select name='year'><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".date("m")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select><select name='date'><option>".date("d")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,31); foreach ($range as $month) { print"<option value='$month'>$month</option>";} print"</select><select name='login_individual'><option value=".$login.">".$fullname."</option>"; $userpull = $con->query("SELECT login From users WHERE user_level<'5';");if ($userpull->rowCount()>0){ {while($row = $userpull->fetch(PDO::FETCH_ASSOC)) {$newlogin=$row['login'];$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$newlogin);print"<option value=".$newlogin.">".$fullname."</option>";}} print"</select><input type='submit'></form><br />"; }}
//Actual Report Starts Here
print"<div class='report'>";  

$Table_Process->datatable_day($con,$Table_Process,$tablename,$exclude,$login,$today);

print "</div>";
//End of Report.  
 
?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>
