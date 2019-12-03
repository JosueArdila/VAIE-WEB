<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Persona;
use App\Models\Docente;
use App\Models\Departamento;
use App\Models\ReconocimientoColciencias;
use App\Models\DocenteDirectorGrupo;
use App\Models\DocentePerteneceDepartamento;
use App\Models\DocentePerteneceGrupo;

class grupoController extends Controller
{
    public function mostrarGruposPorCedula($cedula){ 	
        $gruposPorDocente = DocenteDirectorGrupo::where('num_documento',$cedula)->get(); 
        // se una array de grupos
        $grupos=[];
        foreach ($gruposPorDocente as $gpd) {
        	$nombre=Grupo::where('id',$gpd['id_grupo'])->value('nombre');
        	array_push ( $grupos , $nombre );
        }    	
    	return $grupos;    
	}

    public function listarGrupoPorDepartamento($departamento){
        $depar=Departamento::where('nombre',$departamento)->value('id');
        $Grupos=Grupo::All();
        $grupos=[];
        foreach ($Grupos as $grupo) {
            if($grupo['id_departamento']===$depar){
              array_push ( $grupos , $grupo['nombre']);  
            }
        }
        return $grupos;
    }

    public function redireccionaEditarGrupo($id_grupo){
        $grupo=Grupo::find($id_grupo);
        session(['grupo' => $grupo]);
        return redirect('editar-grupo');
    }

    public function redireccionaEditarGrupoDirector($id_grupo){
        $grupo=Grupo::find($id_grupo);
        session(['grupoDirector' => $grupo]);
        return redirect('editar-grupo-director');
    }    

    public function editarGrupo(){
        $grupo=session('grupo');

        $data= request()->all();
        $nombre=$data['nombre'];
        $descripcion=$data['descripcion'];
        $codigo=$data['cod'];
        $departamento=$data['departamento'];
        $docente=$data['docente'];
        $est=$data['estado'];
        $datos=explode(' - ' ,$docente);
        $registro=0;      

        if(empty($nombre) || empty($nombre ) || empty($descripcion)){
            $registro=0;
            //metodo STRCMP compara dos cadenas imprime 0 si son iguales osea: hola , hola =0
        } elseif (STRCMP($departamento,"Primero seleccione la facultad")==0) {
            $registro=2;
        } elseif (STRCMP($docente,"Seleccione un director")==0) {
            $registro=3;
        }else{
            $registro=1;
            $estado=0;
            if(STRCMP($est,"Activo")==0){
                $estado=1;
            }
            $id_depa=Departamento::where('nombre',$departamento)->value('id');

            $editGrupo=Grupo::find($grupo['id']);
            $editGrupo->nombre=$nombre;
            $editGrupo->cod_colciencias=$codigo;
            $editGrupo->descripcion=$descripcion;
            $editGrupo->estado=$estado;
            $editGrupo->id_departamento=$id_depa;
            $editGrupo->save();

            //para obtener un elemento se especifica con first y debe ser con una llave primaria, que es distinta a id
            $DocDirGrupo=DocenteDirectorGrupo::where('id_grupo',$grupo['id'])->first();
            $DocDirGrupo->num_documento=$datos[0];
            $DocDirGrupo->save();

            $gruN=Grupo::find($grupo['id']);
            session(['grupo' => $gruN]);
        }

        session(['registro'=>$registro]);
        return redirect('editar-grupo');

    }

