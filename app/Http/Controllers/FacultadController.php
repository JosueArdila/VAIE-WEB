<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facultad;
use App\Models\Departamento;

class FacultadController extends Controller
{
    public function listar(){
    	$facultades = Facultad::all();
		return $facultades;
    }

    public function mostrarPorId($id){    	
    	$facultades = Facultad::where('descripcion', 'like', $id.'%')->get();
    	return $facultades;    
	}

	public function listarDepartamentoPorFacultad($nombre){
		$facultad=Facultad::where('descripcion',$nombre)->value('id');
		$departamentos=Departamento::where('id_facultad','=',$facultad)->get();		
		return $departamentos;
	}

	public function registrarFacultad($descripcion){
        $facultad=Facultad::where('descripcion',$descripcion)->value('descripcion');
            if(empty($facultad)){
        		$facultad = new Facultad;
                $facultad->descripcion = $descripcion;
                $facultad->estado =1;        
                $facultad->save();
                $facultades=Facultad::all();
                return $facultades;
            }
        return "";
	}

    public function direccionarEditarFacultad($id){
        $facultad=Facultad::find($id);
        session(['facultad' => $facultad]);
        return redirect('form-editar-facultad');  
    }

    public function editarFacultad(){
        $facul_id = session('facultad');
        $facultad=Facultad::find($facul_id['id']);
        $data= request()->all();
        $nombre=$data['nombre'];
        if($data['estado']==='Activo'){
            $estado=1;
        }else{
            $estado=0;
        }
        if (empty($nombre)) {
            $facultad->estado=$estado;
            $facultad->save();
        } else{
            $facultad->descripcion=$nombre;
            $facultad->estado=$estado;
            $facultad->save();
        }  
        
        return redirect('alimentar');
    }
}
