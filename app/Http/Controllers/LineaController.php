<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocenteDirectorGrupo;
use App\Models\Grupo;
use App\Models\Linea;

class LineaController extends Controller
{
    public function registrarLinea($nombre,$grupo){
    		$linea=Linea::where('nombre',$nombre)->value('nombre');
            if(empty($linea)){
            	$gru=Grupo::where('nombre',$grupo)->value('id');
        		$lineaI = new Linea;
                $lineaI->id_grupo=$gru;
                $lineaI->nombre=$nombre;     
                $lineaI->save();
                $Lineas=Linea::all();
                return $Lineas;
         	} 
         return "";            
    }

    public function listarLineas(){
    	$Lineas=Linea::All();
    	return $Lineas;
    }

    public function mostrarPorNombre($nombre){    	
    	$lineas = Linea::where('nombre', 'like', $nombre.'%')->get();
    	return $lineas;    
	}

	public function redireccionarEditar($id){
		$linea=Linea::find($id);
		session(['linea'=>$linea]);
		return redirect('form-editar-linea');
	}

	public function editarLinea(){
		$data= request()->all();
		$nombre=$data['nombre'];
		$grupo=$data['grupo'];		
		if($data['estado']==='Activo'){
            $estado=1;
        }else{
            $estado=0;
        }

		$lin=session('linea');
		$id_grupo=Grupo::where('nombre',$grupo)->value('id');

		if (empty($nombre)) {
			$linea=Linea::find($lin['id']);
			$linea->id_grupo=$id_grupo;
			$linea->estado=$estado;
			$linea->save();			
		}else{
			$linea=Linea::find($lin['id']);
			$linea->nombre=$nombre;
			$linea->id_grupo=$id_grupo;
			$linea->estado=$estado;
			$linea->save();	
		}
		return view('director/form-reg-datos-tablas');
	}

    public function cargarGruposAlimentarTablas(){
    	$director=session('docente');
    	$gruposPorDocente = DocenteDirectorGrupo::where('num_documento',$director['num_documento'])->get(); 
        // se una array de grupos
        $grupos=[];
        foreach ($gruposPorDocente as $gpd) {
        	$grupo=Grupo::where('id',$gpd['id_grupo'])->first();
        	array_push ( $grupos , $grupo );
        }    	
    	session(['grupos'=>$grupos]);
    	return view('director/form-reg-datos-tablas');

    }

    public function darLineas($cedula){
        $lineas=Linea::select('linae_investigacion.nombre')
        ->join('grupo','linae_investigacion.id_grupo','=','grupo.id')
        ->join('doc_pertenece_gru','grupo.id','=','doc_pertenece_gru.id_grupo')
        ->where('doc_pertenece_gru.num_documento','=',$cedula)->get();
        return $lineas;
    }
}
