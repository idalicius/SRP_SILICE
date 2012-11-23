<?php
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());
$hoy = date("Y-m-d");

$sql = "SELECT * FROM cargas WHERE (content_date = '".$hoy."' and user = '".$_SESSION['usuario']."') ORDER BY load_date ASC";
$query = mysql_query($sql,$id) or die(mysql_error());
$referer = "document.location.href";

?>
<table width="100%" style="border-spacing:12px;">
<tr><th colspan="5">Archivos cargados el dia de hoy</th></tr>
<?php
if($query)
{
	$total = mysql_num_rows($query);
	if($total > 0){
		echo "<tr><td><strong>Fecha de carga</strong></td><td><strong>Fecha produccion</strong></td><td><strong>Nombre de archivo</strong></td><td><strong>Tipo arena</strong></td><td align='right'><strong>Borrar</strong></td></tr>";
		while($cargas = mysql_fetch_assoc($query))
		{
			echo "<tr><td>".$cargas['load_date']."</td><td>".$cargas['content_date']."</td><td>".$cargas['filename']."</td><td>".$cargas['tipo']."</td><td align='right'><a href='javascript:borrar_carga(".$cargas['id'].",".$referer.")'><img src='./images/cross.png'></a></td></tr>";
		}
	}
	else{
		echo "<tr><td colspan='3' align='center'>No hay cargas hechas el dia de hoy...</td></tr>";
	}
}
mysql_close($id);
?>
</table>
