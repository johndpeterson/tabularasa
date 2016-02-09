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
Original development machine was running PHP7 and MySQL5.6 
using XAMPP https://www.apachefriends.org/download.html
Configuration assumes all services hosted on one server.
Original favicon and banner graphic were modified from a woodcut of St. Jerome, 
part of the Pitts Digital Image Archive http://www.pitts.emory.edu/dia
*/



# Database Information
// Database Server (localhost unless db hosted on another server then IP or server name) 
define("DBHOST","servernamehere");
// Database Port - only necessary if not using 3306.
define("DBPORT","");
// Database login - please create this user in phpMyAdmin or similar
// Documentation - http://stackoverflow.com/questions/1720244/create-new-user-in-mysql-and-give-it-full-access-to-one-database
define("DBUSER","YourUser"); 
// Database Password
define("DBPASS","YourPassword");                           
// Database Name - can be changed.
define("DBNAME","tabularasa");
// Database table where users are kept
define("DBTBLE","users");
# Location Information

# Server and File Location information
// Path where your files are kept (slashes required)
define("Script_Path","/tabularasa/");
// URL of script (no slashes) 
define("Script_URL","localhost");

# System Information
// System Name - Appears on Every Page - HTML formatting permitted
define("Site_Name","Tabula Rasa");
//Witty Tag Line for Header - Appears on Every Page - HTML formatting permitted
define("Witty_Tagline","<b>TABULA</b>ting <b>R</b>ecords for <b>A</b>mazing <b>S</b>tudent <b>A</b>ssistants");
// Favicon Location - Appears in the tab/window title area
// Favicon how-to here: https://codex.wordpress.org/Creating_a_Favicon
define("Favicon","include/icons/favicon.png");
// Banner Icon Location - Appears on Every Page - PNG or JPG. 140px by 95px.  
define("Banner_Icon","include/icons/banner.png");

# Email System Setup - System uses PHP mail function - http://php.net/manual/en/function.mail.php
// Name on system emails
define("Email_From","Tabula Rasa");
// Webmaster email address
define("Email_Address","youremail@library.edu");
// Don't reply email address
define("Non_Reply","donotreply@library.edu");

# Session and Cookie Information
// Session Lifetimer in Seconds
define("Session_Lifetime", 60*60);
// Cookie names
define("CKIEUS","login");
define("CKIEPS","PASSWORDMD5");
date_default_timezone_set('America/New_York');

?>
