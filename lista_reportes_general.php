<?php include_once("./header.php"); ?>
<script type="text/javascript">
$(function () {
    // On document ready, call visualize on the datatable.
    $(document).ready(function() {
        /**
         * Visualize an HTML table using Highcharts. The top (horizontal) header
         * is used for series names, and the left (vertical) header is used
         * for category names. This function is based on jQuery.
         * @param {Object} table The reference to the HTML table to visualize
         * @param {Object} options Highcharts options
         */
        Highcharts.visualize = function(table, options) {
            // the categories
            options.xAxis.categories = [];
            $('tbody th', table).each( function(i) {
                options.xAxis.categories.push(this.innerHTML);
            });
    
            // the data series
            options.series = [];
            $('tr', table).each( function(i) {
                var tr = this;
                $('th, td', tr).each( function(j) {
                    if (j > 0) { // skip first column
                        if (i == 0) { // get the name and init the series
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                            };
                        } else { // add values
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
    
            var chart = new Highcharts.Chart(options);
        }
    
        var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'COMPARATIVA DE PRODUCCION POR SUPERVISOR'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'Toneladas'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.y +' '+ this.x.toLowerCase();
                }
            }
        };
    
        Highcharts.visualize(table, options);
    });
    
});
</script>
<?php

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$hoy = $_POST["date"];

$sql = "SELECT usuario_reporte FROM reportes WHERE fecha_datos_reporte = '".$hoy."'";
$query_usuarios = mysql_query($sql,$id) or die(mysql_error());
$reportes_fecha = mysql_num_rows($query_usuarios);
if($reportes_fecha > 0)
{
$usuarios;
$i=0;
while($usuario = mysql_fetch_assoc($query_usuarios))
{	
	$sql = "SELECT reportes.*, datos_reportes.* FROM `datos_reportes` INNER JOIN reportes on (reportes.id_reporte = datos_reportes.id_reporte) WHERE supervisor = '".$usuario['usuario_reporte']."' and datos_reportes.fecha_datos_reporte = '".$hoy."' ORDER BY hora_inicio, fecha_reporte ASC";
	$query = mysql_query($sql,$id) or die(mysql_error());
	$referer = "document.location.href";
	$usuarios[$i] = $usuario['usuario_reporte'];
	$i++;
?>
<table width="100%" style="border-spacing:12px;">
<tr><th colspan="11">Reportes del dia <font color="#FE0000"><?php echo $hoy; ?></font> para: <font color="#FE5E04"><?php echo $usuario['usuario_reporte']; ?></font></th></tr>
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
	?>
</table>
<?php
}

$sql = "SELECT supervisor, sum(`produccion`) AS produccion FROM `datos_reportes` WHERE `fecha_datos_reporte` = '".$hoy."' GROUP BY supervisor";
$query = mysql_query($sql,$id) or die(mysql_error());

$produccion_usuario;
$i=0;
while($datos = mysql_fetch_assoc($query))
{
	$produccion_usuario[$i] = $datos['produccion'];
	$i++;
}
mysql_close($id);

?>

<div class="clear-fix">&nbsp;</div>
<!-- IMPRIME GRAFICO DE BARRAS POR SUPERVISORES -->
<div id="container" style="min-width: 400px; height: 300px; margin: 0 auto"></div>
<table id="datatable" style="display: none; visibility: none;">
<thead>
	<tr>
		<th></th>
		<?php
		foreach($usuarios as $nombre)
		{
		 echo "<th>".strtoupper($nombre)."</th>";
		}
		?>
	</tr>
</thead>

<tbody>
<tr>
	<th>Toneladas</th>
	<?php
	foreach($produccion_usuario as $produccion)
	{
		echo "<td>".round($produccion,2)."</td>";
	}
	?>
</tr>
</tbody>
</table>
<?php
}
else
{
?>
<table width="100%"><tr><th>No hay reportes para esta fecha</th></tr></table>
<?php
}
?>

<?php include_once("./footer.php"); ?>