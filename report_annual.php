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

This File uses a Legacy Version of the Code.  If you use categories with the names 
found in the formulas, it will compile Monthly and Annual Summations for those categories. T
his was a very specific report set up for Pitts Library and may not apply to your usage.  
It is linked as Annual Reports in the Admin Nav pane.
*/
include_once 'include/processes.php';
include "include/nav.php";

$today = date("Y");	
if(($_REQUEST["year"])){$today = $_REQUEST['year'];$todayfystartyear = ($today-1);$todayfystart = $todayfystartyear."-07-01%";$todayfyendyear = $today;$todayfyend = $todayfyendyear."-06-30%";}
if(!($_REQUEST["year"])){$today = date("Y");$todayfystartyear = ($today-1);$todayfystart = $todayfystartyear."-07-01%";$todayfyendyear = $today;$todayfyend = $todayfyendyear."-06-30%";}
$year=date("Y");
$yearminusone= intval($year - 1);
// Rendered Page Starts Here
print('<b>Circulation Department Annual Report for Fiscal Year ' . $year . '</b><br />');
// Form to Pick What Year is shown.
print"<br />Select Reporting Year (fiscal year e.g. from July 1, 2012 - June 31, 2013 is FY2013)";
print"<form action='report_annual.php'><select name='year'>";
$yearalt = $year; {print"<option>$year</option><option>".($yearalt-1)."</option><option>".($yearalt-2)."</option><option>".($yearalt-3)."</option><option>".($yearalt-4)."</option><option>".($yearalt-5) ."</option>";}
print"</select><input type='submit'> If the year you need isn't shown, select a year that is listed and then modify the URL with the date required.</form>"; 
$dcjul = strtotime("$todayfystartyear-07"); $jul = date ("Y-m", $dcjul); $dcaug = strtotime("$todayfystartyear-08"); $aug = date ("Y-m", $dcaug); $dcsep = strtotime("$todayfystartyear-09"); $sep = date ("Y-m", $dcsep); $dcoct = strtotime("$todayfystartyear-10"); $oct = date ("Y-m", $dcoct); $dcnov = strtotime("$todayfystartyear-11"); $nov = date ("Y-m", $dcnov); $dcdec = strtotime("$todayfystartyear-12"); $dec = date ("Y-m", $dcdec); $dcjan = strtotime("$todayfyendyear-01"); $jan = date ("Y-m", $dcjan); $dcfeb = strtotime("$todayfyendyear-02"); $feb = date ("Y-m", $dcfeb); $dcmar = strtotime("$todayfyendyear-03"); $mar = date ("Y-m", $dcmar); $dcapr = strtotime("$todayfyendyear-04"); $apr = date ("Y-m", $dcapr); $dcmay = strtotime("$todayfyendyear-05"); $may = date ("Y-m", $dcmay); $dcjun = strtotime("$todayfyendyear-06"); $jun = date ("Y-m", $dcjun); 
// Report Starts Here
print"<div class='report'><table>
<tr><th>Data Type</th><th>Jy".$todayfystartyear."</th><th>Au".$todayfystartyear."</th><th>S".$todayfystartyear."</th><th>O".$todayfystartyear."</th><th>".$todayfystartyear."</th><th>D".$todayfystartyear."</th><th>Ja".$todayfyendyear."</th><th>F".$todayfyendyear."</th><th>Mr".$todayfyendyear."</th><th>Ap".$todayfyendyear."</th><th>My".$todayfyendyear."</th><th>Jn".$todayfyendyear."</th><th>Total</th></tr>";
print"<tr class='type1'><td>Shelf Inventory Total Items</td>";
$resultShelf_Inventoryjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Shelf_Inventory WHERE `Submitted` LIKE '$jul%';");
while($row=$resultShelf_Inventoryjulq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryjul = $row['value_jul'];}  if($resultShelf_Inventoryjul!=0){print"<td>".$resultShelf_Inventoryjul."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventoryaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Shelf_Inventory WHERE `Submitted` LIKE '$aug%';");
while($row=$resultShelf_Inventoryaugq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryaug = $row['value_aug'];}  if($resultShelf_Inventoryaug!=0){print"<td>".$resultShelf_Inventoryaug."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Inventorysepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Shelf_Inventory WHERE `Submitted` LIKE '$sep%';");
while($row=$resultShelf_Inventorysepq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorysep = $row['value_sep'];}  if($resultShelf_Inventorysep!=0){print"<td>".$resultShelf_Inventorysep."</td>";} 
 else {print"<td></td>";}
