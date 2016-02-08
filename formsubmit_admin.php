<!DOCTYPE html>
<html lang="en-US">
 <head>
 <meta charset="UTF-8">
 <style type="text/css">
  table, th, td {border: 1px solid black
};
 </style>
 </head>
 <body>
 <p>
 <?php
/*
Framework Name: Tabula Rasa 
Developed for: Pitts Theology Library, 2012
Filename:	report_individual_admin.php
Author:		John Peterson
Description:
This file is a report of all work 
done during a particular day with full data and user select option.
*/
//calls configuration file - do not remove this line.
include_once 'include/processes.php';
$Login_Process=new Login_Process;
$Login_Process->check_status($_SERVER['SCRIPT_NAME']); 
// Inserts Navigation Bar
include "include/nav.php";
$exclude=explode(' ',$Table_Process->create_exclude_admin_statement($con, $Table_Process));

function form_submit_admin($con, $Table_Process,$exclude){print"<div id='form'><table><tr class='type1'>";print"</tr>";$table_exclude=explode(' ',$Table_Process->create_exclude_table_statement($con, $Table_Process));$table_list=$Table_Process->create_table_statement_exclude($con, $Table_Process, $table_exclude);$querytable=$con->query("select table_name from information_schema.tables where table_schema= DATABASE(){$table_list};");while($row=$querytable->fetch(PDO::FETCH_ASSOC)){foreach($row as $tablename){$tablenameucfirst=$Table_Process->titlecase($tablename);$prettytablename=str_replace('_', ' ', $tablenameucfirst);print"<tr><th>{$prettytablename}</th>";$querytabletime=$con->query("SHOW COLUMNS FROM $tablename WHERE TYPE='time';");$timecount=($querytabletime->rowCount());$querytableint=$con->query("SHOW COLUMNS FROM $tablename WHERE TYPE LIKE 'int%';");$intcount=($querytableint->rowCount());$querytabletaskdone=$con->query("SHOW COLUMNS FROM $tablename WHERE FIELD LIKE 'Task_Done'");$taskdonecount=($querytabletaskdone->rowCount());if(strpos($tablename,'user_entered_task') !== false){$Table_Process->submit_datatable_user_entered_task($con, $Table_Process,$tablename,$exclude);$Table_Process->submit_datatable_user_entered_task_list($con, $Table_Process,$tablename,$exclude);}else{if($taskdonecount>0 && $timecount<2){$Table_Process->submit_datatable_taskdone($con, $Table_Process,$tablename,$exclude);}else{if($taskdonecount>0 && $timecount>1){$Table_Process->submit_datatable_taskdone_time($con, $Table_Process,$tablename,$exclude);}else{if($timecount<3 && strpos($tablename,'hour')!== false){$Table_Process->submit_datatable_hourly_int($con, $Table_Process,$tablename,$exclude);}else{if($timecount<4 && strpos($tablename,'hour')!== false){$Table_Process->submit_datatable_hourly_no_int($con, $Table_Process,$tablename,$exclude);}else{if(strpos($tablename,'count')!== false){$Table_Process->submit_datatable_no_time($con, $Table_Process,$tablename,$exclude);}else{if($intcount<2 && $timecount>2){$Table_Process->submit_datatable_no_int($con, $Table_Process,$tablename,$exclude);}else{if($intcount>2 && $timecount>2){$Table_Process->submit_datatable_two_int($con, $Table_Process,$tablename,$exclude);}else{if($intcount>1 && $timecount<3){$Table_Process->submit_datatable_no_total_time($con, $Table_Process,$tablename,$exclude);}else{if($timecount>2){$Table_Process->submit_datatable($con, $Table_Process,$tablename,$exclude);}else{print"";}}}}}}}}}}}}print"</form></table></div>";}$who= $_REQUEST["".$tablename."name"];print_r($who);
//Conditional Statements start here.  If all values from a section are defined, SQL statement is sent.  If not, error appears.
$hour=$_REQUEST['$tablenamefieldnamehour']; $minute=$_REQUEST['$tablenamefieldnameminute']; $Time="$hour:$minute:00"; $endhour=$_REQUEST['$tablenameendhour']; $endminute=$_REQUEST['$tablenameendminute']; $Task_Ended="$endhour:$endminute:00";
$Total_Items= $_REQUEST['$tablenameTotal_Items']; 
$query="INSERT INTO $tablename( Person, Start_Time, End_Time,  Total_Items ) VALUES ( '$Person', '$Start_Time', '$End_Time', '$Total_Items' );";$con->query($query);
#foreach ($_REQUEST as $key => $value)
#print"Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
#print"<div class='report'><table border='1'>"; 
#$table_exclude=explode(' ',$tablecreate_exclude_table_statement($con, $Table_Process));
#$table_list=create_table_statement_exclude($con, $Table_Process, $table_exclude);//excludes tables as listed above 
#$querytable=$con->query("select table_name from information_schema.tables where table_schema= DATABASE() 
#{$table_list
#};");while($row=$querytable->fetch(PDO::FETCH_ASSOC)) 
#{foreach($row as $tablename)
#{form_submit($con, $Table_Process,$exclude);
$Table_Process->form_submit_admin($con, $Table_Process,$exclude);

?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?> | <?php print Site_Name; ?> | Submit</title></head><html><body><?php include "include/footer.php"; ?></body></html>