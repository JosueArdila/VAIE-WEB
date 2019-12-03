//cargamos las facultades
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#rellenarFacultad').html('');
		let template = '';
		response.forEach(element => {	
			template+= `
			<form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
		    	<div class="input-group pl-1 pr-1">
		    		<div class="input-group-append form-control">
		    			<div class="text-truncate">${element.descripcion}</div>
		    		</div>
					<div class="input-group-append">
						<a href="editar-facultad/${element.id}" class="btn btn-outline-warning">Editar</a>
					</div>
				</div>
		    </form>            
			`;
		});
		$('#rellenarFacultad').append(template);
		//response.reduce((m, item) => {
		//$(`#des${item.id}`).on('click', () => console.log($(`#des${item.id}`).val()));
		//}, []);

	}).catch((error) => {
		console.log(error);
	});

});

//cargamos las facultades en la seccion de departamentos y programas
$(function(){
	moduloFacultad.listar()
	.then((response) => {
		$('#facDep').html('');
		$('#facPro').html('');
		let template = '';
		response.forEach(element => {
			template+= `			 
			 <option>${element.descripcion}</option>                           
			`;
		});
		$('#facDep').append(template);
		$('#facPro').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//se cargan los departamentos
$(function(){
	moduloDepartamento.listar()
	.then((response) => {
		$('#rellenarDepartamento').html('');
		let template = '';
		response.forEach(element => {
			template+= `			
             <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
		    	<div class="input-group pl-1 pr-1">
		    		<div class="input-group-append form-control">
		    			<div class="text-truncate">${element.nombre}</div>
		    		</div>
					<div class="input-group-append">
						<a href="editar-dep/${element.id}" class="btn btn-outline-warning">Editar</a>
					</div>
				</div>
		    </form>          
			`;
		});
		$('#rellenarDepartamento').append(template);
	}).catch((error) => {
		console.log(error);
	});

});

//se cargan los programas
$(function(){
	moduloPrograma.listar()
	.then((response) => {
		$('#rellenarPrograma').html('');
		let template = '';
		response.forEach(element => {
			template+= `			
              <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
		    	<div class="input-group pl-1 pr-1">
		    		<div class="input-group-append form-control">
		    			<div class="text-truncate">${element.nombre}</div>
		    		</div>
					<div class="input-group-append">
						<a href="editar-pro/${element.id}" class="btn btn-outline-warning">Editar</a>
					</div>
				</div>
		    </form>         
			`;
		});
		$('#rellenarPrograma').append(template);
	}).catch((error) => {
		console.log(error);
	});

});


//Metodo para buscar facultad por un id

$(search).keyup(function(e){

  			if ($('#search').val()) {
	  		let search=$('#search').val();
	  		
	  		moduloFacultad.listarPorId(search).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarFacultad').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
						<form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
					    	<div class="input-group pl-1 pr-1">
					    		<div class="input-group-append form-control">
					    			<div class="text-truncate">${element.descripcion}</div>
					    		</div>
								<div class="input-group-append">
									<a href="editar-facultad/${element.id}" class="btn btn-outline-warning">Editar</a>
								</div>
							</div>
					    </form>              
						`;
					});
					$('#rellenarFacultad').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	  		
	  	} 	  
});

//Metodo para buscar departamento por un id

$(searchf).keyup(function(e){

  			if ($('#searchf').val()) {
	  		let searchf=$('#searchf').val();
	  		
	  		moduloDepartamento.listarPorId(searchf).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarDepartamento').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
						  <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
					    	<div class="input-group pl-1 pr-1">
					    		<div class="input-group-append form-control">
					    			<div class="text-truncate">${element.nombre}</div>
					    		</div>
								<div class="input-group-append">
									<a href="editar-dep/${element.id}" class="btn btn-outline-warning">Editar</a>
								</div>
							</div>
					    </form>              
						`;
					});
					$('#rellenarDepartamento').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	  		
	  	} 	  
});

//Metodo para buscar programa por un id

$(searchp).keyup(function(e){

  			if ($('#searchp').val()) {
	  		let searchp=$('#searchp').val();
	  		
	  		moduloPrograma.listarPorId(searchp).
	  		then((response)=>{
	  			if(!$.isEmptyObject(response) ){		  			
		  			$('#rellenarPrograma').html('');
					let template = '';
					response.forEach(element => {
						template+= `			 
						  <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
					    	<div class="input-group pl-1 pr-1">
					    		<div class="input-group-append form-control">
					    			<div class="text-truncate">${element.nombre}</div>
					    		</div>
								<div class="input-group-append">
									<a href="editar-pro/${element.id}" class="btn btn-outline-warning">Editar</a>
								</div>
							</div>
					    </form>              
						`;
					});
					$('#rellenarPrograma').append(template);
				}
	  		}).catch((error)=>{
	  			console.log("no hay");
	  		});

	  		
	  	} 	  
});


//Registrar facultades
$('#regFac').on('click', () => {
	var select=$('#fac').val();
	if(select != ""){
		moduloFacultad.registrarFacultad(select)
		.then((response) => {
			if(!$.isEmptyObject(response)){
				$('#rellenarFacultad').html('');
				let template = '';		
				response.forEach(element => {
					template+= `			 
					 <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.descripcion}</div>
				    		</div>
							<div class="input-group-append">
								<a href="editar-facultad/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </form>             
					`;
				});			
				$('#rellenarFacultad').append(template);
			}
		}).catch((error) => {
			console.log(error);
		});
	}
});

//Registrar departamentos
$('#regDep').on('click', () => {
	var select=$('#dep').val();
	var facultad=$('#facDep').val();
	if(select != ""){
		moduloDepartamento.registrarDepartamento(select,facultad)
		.then((response) => {
			if(!isEmptyObject(response)){
				$('#rellenarDepartamento').html('');
				let template = '';
				response.forEach(element => {
					template+= `			 
					  <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.nombre}</div>
				    		</div>
							<div class="input-group-append">
								<a href="editar-dep/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </form>              
					`;
				});
				$('#rellenarDepartamento').append(template);
			}	
		}).catch((error) => {
			console.log(error);
		});
	}	
});

//Registrar programas
$('#regPro').on('click', () => {
	var select=$('#pro').val();
	var facultad=$('#facPro').val();
	if (select != "") {
		moduloPrograma.registrarPrograma(select,facultad)
		.then((response) => {
			if(!isEmptyObject(response)){
				$('#rellenarPrograma').html('');
				let template = '';
				response.forEach(element => {
					template+= `			 
					  <form class="col-lg-12 col-md-12 pl-0 pr-0 mb-2">
				    	<div class="input-group pl-1 pr-1">
				    		<div class="input-group-append form-control">
				    			<div class="text-truncate">${element.nombre}</div>
				    		</div>
							<div class="input-group-append">
								<a href="editar-pro/${element.id}" class="btn btn-outline-warning">Editar</a>
							</div>
						</div>
				    </form>               
					`;
				});
				$('#rellenarPrograma').append(template);
			}
		}).catch((error) => {
			console.log(error);
		});
	}
});







// 2.Aca inicialmente capturo el id del boton que va a accionar lo que vamos a hacer :D toca ponerle ese id
// entonces digo que al darle click, haga lo que esta adentro, 
// que seria ir al modelo moduloFacultad, que esta en el controller y ejecute el metodo getData()
// el cual aun no hemos hecho xd jaja .

// xD no recuerdo como es que se edita eso jaja pero pues desde aca se puede añadir la informacion en un ciclo
// es como lo que tenia elfar