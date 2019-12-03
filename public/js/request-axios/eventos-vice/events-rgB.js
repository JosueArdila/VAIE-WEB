//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#facultad-gru').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#facultad-gru').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad
$('#facultad-gru').on('change', () => {
	var select=$('#facultad-gru').val();

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		$('#departamento-gru').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.nombre}</option>                           
			`;
		});
		$('#departamento-gru').append(template);
	}).catch((error) => {
		console.log(error);
	});
	

});

//cargamos los reconocimientos de colciencias
$(function(){
	moduloReconocimiento.listar()
	.then((response) => {
		$('#reconocimiento').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#reconocimiento').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//cargamos las facultades al docente
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#facultad-doc').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#facultad-doc').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad en la seccion docente
$('#facultad-doc').on('change', () => {
	var select=$('#facultad-doc').val();

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		$('#departamento-doc').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.nombre}</option>                           
			`;
		});
		$('#departamento-doc').append(template);
	}).catch((error) => {
		console.log(error);
	});
	

});