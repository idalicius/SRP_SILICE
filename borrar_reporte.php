<?php
include_once("./config.php");
$mysqlid = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$id = $_REQUEST['id'];

$sql = "DELETE FROM reportes WHERE id_reporte = ".$id;
$query = mysql_query($sql,$mysqlid) or die(mysql_error());
mysql_close($mysqlid);
$uri = explode("&",$_SERVER['REQUEST_URI']);
header("location: $uri[1]");
?>