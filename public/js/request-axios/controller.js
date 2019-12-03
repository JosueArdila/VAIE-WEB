// import axios from 'axios';
const API_URL = 'http://127.0.0.1:8000/api';

var moduloFacultad = {
	listar: function() {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/facultades`,
		});
	},
	listarPorId: function(id) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/facultades/${id}`,
		});
	},
	listarDepartamentoPorFacultad: function(nombre) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/depar-por-facultad/${nombre}`,
		});
	},
	registrarFacultad: function(nombre) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/registrar-facultad/${nombre}`,
		});
	},

};

var moduloDepartamento = {
	listar: function() {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/departamentos`,
		});
	},
	listarPorId: function(id) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/departamentos/${id}`,
		});
	},
	registrarDepartamento: function(nombre,facultad) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/registrar-departamento/${nombre}/${facultad}`,
		});
	},	
};

var moduloPrograma = {
	listar: function() {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/programas`,
		});
	},
	listarPorId: function(id) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/programas/${id}`,
		});
	},
	registrarPrograma: function(nombre,facultad) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/registrar-programa/${nombre}/${facultad}`,
		});
	},
	
};

var moduloDocente = {
	listarDocentes: function() {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/docentes`,
		});
	},
	listarPorGrupo: function(grupo) {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/docentes/docentePorGrupo/${grupo}`,
		});
	},
	darDirectorPorGrupo: function(grupo) {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/docentes/directorPorGrupo/${grupo}`,
		});
	},
		
};

var moduloReconocimiento = {
	listar: function() {
		return $.ajax({
			method: 'get',
			url: `${API_URL}/reconocimientos`,
		});
	},
	
};

var moduloGrupo = {
	listarPorCedula: function(id) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grupos/${id}`,
		});
	},
	listarPorNombre: function(nombre) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grupos/listar/${nombre}`,
		});
	},
	cargarActivos: function(validar) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grupos/activos/${validar}`,
		});
	},
	cargarInactivos: function(validar) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grupos/inactivos/${validar}`,
		});
	},	
	listarGrupoPorDepartamento: function(departamento) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grupos/gruposPorDepartamento/${departamento}`,
		});
	},
};

var moduloGrafica = {
	darCantidad: function() {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/grafica/departamentos/cantidad-grupos`,
		});
	},	
};

var moduloProyecto = {
	darImpGen: function() {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/impactos-generales`,
		});
	},
	darImpDir: function(impGen) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/impactos-especificos/${impGen}`,
		});
	},
	darProLinea: function(nombreLinea) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/proyectos-porLinea/${nombreLinea}`,
		});
	},
	
};

var moduloLinea = {
	registrarLinea: function(nombre,grupo) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/registrar-linea-investigacion/${nombre}/${grupo}`,
		});
	},
	listarLineas: function() {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/listar-lineas`,
		});
	},

	listarPorNombre: function(nombre) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/lineas/${nombre}`,
		});
	},	
	darLineas: function(cedula) {		
		return $.ajax({
			method: 'get',
			url: `${API_URL}/dar-lineas-regPro/${cedula}`,
		});
	},
};



// 1. Hasta ahi todo bien?, lo que estoy haciendo solo es .. 
// 3. Ahora si importamos axios :D  el cual supogno que ya lo reconocera por que esta en el package.json, pero ahorita miramos que pasa.

// 4. en javascript es6 que es la nueva version, se van como simplificando los metodos, lo cual lo hace ocmo una regla.
// para ello entonces uan de esas es que si el contenido de un metodo no supera una linea, podemos obviar los corchetes, entonces seria algo asi:
// la ruta pues sera la que vayamos a usar eh jaja pero bueno recomiendo escribirla en un archivo aparte e importarlo en donde se vaya a usar,
// pero para este cado le escribiremos tal cual. debemos poner a correr el proyecto para tenerlas disponibles
// 5. ahi ya tendriamos los datos, ahora debemos importarlos en su lugar
