<?php
include_once("./header.php");
?>
<div id="centrado">
<table width="100%">
<tr>
  <th colspan="2" align="center"><span>Carga arena humeda</span></th>
</tr>
<tr>
  <td>Seleccione archivo</td>
  <form id="carga_humeda" action="./load_data_humeda.php" method="post" enctype="multipart/form-data">
  <td><input class="required" type="file" name="csv" />
  <input type="hidden" name="tipo_arena" value="datos_humeda" />
  <input name="submit" type="submit" value="Cargar..." /></td>
  </form>
</table>
</div>
</div>
<?php
if(!isset($_POST['tipo_arena']))
	include_once("./footer.php");
?>
