//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#facultad-list-docente').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#facultad-list-docente').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//seleccionando una facultad cargaremos los departamentos asociados a esta facultad
$('#facultad-list-docente').on('change', () => {
	var select=$('#facultad-list-docente').val();
	$("#departamento-list-docente").removeAttr('disabled');

	moduloFacultad.listarDepartamentoPorFacultad(select)
	.then((response) => {
		$('#departamento-list-docente').html('');
		$('#departamento-list-docente').append("<option>Seleccione el departamento</option>");
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.nombre}</option>                           
			`;
		});
		$('#departamento-list-docente').append(template);
	}).catch((error) => {
		console.log(error);
	});
	

});

//seleccionando una departamento cargaremos los grupos de investigacion asosiados
$('#departamento-list-docente').on('change', () => {
	var select=$('#departamento-list-docente').val();
	$("#grupo-list-docente").removeAttr('disabled');

	moduloGrupo.listarGrupoPorDepartamento(select)
	.then((response) => {
		if(!$.isEmptyObject(response) ){
			$('#grupo-list-docente').html('');
			$('#grupo-list-docente').append("<option>Seleccione el grupo</option>");
			let template = '';
			response.forEach(element => {
				template+= `			 
				 <option>${element}</option>                           
				`;
			});
			$('#grupo-list-docente').append(template);
		}else{
			$('#grupo-list-docente').html('');
			$('#grupo-list-docente').append("<option>No hay grupos asociados al departamento</option>");
			$("#grupo-list-docente").attr('disabled','disabled');
		}
	}).catch((error) => {
		console.log(error);
	});
	

});

//seleccionando un grupo se carga el director
$('#grupo-list-docente').on('change', () => {
	var select=$('#grupo-list-docente').val();

	moduloDocente.darDirectorPorGrupo(select)
	.then((response) => {
		if (!$.isEmptyObject(response)) {
			$('#docentelist').html('');
			var nombre="";
			nombre=response.primer_nombre+" "+response.segundo_nombre+" "+response.primer_apellido+" "+response.segundo_apellido;
			let template = '';
					template+= `			 
					   <div>
	                    <div class="row mb-2 mt-2 mr-1 ml-1">
	                      <div class="card col-lg-12">
	                        <div class="card-body pb-2 pt-2 pr-2 pl-2">
	                          <div class="row">
	                            <div class="col-lg-11 col-md-3"><span class="label label-default">${nombre}</span></div>             
	                            <div class="col-lg-1 col-md-2"><a href="ver-director-vi/${response.num_documento}" class="btn btn-outline-success btn-sm">Ver</a></div>
	                          </div>
	                        </div>
	                      </div>
	                    </div>
	                  </div>                       
					`;		
			$('#docentelist').append(template);
		}
	}).catch((error) => {
		console.log(error);
	});
	

});