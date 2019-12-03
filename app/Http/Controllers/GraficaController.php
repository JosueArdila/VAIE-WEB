<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Grupo;

class GraficaController extends Controller
{  
	public function darCantidadGruposPorDepartamento(){
        $contador=0;
        $matriz=[];
        $departamentos=Departamento::all();
        $grupos=Grupo::All();

        foreach ($departamentos as $departamento) {
            foreach ($grupos as $grupo) {
                if($grupo['id_departamento']===$departamento['id']){
                    $contador=$contador+1;
                }
            }
            
            array_push($matriz,[$departamento['nombre'],$contador]);
            $contador=0;
        }  
        return json_encode($matriz, JSON_FORCE_OBJECT);
    }
}
