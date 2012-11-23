<?php
include_once("./config.php");
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$id_carga = $_REQUEST['id'];

$sql = "DELETE FROM cargas WHERE id = ".$id_carga;
$query = mysql_query($sql,$id) or die(mysql_error());
mysql_close($id);
$uri = explode("&",$_SERVER['REQUEST_URI']);
header("location: $uri[1]");
?>