    public function editarGrupoDirector(){
        $grupoDirector=session('grupoDirector');
        $data= request()->all();
        $nombre=$data['nombre'];
        $descripcion=$data['descripcion'];
        $codigo=$data['cod'];
        $departamento=$data['departamento'];
        $est=$data['estado'];
        $registro=0;      

        if(empty($nombre) || empty($nombre ) || empty($descripcion)){
            $registro=0;
            //metodo STRCMP compara dos cadenas imprime 0 si son iguales osea: hola , hola =0
        } elseif (STRCMP($departamento,"Primero seleccione la facultad")==0) {
            $registro=2;
        }else{
            $registro=1;
            $estado=0;
            if(STRCMP($est,"Activo")==0){
                $estado=1;
            }
            $id_depa=Departamento::where('nombre',$departamento)->value('id');

            $editGrupo=Grupo::find($grupoDirector['id']);
            $editGrupo->nombre=$nombre;
            $editGrupo->cod_colciencias=$codigo;
            $editGrupo->descripcion=$descripcion;
            $editGrupo->estado=$estado;
            $editGrupo->id_departamento=$id_depa;
            $editGrupo->save();

            $gruN=Grupo::find($grupoDirector['id']);
            session(['grupoDirector' => $gruN]);
        }

        session(['registro'=>$registro]);
        return redirect('editar-grupo-director');
    }

     public function registrarGrupo(){
        $data= request()->all();

        //Datos de grupo
        $nombreG=$data['nomGru'];
        $descripcion=$data['des'];
        $codigo_colciencias=$data['codCol'];
        $departamento=$data['dep'];
        $docente=$data['doc'];
        $fecha_vinculacion=$data['fecha'];

        if(empty($nombreG) || empty($descripcion) || empty($codigo_colciencias) || empty($departamento) || empty($docente) || empty($fecha_vinculacion)){
            $registro=0;
            session(['registro'=>$registro]);
        }elseif($departamento==="Seleccione primero Facultad") {
            $registro=3;
            session(['registro'=>$registro]);
        }else{
            
            $id_Dep=Departamento::where('nombre',$departamento)->value('id');        
            $cedula = explode(" - ", $docente); 

            $existe=false;
            $listagru=Grupo::All();
            foreach ($listagru as $li) {
                //el metodo strcasecmp() comparar cadenas y dice que martes es igual que Martes imprime 0
                if(strcasecmp($li['nombre'],$nombreG)===0){
                    $existe=true;
                    break;
                } 
            }

            if($existe){
                $registro=2;
                session(['registro'=>$registro]);
            }else{
                  

           //registrar grupo
            $grupo = new Grupo;
            $grupo->id_departamento = $id_Dep;
            $grupo->cod_colciencias = $codigo_colciencias;
            $grupo->nombre = $nombreG;
            $grupo->descripcion = $descripcion;
            $grupo->estado = 1;
            $grupo->save();            

            //Relacion de docente dirige un grupo
            $id_Gru=Grupo::where('nombre',$nombreG)->value('id');
            $DocDirGrupo= new DocenteDirectorGrupo;
            $DocDirGrupo->num_documento = $cedula[0];
            $DocDirGrupo->id_grupo =$id_Gru;
            $DocDirGrupo->fecha_inicio =$fecha_vinculacion;
            $DocDirGrupo->save();      
            
            $registro=1;
            session(['registro'=>$registro]);
            }
        }      
        return redirect('registrar-grupo'); 
    }