if ($resultShelf_Inventorysep=0) {print"<td></td>";} 
 $resultShelf_Inventoryoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Shelf_Inventory WHERE `Submitted` LIKE '$oct%';");
while($row=$resultShelf_Inventoryoctq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryoct = $row['value_oct'];} if ($resultShelf_Inventoryoct!=0){print"<td>".$resultShelf_Inventoryoct."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Inventorynovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Shelf_Inventory WHERE `Submitted` LIKE '$nov%';");
while($row=$resultShelf_Inventorynovq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorynov = $row['value_nov'];}  if($resultShelf_Inventorynov!=0){print"<td>".$resultShelf_Inventorynov."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorydecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Shelf_Inventory WHERE `Submitted` LIKE '$dec%';");
while($row=$resultShelf_Inventorydecq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorydec = $row['value_dec'];}  if($resultShelf_Inventorydec!=0){print"<td>".$resultShelf_Inventorydec."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventoryjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Shelf_Inventory WHERE `Submitted` LIKE '$jan%';");
while($row=$resultShelf_Inventoryjanq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryjan = $row['value_jan'];}  if($resultShelf_Inventoryjan!=0){print"<td>".$resultShelf_Inventoryjan."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventoryfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Shelf_Inventory WHERE `Submitted` LIKE '$feb%';");
while($row=$resultShelf_Inventoryfebq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryfeb = $row['value_feb'];}  if($resultShelf_Inventoryfeb!=0){print"<td>".$resultShelf_Inventoryfeb."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorymarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Shelf_Inventory WHERE `Submitted` LIKE '$mar%';");
while($row=$resultShelf_Inventorymarq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorymar = $row['value_mar'];}  if($resultShelf_Inventorymar!=0){print"<td>".$resultShelf_Inventorymar."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventoryaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Shelf_Inventory WHERE `Submitted` LIKE '$apr%';");
while($row=$resultShelf_Inventoryaprq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryapr = $row['value_apr'];}  if($resultShelf_Inventoryapr!=0){print"<td>".$resultShelf_Inventoryapr."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorymayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Shelf_Inventory WHERE `Submitted` LIKE '$may%';");
while($row=$resultShelf_Inventorymayq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorymay = $row['value_may'];}  if($resultShelf_Inventorymay!=0){print"<td>".$resultShelf_Inventorymay."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventoryjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Shelf_Inventory WHERE `Submitted` LIKE '$jun%';");
while($row=$resultShelf_Inventoryjunq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventoryjun = $row['value_jun'];}  if($resultShelf_Inventoryjun!=0){print"<td>".$resultShelf_Inventoryjun."</td>";} 
 else {print"<td></td>";}
 $resultShelf_Inventorytotalq=$con->query("SELECT SUM( `Total_Items` ) AS value_year FROM Shelf_Inventory WHERE `Submitted` BETWEEN '$todayfystart' AND '$todayfyend';");
 while($row=$resultShelf_Inventorytotalq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorytotal = $row['value_year'];}  if($resultShelf_Inventorytotal!=0){print"<td>".$resultShelf_Inventorytotal."</td>";} 
 else {print"<td></td>";}
 print"</tr><tr class='type2'><td>Shelf Inventory Corrections</td>";
$resultShelf_Inventorycrctnjulq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jul FROM Shelf_Inventory WHERE `Submitted` LIKE '$jul%';");
while($row=$resultShelf_Inventorycrctnjulq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnjul =$row['value_jul'];}  if($resultShelf_Inventorycrctnjul!=0){print"<td>".$resultShelf_Inventorycrctnjul."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnaugq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_aug FROM Shelf_Inventory WHERE `Submitted` LIKE '$aug%';");
while($row=$resultShelf_Inventorycrctnaugq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnaug =$row['value_aug'];}  if($resultShelf_Inventorycrctnaug!=0){print"<td>".$resultShelf_Inventorycrctnaug."</td>";} 
else {print"<td></td>";} 
 $resultShelf_Inventorycrctnsepq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_sep FROM Shelf_Inventory WHERE `Submitted` LIKE '$sep%';");
