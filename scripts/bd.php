<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//$host="localhost";
//$dbname="cpvcosni_ucp";
//$dbuser="cpvcosni_darth";
//$dbpasswd="051099Fb";

$host="91.134.194.237";
$dbname="";
$dbuser="";
$dbpasswd="";

$lnk = mysql_connect($host,$dbuser,$dbpasswd);
mysql_select_db($dbname,$lnk);
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
?>