//Cosulta reportes por fecha
function reporte_fecha(fecha, elemento){
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//document.getElementById(elemento).value = xmlhttp.responseText;
			document.getElementById(elemento).innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET","lista_reportes_general.php?date="+fecha.value,true);
	xmlhttp.send();
}

//funcion para borrar un reporte
function borrar_reporte(id,referer)
{
	var aceptar = confirm("Borrar reporte "+id);
	if(aceptar == true)
	{
	  document.location.href = "borrar_reporte.php?id="+id+"&"+referer;
	}
	else
	{
	   alert("Cancelado.");
	}
}

//funcion para borrar una carga
function borrar_carga(id,referer)
{
	var aceptar = confirm("Borrar carga "+id);
	if(aceptar == true)
	{
	  document.location.href = "borrar_carga.php?id="+id+"&"+referer;
	}
	else
	{
	   alert("Cancelado.");
	}
}

//Carga las horas de produccion
function horas_produccion(hora1,hora2,elemento){
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(elemento).value = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET","hrs.produccion.php?hora1="+hora1.value+"&hora2="+hora2.value,true);
	xmlhttp.send();
}

/*Funcion para checar la produccion de un tipo de arena*/
function produccion_arena(arena, fecha, hora1, hora2, destino)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{b
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			//document.getElementById(destino).innerHTML = xmlhttp.responseText;
			document.getElementById(destino).value = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","prod.tipoarena.php?nombre="+arena+"&date="+fecha.value+"&hora1="+hora1.value+"&hora2="+hora2.value,true);
	xmlhttp.send();
}

/*Funcion para checar la Arena materia prima*/
function materia_prima(arena, fecha, hora1, hora2, destino)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(destino).value = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","materia.prima.php?nombre="+arena+"&date="+fecha.value+"&hora1="+hora1.value+"&hora2="+hora2.value,true);
	xmlhttp.send();
}


function calcular_rendimiento(arena, fecha, hora1, hora2, destino)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(destino).value = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","calc.rendimiento.php?nombre="+arena+"&date="+fecha.value+"&hora1="+hora1.value+"&hora2="+hora2.value,false);
	xmlhttp.send();	
}

function calcular_productividad(arena, fecha, hora1, hora2, destino)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(destino).value = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET","calc.productividad.php?nombre="+arena+"&date="+fecha.value+"&hora1="+hora1.value+"&hora2="+hora2.value,false);
	xmlhttp.send();	
}

//Carga las horas trabajadas <> de 0 en un DIV y de una fecha seleccionada y del pesometro seleccionado 
function cargar_horas(arena, fecha){
	var xmlhttp;
	
	if(window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("tiempos").innerHTML = xmlhttp.responseText;
			//alert(arena.value);
		}
		else
		{
			document.getElementById("tiempos").innerHTML = "Cargando...";
		}
	}

	xmlhttp.open("GET","horas_fecha.php?nombre="+arena.value+"&date="+fecha.value,true);
	xmlhttp.send();
}

