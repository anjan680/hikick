<?php

/*----------------------------------------------------------------------------------------
for local host
-----------------------------------------------------------------------------------*/
$host="localhost";

$username="root";
$password="";
$dbname="db_karate";



/*----------------------------------------------------------------------------------------
for net host
-----------------------------------------------------------------------------------
*/
/*$host="localhost";
	$username="infevent_school";
	$password="7082positive";
	$dbname="infevent_db_school";*/


mysql_connect($host,$username,$password) or die("Could not connect to database");
mysql_select_db($dbname) or die("Could not select database");
error_reporting('E_ERROR|E_WARNING');
?>
