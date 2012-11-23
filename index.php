<?php include_once("./header.php"); ?>
<?php 

if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0)
{
 //include_once("./lista_reportes_general.php"); 
 include_once("./consulta_reportes_fecha.php"); 
}
else
{
?>
<?php include_once("./lista_cargas.php"); ?>
<div class="clear-fix">&nbsp;</div>
<?php include_once("./lista_reportes.php"); ?>
<div class="clear-fix">&nbsp;</div>
<?php
}
?>
<?php include_once("./footer.php"); ?>