// Consualta todos los datos con llamadas asincronas a funciones ajax
function consultar()
{
	//Formulario con id = datos
	var f = document.getElementById("datos");
	
	/* Consulta fila 1*/
	if(f.tipoarena1.options[f.tipoarena1.selectedIndex].value != "-")
	{
	horas_produccion(f.hora11,f.hora21,f.hprod1.id);
	produccion_arena(f.tipoarena1.options[f.tipoarena1.selectedIndex].value, f.date, f.hora11, f.hora21, f.prodt1.id);
	materia_prima(f.tipoarena1.options[f.tipoarena1.selectedIndex].value, f.date, f.hora11, f.hora21, f.mprima1.id);
	calcular_rendimiento(f.tipoarena1.options[f.tipoarena1.selectedIndex].value, f.date, f.hora11, f.hora21, f.rendi1.id);
	calcular_productividad(f.tipoarena1.options[f.tipoarena1.selectedIndex].value, f.date, f.hora11, f.hora21, f.product1.id);
	}
	/* Consulta fila 2*/
	if(f.tipoarena2.options[f.tipoarena2.selectedIndex].value != "-")
	{
	horas_produccion(f.hora12,f.hora22,f.hprod2.id);
	produccion_arena(f.tipoarena2.options[f.tipoarena2.selectedIndex].value, f.date, f.hora12, f.hora22, f.prodt2.id);
	materia_prima(f.tipoarena2.options[f.tipoarena2.selectedIndex].value, f.date, f.hora12, f.hora22, f.mprima2.id);
	calcular_rendimiento(f.tipoarena2.options[f.tipoarena2.selectedIndex].value, f.date, f.hora12, f.hora22, f.rendi2.id);
	calcular_productividad(f.tipoarena2.options[f.tipoarena2.selectedIndex].value, f.date, f.hora12, f.hora22, f.product2.id);
	}
	/* Consulta fila 3*/
	if(f.tipoarena3.options[f.tipoarena3.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora13,f.hora23,f.hprod3.id);
	produccion_arena(f.tipoarena3.options[f.tipoarena3.selectedIndex].value, f.date, f.hora13, f.hora23, f.prodt3.id);
	materia_prima(f.tipoarena3.options[f.tipoarena3.selectedIndex].value, f.date, f.hora13, f.hora23, f.mprima3.id);
	calcular_rendimiento(f.tipoarena3.options[f.tipoarena3.selectedIndex].value, f.date, f.hora13, f.hora23, f.rendi3.id);
	calcular_productividad(f.tipoarena3.options[f.tipoarena3.selectedIndex].value, f.date, f.hora13, f.hora23, f.product3.id);
	}
	/* Consulta fila 4*/
	if(f.tipoarena4.options[f.tipoarena4.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora14,f.hora24,f.hprod4.id);
	produccion_arena(f.tipoarena4.options[f.tipoarena4.selectedIndex].value, f.date, f.hora14, f.hora24, f.prodt4.id);
	materia_prima(f.tipoarena4.options[f.tipoarena4.selectedIndex].value, f.date, f.hora14, f.hora24, f.mprima4.id);
	calcular_rendimiento(f.tipoarena4.options[f.tipoarena4.selectedIndex].value, f.date, f.hora14, f.hora24, f.rendi4.id);
	calcular_productividad(f.tipoarena4.options[f.tipoarena4.selectedIndex].value, f.date, f.hora14, f.hora24, f.product4.id);
	}
	/* Consulta fila 5*/
	if(f.tipoarena5.options[f.tipoarena5.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora15,f.hora25,f.hprod5.id);
	produccion_arena(f.tipoarena5.options[f.tipoarena5.selectedIndex].value, f.date, f.hora15, f.hora25, f.prodt5.id);
	materia_prima(f.tipoarena5.options[f.tipoarena5.selectedIndex].value, f.date, f.hora15, f.hora25, f.mprima5.id);
	calcular_rendimiento(f.tipoarena5.options[f.tipoarena5.selectedIndex].value, f.date, f.hora15, f.hora25, f.rendi5.id);
	calcular_productividad(f.tipoarena5.options[f.tipoarena5.selectedIndex].value, f.date, f.hora15, f.hora25, f.product5.id);
	}
	/* Consulta fila 6*/
	if(f.tipoarena6.options[f.tipoarena6.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora16,f.hora26,f.hprod6.id);
	produccion_arena(f.tipoarena6.options[f.tipoarena6.selectedIndex].value, f.date, f.hora16, f.hora26, f.prodt6.id);
	materia_prima(f.tipoarena6.options[f.tipoarena6.selectedIndex].value, f.date, f.hora16, f.hora26, f.mprima6.id);
	calcular_rendimiento(f.tipoarena6.options[f.tipoarena6.selectedIndex].value, f.date, f.hora16, f.hora26, f.rendi6.id);
	calcular_productividad(f.tipoarena6.options[f.tipoarena6.selectedIndex].value, f.date, f.hora16, f.hora26, f.product6.id);
	}
	/* Consulta fila 7*/
	if(f.tipoarena7.options[f.tipoarena7.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora17,f.hora27,f.hprod7.id);
	produccion_arena(f.tipoarena7.options[f.tipoarena7.selectedIndex].value, f.date, f.hora17, f.hora27, f.prodt7.id);
	materia_prima(f.tipoarena7.options[f.tipoarena7.selectedIndex].value, f.date, f.hora17, f.hora27, f.mprima7.id);
	calcular_rendimiento(f.tipoarena7.options[f.tipoarena7.selectedIndex].value, f.date, f.hora17, f.hora27, f.rendi7.id);
	calcular_productividad(f.tipoarena7.options[f.tipoarena7.selectedIndex].value, f.date, f.hora17, f.hora27, f.product7.id);	
	}
	/* Consulta fila 8*/
	if(f.tipoarena8.options[f.tipoarena8.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora18,f.hora28,f.hprod8.id);
	produccion_arena(f.tipoarena8.options[f.tipoarena8.selectedIndex].value, f.date, f.hora18, f.hora28, f.prodt8.id);
	materia_prima(f.tipoarena8.options[f.tipoarena8.selectedIndex].value, f.date, f.hora18, f.hora28, f.mprima8.id);
	calcular_rendimiento(f.tipoarena8.options[f.tipoarena8.selectedIndex].value, f.date, f.hora18, f.hora28, f.rendi8.id);
	calcular_productividad(f.tipoarena8.options[f.tipoarena8.selectedIndex].value, f.date, f.hora18, f.hora28, f.product8.id);
	}
	/* Consulta fila 9*/
	if(f.tipoarena9.options[f.tipoarena9.selectedIndex].value != "-")
	{
	horas_produccion(f.hora19,f.hora29,f.hprod9.id);
	produccion_arena(f.tipoarena9.options[f.tipoarena9.selectedIndex].value, f.date, f.hora19, f.hora29, f.prodt9.id);
	materia_prima(f.tipoarena9.options[f.tipoarena9.selectedIndex].value, f.date, f.hora19, f.hora29, f.mprima9.id);
	calcular_rendimiento(f.tipoarena9.options[f.tipoarena9.selectedIndex].value, f.date, f.hora19, f.hora29, f.rendi9.id);
	calcular_productividad(f.tipoarena9.options[f.tipoarena9.selectedIndex].value, f.date, f.hora19, f.hora29, f.product9.id);
	}
	/* Consulta fila 10*/
	if(f.tipoarena10.options[f.tipoarena10.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora110,f.hora210,f.hprod10.id);
	produccion_arena(f.tipoarena10.options[f.tipoarena10.selectedIndex].value, f.date, f.hora110, f.hora210, f.prodt10.id);
	materia_prima(f.tipoarena10.options[f.tipoarena10.selectedIndex].value, f.date, f.hora110, f.hora210, f.mprima10.id);
	calcular_rendimiento(f.tipoarena10.options[f.tipoarena10.selectedIndex].value, f.date, f.hora110, f.hora210, f.rendi10.id);
	calcular_productividad(f.tipoarena10.options[f.tipoarena10.selectedIndex].value, f.date, f.hora110, f.hora210, f.product10.id);
	}
	/* Consulta fila 11*/
	if(f.tipoarena11.options[f.tipoarena11.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora111,f.hora211,f.hprod11.id);
	produccion_arena(f.tipoarena11.options[f.tipoarena11.selectedIndex].value, f.date, f.hora111, f.hora211, f.prodt11.id);
	materia_prima(f.tipoarena11.options[f.tipoarena11.selectedIndex].value, f.date, f.hora111, f.hora211, f.mprima11.id);
	calcular_rendimiento(f.tipoarena11.options[f.tipoarena11.selectedIndex].value, f.date, f.hora111, f.hora211, f.rendi11.id);
	calcular_productividad(f.tipoarena11.options[f.tipoarena11.selectedIndex].value, f.date, f.hora111, f.hora211, f.product11.id);
	}
	/* Consulta fila 12*/
	if(f.tipoarena12.options[f.tipoarena12.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora112,f.hora212,f.hprod12.id);
	produccion_arena(f.tipoarena12.options[f.tipoarena12.selectedIndex].value, f.date, f.hora112, f.hora212, f.prodt12.id);
	materia_prima(f.tipoarena12.options[f.tipoarena12.selectedIndex].value, f.date, f.hora112, f.hora212, f.mprima12.id);
	calcular_rendimiento(f.tipoarena12.options[f.tipoarena12.selectedIndex].value, f.date, f.hora112, f.hora212, f.rendi12.id);
	calcular_productividad(f.tipoarena12.options[f.tipoarena12.selectedIndex].value, f.date, f.hora112, f.hora212, f.product12.id);	
	}
	/* Consulta fila 13*/
	if(f.tipoarena13.options[f.tipoarena13.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora113,f.hora213,f.hprod13.id);
	produccion_arena(f.tipoarena13.options[f.tipoarena13.selectedIndex].value, f.date, f.hora113, f.hora213, f.prodt13.id);
	materia_prima(f.tipoarena13.options[f.tipoarena13.selectedIndex].value, f.date, f.hora113, f.hora213, f.mprima13.id);
	calcular_rendimiento(f.tipoarena13.options[f.tipoarena13.selectedIndex].value, f.date, f.hora113, f.hora213, f.rendi13.id);
	calcular_productividad(f.tipoarena13.options[f.tipoarena13.selectedIndex].value, f.date, f.hora113, f.hora213, f.product13.id);
	}
	/* Consulta fila 14*/
	if(f.tipoarena14.options[f.tipoarena14.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora114,f.hora214,f.hprod14.id);
	produccion_arena(f.tipoarena14.options[f.tipoarena14.selectedIndex].value, f.date, f.hora114, f.hora214, f.prodt14.id);
	materia_prima(f.tipoarena14.options[f.tipoarena14.selectedIndex].value, f.date, f.hora114, f.hora214, f.mprima14.id);
	calcular_rendimiento(f.tipoarena14.options[f.tipoarena14.selectedIndex].value, f.date, f.hora114, f.hora214, f.rendi14.id);
	calcular_productividad(f.tipoarena14.options[f.tipoarena14.selectedIndex].value, f.date, f.hora114, f.hora214, f.product14.id);
	}
	/* Consulta fila 15*/
	if(f.tipoarena15.options[f.tipoarena15.selectedIndex].value != "-")
	{	
	horas_produccion(f.hora115,f.hora215,f.hprod15.id);
	produccion_arena(f.tipoarena15.options[f.tipoarena15.selectedIndex].value, f.date, f.hora115, f.hora215, f.prodt15.id);
	materia_prima(f.tipoarena15.options[f.tipoarena15.selectedIndex].value, f.date, f.hora115, f.hora215, f.mprima15.id);
	calcular_rendimiento(f.tipoarena15.options[f.tipoarena15.selectedIndex].value, f.date, f.hora115, f.hora215, f.rendi15.id);
	calcular_productividad(f.tipoarena15.options[f.tipoarena15.selectedIndex].value, f.date, f.hora115, f.hora215, f.product15.id);	
	}
}