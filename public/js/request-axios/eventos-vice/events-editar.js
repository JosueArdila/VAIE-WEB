//cargamos las facultades en el form editar departamento
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#fac-editar-dep').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#fac-editar-dep').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//cargamos las facultades en el form editar programa
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#fac-editar-pro').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#fac-editar-pro').append(template);
	}).catch((error) => {
		console.log(error);
	});

});