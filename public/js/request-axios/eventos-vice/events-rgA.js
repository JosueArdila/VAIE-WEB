//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#fac-formReA').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#fac-formReA').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//cargamos los docentes existentes
$(function(){
	moduloDocente.listarDocentes()
	.then((response) => {
		if(!$.isEmptyObject(response) ){
		$('#doc-formRea').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.num_documento} - ${element.primer_nombre} ${element.segundo_nombre} ${element.primer_apellido} ${element.segundo_apellido}</option>                           
			`;
		});
		
		$('#doc-formRea').append(template);
	}
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad
$('#fac-formReA').on('change', () => {
	var select=$('#fac-formReA').val();

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		$('#dep-formReA').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.nombre}</option>                           
			`;
		});
		$('#dep-formReA').append(template);
	}).catch((error) => {
		console.log(error);
	});
	

});