while($row=$resultShelf_Inventorycrctnsepq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnsep =$row['value_sep'];}  if($resultShelf_Inventorycrctnsep!=0){print"<td>".$resultShelf_Inventorycrctnsep."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnoctq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_oct FROM Shelf_Inventory WHERE `Submitted` LIKE '$oct%';");
while($row=$resultShelf_Inventorycrctnoctq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnoct =$row['value_oct'];}  if($resultShelf_Inventorycrctnoct!=0){print"<td>".$resultShelf_Inventorycrctnoct."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Inventorycrctnnovq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_nov FROM Shelf_Inventory WHERE `Submitted` LIKE '$nov%';");
while($row=$resultShelf_Inventorycrctnnovq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnnov =$row['value_nov'];}  if($resultShelf_Inventorycrctnnov!=0){print"<td>".$resultShelf_Inventorycrctnnov."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctndecq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_dec FROM Shelf_Inventory WHERE `Submitted` LIKE '$dec%';");
while($row=$resultShelf_Inventorycrctndecq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctndec =$row['value_dec'];}  if($resultShelf_Inventorycrctndec!=0){print"<td>".$resultShelf_Inventorycrctndec."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnjanq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jan FROM Shelf_Inventory WHERE `Submitted` LIKE '$jan%';");
while($row=$resultShelf_Inventorycrctnjanq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnjan =$row['value_jan'];}  if($resultShelf_Inventorycrctnjan!=0){print"<td>".$resultShelf_Inventorycrctnjan."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnfebq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_feb FROM Shelf_Inventory WHERE `Submitted` LIKE '$feb%';");
while($row=$resultShelf_Inventorycrctnfebq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnfeb =$row['value_feb'];}  if($resultShelf_Inventorycrctnfeb!=0){print"<td>".$resultShelf_Inventorycrctnfeb."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnmarq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_mar FROM Shelf_Inventory WHERE `Submitted` LIKE '$mar%';");
while($row=$resultShelf_Inventorycrctnmarq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnmar =$row['value_mar'];}  if($resultShelf_Inventorycrctnmar!=0){print"<td>".$resultShelf_Inventorycrctnmar."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnaprq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_apr FROM Shelf_Inventory WHERE `Submitted` LIKE '$apr%';");
while($row=$resultShelf_Inventorycrctnaprq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnapr =$row['value_apr'];}  if($resultShelf_Inventorycrctnapr!=0){print"<td>".$resultShelf_Inventorycrctnapr."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnmayq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_may FROM Shelf_Inventory WHERE `Submitted` LIKE '$may%';");
while($row=$resultShelf_Inventorycrctnmayq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnmay =$row['value_may'];}  if($resultShelf_Inventorycrctnmay!=0){print"<td>".$resultShelf_Inventorycrctnmay."</td>";} 
 else {print"<td></td>";}
$resultShelf_Inventorycrctnjunq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jun FROM Shelf_Inventory WHERE `Submitted` LIKE '$jun%';");
while($row=$resultShelf_Inventorycrctnjunq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctnjun =$row['value_jun'];}  if($resultShelf_Inventorycrctnjun!=0){print"<td>".$resultShelf_Inventorycrctnjun."</td>";} 
 else {print"<td></td>";}
 $resultShelf_Inventorycrctntotalq=$con->query("SELECT SUM( `Total_Corrections` ) AS value_year FROM Shelf_Inventory WHERE `Submitted` BETWEEN '$todayfystart' AND '$todayfyend';");
while($row=$resultShelf_Inventorycrctntotalq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Inventorycrctntotal =$row['value_year'];}  if($resultShelf_Inventorycrctntotal!=0){print"<td>".$resultShelf_Inventorycrctntotal."</td>";} 
 else {print"<td></td>";}
print"</tr><tr class='type1'><td colspan=14>&nbsp;</td></tr>"; 
print"<tr class='type2'><td>Total Items Reshelved</td>"; 
 $resultcartrshlvjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Carts_Reshelved WHERE `Submitted` LIKE '$jul%';"); while($row=$resultcartrshlvjulq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvjul = $row['value_jul'];} 
$resultrshlvmmjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$jul%';"); while($row=$resultrshlvmmjulq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmjul = $row['value_jul'];} 
$resultrshlvofjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Reshelve_Overflow WHERE `Submitted` LIKE '$jul%';"); while($row=$resultrshlvofjulq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofjul = $resultrshlvofrow['value_jul'];} 
$resultrshlvrpjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$jul%';"); while($row=$resultrshlvrpjulq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpjul = $row['value_jul'];} 
$resultrshlvrsrvsjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Reshelve_Reserves WHERE `Submitted` LIKE '$jul%';"); while($row=$resultrshlvrsrvsjulq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsjul = $row['value_jul'];} 
$resultrshlvalljul = $resultcartrshlvjul+$resultrshlvmmjul+$resultrshlvofjul+$resultrshlvrpjul+$resultrshlvrsrvsjul;
if ($resultrshlvalljul!=0) {print"<td>" .$resultrshlvalljul. "</td>";}  
else {print"<td></td>";}
 $resultcartrshlvaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Carts_Reshelved WHERE `Submitted` LIKE '$aug%';"); while($row=$resultcartrshlvaugq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvaug = $row['value_aug'];} 
$resultrshlvmmaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$aug%';"); while($row=$resultrshlvmmaugq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmaug = $row['value_aug'];} 
$resultrshlvofaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Reshelve_Overflow WHERE `Submitted` LIKE '$aug%';"); while($row=$resultrshlvofaugq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofaug = $resultrshlvofrow['value_aug'];} 
$resultrshlvrpaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$aug%';"); while($row=$resultrshlvrpaugq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpaug = $row['value_aug'];} 
$resultrshlvrsrvsaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Reshelve_Reserves WHERE `Submitted` LIKE '$aug%';"); while($row=$resultrshlvrsrvsaugq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsaug = $row['value_aug'];} 
$resultrshlvallaug = $resultcartrshlvaug+$resultrshlvmmaug+$resultrshlvofaug+$resultrshlvrpaug+$resultrshlvrsrvsaug;
if ($resultrshlvallaug!=0) {print"<td>" .$resultrshlvallaug. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvsepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Carts_Reshelved WHERE `Submitted` LIKE '$sep%';"); while($row=$resultcartrshlvsepq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvsep = $row['value_sep'];} 
$resultrshlvmmsepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$sep%';"); while($row=$resultrshlvmmsepq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmsep = $row['value_sep'];} 
$resultrshlvofsepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Reshelve_Overflow WHERE `Submitted` LIKE '$sep%';"); while($row=$resultrshlvofsepq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofsep = $resultrshlvofrow['value_sep'];} 
$resultrshlvrpsepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$sep%';"); while($row=$resultrshlvrpsepq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpsep = $row['value_sep'];} 
$resultrshlvrsrvssepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Reshelve_Reserves WHERE `Submitted` LIKE '$sep%';"); while($row=$resultrshlvrsrvssepq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvssep = $row['value_sep'];} 
$resultrshlvallsep = $resultcartrshlvsep+$resultrshlvmmsep+$resultrshlvofsep+$resultrshlvrpsep+$resultrshlvrsrvssep;
if ($resultrshlvallsep!=0) {print"<td>" .$resultrshlvallsep. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Carts_Reshelved WHERE `Submitted` LIKE '$oct%';"); while($row=$resultcartrshlvoctq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvoct = $row['value_oct'];} 
$resultrshlvmmoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$oct%';"); while($row=$resultrshlvmmoctq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmoct = $row['value_oct'];} 
$resultrshlvofoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Reshelve_Overflow WHERE `Submitted` LIKE '$oct%';"); while($row=$resultrshlvofoctq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofoct = $resultrshlvofrow['value_oct'];} 
$resultrshlvrpoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$oct%';"); while($row=$resultrshlvrpoctq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpoct = $row['value_oct'];} 
$resultrshlvrsrvsoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Reshelve_Reserves WHERE `Submitted` LIKE '$oct%';"); while($row=$resultrshlvrsrvsoctq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsoct = $row['value_oct'];} 
$resultrshlvalloct = $resultcartrshlvoct+$resultrshlvmmoct+$resultrshlvofoct+$resultrshlvrpoct+$resultrshlvrsrvsoct;
if ($resultrshlvalloct!=0) {print"<td>" .$resultrshlvalloct. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Carts_Reshelved WHERE `Submitted` LIKE '$nov%';"); while($row=$resultcartrshlvnovq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvnov = $row['value_nov'];} 
$resultrshlvmmnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$nov%';"); while($row=$resultrshlvmmnovq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmnov = $row['value_nov'];} 
$resultrshlvofnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Reshelve_Overflow WHERE `Submitted` LIKE '$nov%';"); while($row=$resultrshlvofnovq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofnov = $resultrshlvofrow['value_nov'];} 
$resultrshlvrpnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$nov%';"); while($row=$resultrshlvrpnovq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpnov = $row['value_nov'];} 
$resultrshlvrsrvsnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Reshelve_Reserves WHERE `Submitted` LIKE '$nov%';"); while($row=$resultrshlvrsrvsnovq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsnov = $row['value_nov'];} 
$resultrshlvallnov = $resultcartrshlvnov+$resultrshlvmmnov+$resultrshlvofnov+$resultrshlvrpnov+$resultrshlvrsrvsnov;
if ($resultrshlvallnov!=0) {print"<td>" .$resultrshlvallnov. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Carts_Reshelved WHERE `Submitted` LIKE '$dec%';"); while($row=$resultcartrshlvdecq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvdec = $row['value_dec'];} 
$resultrshlvmmdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$dec%';"); while($row=$resultrshlvmmdecq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmdec = $row['value_dec'];} 
$resultrshlvofdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Reshelve_Overflow WHERE `Submitted` LIKE '$dec%';"); while($row=$resultrshlvofdecq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofdec = $resultrshlvofrow['value_dec'];} 
$resultrshlvrpdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$dec%';"); while($row=$resultrshlvrpdecq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpdec = $row['value_dec'];} 
$resultrshlvrsrvsdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Reshelve_Reserves WHERE `Submitted` LIKE '$dec%';"); while($row=$resultrshlvrsrvsdecq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsdec = $row['value_dec'];} 
$resultrshlvalldec = $resultcartrshlvdec+$resultrshlvmmdec+$resultrshlvofdec+$resultrshlvrpdec+$resultrshlvrsrvsdec;
if ($resultrshlvalldec!=0) {print"<td>" .$resultrshlvalldec. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Carts_Reshelved WHERE `Submitted` LIKE '$jan%';"); while($row=$resultcartrshlvjanq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvjan = $row['value_jan'];} 
$resultrshlvmmjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$jan%';"); while($row=$resultrshlvmmjanq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmjan = $row['value_jan'];} 
$resultrshlvofjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Reshelve_Overflow WHERE `Submitted` LIKE '$jan%';"); while($row=$resultrshlvofjanq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofjan = $resultrshlvofrow['value_jan'];} 
$resultrshlvrpjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$jan%';"); while($row=$resultrshlvrpjanq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpjan = $row['value_jan'];} 
$resultrshlvrsrvsjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Reshelve_Reserves WHERE `Submitted` LIKE '$jan%';"); while($row=$resultrshlvrsrvsjanq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsjan = $row['value_jan'];} 
$resultrshlvalljan = $resultcartrshlvjan+$resultrshlvmmjan+$resultrshlvofjan+$resultrshlvrpjan+$resultrshlvrsrvsjan;
if ($resultrshlvalljan!=0) {print"<td>" .$resultrshlvalljan. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Carts_Reshelved WHERE `Submitted` LIKE '$feb%';"); while($row=$resultcartrshlvfebq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvfeb = $row['value_feb'];} 
$resultrshlvmmfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$feb%';"); while($row=$resultrshlvmmfebq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmfeb = $row['value_feb'];} 
$resultrshlvoffebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Reshelve_Overflow WHERE `Submitted` LIKE '$feb%';"); while($row=$resultrshlvoffebq->fetch(PDO::FETCH_ASSOC)){$resultrshlvoffeb = $resultrshlvofrow['value_feb'];} 
$resultrshlvrpfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$feb%';"); while($row=$resultrshlvrpfebq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpfeb = $row['value_feb'];} 
$resultrshlvrsrvsfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Reshelve_Reserves WHERE `Submitted` LIKE '$feb%';"); while($row=$resultrshlvrsrvsfebq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsfeb = $row['value_feb'];} 
$resultrshlvallfeb = $resultcartrshlvfeb+$resultrshlvmmfeb+$resultrshlvoffeb+$resultrshlvrpfeb+$resultrshlvrsrvsfeb;
if ($resultrshlvallfeb!=0) {print"<td>" .$resultrshlvallfeb. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Carts_Reshelved WHERE `Submitted` LIKE '$mar%';"); while($row=$resultcartrshlvmarq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvmar = $row['value_mar'];} 
$resultrshlvmmmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$mar%';"); while($row=$resultrshlvmmmarq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmmar = $row['value_mar'];} 
$resultrshlvofmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Reshelve_Overflow WHERE `Submitted` LIKE '$mar%';"); while($row=$resultrshlvofmarq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofmar = $resultrshlvofrow['value_mar'];} 
$resultrshlvrpmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$mar%';"); while($row=$resultrshlvrpmarq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpmar = $row['value_mar'];} 
$resultrshlvrsrvsmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Reshelve_Reserves WHERE `Submitted` LIKE '$mar%';"); while($row=$resultrshlvrsrvsmarq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsmar = $row['value_mar'];} 
$resultrshlvallmar = $resultcartrshlvmar+$resultrshlvmmmar+$resultrshlvofmar+$resultrshlvrpmar+$resultrshlvrsrvsmar;
if ($resultrshlvallmar!=0) {print"<td>" .$resultrshlvallmar. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Carts_Reshelved WHERE `Submitted` LIKE '$apr%';"); while($row=$resultcartrshlvaprq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvapr = $row['value_apr'];} 
$resultrshlvmmaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$apr%';"); while($row=$resultrshlvmmaprq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmapr = $row['value_apr'];} 
$resultrshlvofaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Reshelve_Overflow WHERE `Submitted` LIKE '$apr%';"); while($row=$resultrshlvofaprq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofapr = $resultrshlvofrow['value_apr'];} 
$resultrshlvrpaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$apr%';"); while($row=$resultrshlvrpaprq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpapr = $row['value_apr'];} 
$resultrshlvrsrvsaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Reshelve_Reserves WHERE `Submitted` LIKE '$apr%';"); while($row=$resultrshlvrsrvsaprq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsapr = $row['value_apr'];} 
$resultrshlvallapr = $resultcartrshlvapr+$resultrshlvmmapr+$resultrshlvofapr+$resultrshlvrpapr+$resultrshlvrsrvsapr;
if ($resultrshlvallapr!=0) {print"<td>" .$resultrshlvallapr. "</td>";}  
else {print"<td></td>";}
 $resultcartrshlvmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Carts_Reshelved WHERE `Submitted` LIKE '$may%';"); while($row=$resultcartrshlvmayq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvmay = $row['value_may'];} 
$resultrshlvmmmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$may%';"); while($row=$resultrshlvmmmayq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmmay = $row['value_may'];} 
$resultrshlvofmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Reshelve_Overflow WHERE `Submitted` LIKE '$may%';"); while($row=$resultrshlvofmayq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofmay = $resultrshlvofrow['value_may'];} 
$resultrshlvrpmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$may%';"); while($row=$resultrshlvrpmayq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpmay = $row['value_may'];} 
$resultrshlvrsrvsmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Reshelve_Reserves WHERE `Submitted` LIKE '$may%';"); while($row=$resultrshlvrsrvsmayq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsmay = $row['value_may'];} 
$resultrshlvallmay = $resultcartrshlvmay+$resultrshlvmmmay+$resultrshlvofmay+$resultrshlvrpmay+$resultrshlvrsrvsmay;
if ($resultrshlvallmay!=0) {print"<td>" .$resultrshlvallmay. "</td>";} 
 else {print"<td></td>";}
 $resultcartrshlvjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Carts_Reshelved WHERE `Submitted` LIKE '$jun%';"); while($row=$resultcartrshlvjunq->fetch(PDO::FETCH_ASSOC)){$resultcartrshlvjun = $row['value_jun'];} 
$resultrshlvmmjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Reshelve_Microform_and_Microfiche WHERE `Submitted` LIKE '$jun%';"); while($row=$resultrshlvmmjunq->fetch(PDO::FETCH_ASSOC)){$resultrshlvmmjun = $row['value_jun'];} 
$resultrshlvofjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Reshelve_Overflow WHERE `Submitted` LIKE '$jun%';"); while($row=$resultrshlvofjunq->fetch(PDO::FETCH_ASSOC)){$resultrshlvofjun = $resultrshlvofrow['value_jun'];} 
$resultrshlvrpjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Reshelve_Reference_and_Periodicals WHERE `Submitted` LIKE '$jun%';"); while($row=$resultrshlvrpjunq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrpjun = $row['value_jun'];} 
$resultrshlvrsrvsjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Reshelve_Reserves WHERE `Submitted` LIKE '$jun%';"); while($row=$resultrshlvrsrvsjunq->fetch(PDO::FETCH_ASSOC)){$resultrshlvrsrvsjun = $row['value_jun'];} 
$resultrshlvalljun = $resultcartrshlvjun+$resultrshlvmmjun+$resultrshlvofjun+$resultrshlvrpjun+$resultrshlvrsrvsjun;
if ($resultrshlvalljun!=0) 
{print"<td>" .$resultrshlvalljun. "</td>";} 
 else {print"<td></td>";}
$resultrshlvalltotal=$resultrshlvallsep+$resultrshlvalloct+$resultrshlvallnov+$resultrshlvalldec+$resultrshlvalljan+$resultrshlvallmar+$resultrshlvallapr+$resultrshlvallmay+$resultrshlvalljun+$resultrshlvalljul+$resultrshlvallaug; 
 print"<td>" .$resultrshlvalltotal."</td>";
 print"<tr class='type1'><td colspan=14>&nbsp;</td></tr><tr class='type2'><td>Shelf Reading Total Items</td>";
$resultShelf_Readingjulq = $con->query("SELECT SUM( `Total_Items` ) AS value_jul FROM Shelf_Reading WHERE `Submitted` LIKE '$jul%';");
while($row=$resultShelf_Readingjulq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingjul = $row['value_jul'];}  if($resultShelf_Readingjul!=0){print"<td>".$resultShelf_Readingjul."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingaugq = $con->query("SELECT SUM( `Total_Items` ) AS value_aug FROM Shelf_Reading WHERE `Submitted` LIKE '$aug%';");
while($row=$resultShelf_Readingaugq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingaug = $row['value_aug'];}  if($resultShelf_Readingaug!=0){print"<td>".$resultShelf_Readingaug."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingsepq = $con->query("SELECT SUM( `Total_Items` ) AS value_sep FROM Shelf_Reading WHERE `Submitted` LIKE '$sep%';");
while($row=$resultShelf_Readingsepq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingsep = $row['value_sep'];}  if($resultShelf_Readingsep!=0){print"<td>".$resultShelf_Readingsep."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingoctq = $con->query("SELECT SUM( `Total_Items` ) AS value_oct FROM Shelf_Reading WHERE `Submitted` LIKE '$oct%';");
while($row=$resultShelf_Readingoctq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingoct = $row['value_oct'];}  if($resultShelf_Readingoct!=0){print"<td>".$resultShelf_Readingoct."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingnovq = $con->query("SELECT SUM( `Total_Items` ) AS value_nov FROM Shelf_Reading WHERE `Submitted` LIKE '$nov%';");
while($row=$resultShelf_Readingnovq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingnov = $row['value_nov'];}  if($resultShelf_Readingnov!=0){print"<td>".$resultShelf_Readingnov."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingdecq = $con->query("SELECT SUM( `Total_Items` ) AS value_dec FROM Shelf_Reading WHERE `Submitted` LIKE '$dec%';");
while($row=$resultShelf_Readingdecq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingdec = $row['value_dec'];}  if($resultShelf_Readingdec!=0){print"<td>".$resultShelf_Readingdec."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingjanq = $con->query("SELECT SUM( `Total_Items` ) AS value_jan FROM Shelf_Reading WHERE `Submitted` LIKE '$jan%';");
while($row=$resultShelf_Readingjanq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingjan = $row['value_jan'];}  if($resultShelf_Readingjan!=0){print"<td>".$resultShelf_Readingjan."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingfebq = $con->query("SELECT SUM( `Total_Items` ) AS value_feb FROM Shelf_Reading WHERE `Submitted` LIKE '$feb%';");
while($row=$resultShelf_Readingfebq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingfeb = $row['value_feb'];}  if($resultShelf_Readingfeb!=0){print"<td>".$resultShelf_Readingfeb."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingmarq = $con->query("SELECT SUM( `Total_Items` ) AS value_mar FROM Shelf_Reading WHERE `Submitted` LIKE '$mar%';");
while($row=$resultShelf_Readingmarq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingmar = $row['value_mar'];}  if($resultShelf_Readingmar!=0){print"<td>".$resultShelf_Readingmar."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingaprq = $con->query("SELECT SUM( `Total_Items` ) AS value_apr FROM Shelf_Reading WHERE `Submitted` LIKE '$apr%';");
while($row=$resultShelf_Readingaprq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingapr = $row['value_apr'];}  if($resultShelf_Readingapr!=0){print"<td>".$resultShelf_Readingapr."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingmayq = $con->query("SELECT SUM( `Total_Items` ) AS value_may FROM Shelf_Reading WHERE `Submitted` LIKE '$may%';");
while($row=$resultShelf_Readingmayq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingmay = $row['value_may'];}  if($resultShelf_Readingmay!=0){print"<td>".$resultShelf_Readingmay."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingjunq = $con->query("SELECT SUM( `Total_Items` ) AS value_jun FROM Shelf_Reading WHERE `Submitted` LIKE '$jun%';");
while($row=$resultShelf_Readingjunq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingjun = $row['value_jun'];}  if($resultShelf_Readingjun!=0){print"<td>".$resultShelf_Readingjun."</td>";} 
 else {print"<td></td>";}
  $resultShelf_Readingtotalq=$con->query("SELECT SUM( `Total_Items` ) AS value_year FROM Shelf_Reading WHERE `Submitted` BETWEEN '$todayfystart' AND '$todayfyend';");
while($row=$resultShelf_Readingtotalq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingtotal = $row['value_year'];}  if($resultShelf_Readingtotal!=0){print"<td>".$resultShelf_Readingtotal."</td>";} 
 print"</tr><tr class='type1'><td>Shelf Reading Corrections</td>";
$resultShelf_Readingcrctnjulq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jul FROM Shelf_Reading WHERE `Submitted` LIKE '$jul%';");
while($row=$resultShelf_Readingcrctnjulq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnjul =$row['value_jul'];}  if($resultShelf_Readingcrctnjul!=0){print"<td>".$resultShelf_Readingcrctnjul."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnaugq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_aug FROM Shelf_Reading WHERE `Submitted` LIKE '$aug%';");
while($row=$resultShelf_Readingcrctnaugq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnaug =$row['value_aug'];}  if($resultShelf_Readingcrctnaug!=0){print"<td>".$resultShelf_Readingcrctnaug."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnsepq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_sep FROM Shelf_Reading WHERE `Submitted` LIKE '$sep%';");
while($row=$resultShelf_Readingcrctnsepq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnsep =$row['value_sep'];}  if($resultShelf_Readingcrctnsep!=0){print"<td>".$resultShelf_Readingcrctnsep."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingcrctnoctq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_oct FROM Shelf_Reading WHERE `Submitted` LIKE '$oct%';");
while($row=$resultShelf_Readingcrctnoctq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnoct =$row['value_oct'];}  if($resultShelf_Readingcrctnoct!=0){print"<td>".$resultShelf_Readingcrctnoct."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingcrctnnovq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_nov FROM Shelf_Reading WHERE `Submitted` LIKE '$nov%';");
while($row=$resultShelf_Readingcrctnnovq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnnov =$row['value_nov'];}  if($resultShelf_Readingcrctnnov!=0){print"<td>".$resultShelf_Readingcrctnnov."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctndecq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_dec FROM Shelf_Reading WHERE `Submitted` LIKE '$dec%';");
while($row=$resultShelf_Readingcrctndecq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctndec =$row['value_dec'];}  if($resultShelf_Readingcrctndec!=0){print"<td>".$resultShelf_Readingcrctndec."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnjanq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jan FROM Shelf_Reading WHERE `Submitted` LIKE '$jan%';");
while($row=$resultShelf_Readingcrctnjanq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnjan =$row['value_jan'];}  if($resultShelf_Readingcrctnjan!=0){print"<td>".$resultShelf_Readingcrctnjan."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnfebq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_feb FROM Shelf_Reading WHERE `Submitted` LIKE '$feb%';");
while($row=$resultShelf_Readingcrctnfebq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnfeb =$row['value_feb'];}  if($resultShelf_Readingcrctnfeb!=0){print"<td>".$resultShelf_Readingcrctnfeb."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnmarq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_mar FROM Shelf_Reading WHERE `Submitted` LIKE '$mar%';");
while($row=$resultShelf_Readingcrctnmarq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnmar =$row['value_mar'];}  if($resultShelf_Readingcrctnmar!=0){print"<td>".$resultShelf_Readingcrctnmar."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnaprq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_apr FROM Shelf_Reading WHERE `Submitted` LIKE '$apr%';");
while($row=$resultShelf_Readingcrctnaprq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnapr =$row['value_apr'];}  if($resultShelf_Readingcrctnapr!=0){print"<td>".$resultShelf_Readingcrctnapr."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnmayq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_may FROM Shelf_Reading WHERE `Submitted` LIKE '$may%';");
while($row=$resultShelf_Readingcrctnmayq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnmay =$row['value_may'];}  if($resultShelf_Readingcrctnmay!=0){print"<td>".$resultShelf_Readingcrctnmay."</td>";} 
 else {print"<td></td>";}
$resultShelf_Readingcrctnjunq = $con->query("SELECT SUM( `Total_Corrections` ) AS value_jun FROM Shelf_Reading WHERE `Submitted` LIKE '$jun%';");
while($row=$resultShelf_Readingcrctnjunq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctnjun =$row['value_jun'];}  if($resultShelf_Readingcrctnjun!=0){print"<td>".$resultShelf_Readingcrctnjun."</td>";} 
 else {print"<td></td>";} 
 $resultShelf_Readingcrctntotalq=$con->query("SELECT SUM( `Total_Corrections` ) AS value_year FROM Shelf_Reading WHERE `Submitted` BETWEEN '$todayfystart' AND '$todayfyend';");
while($row=$resultShelf_Readingcrctntotalq->fetch(PDO::FETCH_ASSOC)){$resultShelf_Readingcrctntotal =$row['value_year'];}  if($resultShelf_Readingcrctntotal!=0){print"<td>".$resultShelf_Readingcrctntotal."</td>";} 
  print"</tr>";
print"</table> </div>";
//End of Report.  Line below closes the database connection.

?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>