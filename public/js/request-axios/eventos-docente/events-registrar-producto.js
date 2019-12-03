//se cargan las lineas de investigacion
$(function(){
	var cedula=$('#linea').val();
	moduloLinea.darLineas(cedula)
	.then((response) => {
		if(!$.isEmptyObject(response)){
			$('#linea').html('');
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element.nombre}</option>                           
				`;
			});	
			$('#linea').append("<option>Seleccione la linea de investigacion</option>");	
			$('#linea').append(template);
		}else{
			$('#linea').append("<option>Seleccione la linea de investigacion</option>");
		}
	}).catch((error) => {
		console.log(error);
	});
});

//seleccionando la linea cargarmos los proyectos
$('#linea').on('change', () => {
	var select=$('#linea').val();
	moduloProyecto.darProLinea(select)
	.then((response) => {
		$('#proyecto').html('');
		if(!$.isEmptyObject(response)){			
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element.nombre}</option>                           
				`;
			});	
			$('#proyecto').append("<option>Seleccione el proyecto</option>");	
			$('#proyecto').append(template);
		}else{
			$('#proyecto').append("<option>Seleccione el proyecto</option>");
		}
	}).catch((error) => {
		console.log(error);
	});
});

//seleccionando un impacto General se obtiene los directos asociados
$('#tipoP').on('change', () => {
	var select=$('#tipoP').val();
	if (select==='CAPITULO DE LIBRO') {
		$('#capituloLibro').show();
		$('#articulo').hide();
		$('#libro').hide();
	} else if(select==='LIBRO') {
		$('#libro').show();
		$('#capituloLibro').hide();
		$('#articulo').hide();
	} else if(select==='ARTICULO') {
		$('#articulo').show();
		$('#capituloLibro').hide();
		$('#libro').hide();
	}else{
		$('#articulo').hide();
		$('#capituloLibro').hide();
		$('#libro').hide();
	}
	

});
