<?php include_once("./header_login.php"); ?>
<div id='centrado'>
<div class="clear-fix">&nbsp;</div>
<div class="clear-fix">&nbsp;</div>
<div class="clear-fix">&nbsp;</div>
<form id="loginForm" action="./login.php" method="POST">
             <input type='hidden' name='PHPSESSID' value='<?PHP echo session_id(); ?>'>
             <input type='hidden' name='option' value='login'>
			 <input type='hidden' name='url' value='<?PHP echo $url; ?>'>

  <table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <th class="titulo" colspan="2" scope="row">Area restringida</th>
  </tr>
  <tr>
  	<th>Usuario:</th><td><input type="text" id="login" name="usuario" class="required"></td>
  </tr>
   <tr>
  	<th>Clave:</th><td><input type="password" id="clave" name="clave" class="required"></td>
  </tr>
<?PHP
if(isset($_SESSION['error']) && $_SESSION['error'] == 1)
{
?>
  <tr>
  	<td>&nbsp;</td><td><span class="obligatorio"><?php echo $error; ?></span></td>
  </tr>
<?PHP
$_SESSION['error'] = 0;
}
?>  
 
  <tr>
  	<td>&nbsp;</td><td><input type="submit" name="submit" value="Iniciar sesi&oacute;n"></td>
  </tr>
 </table>
 </form>
</div>
<?php include_once("./footer.php"); ?>