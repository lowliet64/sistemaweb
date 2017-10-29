<?php 

$host="sql303.epizy.com";
$usuario="epiz_20937789";
$pass="raspberrypi2017";
$bd="epiz_20937789_dados";

mysql_connect($host,$usuario,$pass) or die(mysql_error());
mysql_select_db($bd);





?>
