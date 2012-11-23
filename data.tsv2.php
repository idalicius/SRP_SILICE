<?php
include_once("./config.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$sql = "SELECT tipo_arena, round(sum(produccion)) as total FROM datos_reportes GROUP BY tipo_arena";
$query = mysql_query($sql,$id) or die(mysql_error());

$totales;
$arenas = "";
 while($datos = mysql_fetch_assoc($query))
 {
	$totales .= $datos['total'].',';
	$arenas .= "'".$datos['tipo_arena']."',";
 }

mysql_close($id);
?>