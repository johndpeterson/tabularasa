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

This file generates a monthly report for the specified user.
*/
//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";

// Actual rendered page starts here
if(($_REQUEST['year'])&&($_REQUEST['month'])){$year=$_REQUEST['year'];$month=$_REQUEST['month'];$today="$year-$month";$todayseven=date("$year-$month 07");$todayeight=date("$year-$month 08");$todaynine=date("$year-$month 09");$todayten=date("$year-$month 10");$todayeleven=date("$year-$month 11");$todaytwelve=date("$year-$month 12");$todaythirteen=date("$year-$month 13");$todayfourteen=date("$year-$month 14");$todayfifteen=date("$year-$month 15");$todaysixteen=date("$year-$month 16");$todayseventeen=date("$year-$month 17");$todayeighteen=date("$year-$month 18");$todaynineteen=date("$year-$month 19");$todaytwenty=date("$year-$month 20");$todayhour=date("H");$todayminute=date("i");$today=date("$year-$month");$todaymonth=date("$year-$month");$todayseven=date("$year-$month 07");$todayeight=date("$year-$month 08");$todaynine=date("$year-$month 09");$todayten=date("$year-$month 10");$todayeleven=date("$year-$month 11");$todaytwelve=date("$year-$month 12");$todaythirteen=date("$year-$month 13");$todayfourteen=date("$year-$month 14");$todayfifteen=date("$year-$month 15");$todaysixteen=date("$year-$month 16");$todayseventeen=date("$year-$month 17");$todayeighteen=date("$year-$month 18");$todaynineteen=date("$year-$month 19");$todaytwenty=date("$year-$month 20");}if(!($_REQUEST['year'])&&!($_REQUEST['month'])){$today=date("Y-m");$todayseven=date("Y-m 07");$todayeight=date("Y-m 08");$todaynine=date("Y-m 09");$todayten=date("Y-m 10");$todayeleven=date("Y-m 11");$todaytwelve=date("Y-m 12");$todaythirteen=date("Y-m 13");$todayfourteen=date("Y-m 14");$todayfifteen=date("Y-m 15");$todaysixteen=date("Y-m 16");$todayseventeen=date("Y-m 17");$todayeighteen=date("Y-m 18");$todaynineteen=date("Y-m 19");$todaytwenty=date("Y-m 20");$todayhour=date("H");$todayminute=date("i");$today=date("Y-m");$todaymonth=date("Y-m");$todayseven=date("Y-m 07");$todayeight=date("Y-m 08");$todaynine=date("Y-m 09");$todayten=date("Y-m 10");$todayeleven=date("Y-m 11");$todaytwelve=date("Y-m 12");$todaythirteen=date("Y-m 13");$todayfourteen=date("Y-m 14");$todayfifteen=date("Y-m 15");$todaysixteen=date("Y-m 16");$todayseventeen=date("Y-m 17");$todayeighteen=date("Y-m 18");$todaynineteen=date("Y-m 19");$todaytwenty=date("Y-m 20");}
if(($_REQUEST['login_individual'])){$login=(($_REQUEST['login_individual']));}$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$login);
print("<div style='width:800px;'><b>".$fullname."'s Monthly Report for ".$today."</b>");
// Drop Down form to select Year and Month - defaults to current year and month.
print"<br />Select Reporting Year and Month (returns you to Department Report For Month)";print"<form action='report_monthly.php'><select name='year'><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".date("m") .     "</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>";$range=range(10,12);
foreach ($range as $month) {print"<option value='$month'>$month</option>";} print"</select><input type='submit'></form></div>";
print"<br />Select Year, Month, Person <br /><form action='report_individual_admin_month.php'><select name='year'><option>".$year."</option><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".($_REQUEST['month']) ."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></select><select name='login_individual'><option value=".$login.">".$fullname."</option>";$userpull=$con->query("SELECT login From users WHERE user_level<'5';");if ($userpull->rowCount()>0){{while($row=$userpull->fetch(PDO::FETCH_ASSOC)) {$newlogin=$row['login'];$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$newlogin);print"<option value=".$newlogin.">".$fullname."</option>";}} print"</select><input type='submit'></form><br />";}
$exclude = explode(' ',$Table_Process->create_exclude_admin_statement($con,$Table_Process));

$Table_Process->datatable_individual_month($con,$Table_Process,$tablename,$exclude,$login);

//Below Report was more complex than the automated system could handle.  It breaks out building usage by time of day and day of week.


//End of Report.   
?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>