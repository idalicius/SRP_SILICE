<?php
include_once("./config.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$hoy = $_GET['date'];
//$hoy = '2012-10-11';
//$sql = "SELECT date, time, flujo FROM `datos_seca` WHERE (date >= '2012-10-10' and date <= '2012-11-15') ORDER BY time ASC";
$sql = "SELECT date, time, flujo FROM `datos_seca` WHERE date = '".$hoy."' ORDER BY time ASC";

$query = mysql_query($sql,$id) or die(mysql_error());

echo "date\tclose\n";
while($datos = mysql_fetch_assoc($query))
{
	echo $datos['time']."\t".$datos['flujo']."\n";
}
mysql_close($id);
?>