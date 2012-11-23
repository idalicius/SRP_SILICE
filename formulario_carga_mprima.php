<?php
include_once("./header.php");
?>
<div id="centrado">
<table width="100%">
<tr>
  <th colspan="2" align="center">Carga arena materia prima</th>
</tr>
<tr>
  <td>Seleccione archivo</td>
  <form id="carga_prima" action="./load_data_mprima.php" method="post" enctype="multipart/form-data">
  <td><input class="required" type="file" name="csv" />
  <input type="hidden" name="tipo_arena" value="datos_prima" />
  <input name="submit" type="submit" value="Cargar..." /></td>
  </form>
</table>
</div>
</div>
<?php
if(!isset($_POST['tipo_arena']))
	include_once("./footer.php");
?>
