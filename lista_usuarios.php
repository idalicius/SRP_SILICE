<?php
include_once("./config.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());
	
	$sql = "SELECT * FROM usuarios";
	$rst = mysql_query($sql,$id) or die(mysql_error());
	$total = mysql_num_rows($rst);
	
	if($total == 0){
?>
<div id="centrado">
 <fieldset>
  <legend>Alta usuario</legend> 
  <table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
      <th align="center" scope="row">No hay usuarios</th>
    </tr>
  </table>
  </fieldset>
</div>
<?php
	}	
	else{
?>
<div id="centrado">
 <fieldset>
  <legend>Lista de usuarios</legend> 
  <table width="100%" border="0" cellspacing="2" cellpadding="0">
    <tr>
      <th align="left" scope="row">ID</th>
	  <th align="left" scope="row">NOMBRE</th>
	  <th align="left" scope="row">USUARIO</th>
	  <th align="left" scope="row">TIPO</th>
    </tr>
<?php
	 while(list($id,$nombre,$usuario2,$clave,$tipo) = mysql_fetch_row($rst)){
		$tipo = ($tipo == 0) ? "Administrador" : "Supervisor";
		echo "<tr><td>".$id."</td><td>".$nombre."</td><td>".$usuario2."</td><td>".$tipo."</td></tr>";
	 }
	}
	mysql_close($id);
?>
  </table>
  </fieldset>
</div>