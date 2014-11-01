<?php

/*----------------------------------------------------------------------------------------
for local host
-----------------------------------------------------------------------------------*/
/*$host="localhost";

$username="root";
$password="";
$dbname="db_karate";
*/


/*----------------------------------------------------------------------------------------
for net host
-----------------------------------------------------------------------------------
*/
$host="sql4.freemysqlhosting.net";
	$username="sql456337";
	$password="dE3%uH6!";
	$dbname="sql456337";


mysql_connect($host,$username,$password) or die("Could not connect to database");
mysql_select_db($dbname) or die("Could not select database");
error_reporting('E_ERROR|E_WARNING');
?>
