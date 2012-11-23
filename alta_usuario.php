<?php
include_once("./header.php");
include_once("./formulario_alta_usuarios.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

if(isset($_POST['usuario']) && $_POST['usuario'] != "")
{
	$nombre = strtoupper($_POST['nombre']);
	$usuario2 = trim($_POST['usuario']);
	$clave = $_POST['clave'];
	
	$sql = "SELECT usuario FROM usuarios WHERE usuario = '".$usuario2."'";
	$rst = mysql_query($sql,$id) or die(mysql_error());
	$existe = mysql_num_rows($rst);
	
	if($existe == 1)
	{
		die("<div id='centrado' class='alerta'><center>Este nombre de Usuario ya existe, intente con otro.</center></div>");
	}
	else
	{

		$sql = "INSERT INTO usuarios(id, nombre,usuario, clave, tipo) VALUES(NULL,'".$nombre."','".$usuario2."','".$clave."', 1)";
		$rst = mysql_query($sql,$id)or die(mysql_error());
		if($rst)
		{
		  echo "<div id='centrado' class='alerta'><center>Usuario insertado correctamente.</center></div>";
		}
	}
}
mysql_close($id);
?>
<?php include_once("./lista_usuarios.php"); ?>
<?php include_once("./footer.php"); ?>