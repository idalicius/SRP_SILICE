<?php
/*
Archivo: prod.tipoarena.php
Funcion: Imprime el total de Produccion en una fecha y en un rango de horas determinadas
Parametros: Recibe la hora de produccion inicial y la hora de produccion final, el nombre de la arena, la fecha de la produccion
Salida: El total de produccion en formato 0.00
*/

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

if($datos["tipo"] != "DUAL"){
		$tipo_arena ="";

		if($datos["tipo"] == "SECA"){
			$tipo_arena = "datos_seca";
		}
		else{
			$tipo_arena = "datos_humeda";
		}
		$total = 0;
		$sql1 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time1."'";
		$sql2 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time2."'";

		$rst1 = mysql_query($sql1,$id) or die(mysql_error());
		$t1 = mysql_fetch_assoc($rst1);
		$rst2 = mysql_query($sql2,$id) or die(mysql_error());
		$t2 = mysql_fetch_assoc($rst2);
		
		if($t2['total1'] == 0 | $t1['total1'] == 0)
		{
			$total = 0;
		}
		else
		{
			$total = ($t2['total1']-$t1['total1']);
		}
		$total = number_format($total, 2, '.','');
		echo $total;
}
else{
		$tipo_arena1 ="datos_seca";
		$tipo_arena2 ="datos_humeda";

		$total1 = 0;
		$total2 = 0;
		$total = 0;
		
		$sql1 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time1."'";
		$sql2 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time2."'";
		
		$sql3 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time1."'";
		$sql4 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time2."'";		

		$rst1 = mysql_query($sql1,$id) or die(mysql_error());
		$t1 = mysql_fetch_assoc($rst1);
		$rst2 = mysql_query($sql2,$id) or die(mysql_error());
		$t2 = mysql_fetch_assoc($rst2);
		
		$rst3 = mysql_query($sql3,$id) or die(mysql_error());
		$t3 = mysql_fetch_assoc($rst3);
		$rst4 = mysql_query($sql4,$id) or die(mysql_error());
		$t4 = mysql_fetch_assoc($rst4);

		
/* Variante si no hay produccion en alguno de los 2 tipos de arena*/
		if($t2['total1'] < 0 | $t1['total1'] < 0)
		{
			$total1 = 0;
		}
		else
		{
			$total1 = ($t2['total1']-$t1['total1']);
		}		
		
		if($t4['total1'] < 0 | $t3['total1'] < 0)
		{
			$total2 = 0;
		}
		else
		{
			$total2 = ($t4['total1']-$t3['total1']);
		}		
		
		if($total1 == 0 | $total2 == 0)
		{
			$total = 0;
		}
		else
		{
			$total = number_format(($total1+$total2),2,'.','');
		}
		echo $total;
/* Fin variante */
		
/*Situacion normal sin validad variante*/
		// $total1 = ($t2['total1']-$t1['total1']);
		// $total1 = number_format($total1, 2, '.','');
		
		// $total2 = ($t4['total1']-$t3['total1']);
		// $total2 = number_format($total2, 2, '.','');		
	
		// $total = number_format(($total1+$total2),2,'.','');
		// echo $total;
/*fin situacion normal*/

}

mysql_close($id);
?>