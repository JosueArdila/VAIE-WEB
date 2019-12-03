//cargamos los reconocimientos de colciencias
$(function(){
	moduloReconocimiento.listar()
	.then((response) => {
		$('#rec').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#rec').append("<option>Seleccione un Reconocimiento de colciencias</option>");
		$('#rec').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#fac').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#fac').append("<option>Seleccione una facultad</option>");
		$('#fac').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad
$('#fac').on('change', () => {
	var select=$('#fac').val();

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		if (!$.isEmptyObject(response)) {
			$('#depar').html('');
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element.nombre}</option>                           
				`;
			});
			$("#depar").removeAttr('disabled');
			$('#depar').append("<option>Seleccione un Departamento</option>");
			$('#depar').append(template);
		}else{
			$('#depar').html('');
			$('#depar').append("<option>Seleccione primero una Facultad</option>");
			$("#depar").attr('disabled','disabled');
		}
	}).catch((error) => {
		console.log(error);
	});	

});

//cargaremos los grupos que posea un docente director asosiado a su cedula
$(function(){
	var cedula=document.getElementById("valor").value;
	moduloGrupo.listarPorCedula(cedula)
	.then((response) => {
		$('#grupo').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element}</option>                           
			`;
		});
		$('#grupo').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

