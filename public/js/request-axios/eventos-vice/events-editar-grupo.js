//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#fac-edit-grupo').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#fac-edit-grupo').append("<option>Seleccione una facultad</option>");
		$('#fac-edit-grupo').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//cargamos los docentes existentes
$(function(){
	moduloDocente.listarDocentes()
	.then((response) => {
		if(!$.isEmptyObject(response) ){
		$('#doc-edit-grupo').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.num_documento} - ${element.primer_nombre} ${element.segundo_nombre} ${element.primer_apellido} ${element.segundo_apellido}</option>                           
			`;
		});
		$('#doc-edit-grupo').append("<option> Seleccione un director</option>");
		$('#doc-edit-grupo').append(template);
		}
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad
$('#fac-edit-grupo').on('change', () => {
	var select=$('#fac-edit-grupo').val();

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		if(!$.isEmptyObject(response) ){
			$('#dep-edit-grupo').html('');
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element.nombre}</option>                           
				`;
			});
			$('#dep-edit-grupo').append(template);
		}else{
			$('#dep-edit-grupo').html('');
			$('#dep-edit-grupo').append("<option>Primero seleccione la facultad</option>");
		}
	}).catch((error) => {
		console.log(error);
	});
	

});
