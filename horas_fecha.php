<?php
// include_once("./config.php");
// $id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
// mysql_select_db($db) or die(mysql_error());

// if(isset($_GET["nombre"]) & $_GET["nombre"] != "")
// {
	// $nombre = $_GET["nombre"];
// }
// else
// {
	// $nombre = "";
// }
// $date = $_GET["date"];


// $sql = "SELECT nombre, tipo FROM tipos_arena where nombre = '".$nombre."'";
// $rst = mysql_query($sql,$id) or die(mysql_error());
// $datos = mysql_fetch_assoc($rst);

// $tipo_arena ="";
// if($datos["tipo"] == "SECA")
// {
	// $tipo_arena = "datos_seca";
// }
// if($datos["tipo"] == "HUMEDA")
// {
	// $tipo_arena = "datos_humeda";
// }
// else
// {
	// $tipo_arena = "datos_seca";
// }

// if($tipo_arena != "")
// {
	// $sql1 = "SELECT time FROM ".$tipo_arena." WHERE (date = '".$date."' and flujo <> 0) ORDER BY time ASC";

	// $rst2 = mysql_query($sql1,$id) or die(mysql_error());
	// $num = mysql_num_rows($rst2);
	// if($num > 0)
	// {
		// $total = "<p>ARENA ".$datos["tipo"]."</p><SELECT MULTIPLE size='23'>";
		// while($t1 = mysql_fetch_assoc($rst2))
		// {
			// $total .= "<option>".$t1['time']."</option>";
		// }
		// $total .= "</SELECT>";
		// echo $total;
	// }
	// else
	// {
		// echo "<p align='center'>No hay cargas</p>";
	// }
// }
// mysql_close($id);
?>


<?php
include_once("./config.php");
//include_once("./header.php");
$id = mysql_connect($servidor, $usuario, $password) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());

$date = $_GET["date"];

$tipo_seca = "datos_seca";
$tipo_humeda = "datos_humeda";
$tipo_prima = "datos_prima";

$sql_seca = "SELECT time FROM ".$tipo_seca." WHERE (date = '".$date."' and flujo <> 0) ORDER BY time ASC";
$sql_humeda = "SELECT time FROM ".$tipo_humeda." WHERE (date = '".$date."' and flujo <> 0) ORDER BY time ASC";
$sql_prima = "SELECT time FROM ".$tipo_prima." WHERE (date = '".$date."' and flujo <> 0) ORDER BY time ASC";

	$query_seca = mysql_query($sql_seca,$id) or die(mysql_error());
	$query_humeda = mysql_query($sql_humeda,$id) or die(mysql_error());
	$query_prima = mysql_query($sql_prima,$id) or die(mysql_error());

	//Consulta tipo de arena seca
	$num_seca = mysql_num_rows($query_seca);
	if($num_seca > 0)
	{
		$total = "<div style='clear:both; float:left;'><p>SECA</p><SELECT MULTIPLE size='23'>";
		while($seca = mysql_fetch_assoc($query_seca))
		{
			$total .= "<option>".$seca['time']."</option>";
		}
		$total .= "</SELECT></div>";
		echo $total;
	}
	else
	{
		echo "<div style='clear:both; float:left;'>No hay cargas</div>";
	}

	//Consulta tipo de arena humeda
	$num_humeda = mysql_num_rows($query_seca);
	if($num_humeda > 0)
	{
		$total = "<div style='float:left;'><p>HUMEDA</p><SELECT MULTIPLE size='23'>";
		while($humeda = mysql_fetch_assoc($query_humeda))
		{
			$total .= "<option>".$humeda['time']."</option>";
		}
		$total .= "</SELECT></div>";
		echo $total;
	}
	else
	{
		echo "<div style='float:left;'>No hay cargas</div>";
	}
	
	//Consulta tipo de arena prima
	$num_prima = mysql_num_rows($query_prima);
	if($num_prima > 0)
	{
		$total = "<div style='float:left;'><p>PRIMA</p><SELECT MULTIPLE size='23'>";
		while($prima = mysql_fetch_assoc($query_prima))
		{
			$total .= "<option>".$prima['time']."</option>";
		}
		$total .= "</SELECT></div>";
		echo $total;
	}
	else
	{
		echo "<div style='float:left;'>No hay cargas</div>";
	}	
	
mysql_close($id);

?>
