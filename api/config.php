<?php
//mysql select db
$server="localhost";
$uname="root";
$pass="";
$db="mysite";

$res=mysql_connect($server,$uname,$pass);
mysql_select_db($db);