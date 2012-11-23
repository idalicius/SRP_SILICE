<?php
/*
Archivo: hrs.produccion.php
Funcion: Imprime las horas totales de Produccion
Parametros: Recibe la hora de produccion inicial y la hora de produccion final
Salida: El tiempo total de produccion en formato 00:00 via AJAX
*/
if((isset($_GET["hora1"]) && isset($_GET["hora2"])) && ($_GET["hora1"] != "" && $_GET["hora2"] != ""))
{
	$hora1 = $_GET["hora1"];
	$hora2 = $_GET["hora2"];
}
else
{
	$hora1 = "00:00";
	$hora2 = "00:00";
}

$hora1 = explode(":",$hora1);
$hora2 = explode(":",$hora2);


if(($hora2[0]-$hora1[0]) == 0)
{
	echo date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
}
else
{
	if(($hora2[1] < $hora1[1]) & (($hora2[0] - $hora1[0]) == 1))
		echo date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
	else
		echo date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
}
?>