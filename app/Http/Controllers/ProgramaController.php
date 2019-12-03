<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use App\Models\Facultad;

class ProgramaController extends Controller
{
    public function listar(){
    	$programas = Programa::all();
		return $programas;
    }

      public function mostrarPorId($id){    	
    	$programas = Programa::where('nombre', 'like', $id.'%')->get();
    	return $programas;    
	}

	public function registrarPrograma($nombre,$facultad){
        $nom=Programa::where('nombre',$nombre)->value('nombre');
        if(empty($nom)){
    		$id_facultad=Facultad::where('descripcion',$facultad)->value('id');
    		$programa = new Programa;
            $programa->nombre =$nombre;
            $programa->id_facultad =$id_facultad;        
            $programa->estado=1;
            $programa->save();
    		$programas = Programa::all();
    		return $programas;
        }
        return "";
	}

    public function direccionarEditarPrograma($id){
        $programa=Programa::find($id);
        session(['programa' => $programa]);
        return redirect('form-editar-programa');  
    }

     public function editarPrograma(){
        $programa_id = session('programa');
        $programa=Programa::find($programa_id['id']);
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
            $programa->id_facultad=$facul_id;
            $programa->estado=$estado;
            $programa->save();
        } else{
            $programa->nombre=$nombre;
            $programa->id_facultad=$facul_id;
            $programa->estado=$estado;            
            $programa->save();
        }   
        return redirect('alimentar');
    }
}
