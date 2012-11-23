<?php
include_once("./header.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$sql = "SELECT nombre FROM tipos_arena";
$rst = mysql_query($sql,$id) or die(mysql_error());
?>
<div id="reporte">
<form id="datos" action="generar_reporte.php" method="POST">

			<fieldset style="border: solid 1px #C0C0C0;">
			<legend>Consultas</legend>
			<table>
			<tr>
				<td colspan="10">Fecha:&nbsp;<input type="text" name="date" class="fecha required" id="datepicker"></td>
			</tr>
			<tr>
				<th>#</th>
				<th>Tipo arena</th>
				<th>Hr/Inicio</th>
				<th>Hr/Final</th>
				<th>Hrs/Prod.</th>
				<th>Materia/P</th>
				<th>Producion</th>
				<th>Rendimiento %</th>
				<th>Productividad</th>
			</tr>
			<!-- Inicia fragmento de fila 1 de procesamiento de datos -->
			<tr>
				<td>1</td>
				<td>
					<select id="tipoarena1" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena1.options[datos.tipoarena1.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$arena_nombre = array("nombre" => array());
					
					while($arena = mysql_fetch_assoc($rst))
					{
						array_push($arena_nombre["nombre"],$arena["nombre"]);
					?>
						<option value="<?php echo $arena["nombre"]; ?>"><?php echo $arena["nombre"]; ?></option>				
					<?php
					}
					mysql_close($id);
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora11" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora21" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod1" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima1" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt1" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi1" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product1" readonly class="produccion"></td>
				
			</tr>
			<!-- Termina fragmento de fila 2 de procesamiento de datos -->
			<!-- Inicia fragmento de una fila completa de procesamiento de datos -->
			<tr>
				<td>2</td>
				<td>
					<select id="tipoarena2" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena2.options[datos.tipoarena2.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora12" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora22" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod2" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima2" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt2" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi2" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product2" readonly class="produccion"></td>
				</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 3 de procesamiento de datos -->
			<tr>
				<td>3</td>
				<td>
					<select id="tipoarena3" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena3.options[datos.tipoarena3.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora13" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora23" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod3" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima3" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt3" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi3" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product3" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 4 de procesamiento de datos -->
			<tr>
				<td>4</td>
				<td>
					<select id="tipoarena4" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena4.options[datos.tipoarena4.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora14" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora24" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod4" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima4" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt4" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi4" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product4" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 5 de procesamiento de datos -->
			<tr>
				<td>5</td>
				<td>
					<select id="tipoarena5" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena5.options[datos.tipoarena5.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora15" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora25" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod5" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima5" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt5" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi5" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product5" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 6 de procesamiento de datos -->
			<tr>
				<td>6</td>
				<td>
					<select id="tipoarena6" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena6.options[datos.tipoarena6.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora16" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora26" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod6" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima6" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt6" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi6" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product6" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 7 de procesamiento de datos -->
			<tr>
				<td>7</td>
				<td>
					<select id="tipoarena7" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena7.options[datos.tipoarena7.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora17" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora27" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod7" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima7" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt7" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi7" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product7" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->			
			<!-- Inicia fragmento de fila 8 de procesamiento de datos -->
			<tr>
				<td>8</td>
				<td>
					<select id="tipoarena8" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena8.options[datos.tipoarena8.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora18" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora28" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod8" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima8" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt8" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi8" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product8" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 9 de procesamiento de datos -->
			<tr>
				<td>9</td>
				<td>
					<select id="tipoarena9" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena9.options[datos.tipoarena9.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora19" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora29" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod9" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima9" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt9" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi9" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product9" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 10 de procesamiento de datos -->
			<tr>
				<td>10</td>
				<td>
					<select id="tipoarena10" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena10.options[datos.tipoarena10.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora110" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora210" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod10" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima10" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt10" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi10" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product10" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 11 de procesamiento de datos -->
			<tr>
				<td>11</td>
				<td>
					<select id="tipoarena11" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena11.options[datos.tipoarena11.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora111" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora211" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod11" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima11" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt11" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi11" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product11" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->	
			<!-- Inicia fragmento de fila 12 de procesamiento de datos -->
			<tr>
				<td>12</td>
				<td>
					<select id="tipoarena12" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena12.options[datos.tipoarena12.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora112" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora212" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod12" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima12" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt12" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi12" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product12" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->
			<!-- Inicia fragmento de fila 13 de procesamiento de datos -->
			<tr>
				<td>13</td>
				<td>
					<select id="tipoarena13" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena13.options[datos.tipoarena13.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora113" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora213" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod13" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima13" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt13" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi13" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product13" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->			
			<!-- Inicia fragmento de fila 14 de procesamiento de datos -->
			<tr>
				<td>14</td>
				<td>
					<select id="tipoarena14" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena14.options[datos.tipoarena14.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora114" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora214" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod14" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima14" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt14" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi14" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product14" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->			
			<!-- Inicia fragmento de fila 15 de procesamiento de datos -->
			<tr>
				<td>15</td>
				<td>
					<select id="tipoarena15" name="tipo_arena[]" onchange="cargar_horas(datos.tipoarena15.options[datos.tipoarena15.selectedIndex], this.form.date);">
						<option value="-"></option>
					<?php
					$i=0;
					while($i <= 32)
					{
					?>
						<option value="<?php echo $arena_nombre["nombre"][$i]; ?>"><?php echo $arena_nombre["nombre"][$i]; ?></option>
					<?php
						$i++;
					}
					?>
					</select>
				</td>
				<td><input type="text" name="hora1[]" id="hora115" class="timeTipe"></td>
				<td><input type="text" name="hora2[]" id="hora215" class="timeTipe"></td>
				<td><input type="text" name="hprod[]" id="hprod15" readonly class="produccion"></td>
				<td><input type="text" name="mprima[]" id="mprima15" readonly class="produccion"></td>
				<td><input type="text" name="prodt[]" id="prodt15" readonly class="produccion"></td>
				<td><input type="text" name="rendi[]" id="rendi15" readonly class="produccion"></td>
				<td><input type="text" name="product[]" id="product15" readonly class="produccion"></td>
			</tr>
			<!-- Termina fragmento de una fila completa de procesamiento de datos -->	
			<tr>
				<td colspan="10"><input type="submit" value="Guardar reporte"><input type="button" value="Consultar" onClick="consultar()"><input type="reset"></td>
			</tr>
			</table>
			</fieldset>
</form>
</div>
<div class="tiempos">
	<fieldset style="border: solid 1px #C0C0C0;"><legend>Horas Produccion</legend>
		<div id="tiempos">&nbsp;</div>
	</fieldset>
</div>
<?php
include_once("./footer.php");
?>