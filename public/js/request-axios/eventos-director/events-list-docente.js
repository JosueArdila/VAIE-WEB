//seleccionando un grupo cargaremos los docentes asosiados
$('#grupo').on('change', () => {
	var select=$('#grupo').val();

	moduloDocente.listarPorGrupo(select)
	.then((response) => {
		if (!$.isEmptyObject(response)){
		$('#rellenarDocente').html('');
		let template = '';
		response.reduce((m, item) => {
  			template+= `
	            <div class="row mb-2 mt-2 mr-1 ml-1">
	              <div class="card col-lg-12">
	                <div class="card-body pb-2 pt-2 pr-2 pl-2">
	                  <div class="row">
	                    <div class="col-lg-6 col-md-2"><span class="label label-default">${item[0]}</span></div>
	                    <div class="col-lg-3 col-md-2"><span class="label label-default">${select}</span></div>	                    
	                    <div class="col-lg-3 col-md-3">
	                      <div class="container pl-0 pr-0">
	                        <div class="row d-flex flex-row-reverse">
	                          <div class="col-lg-auto col-md-auto"><a href="ver-docente-director/${item[1]}?>" class="btn btn-outline-success btn-sm">Ver</a></div>                            
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>                     
				`;
		}, []);
		 $('#rellenarDocente').append(template);
		}
	}).catch((error) => {
		console.log(error);
	});
});