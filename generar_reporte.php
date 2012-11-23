<?php
include_once("./header.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$id_reporte = 0;
$fecha_datos_reporte = $_POST["date"]; 
$tipo_arena = $_POST["tipo_arena"]; 
$supervisor = $_POST["sa"];
$hora_inicio = $_POST["hora1"]; 
$hora_final = $_POST["hora2"];
$horas_produccion = $_POST["hprod"];
$materia_prima = $_POST["mprima"];
$produccion = $_POST["prodt"];
$rendimiento = $_POST["rendi"];
$productividad = $_POST["product"];

/*
$sql = "select count(id_reporte)+1 from reportes";
$query = mysql_query($sql,$id) or die(mysql_error());
$rst = mysql_fetch_row($query);
$id_reporte = $rst[0];
*/
$sql = "INSERT INTO reportes(id_reporte,fecha_reporte,fecha_datos_reporte,usuario_reporte) VALUES(NULL,'".date("Y-m-d H:i:s")."','".$fecha_datos_reporte."','".$_SESSION['usuario']."')";
$query = mysql_query($sql,$id) or die(mysql_error());

$numerofilas = count($tipo_arena);
$filas_validas = 0;
$index=0;
while($index < $numerofilas)
{
	if($tipo_arena[$index] != "-")
	{
		$filas_validas++;
	}
	$index++;
}

//checa el id del ultimo reporte cargado
$sql = "SELECT max(id_reporte) as id_reporte FROM reportes";
$query = mysql_query($sql,$id) or die(mysql_error());
$rst = mysql_fetch_assoc($query);

$id_reporte = mysql_num_rows($query);
if($id_reporte > 0)
	$id_reporte = $rst['id_reporte'];
else
	$ide_reporte = 1;

$sql = "INSERT INTO datos_reportes(id, id_reporte, fecha_datos_reporte, tipo_arena, supervisor, hora_inicio, hora_final, horas_produccion, materia_prima, produccion, rendimiento, productividad) VALUES";

$index=0;
while($filas_validas>0)
{
	if($tipo_arena[$index] != "-")
	{
		if($filas_validas == 1)
		{
			$sql .= "(NULL, ".$id_reporte.", '".$fecha_datos_reporte."', '".$tipo_arena[$index]."', '".$_SESSION['usuario']."', '".$hora_inicio[$index]."', '".$hora_final[$index]."', '".$horas_produccion[$index]."', '".$materia_prima[$index]."', '".$produccion[$index]."', '".$rendimiento[$index]."', '".$productividad[$index]."');";
		}
		else
		{
			$sql .= "(NULL, ".$id_reporte.", '".$fecha_datos_reporte."', '".$tipo_arena[$index]."', '".$_SESSION['usuario']."', '".$hora_inicio[$index]."', '".$hora_final[$index]."', '".$horas_produccion[$index]."', '".$materia_prima[$index]."', '".$produccion[$index]."', '".$rendimiento[$index]."', '".$productividad[$index]."'),";
		}
	$filas_validas--;
	}
	$index++;
}
$query = mysql_query($sql,$id) or die(mysql_error());
if($query)
{
 echo "<table align='center'><tr><th>Datos insertados con exito..</th></tr></table>";
}
mysql_close($id);
?>
<?php include_once("./footer.php"); ?>