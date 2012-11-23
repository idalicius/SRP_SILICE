<?PHP
session_start();
if(isset($_SESSION['error']) && $_SESSION['error'] == 1)
{
	$error = "Datos de acceso incorrectos";
}
$url = $_SERVER['REQUEST_URI'];
if(isset($_SESSION['loged']) && ($_SESSION['loged'] == true))
{

}
else
{
 include_once('./loginform.php');
 exit();
}

?>
