<?php include_once 'include/processes.php';
include "include/nav.php";
//needed to set what data user can see
$exclude = explode(' ',$Table_Process->create_exclude_statement($con,$Table_Process));
//drives the entire content of the page except footer
$Table_Process->form($con,$Table_Process,$exclude);?>
<!-- Below is the barebones needed for an html page.  Report will render above the links at the bottom. -->
<html><head><title><?php print Site_Name; ?></title></head><html><body><?php include "include/footer.php" ?></body></html>