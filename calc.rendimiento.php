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

if($datos["tipo"] != "DUAL"){
	$tipo_arena ="";
	$materia_prima = "datos_prima";

	if($datos["tipo"] == "SECA")
	{
		$tipo_arena = "datos_seca";
	}
	else
	{
		$tipo_arena = "datos_humeda";
	}

	$produccion = 0;
	$materia = 0;
	 
	$sql1 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time1."'";
	$sql2 = "SELECT total1 FROM ".$tipo_arena." WHERE date = '".$date."' and time = '".$time2."'";

	$sql3 = "SELECT total1 FROM ".$materia_prima." WHERE date = '".$date."' and time = '".$time1."'";
	$sql4 = "SELECT total1 FROM ".$materia_prima." WHERE date = '".$date."' and time = '".$time2."'";

	//obtiene el total de produccion de el tipo de arena seleccionado.
	$rst1 = mysql_query($sql1,$id) or die(mysql_error());
	$t1 = mysql_fetch_assoc($rst1);
	$rst2 = mysql_query($sql2,$id) or die(mysql_error());
	$t2 = mysql_fetch_assoc($rst2);

	//obtiene el total de materia prima.
	$rst3 = mysql_query($sql3,$id) or die(mysql_error());
	$t3 = mysql_fetch_assoc($rst3);
	$rst4 = mysql_query($sql4,$id) or die(mysql_error());
	$t4 = mysql_fetch_assoc($rst4);

	$produccion = ($t2['total1']-$t1['total1']);
	$produccion = number_format($produccion, 2, '.','');

	$materia = ($t4['total1']-$t3['total1']);
	$materia = number_format($materia, 2, '.','');
	if($materia == 0){
		$rendimiento = 0;
	}
	else{
		$rendimiento = $produccion / $materia;
	}	
	$rendimiento = number_format($rendimiento, 2, '.','');
	echo ($rendimiento*100);
}
else{
	$tipo_arena1 ="datos_seca";
	$tipo_arena2 ="datos_humeda";
	$materia_prima = "datos_prima";

	$total1 = 0;
	$total2 = 0;
	$produccion = 0;
	$materia = 0;
	 
	$sql1 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time1."'";
	$sql2 = "SELECT total1 FROM ".$tipo_arena1." WHERE date = '".$date."' and time = '".$time2."'";
	
	$sql3 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time1."'";
	$sql4 = "SELECT total1 FROM ".$tipo_arena2." WHERE date = '".$date."' and time = '".$time2."'";

	$sql5 = "SELECT total1 FROM ".$materia_prima." WHERE date = '".$date."' and time = '".$time1."'";
	$sql6 = "SELECT total1 FROM ".$materia_prima." WHERE date = '".$date."' and time = '".$time2."'";

	//obtiene el total de produccion de el tipo de arena seleccionado.
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
			$tota2 = 0;
		}
		else
		{
			$tota2 = ($t4['total1']-$t3['total1']);
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

	$produccion = ($total1+$total2);
*/	
	
	//obtiene el total de materia prima.
	$rst5 = mysql_query($sql5,$id) or die(mysql_error());
	$t5 = mysql_fetch_assoc($rst5);
	$rst6 = mysql_query($sql6,$id) or die(mysql_error());
	$t6 = mysql_fetch_assoc($rst6);

	$materia = ($t6['total1']-$t5['total1']);
	$materia = number_format($materia, 2, '.','');

	if($materia == 0){
		$rendimiento = 0;
	}
	else{
		$rendimiento = $produccion / $materia;
	}	
	
	$rendimiento = number_format($rendimiento, 2, '.','');
	echo ($rendimiento*100);
}
mysql_close($id);
?>