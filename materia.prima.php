<?php
include_once("./config.php");
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$nombre = $_GET["nombre"];
$date = $_GET["date"];
$time1 = $_GET["hora1"];
$time2 = $_GET["hora2"];

$sql = "SELECT nombre,tipo FROM tipos_arena where nombre = '".$nombre."'";
$rst = mysql_query($sql,$id) or die(mysql_error());
$datos = mysql_fetch_assoc($rst);

$tipo_arena ="";
$materia_prima = "datos_prima";

if($datos["tipo"] == "SECA")
{
	$tipo_arena = $materia_prima;
}
else
{
	$tipo_arena = $materia_prima;
}

$total = 0;

$sql1 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time1."'";
$sql2 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time2."'";

$rst1 = mysql_query($sql1,$id) or die(mysql_error());
$t1 = mysql_fetch_assoc($rst1);
$rst2 = mysql_query($sql2,$id) or die(mysql_error());
$t2 = mysql_fetch_assoc($rst2);

$total1 = 0;
$total2 = 0;
$total1 = floatval($t1['total1']);
$total2 = floatval($t2['total1']);

if($total1 == 0)
{
	$total2 = 0;
}
$total = ($total2-$total1);

$total = number_format($total, 2, '.','');
echo $total;
mysql_close($id);
?>