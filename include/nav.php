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

This code is inserted at the top of every page in the system.
*/
//Database connection sequence - uses variables set in include/constants.php
include_once 'include/processes.php';
$login=$_SESSION["login"];
$Login_Process = new Login_Process;$Login_Process->check_status($_SERVER['SCRIPT_NAME']);$Table_Process = new Table_Process; 
$dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME.';dbport='.DBPORT.'';$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);$con = new PDO($dsn, DBUSER, DBPASS, $options);$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_USE_BUFFERED_QUERY);

//Code is inserted at the top of every page
print"<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html lang='en' xml:lang='en' xmlns='http://www.w3.org/1999/xhtml'><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><link rel='icon' type='image/png' href='http://".$_SERVER['HTTP_HOST'].Script_Path.Favicon. "'>
<link href='include/style.css' rel='stylesheet' type='text/css'><style type='text/css'>table,th,td{border:1px solid black};</style><body><div align='center'>
<div style='width:900px; text-align:left; font-size:25px; padding-bottom:20px;'>";
//Script_Path and Banner_Icon both set in include/constants.php
print"<a href='index.php'><img src='http://".$_SERVER['HTTP_HOST'].Script_Path.Banner_Icon."' style='float:left; padding-right:5px;' /></a>&nbsp;<br />
<b>Welcome to ".Site_Name;
//If user is logged in, prints ", First Name Last Name" in the navigation area.
if (isset($_SESSION['login']))
{print", " .$_SESSION['first_name']. " " .$_SESSION['last_name'];}
print"</b><br /><span style='font-size:15px; '>";
//Witty_Tagline is set in include/constants.php
print Witty_Tagline;
// Links shown to all users
if (isset($_SESSION["login"])){
print" | <a href='http://" .$_SERVER['HTTP_HOST'].Script_Path. "form.php'>Home</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."/include/processes.php?log_out=true'>Log Out</a><br />"; 
//If user is admin, shows admin pages.
if($_SESSION['user_level'] >= 4) 
{print"<a href='admin_center.php'>Admin Center</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."form_admin.php'>Admin Form</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."report_date.php'>Daily Reports</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."report_monthly.php'>Monthly Reporting</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."report_annual.php'>Annual Reports</a> | <a href='http://".$_SERVER['HTTP_HOST'].Script_Path."report_individual_admin_year.php'>Individual Annual Reports</a>";}
print"</span></div><div class='forms'>";$login=$_SESSION["login"];}
?>
