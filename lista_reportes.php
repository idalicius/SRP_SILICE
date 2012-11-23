<?php
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());
$hoy = date("Y-m-d");

$sql = "SELECT reportes.*, datos_reportes.* FROM `datos_reportes` INNER JOIN reportes on (reportes.id_reporte = datos_reportes.id_reporte) WHERE supervisor = '".$_SESSION['usuario']."' and datos_reportes.fecha_datos_reporte = '".$hoy."' ORDER BY hora_inicio, fecha_reporte ASC";
$query = mysql_query($sql,$id) or die(mysql_error());
$referer = "document.location.href";

?>
<table width="100%" style="border-spacing:12px;">
<tr><th colspan="12">Reportes del dia de hoy</th></tr>
<?php
if($query)
{
	$total = mysql_num_rows($query);
	if($total > 0){
		echo "<tr><td><strong>Creacion</strong></td><td><strong>Produccion</strong></td><td><strong>Tipo arena</strong></td><td><strong>Hora/inicio</strong></td><td><strong>Hora/fin</strong></td><td><strong>Hrs/Prod</strong></td><td><strong>Materia/Prima</strong></td><td><strong>Pruduccion</strong></td><td><strong>Rendimiento</strong></td><td><strong>Productividad</strong></td><td align='right'><strong>Borrar</strong></d></tr>";
		while($reporte = mysql_fetch_assoc($query))
		{
			echo "<tr><td>".$reporte['fecha_reporte']."</td><td>".$reporte['fecha_datos_reporte']."</td><td>".$reporte['tipo_arena']."</td><td>".$reporte['hora_inicio']."</td><td>".$reporte['hora_final']."</td><td>".$reporte['horas_produccion']."</td><td>".$reporte['materia_prima']."</td><td>".$reporte['produccion']."</td><td>".$reporte['rendimiento']."</td><td>".$reporte['productividad']."</td><td align='right'><a href='javascript:borrar_reporte(".$reporte['id_reporte'].",".$referer.")'><img src='./images/cross.png'></a></td></tr>";
		}
	}
	else{
		echo "<tr><td colspan='3' align='center'>No hay reportes el dia de hoy...</td></tr>";
	}
}
mysql_close($id);
?>
</table>