<?php

$host='localhost';
$username='root';
$password='';
$db='forum';

mysql_connect($host, $username, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

?>