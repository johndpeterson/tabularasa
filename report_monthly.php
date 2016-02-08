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

Generates a monthly report for the entire department.
*/
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
$exclude = explode(' ',$Table_Process->create_exclude_admin_statement($con,$Table_Process));

function datatable_department_month($con,$Table_Process,$tablename,$exclude,$today)

{$Table_Process=new Table_Process;$table_exclude=explode(' ',$Table_Process->create_exclude_table_statement($con,$Table_Process));$Table_list=$Table_Process->create_table_statement_exclude($con,$Table_Process,$table_exclude);$querytable=$con->query("select table_name from information_schema.tables where table_schema= DATABASE() 

{$Table_list};");while($row=$querytable->fetch(PDO::FETCH_ASSOC))

{foreach($row as $tablename)

{$querynull="SELECT * FROM $tablename WHERE `Submitted` LIKE '$today%';";$nullrc=$con->query($querynull);$null=$nullrc->rowCount();if($null>0)

{$stmt_list=$Table_Process->create_statement($con,$Table_Process,$tablename,$exclude);print "<table border='1'>";$tablenameucfirst=$Table_Process->titlecase($tablename);$prettytablename=str_replace('_', ' ', $tablenameucfirst);print"<tr><th colspan=8>

{$prettytablename}</th></tr>";$query="SELECT 

{$stmt_list} FROM $tablename WHERE `Submitted` LIKE '$today%';";$result=$con->query($query);$row=$result->fetch(PDO::FETCH_ASSOC);print"<tr>";foreach($row as $field =>$value)

{$fieldnameucfirst=$Table_Process->titlecase($field);$prettyfieldname=str_replace('_', ' ',$fieldnameucfirst);print"<th>$prettyfieldname</th>";}print"</tr>";$data=$con->query($query);if($data->rowCount()>0)

{$data->setFetchMode(PDO::FETCH_ASSOC);foreach($data as$row)

{print"<tr> \n";foreach($row as$name=>$value)

{print"<td>";
print"$value";
print"</td>";}print"</tr>";}}$existsquery="SHOW COLUMNS FROM $tablename LIKE 'Total_Items'";$existsrc=$con->query($existsquery);$exists=$existsrc->rowCount();if ($exists>0)
{$itemsquery="SELECT SUM(`Total_Items`) AS value_month FROM $tablename WHERE `Submitted` LIKE '$today%';";$items=$con->query($itemsquery);
{$items->setFetchMode(PDO::FETCH_ASSOC);foreach($items as $row)
{$itemsmonth=$row['value_month'];print"<tr><td colspan=8><b>Total Items: ".$itemsmonth."</td></tr>";}}}$texistsquery="SHOW COLUMNS FROM $tablename LIKE 'Total_Time'";$texistsrc=$con->query($texistsquery);$texists=$texistsrc->rowCount();if ($texists>0)
{$totaltimequery="SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( `Total_Time` ) ) ) AS value_month FROM $tablename WHERE `Submitted` LIKE '$today%';";$totaltime=$con->query($totaltimequery);
{$totaltime->setFetchMode(PDO::FETCH_ASSOC);foreach($totaltime as $row)
{$timemonth =$row['value_month'];print"<tr><td colspan=8><b>Total Time: ".$timemonth."</td></tr>";}}}print "</table><br />";}}}}
 if(($_REQUEST['year']) && ($_REQUEST['month']))
{ $year = $_REQUEST['year']; $month = $_REQUEST['month'];  $todaymonth = date("$year-$month"); $todayseven = date("$year-$month 07"); $todayeight = date("$year-$month 08"); $todaynine = date("$year-$month 09"); $todayten = date("$year-$month 10"); $todayeleven = date("$year-$month 11"); $todaytwelve = date("$year-$month 12"); $todaythirteen = date("$year-$month 13"); $todayfourteen = date("$year-$month 14"); $todayfifteen = date("$year-$month 15"); $todaysixteen = date("$year-$month 16"); $todayseventeen = date("$year-$month 17"); $todayeighteen = date("$year-$month 18"); $todaynineteen = date("$year-$month 19"); $todaytwenty = date("$year-$month 20"); $todayhour=date("H"); $todayminute=date("i");}
if(!($_REQUEST['year']) && !($_REQUEST['month']))
{$todaymonth = date("Y-m"); $todayseven = date("Y-m 07"); $todayeight = date("Y-m 08"); $todaynine = date("Y-m 09"); $todayten = date("Y-m 10"); $todayeleven = date("Y-m 11"); $todaytwelve = date("Y-m 12"); $todaythirteen = date("Y-m 13"); $todayfourteen = date("Y-m 14"); $todayfifteen = date("Y-m 15"); $todaysixteen = date("Y-m 16"); $todayseventeen = date("Y-m 17"); $todayeighteen = date("Y-m 18"); $todaynineteen = date("Y-m 19"); $todaytwenty = date("Y-m 20"); $todayhour=date("H"); $todayminute=date("i");}

echo("<div style='width:800px;'><b>Circulation Department Monthly Report for " . $today . "</b>");
// Drop Down form to select Year and Month - defaults to current year and month.
echo "<br />Select Reporting Year and Month";echo "<form action='report_monthly.php'><select name='year'><option>" . date("Y") . "</option><option>" . (date("Y")-1) . "</option><option>" . (date("Y")-2) . "</option><option>" . (date("Y")-3) . "</option><option>" . (date("Y")-4) . "</option><option>" . (date("Y")-5) ."</option></select><select name='month'><option>" . date("m") .     "</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,12); foreach ($range as $month) 
{ echo "<option value='$month'>$month</option>";} echo "</select><input type='submit'></form></div>";
echo "<br />Select Year, Month, Person <br /><form action='report_individual_admin_month.php'><select name='year'><option>" . date("Y") . "</option><option>" . (date("Y")-1) . "</option><option>" . (date("Y")-2) . "</option><option>" . (date("Y")-3) . "</option><option>" . (date("Y")-4) . "</option><option>" . (date("Y")-5) ."</option></select><select name='month'><option>" . date("m")  .  "</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select><select name='login_individual'>"; $userpull = $con->query("SELECT login From users WHERE user_level<'5';");if ($userpull->rowCount()>0) 
{while($row=$userpull->fetch(PDO::FETCH_ASSOC)){$newlogin=$row['login'];$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$newlogin);print"<option value=".$newlogin.">".$fullname."</option>";}} echo "</select><input type='submit'></form><br /><br />"; 
// Report starts here
#$Table_Process->
datatable_department_month($con,$Table_Process,$tablename,$exclude,$todaymonth);
;$table_exclude=explode(' ',$Table_Process->create_exclude_table_statement($con,$Table_Process));$table_list=$Table_Process->create_table_statement_exclude($con,$Table_Process, $table_exclude);
$querytable=$con->query("select table_name from information_schema.tables where table_schema= DATABASE() 
{$table_list};");while($row=$querytable->fetch(PDO::FETCH_ASSOC))

{foreach($row as $tablename)

{
$querytabletime=$con->query("SHOW COLUMNS FROM $tablename WHERE TYPE='time';");$timecount=($querytabletime->rowCount());
if($timecount<3 && strpos($tablename,'hour')!== false)

{$Table_Process->dayhourtable_dept($con,$Table_Process,$tablename,$todaymonth);}}}
//End of Report.   
?>

<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?> | <?php print($today); ?> Report for Circulation</title></head><body><?php include "include/footer.php" ?></body></html>
