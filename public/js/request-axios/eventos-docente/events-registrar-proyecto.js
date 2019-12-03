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
		}
	}).catch((error) => {
		console.log(error);
	});
});

//se cargan impactos generales
$(function(){
	moduloProyecto.darImpGen()
	.then((response) => {
		if(!$.isEmptyObject(response)){
			$('#impG').html('');
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element.nombre}</option>                           
				`;
			});	
			$('#impG').append("<option>Seleccione el impacto general</option>");	
			$('#impG').append(template);
		}
	}).catch((error) => {
		console.log(error);
	});
});

//seleccionando un impacto General se obtiene los directos asociados
$('#impG').on('change', () => {
	var select=$('#impG').val();
	moduloProyecto.darImpDir(select)
	.then((response) => {
		$('#impD').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.nombre}</option>                           
			`;
		});
		$('#impD').append("<option>Seleccione el impacto directo</option>");	
		$('#impD').append(template);
	}).catch((error) => {
		console.log(error);
	});
	

});

//seleccionando un tipo se cargan sus datos
$('#tipoF').on('change', () => {
	var select=$('#tipoF').val();
	if (select==='FINANCIACION FINU') {
		$('#FechaCon').removeAttr('disabled');
		$('#nomCon').removeAttr('disabled');
		$('#enPa').attr('disabled','disabled');
		$('#enPar').attr('disabled','disabled');
	} else if (select==='FINANCIACION EXTERNA') {
		$('#FechaCon').removeAttr('disabled');
		$('#nomCon').removeAttr('disabled');
		$('#enPa').removeAttr('disabled');
		$('#enPar').removeAttr('disabled');
	}else {
		$('#FechaCon').attr('disabled','disabled');
		$('#nomCon').attr('disabled','disabled');
		$('#enPa').attr('disabled','disabled');
		$('#enPar').attr('disabled','disabled');
	}
});



