


//cargamos las Lineas
$(function(){
	moduloLinea.listarLineas()
	.then((response) => {
			if(!$.isEmptyObject(response)){
				$('#rellenarLinea').html('');
				let template = '';
				response.forEach(element => {
					template+= `			 
					  <div class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.nombre}</div>
				    		</div>
							<div class="input-group-append">
								<a href="redireccionar-linea/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </div>              
					`;
				});
				$('#rellenarLinea').append(template);
			}
		}).catch((error) => {
			console.log(error);
		});
});



//Registrar Lineas de investigación
$('#regLinea').on('click', () => {
	var select=$('#linea').val();
	var grupo=$('#gruLin').val();
	$('#linea').val("");
		moduloLinea.registrarLinea(select,grupo)
		.then((response) => {
			if(!$.isEmptyObject(response)){
				$('#rellenarLinea').html('');
				let template = '';
				response.forEach(element => {
					template+= `			 
					  <div class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.nombre}</div>
				    		</div>
							<div class="input-group-append">
								<a href="redireccionar-linea/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </div>              
					`;
				});				
				$('#rellenarLinea').append(template);
			}

		}).catch((error) => {
			console.log(error);
		});
});

//Metodo para buscar una linea por el nombre
$(searchL).keyup(function(e){
	  		let search= $('#searchL').val();
	  		moduloLinea.listarPorNombre(search).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response)){
				$('#rellenarLinea').html('');
				let template = '';
				response.forEach(element => {
					template+= `			 
					  <div class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.nombre}</div>
				    		</div>
							<div class="input-group-append">
								<a href="redireccionar-linea/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </div>              
					`;
				});				
				$('#rellenarLinea').append(template);
			}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});	  
});
