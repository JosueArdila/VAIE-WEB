<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('login');
});

Route::post('enviarCorreoRecuperacion', 'loginController@restaurarContrasena');

Route::get('validar','loginController@VALIDAR');

Route::get('recuperar',function(){
return view('mail/form-recuperar-contra');
});

Route::post('cambiarContraseña','loginController@cambiarContrasena');

//RUTAS DEDICADAS AL MODULO SUPER ADMINISTRADOR
Route::get('administrador', function () {
    return view('vicerrectoria/vice-index');
});



//RUTAS DEDICADAS AL MODULO DEL ADMINISTRADOR

Route::get('vicerrectoria', function () {
    return view('vicerrectoria/vice-index');
});

Route::post('validarForm', 'loginController@redireccionar');

Route::get('registrar-grupo',function(){
	return view('vicerrectoria/form-reg-grupo-a');
});

Route::get('registrar-grupo-do',function(){
	return view('vicerrectoria/form-reg-grupo-b');
});

Route::post('registrar-grupo/registro','grupoController@registrarGrupoAndDocente');

Route::post('registrar-grupo-do/registro','grupoController@registrarGrupo');

Route::get('generar-listados',function(){
	return view('vicerrectoria/gen-listados');
});

Route::get('registrar-grupo-b',function(){
	return view('vicerrectoria/form-reg-grupo-b');
});

Route::get('listar-grupos','grupoController@listarGrupos');

Route::get('listar-directores','DocenteController@listarDirectoresForm');

Route::get('listar-docentes','DocenteController@listarDocentesForm');

Route::get('listar-jovenes',function(){
	return view('vicerrectoria/list-joven');
});

Route::get('listar-productos',function(){
	return view('vicerrectoria/list-producto');
});

Route::get('listar-proyectos',function(){
	return view('vicerrectoria/list-proyecto');
});

Route::get('alimentar',function(){
	return view('vicerrectoria/form-reg-datos-tablas');
});

Route::get('redireccionar-editar-grupo/{id}','grupoController@redireccionaEditarGrupo');

Route::get('editar-grupo',function(){
	return view('vicerrectoria/form-edit-grupo');
});

Route::post('editarGrupo','grupoController@editarGrupo');

Route::get('cerrar-sesion',function(){
	return view('login');
});

Route::get('editar-facultad/{id}','FacultadController@direccionarEditarFacultad');

Route::get('form-editar-facultad',function(){
	return view('vicerrectoria/form-edit-datos-facultad');
});

Route::get('cancelar',function(){
	return view('vicerrectoria/form-reg-datos-tablas');
});

Route::post('editarFacultad', 'FacultadController@editarFacultad');

Route::get('editar-dep/{id}','DepartamentoController@direccionarEditarDepartamento');

Route::get('form-editar-departamento',function(){
	return view('vicerrectoria/form-edit-datos-departamento');
});

Route::post('editarDepartamento', 'DepartamentoController@editarDepartamento');

Route::get('editar-pro/{id}','ProgramaController@direccionarEditarPrograma');

Route::get('form-editar-programa',function(){
	return view('vicerrectoria/form-edit-datos-programa');
});

Route::post('editarPrograma', 'ProgramaController@editarPrograma');

Route::get('generar-pdf-grupos','PdfController@generarPdfGrupos');

Route::get('generar-pdf-docentes','PdfController@generarPdfDocentes');

Route::get('generar-pdf-directores','PdfController@generarPdfDirectores');

Route::get('generar-excel-grupos','ExcelController@generarExcelGrupos');

Route::get('generar-excel-docentes','ExcelController@generarExcelDocentes');

Route::get('generar-excel-docentes','ExcelController@generarExcelDirectores');

Route::get('ver-docente-vi/{cedula}','DocenteController@verDocente');

Route::get('ver-docente-vi',function(){
	return view('vicerrectoria/ver-docente');
});

Route::get('ver-director-vi/{cedula}','DocenteController@verDirector');

Route::get('ver-director-vi',function(){
	return view('vicerrectoria/ver-director');
});

Route::get('generar-indicadores',function(){
	return view('vicerrectoria/gen-graficos');
});


//RUTAS DEDICADAS AL MODULO DEL DOCENTE DIRECTOR DEL GRUPO

Route::get('registrar-docente',function(){
	return view('director/form-reg-docente');
});

Route::get('generar-listados-di',function(){
	return view('director/gen-listados');
});

Route::get('alimentar-tablas','LineaController@cargarGruposAlimentarTablas');

Route::get('listar-grupos-inv',function(){
	return view('director/list-grupo');
});

Route::get('listar-docentes-di','DocenteController@listarDocentesPorGruposDirector');

Route::get('listar-proyectos-di',function(){
	return view('director/list-proyecto');
});

Route::get('listar-productos-di',function(){
	return view('director/list-producto');
});

Route::post('registrar-docente/registrar','DocenteController@registrarDocente');

Route::get('redireccionar-linea/{id}','LineaController@redireccionarEditar');

Route::get('form-editar-linea',function(){
	return view('director/form-edit-linea');
});

Route::get('cancelar-editar-linea',function(){
	return view('director/form-reg-datos-tablas');
});

Route::post('editar-linea','LineaController@editarLinea');

Route::get('redireccionar-editar-grupo-director/{id}','grupoController@redireccionaEditarGrupoDirector');

Route::get('editar-grupo-director',function(){
	return view('director/form-edit-grupo');
});

Route::post('editarGrupoDirector','grupoController@editarGrupoDirector');

Route::get('generar-pdf-grupos-director','PdfController@generarPdfGruposDirector');

Route::get('generar-pdf-docentes-director','PdfController@generarPdfDocentesDirector');

Route::get('generar-excel-grupos-director','ExcelController@generarExcelGruposDirectores');

Route::get('generar-excel-docentes-director','ExcelController@generarExcelDocentesDirector');

Route::get('ver-docente-director/{cedula}','DocenteController@verDocenteModuloDirector');

Route::get('ver-docente-director',function(){
	return view('director/ver-docente');
});

//RUTAS DEDICADAS AL MODULO DEL DOCENTE INVESTIGADOR

Route::get('registrar-proyecto',function(){
	return view('docente/form-reg-proyecto');
});

Route::get('registrar-producto',function(){
	return view('docente/form-reg-producto');
});

Route::get('generar-listados-do',function(){
	return view('docente/gen-listados');
});

Route::get('listar-proyectos-docente',function(){
	return view('docente/list-proyecto');
});

Route::get('listar-productos-docente',function(){
	return view('docente/list-producto');
});

Route::get('ver-perfil-docente','DocenteController@verPerfilDocente');

Route::get('perfil-docente',function(){
	return view('docente/ver-perfil');
});

Route::get('redireccionar-editar-perfil-docente',function(){
	return view('docente/form-edit-perfil');
});

Route::post('editar-perfil','DocenteController@editarPerfilDocente');

Route::post('registrar-proyecto','ProyectoController@registrarProyecto');

Route::post('registrar-producto-base','ProductoController@registrarProducto');












