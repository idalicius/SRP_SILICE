<?php
$_SESSION['inactividad'] = time() - $_SESSION['tiempo'];

if($_SESSION['inactividad'] >= 1440)
{
 session_destroy();
 header("location: ./index.php");
}
?>