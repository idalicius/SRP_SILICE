<?php include_once("./header.php"); ?>
<div id="centrado">
<form id="alta_usuario" action="alta_usuario.php" method="POST" enctype="application/x-www-form-urlencoded">
  <fieldset>
  <legend>Alta usuarios</legend>
  <table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
      <th align="left" scope="row">Nombre completo:</th>
      <td><input class="required" type="text" name="nombre" id="nombre" size="50"/></td>
    </tr>
    <tr>
      <th align="left" scope="row">Usuario:</th>
      <td><input class="required" type="text" name="usuario" id="usuario" size="20"/><div id="udup"></div></td>
    </tr>
    <tr>
      <th align="left" scope="row">Clave:</th>
      <td><input class="required" type="password" name="clave" id="clave" size="20"/></td>
    </tr>
    <tr>
      <td colspan=2><input type="submit" name="agregar-usuario" value="Agregar usuario"/></td>
    </tr>
  </table>
  </fieldset>
</form>
</div>
<div class="clear-fix">&nbsp;</div>
<?php
if(!isset($_POST['usuario']))
	include_once("./lista_usuarios.php");
?>
<?php
if(!isset($_POST['usuario']))
include_once("./footer.php");
?>