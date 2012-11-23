<?PHP session_start(); ?>
<?PHP include_once("config.php"); ?>
<?PHP

if(isset($_POST['option']))
{
	$opt = $_POST['option'];
}
else
{
	$opt = $_GET['option'];
}

switch($opt)
{
 case 'login':
 {
     $user = $_POST['usuario'];
	 $clave = $_POST['clave'];
	 
	 $url = $_REQUEST['url'];

     $id = mysql_connect($servidor,$usuario,$password) or die(mysql_error());
     mysql_select_db($db,$id);

     $sql = "SELECT nombre, usuario, clave, tipo FROM usuarios WHERE usuario = '".$user."' and clave = '".$clave."' LIMIT 1";
     $res = mysql_query($sql,$id) or die(mysql_error());
	 $datos = mysql_fetch_assoc($res);
     $logueado = mysql_affected_rows($id);
	 
     if($logueado == 1)
     {
       $_SESSION['loged'] = true;
	   $_SESSION['nombre'] = $datos['nombre'];
	   $_SESSION['usuario'] = $datos['usuario'];
	   $_SESSION['tipo'] = $datos['tipo'];
	   $_SESSION['error'] = 0;
	   $_SESSION['tiempo'] = time();
     }
     else
     {
       $_SESSION['loged'] = false;
	   $_SESSION['error'] = 1;
     }

	 header("location: ".$url);
 }break;

 case 'logout':
 {   
	 $_SESSION['loged'] = false;
     unset($_SESSION['loged']);
	 session_destroy();
     header("location: index.php");
 }break;
}
mysql_close($id);
?>