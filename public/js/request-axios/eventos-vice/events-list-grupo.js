//Metodo para buscar grupo por el nombre
$(search).keyup(function(e){

  			if ($('#search').val()) {
	  		let search=$('#search').val();
	  		
	  		moduloGrupo.listarPorNombre(search).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarGrupo').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
					<div class="row mb-2 mt-2 mr-1 ml-1">
				        <div class="card col-lg-12">
				          <div class="card-body pb-2 pt-2 pr-2 pl-2">
				            <div class="row">
				             
				              <div class="col-lg-6 col-md-6" data-toggle="tooltip" data-placement="right" title="Nombre del grupo" ><span name="nombre" class="label label-default">${element.nombre}</span>
				              </div>
				              <div class="col-lg-3 col-md-3" data-toggle="tooltip" data-placement="right" title="Codigo colciencias"><span class="label label-default">${element.cod_colciencias}</span>
				              </div>
				              <div class="col-lg-3 col-md-3">
				                <div class="container pl-0 pr-0">
				                  <div class="row d-flex flex-row-reverse">				                      
				                      <div class="col-lg-auto col-md-auto"><a href="editar-grupo" class="btn btn-outline-warning btn-sm">Editar</a>
				                      </div>
				                  </div>
				                </div>
				              </div>          
             				</div>
			          	  </div>
			        	</div>
			      	</div>             
						`;
					});
					$('#rellenarGrupo').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	  		
	  	} 	  
});



//metodo para buscar grupos activos
$('#mostrarAct').on('change', () => {
	var select=$('#mostrarAct').val();

	moduloGrupo.cargarActivos(select).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarGrupo').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
					<div class="row mb-2 mt-2 mr-1 ml-1">
				        <div class="card col-lg-12">
				          <div class="card-body pb-2 pt-2 pr-2 pl-2">
				            <div class="row">
				             
				              <div class="col-lg-6 col-md-6" data-toggle="tooltip" data-placement="right" title="Nombre del grupo" ><span name="nombre" class="label label-default">${element.nombre}</span>
				              </div>
				              <div class="col-lg-3 col-md-3" data-toggle="tooltip" data-placement="right" title="Codigo colciencias"><span class="label label-default">${element.cod_colciencias}</span>
				              </div>
				              <div class="col-lg-3 col-md-3">
				                <div class="container pl-0 pr-0">
				                  <div class="row d-flex flex-row-reverse">
				                      <div class="col-lg-auto col-md-auto"><a href="editar-grupo" class="btn btn-outline-warning btn-sm">Editar</a>
				                      </div>
				                  </div>
				                </div>
				              </div>          
             				</div>
			          	  </div>
			        	</div>
			      	</div>             
						`;
					});
					$('#rellenarGrupo').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	if(select=="on"){
		$('#mostrarAct').val("off");
	}else{
		$('#mostrarAct').val("on");
	}
});


//metodo para buscar grupos inactivos
$('#mostrarInc').on('change', () => {
	var select=$('#mostrarInc').val();

	moduloGrupo.cargarInactivos(select).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarGrupo').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
					<div class="row mb-2 mt-2 mr-1 ml-1">
				        <div class="card col-lg-12">
				          <div class="card-body pb-2 pt-2 pr-2 pl-2">
				            <div class="row">
				             
				              <div class="col-lg-6 col-md-6" data-toggle="tooltip" data-placement="right" title="Nombre del grupo" ><span name="nombre" class="label label-default">${element.nombre}</span>
				              </div>
				              <div class="col-lg-3 col-md-3" data-toggle="tooltip" data-placement="right" title="Codigo colciencias"><span class="label label-default">${element.cod_colciencias}</span>
				              </div>
				              <div class="col-lg-3 col-md-3">
				                <div class="container pl-0 pr-0">
				                  <div class="row d-flex flex-row-reverse">				                      
				                      <div class="col-lg-auto col-md-auto"><a href="editar-grupo" class="btn btn-outline-warning btn-sm">Editar</a>
				                      </div>
				                  </div>
				                </div>
				              </div>          
             				</div>
			          	  </div>
			        	</div>
			      	</div>             
						`;
					});
					$('#rellenarGrupo').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	if(select=="on"){
		$('#mostrarInc').val("off");
	}else{
		$('#mostrarInc').val("on");
	}
});