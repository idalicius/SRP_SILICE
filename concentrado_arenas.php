<?php
include_once("./header.php");


$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$sql = "SELECT tipo_arena, round(sum(produccion)) as total FROM datos_reportes GROUP BY tipo_arena";

$query = mysql_query($sql,$id) or die(mysql_error());

$t = mysql_affected_rows($quey);
echo "<div id='centrado'>";
echo "<table width='100%'><tr><th>Tipo arena</th><th>Acumulado Total</th></tr>";
if($t = 0)
{
		echo "<tr><th align='center' colspan='2'>No hay datos..</th></tr>";
}
else
{
	while($datos = mysql_fetch_assoc($query))
	{
		echo "<tr><td align='center'>".$datos["tipo_arena"]."</td><td align='center'>".$datos["total"]."</td></tr>";
	}
}
echo "</table>";
echo "</div>";
?>
<div class="clear-fix">&nbsp;</div>
<div class="clear-fix"><hr></div>
<?php
include_once("./grafica_acumulado.php");
include_once("./footer.php");
?>
