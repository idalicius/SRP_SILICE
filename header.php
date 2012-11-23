<?php
include_once("./config.php");
include_once("./secure.php");
//include_once("./checar_session.php");
?>
<html lang="es" class="cufon-active cufon-ready">
<head>
    <title>Silice del Istmo - Sistema de reportes de produccion</title>
    <meta charset="utf-8">
    <link media="screen" type="text/css" href="./css/reset.css" rel="stylesheet">
    <link media="screen" type="text/css" href="./css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/jquery-ui.css" />
    <link rel="stylesheet" href="./css/style1.css" />
	
	
 	<script type="text/javascript" src="./js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="./js/fecha_hora.js"></script>
	
    <script type="text/javascript" src="./js/ff_cash.js"></script>
    <script type="text/javascript" src="./js/superfish.js"></script>
    <script type="text/javascript" src="./js/tms-0.3.2.js"></script>
    <script type="text/javascript" src="./js/tms_presets.js"></script>
    <script type="text/javascript" src="./js/cufon-yui.js"></script>
	<style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:-moz-inline-box!important;display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;}}@media print{cufon{padding:0!important;}cufon canvas{display:none!important;}}</style>
    <script type="text/javascript" src="./js/cufon-replace.js"></script>
    <script type="text/javascript" src="./js/Oswald_400.font.js"></script>

	<script type="text/javascript" src="./js/jquery-ui.js"></script>
	<script type="text/javascript" src="./js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="./js/jquery-ui-sliderAccess.js"></script>
	<script type="text/javascript" src="./js/jquery.validate.js"></script>
	
	<script language="javascript" type="text/javascript" src="./js/codigo.js" async="true"></script>	
	<script src="./js/highcharts.js"></script>
	<script src="./js/modules/exporting.js"></script>

	
	<script>
	//Validacion de datos en formuario de reportes
	$(document).ready(function(){
	$("#datos").validate();
	 });
	</script>

	<script>
	//Validacion de datos en formulario de alta usuario
	$(document).ready(function(){
	$("#alta_usuario").validate();
	 });
	</script>
	
	<script>
	//Validacion de datos en furmulario carga arena humeda
	$(document).ready(function(){
	$("#carga_humeda").validate();
	 });
	</script>

	<script>
	//Validacion de datos en furmulario carga arena seca
	$(document).ready(function(){
	$("#carga_seca").validate();
	 });
	</script>

	<script>
	//Validacion de datos en furmulario carga arena materia prima
	$(document).ready(function(){
	$("#carga_prima").validate();
	 });
	</script>

	<script>
	//Validacion de datos en furmulario de logueo
	$(document).ready(function(){
	$("#date").validate();
	 });
	</script>
	
	
	<script>
	//Validacion de datos en furmulario de logueo
	$(document).ready(function(){
	$("#loginForm").validate();
	 });
	</script>
	
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd");
    });
	
    $(function() {
        $( "#date" ).datepicker();
		$( "#date" ).datepicker( "option", "dateFormat", "yy-mm-dd");
    });	

	/* Funciones para asignar los timepickers a cada elemento del form */
	/*Horas para hora1 y 2 fila 1*/
	$(function() {
		$('#hora11').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora21').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	
	/*Horas para hora1 y 2 fila 2*/
	$(function() {
		$('#hora12').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora22').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		

	/*Horas para hora1 y 2 fila 3*/
	$(function() {
		$('#hora13').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora23').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		

	/*Horas para hora1 y 2 fila 4*/
	$(function() {
		$('#hora14').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora24').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		

	/*Horas para hora1 y 2 fila 5*/
	$(function() {
		$('#hora15').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora25').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		

	/*Horas para hora1 y 2 fila 6*/
	$(function() {
		$('#hora16').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora26').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	

	/*Horas para hora1 y 2 fila 7*/
	$(function() {
		$('#hora17').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora27').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	/*Horas para hora1 y 2 fila 8*/
	$(function() {
		$('#hora18').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora28').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	/*Horas para hora1 y 2 fila 9*/
	$(function() {
		$('#hora19').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora29').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	/*Horas para hora1 y 2 fila 10*/
	$(function() {
		$('#hora110').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora210').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	/*Horas para hora1 y 2 fila 11*/
	$(function() {
		$('#hora111').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora211').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});	
	/*Horas para hora1 y 2 fila 12*/
	$(function() {
		$('#hora112').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora212').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		
	/*Horas para hora1 y 2 fila 13*/
	$(function() {
		$('#hora113').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora213').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		
	/*Horas para hora1 y 2 fila 14*/
	$(function() {
		$('#hora114').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora214').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});		
	/*Horas para hora1 y 2 fila 15*/
	$(function() {
		$('#hora115').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});
	
	$(function() {
		$('#hora215').timepicker({
			showSecond: false,
			timeFormat: 'hh:mm:ss',
			stepHour: 1,
			stepMinute: 1,
		});	
	});			
    </script>
    
	<!--[if lt IE 7]> 
  <div style='clear:both; text-align:center; position:relative;'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img                       src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a  faster, safer browsing experience, upgrade for free today." /></a></div>
 <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
</head>
<body id="page1">
<!--==============================header=================================-->
<header>
	<div class="main">
        <div class="row-1">
            <h1><a href="#"><strong>S  R  P  -  Silice</strong></a></h1>
            <span class="contact-top"><span><script>MostrarFecha();</script></span></span>
        </div>
        <div class="row-2">
            <nav>
              <ul class="sf-menu sf-js-enabled">
                    <li><a href="./" class="current">Panel</strong></a></li>
					<?php
					if(isset($_SESSION['tipo']) && $_SESSION['tipo'] != 0)
					{
					?>
                    <li class=""><a href="#">Cargas CSV</a>
                        <ul style="visibility: hidden; display: none;">
                            <li><a href="./formulario_carga_humeda.php">ARENA HUMEDA</a></li>
                            <li><a href="./formulario_carga_seca.php">ARENA SECA</a></li>
                            <li><a href="./formulario_carga_mprima.php">MATERIA PRIMA</a></li>
                        </ul>
                    </li>
                    <li><a href="./reportes.php">Generar Reporte</a></li>
					<?php
					}
					?>					
					<?php
					if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0)
					{
					?>
                    <li><a href="#">Consultas</a>
                        <ul style="visibility: hidden; display: none;">
                            <li><a href="./consulta_reportes_fecha.php">REPORTES POR FECHA</a></li>
                            <li><a href="./concentrado_arenas.php">ACUMULADO TIPOS DE ARENA</a></li>
							<li><a href="./grafica_flujo.php">GRAFICA FLUJO/FECHA</a></li>
                            <!--<li><a href="#">PRODUCCION / SUPERVISOR</a></li>-->
                        </ul>
					</li>
					<?php
					}
					?>
					<?php
					$tipo = "Supervisor";
					if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0)
					{
					$tipo = "Administrador";
					?>
                    <li><a href="./formulario_alta_usuarios.php">Administrar Usuarios</a></li>
					<li><a target="_blank" href="./phpmyadmin/">Administrar Datos</a></li>
					<?php
					}
					?>
                    <li><a href="./login.php?option=logout">Salir</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--==============================aside=================================-->
<aside>
	<div class="main">
    	<div class="padding-aside">
        	<div class="wrapper p4">
			<div id="supervisor"><b><?php echo $tipo; ?>:&nbsp;</b><?php echo $_SESSION['nombre']; ?></div>