    public function registrarGrupoAndDocente(){

        $data= request()->all();
        
        //Datos de grupo
        $nombre=$data['nombreGru'];
        $codigoCol=$data['codCol'];
        $descripcion=$data['descripGrupo'];
        $departamento=$data['depar'];    
         
        //Datos del docente
        $numero=$data['numero'];
        $tipoDoc=$data['tipoDoc'];
        $priNom=$data['prinom'];
        $segNom=$data['segnom'];
        $priApe=$data['priape'];
        $segApe=$data['segape'];
        $correo=$data['correo'];
        $deparDo=$data['deparDo'];
        $recoColciencias=$data['recoCol'];
        $codigo=$data['codigo'];
        $fechaDirector=$data['fechaGru'];
        $fechaPerGrupo=$data['fechaperGru'];
        $fechaPerDep=$data['fechaDep'];
        
        if(empty($nombre) || empty($codigoCol) || empty($descripcion) || empty($departamento) || empty($numero) || empty($tipoDoc) || empty($priNom) || empty($segNom) || empty($priApe) || empty($segApe) || empty($correo) || empty($deparDo) || empty($recoColciencias) || empty($codigo) || empty($fechaDirector) || empty($fechaPerGrupo) || empty($fechaPerDep)){

            $registro=0;
            session(['registro'=>$registro]);
        }else{

            $existe=false;
            $listagru=Grupo::All();
            foreach ($listagru as $li) {
                //el metodo strcasecmp() comparar cadenas y dice que martes es igual que Martes imprime 0
                if(strcasecmp($li['nombre'],$nombre)===0){
                    $existe=true;
                    break;
                } 
            }

            if($existe){
                $registro=2;
                session(['registro'=>$registro]);
            }else{

                //registrar grupo
                $grupo = new Grupo;
                $id_Dep=Departamento::where('nombre',$departamento)->value('id'); 
                $grupo->id_departamento = $id_Dep;
                $grupo->cod_colciencias = $codigoCol;
                $grupo->nombre = $nombre;
                $grupo->descripcion = $descripcion;
                $grupo->estado = 1;
                $grupo->save();

                //registar persona y docente
                $persona= new Persona;
                $persona->tipo_documento= $tipoDoc;
                $persona->num_documento = $numero;
                $id_Rec=ReconocimientoColciencias::where('descripcion',$recoColciencias)->value('id');  
                $persona->id_rec_colc = $id_Rec;
                $persona->primer_nombre = $priNom;
                $persona->segundo_nombre = $segNom;
                $persona->primer_apellido = $priApe;
                $persona->segundo_apellido = $segApe;
                $persona->correo = $correo;
                $persona->save();

                $docente= new Docente;
                $docente->num_documento = $numero;
                $docente->codigo = $codigo;
                $docente->contrasena = encrypt($numero.'xxxx');
                $docente->contrasena_director = encrypt($numero.'xxxxDI');
                $docente->save();

                //vinculacion de doncente a departamento
                $DocPerDep= new DocentePerteneceDepartamento;
                $DocPerDep->num_documento = $numero;
                $DocPerDep->id_depar = $id_Dep;
                $DocPerDep->fecha_inicio =$fechaPerDep;
                $DocPerDep->save();

                //docente pertenece a grupo
                $DocPerGru= new DocentePerteneceGrupo;
                $DocPerGru->num_documento = $numero;
                $id_Gru=Grupo::where('nombre',$nombre)->value('id'); 
                $DocPerGru->id_grupo = $id_Gru;
                $DocPerGru->fecha_inicio =$fechaPerGrupo;
                $DocPerGru->save();



                //Docente Dirige grupo
                $DocDirGru= new DocenteDirectorGrupo;
                $DocDirGru->num_documento = $numero;
                $DocDirGru->id_grupo = $id_Gru;
                $DocDirGru->fecha_inicio =$fechaDirector;
                $DocDirGru->save();

                $registro=1;
                session(['registro'=>$registro]);
            }
        }

        return redirect('registrar-grupo-do');     
    }

    public function listarGrupos(){
        $grupos=Grupo::all();  
        session(['gruposVi' => $grupos]);     
        return view('vicerrectoria/list-grupo');    
    }

    public function listarPorNombre($nombre){
        $grupos= Grupo::where('nombre', 'like', $nombre.'%')->get();
        return $grupos; 
    }

    public function cargarActivos($validar){
        if($validar==="on"){
            $grupos= Grupo::where('estado',1)->get();
        }else{
            $grupos=Grupo::all();     
        }
        return $grupos;
    }

    public function cargarInactivos($validar){
        if($validar==="on"){
            $grupos= Grupo::where('estado',0)->get();
        }else{
            $grupos=Grupo::all();     
        }
        return $grupos;
    }




}
