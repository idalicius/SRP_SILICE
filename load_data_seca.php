<?php
include_once("./header.php");
include_once("./formulario_carga_seca.php");

$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$nombre = $_FILES["csv"]["name"];
$tamanio = $_FILES["csv"]["size"];
$tipo = $_FILES["csv"]["type"];
$temporal = $_FILES["csv"]["tmp_name"];
$ip = $_SERVER['REMOTE_ADDR'];

$archivo = $_FILES["csv"]["tmp_name"];
$hash = hash_file("MD5",$_FILES["csv"]["tmp_name"]);

$sql = "SELECT * FROM cargas WHERE hash = '".$hash."'";
$rs_hash = mysql_query($sql,$id) or die(mysql_error());
$subido = mysql_num_rows($rs_hash);
$rst = mysql_fetch_assoc($rs_hash);
$tipo_arena = $_POST['tipo_arena'];
$id_reporte = 0;
if($subido == 0)
{
	$fh = @fopen($archivo,"r");
	if($fh)
	{
		$point = 0;
	
		while(($linea = fgets($fh,4096)) !== false)
		{
			if($point == 1)
			{
		 		$linea = explode(",",$linea);
				list($date,$time,$flujo,$carga,$velocidad,$total) = $linea;
				$tipo = substr($flujo,9,4);
				
				if($tipo == "SECA")
				{
				  $sql = "INSERT INTO cargas(id,load_date,hash,filename,tipo,user,ip) VALUES(NULL,'".date("Y-m-d H:i:s")."','".$hash."','".$nombre."','".$tipo."','".$_SESSION['usuario']."','".$ip."')";
				  mysql_query($sql,$id);

				//checa el id del ultimo archivo cargado
					$sql = "SELECT max(id) as id_reporte FROM cargas";
					$query = mysql_query($sql,$id) or die(mysql_error());
					$rst = mysql_fetch_assoc($query);
					$id_reporte = $rst['id_reporte'];
				  				  
				}
				else
				{
				  die("<table width='50%'><tr><th>Este archivo no corresponde al tipo de arena <b><font color='#FF0000'>SECA</font></b>, favor de verificar...</th></tr></table>");
				}
			}
			
		     if($point > 1)
			 {
				  $linea = explode(",",$linea);
				  list($date,$time,$flujo,$carga,$velocidad,$total) = $linea;

				  $fecha = DateTime::createFromFormat('Y/m/d', $date);
 				  $date = $fecha->format('Y-m-d');
				  
				  $sql = "INSERT INTO ".$tipo_arena."(id,id_carga,date,time,flujo,carga,velocidad,total1) VALUES(NULL,$id_reporte,'".$date."','".$time."',$flujo,$carga,$velocidad,$total);";
				  $rs = mysql_query($sql,$id) or die(mysql_error());
				  
				  $sql = "UPDATE cargas set content_date = '".$date."' WHERE id = ".$id_reporte;
				  mysql_query($sql,$id);				  
			 }
		  $point++;
		}
		echo "<table width='50%'><tr><th>Carga completa...</th></tr></table>";
	}
	else
	{
	 echo "<table width='50%'><tr><th>Error al abrir el archivo...</th></tr></table>";
	}
}
else
{
 echo "<table width='50%'><tr><th>Este archivo ya fue cargado anteriormente como <b><font color='#FF0000'>".$rst['tipo']."</font></b></th></tr></table>";
}
mysql_close($id);
?>
<?php include_once("./footer.php"); ?>