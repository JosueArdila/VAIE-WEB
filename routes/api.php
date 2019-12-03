<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas del modulo vicerrectoria
Route::get('facultades', 'FacultadController@listar');

Route::get('departamentos', 'DepartamentoController@listar');

Route::get('programas', 'ProgramaController@listar');

Route::get('facultades/{id}', 'FacultadController@mostrarPorId');

Route::get('departamentos/{id}', 'DepartamentoController@mostrarPorId');

Route::get('programas/{id}', 'ProgramaController@mostrarPorId');

Route::get('registrar-facultad/{nombre}', 'FacultadController@registrarFacultad');

Route::get('registrar-departamento/{nombre}/{facultad}', 'DepartamentoController@registrarDepartamento');

Route::get('registrar-programa/{nombre}/{facultad}', 'ProgramaController@registrarPrograma');

Route::get('depar-por-facultad/{nombre}','FacultadController@listarDepartamentoPorFacultad');

Route::get('docentes','DocenteController@listarDocentes');

Route::get('reconocimientos','ReconocimientoController@listarReconocimientos');

Route::get('grupos/listar/{nombre}','grupoController@listarPorNombre');

Route::get('grupos/activos/{validar}','grupoController@cargarActivos');

Route::get('grupos/inactivos/{validar}','grupoController@cargarInactivos');

Route::get('grupos/gruposPorDepartamento/{departamento}','grupoController@listarGrupoPorDepartamento');

Route::get('docentes/docentePorGrupo/{grupo}','DocenteController@darDocentesPorGrupo');

Route::get('docentes/directorPorGrupo/{grupo}','DocenteController@verDirectorDelGrupo');


//rutas para las graficas del modulo vicerrectoria

Route::get('grafica/departamentos/cantidad-grupos','GraficaController@darCantidadGruposPorDepartamento');


//rutas del modulo de director del grupo
Route::get('grupos/{cedula}','grupoController@mostrarGruposPorCedula');

Route::get('registrar-linea-investigacion/{nombre}/{grupo}','LineaController@registrarLinea');

Route::get('listar-lineas','LineaController@listarLineas');

Route::get('lineas/{nombre}', 'LineaController@mostrarPorNombre');

//rutas del modulo de docente investigador

Route::get('impactos-generales', 'ProyectoController@darImpGeneral');

Route::get('impactos-especificos/{impGen}', 'ProyectoController@darImpDirectos');

Route::get('dar-lineas-regPro/{cedula}', 'LineaController@darLineas');

Route::get('proyectos-porLinea/{nombreLinea}', 'ProyectoController@darProyectosPorLinea');














