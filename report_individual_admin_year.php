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

This file generates an annual report for an individual user.
*/
//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";
$exclude = explode(' ',$Table_Process->create_exclude_admin_statement($con,$Table_Process));

// Actual rendered page starts here
if(($_REQUEST["year"])){$today = $_REQUEST['year'];$todayfystartyear = ($today-1);$todayfystart = $todayfystartyear."-07-01%";$todayfyendyear = $today;$todayfyend = $todayfyendyear."-06-30%";}if(!($_REQUEST["year"])){$today = date("Y");$todayfystartyear = ($today-1);$todayfystart = $todayfystartyear."-07-01%";$todayfyendyear = $today;$todayfyend = $todayfyendyear."-06-30%";}
$todayminusone= intval($today - 1);
$realtoday=date("Y");
if(($_REQUEST['login_individual'])){$login=(($_REQUEST['login_individual']));}$fullname=$Table_Process->first_name_last_name($con,$Table_Process,$login);

print("<div style='width:800px;'><b>".$fullname."'s Annual Report for FY".$todayfystartyear."</b>");
// Drop Down form to select Year - defaults to current year.
print"<br />Select Reporting Year (fiscal year e.g. from July 1, 2012 - June 30, 2013 is FY2013) and Person<br /><form action='report_individual_admin_year.php'><select name='year'>"; {print"<option>".$realtoday."</option><option>".$todayfystartyear."</option><option>".($todayfystartyear-1)."</option><option>".($todayfystartyear-2)."</option><option>".($todayfystartyear-3)."</option><option>".($todayfystartyear-4)."</option><option>".($todayfystartyear-5) ."</option>";}print"</select><select name='login_individual'><option value=".$login.">".$fullname."</option>"; $userpull = $con->query("SELECT login From users WHERE user_level<'5';");if ($userpull->rowCount()>0) {while($row = $userpull->fetch(PDO::FETCH_ASSOC)) {$loginnew=$row['login']; print"<option>".$loginnew."</option>";}}print"</select><input type='submit'></form><br />"; 
// Report starts here

#$Table_Process->
$Table_Process->datatable_admin_individual_year($con,$Table_Process,$tablename,$exclude,$login,$today,$todayfyend,$todayfystart);
//End of Report.  ?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>