<?php include_once("./header.php"); ?>
<div id="centrado">
<form action="./lista_reportes_general.php" method="POST">
		<table width="100%">
			<tr><th align="center">Contulta de reportes de produccion por fecha</th></tr>
			<!--<tr><td>Fecha: <input type="text" id="date" name="date" class="fecha required"><input type="button" value="consultar" onclick="reporte_fecha(this.form.date,reporte_fecha1.id);"></td></tr>-->
			<tr>
				<td>
					Fecha: <input id="datepicker" class="fecha required" type="text" name="date">
					<input type="submit" value="consultar">
				</td>
			</tr>
		</table>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
		<div class="clear-fix">&nbsp;</div>
</form>
</div>
<?php include_once("./footer.php"); ?>