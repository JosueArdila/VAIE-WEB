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