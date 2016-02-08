<?
//Do not remove this line - it is integral to login system.
include_once 'include/processes.php';
// Inserts Navigation Bar
include "include/nav.php";

//Sets what is excluded
$exclude = explode(' ',$Table_Process->create_exclude_statement($con,$Table_Process));

// Actual rendered page starts here
if(($_REQUEST['year']) && ($_REQUEST['month']) && !($_REQUEST['day'])){$year=$_REQUEST['year'];$month=$_REQUEST['month'];$date=$_REQUEST['date'];$today="$year-$month-$date";}if(!($_REQUEST['year']) && !($_REQUEST['month']) && !($_REQUEST['date'])){$today=date("Y-m-d");}
print('<b>Daily Report for: Circulation</b>');
// Drop Down form to select Year and Month - defaults to current year and month.
print"<br />Select Reporting Date<form action='report_department.php'><select name='year'><option>".date("Y")."</option><option>".(date("Y")-1)."</option><option>".(date("Y")-2)."</option><option>".(date("Y")-3)."</option><option>".(date("Y")-4)."</option><option>".(date("Y")-5) ."</option></select><select name='month'><option>".date("m") .     "</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,12); foreach ($range as $month) {print"<option value='$month'>$month</option>";} print"</select><select name='date'><option>".date("d")."</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option>"; $range = range(10,31); foreach ($range as $date) {print"<option value='$date'>$date</option>";} print"</select><input type='submit'></form><br />"; 
//Actual Report Starts Here
print"<div class='report'>";
#$Table_Process->
$Table_Process->datatable_department_day($con,$Table_Process,$tablename,$exclude,$login,$today);
print "</div>";

?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>