<?php
include_once("./config.php");
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$nombre = $_GET["nombre"];
$date = $_GET["date"];
if((isset($_GET["hora1"]) && $_GET["hora2"]) && ($_GET["hora1"] != "" && $_GET["hora2"] != ""))
{
	$time1 = $_GET["hora1"];
	$time2 = $_GET["hora2"];
}
else
{
	$time1 = "00:00";
	$time2 = "00:00";
}

$sql = "SELECT nombre,tipo FROM tipos_arena where nombre = '".$nombre."'";
$rst = mysql_query($sql,$id) or die(mysql_error());
$datos = mysql_fetch_assoc($rst);

$tipo_arena = "";

if($datos['tipo'] != "DUAL"){

	if($datos["tipo"] == "SECA"){
		$tipo_arena = "datos_seca";
	}
	else{
		$tipo_arena = "datos_humeda";
	}

	$produccion = 0;
	$sql1 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time1."'";
	$sql2 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time2."'";

	//obtiene el total de produccion de el tipo de arena seleccionado.
	$rst1 = mysql_query($sql1,$id) or die(mysql_error());
	$t1 = mysql_fetch_assoc($rst1);
	$rst2 = mysql_query($sql2,$id) or die(mysql_error());
	$t2 = mysql_fetch_assoc($rst2);
	
	if($t2['total1'] == 0 | $t1['total1'] == 0)
	{
		$produccion = 0;
	}
	else
	{
		$produccion = ($t2['total1']-$t1['total1']);
	}
	$produccion = number_format($produccion, 2, '.','');
	
	$hora1 = explode(":",$time1);
	$hora2 = explode(":",$time2);

	if(($hora2[0]-$hora1[0]) == 0){
		$hora = date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
	}
	else{
		if(($hora2[1] < $hora1[1]) & (($hora2[0] - $hora1[0]) == 1))
			$hora = date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
		else
			$hora = date("H:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
	}
	$tiempo = explode(":",$hora);
	$hr = intval($tiempo[0]);
	$min = intval($tiempo[1]);
	
	if($min == 0)
	{
		echo number_format($produccion / ($hr), 2, '.', '');
	}
	else
	{
		echo number_format($produccion / ($hr + ($min/60)), 2, '.', '');
	}
}
else{

	$tipo_arena1 = "datos_seca";
	$tipo_arena2 = "datos_humeda";

	$produccion = 0;
	$sql1 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time1."'";
	$sql2 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time2."'";

	$sql3 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time1."'";
	$sql4 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time2."'";	
	
	//obtiene el total de produccion de ambos tipos arena.
	$rst1 = mysql_query($sql1,$id) or die(mysql_error());
	$t1 = mysql_fetch_assoc($rst1);
	$rst2 = mysql_query($sql2,$id) or die(mysql_error());
	$t2 = mysql_fetch_assoc($rst2);

	$rst3 = mysql_query($sql3,$id) or die(mysql_error());
	$t3 = mysql_fetch_assoc($rst3);
	$rst4 = mysql_query($sql4,$id) or die(mysql_error());
	$t4 = mysql_fetch_assoc($rst4);

/* Variante si no hay produccion en alguno de los 2 tipos de arena*/
		if($t2['total1'] == 0 | $t1['total1'] == 0)
		{
			$total1 = 0;
		}
		else
		{
			$total1 = ($t2['total1']-$t1['total1']);
		}		
		
		if($t4['total1'] == 0 | $t3['total1'] == 0)
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

		$produccion = number_format(($total1+$total2),2,'.','');

/* Fin variante */		
/*
	$total1 = ($t2['total1']-$t1['total1']);
	$total1 = number_format($total1, 2, '.','');
	
	$total2 = ($t4['total1']-$t3['total1']);
	$total2 = number_format($total2, 2, '.','');		

	$produccion = intval($total1+$total2);
*/
	/* Calcula la hora de produccion*/
	$hora1 = explode(":",$time1);
	$hora2 = explode(":",$time2);

	if(($hora2[0]-$hora1[0]) == 0){
		$hora = date("00:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
	}
	else{
		if(($hora2[1] < $hora1[1]) & (($hora2[0] - $hora1[0]) == 1))
			$hora = date("00:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
		else
			$hora = date("h:i",mktime($hora2[0]-$hora1[0],$hora2[1]-$hora1[1],0,0,0,0));
	}
	$tiempo = explode(":",$hora);
	$hr = intval($tiempo[0]);
	$min = intval($tiempo[1]);
	
	/* Se multiplica x 2 por que es el doble de timpo de produccion 1 para arena humeda y otro para arena seca*/
	if($min == 0)
	{
		echo number_format($produccion / ($hr)*2, 2, '.', '');
	}
	else
	{
		echo number_format($produccion / (($hr + ($min/60)) * 2), 2, '.', '');
	}	
	//echo number_format($produccion / (($hr + ($min/60)) * 2), 2, '.', '');
}
mysql_close($id);
?>