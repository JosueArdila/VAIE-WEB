<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use App\Models\Facultad; 

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function listar(){
    	$departamentos = Departamento::all();
		return $departamentos;
    }

    public function mostrarPorId($id){    	
    	$departamentos = Departamento::where('nombre', 'like', $id.'%')->get();
    	return $departamentos;    
	}

	public function registrarDepartamento($nombre,$facultad){
		$depar=Departamento::where('nombre',$nombre)->value('nombre');
        if(empty($depar)){
            $id_facultad=Facultad::where('descripcion',$facultad)->value('id');
    		$departamento = new Departamento;
            $departamento->nombre =$nombre;
            $departamento->id_facultad =$id_facultad;        
            $departamento->estado=1;
            $departamento->save();
    		$departamentos = Departamento::all();
    		return $departamentos;
        }
        return "";
	}

    public function direccionarEditarDepartamento($id){
        $departamento=Departamento::find($id);
        session(['departamento' => $departamento]);
        return redirect('form-editar-departamento');  
    }

    public function editarDepartamento(){
        $depar_id = session('departamento');
        $departamento=Departamento::find($depar_id['id']);
        $data= request()->all();
        $nombre=$data['nombre'];
        $facultad=$data['facultad'];
        $facul_id=Facultad::where('descripcion',$facultad)->value('id');

        if($data['estado']==='Activo'){
            $estado=1;
        }else{
            $estado=0;
        }
        if (empty($nombre)) {            
            $departamento->id_facultad=$facul_id;
            $departamento->estado=$estado;
            $departamento->save();
        } else{
            $departamento->nombre=$nombre;
            $departamento->id_facultad=$facul_id;
            $departamento->estado=$estado;            
            $departamento->save();
        }   
        return redirect('alimentar');
    }
}
