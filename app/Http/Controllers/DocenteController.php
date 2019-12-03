<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReconocimientoColciencias;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\DocentePerteneceDepartamento;
use App\Models\DocentePerteneceGrupo;
use App\Models\DocenteDirectorGrupo;
use App\Models\Departamento;
use App\Models\Grupo;


class DocenteController extends Controller
{
    public function listarDocentes(){
    	$docentes = Docente::select('docente.num_documento', 'persona.primer_nombre','persona.segundo_nombre','persona.primer_apellido','persona.segundo_apellido')
                ->join('persona', 'docente.num_documento', '=', 'persona.num_documento')
                ->get();
        return $docentes;
    }

    public function listarDocentesForm(){
        $docentes = Docente::select('docente.num_documento', 'persona.primer_nombre','persona.segundo_nombre','persona.primer_apellido','persona.segundo_apellido','grupo.nombre')
                ->join('persona', 'docente.num_documento', '=', 'persona.num_documento')
                ->join('doc_pertenece_gru','docente.num_documento','=','doc_pertenece_gru.num_documento')
                ->join('grupo','doc_pertenece_gru.id_grupo','=','grupo.id')
                ->get();
         session(['docentes'=>$docentes]);    

        return view('vicerrectoria/list-docente');
    }

    public function listarDirectoresForm(){
        $docentes=Docente::All();
        $matriz=[];            
        foreach ($docentes as $do) {            
            $grupos=DocenteDirectorGrupo::where('num_documento',$do['num_documento'])->get();
            if(count($grupos)>0){
                $nombres_grupos=[];
                foreach ($grupos as $g) {
                    $grupo=Grupo::find($g['id_grupo']);
                    array_push($nombres_grupos, $grupo['nombre']);
                }
            $datos=Persona::where('num_documento',$do['num_documento'])->first();
            $nombre_completo=$datos['primer_nombre'].' '.$datos['segundo_nombre'].' '.$datos['primer_apellido'].' '.$datos['segundo_apellido'].'-'.$datos['num_documento'];
            array_push($matriz,[$nombre_completo,$nombres_grupos]);  
            }       
        }
        session(['matriz'=>$matriz]);
        return view('vicerrectoria/list-director');
    }


    public function registrarDocente(){
    	$data= request()->all();

    	$cedula=$data['numeroDo'];
    	$tipoD=$data['tipoDo'];
    	$priNom=$data['primerN'];
    	$segNom=$data['segundoN'];
    	$priApe=$data['primerA'];
    	$segApe=$data['segundoA'];
    	$correo=$data['correo'];
    	$codigo=$data['codigo'];
    	$nombreGrupo=$data['grupo'];
    	$reconocimientoCol=$data['reconocimiento'];
    	$fechaVinGru=$data['fechaGrupo'];
    	$fechaVinDep=$data['fechaDepar'];
        $departamento=$data['departamento'];

        $registro=0;

        if(empty($cedula) || empty($priNom) || empty($segNom) || empty($priApe) || empty($segApe) || empty($correo) || empty($codigo) || empty($fechaVinGru) || empty($fechaVinDep)){
            session(['registro' => $registro]);

        }elseif (STRCMP($reconocimientoCol,'Seleccione un Reconocimiento de colciencias')==0) {
            $registro=2;
            session(['registro' => $registro]);
        }elseif (STRCMP($departamento,'Seleccione un Departamento')==0 || STRCMP($departamento,'Seleccione primero una Facultad')==0){
            $registro=3;
            session(['registro' => $registro]);
        }else{
        	//registar persona y docente
            $persona= new Persona;
            $persona->tipo_documento= $tipoD;
            $persona->num_documento = $cedula;
            $id_Rec=ReconocimientoColciencias::where('descripcion',$reconocimientoCol)->value('id');        
            $persona->id_rec_colc = $id_Rec;
            $persona->primer_nombre = $priNom;
            $persona->segundo_nombre = $segNom;
            $persona->primer_apellido = $priApe;
            $persona->segundo_apellido = $segApe;
            $persona->correo = $correo;
            $persona->save();

            $docente= new Docente;
            $docente->num_documento = $cedula;
            $docente->codigo = $codigo;
            $docente->contrasena =encrypt($cedula.'xxxx');
            $docente->save();

            //vinculacion de doncente a departamento            
            $DocPerDep= new DocentePerteneceDepartamento;
            $DocPerDep->num_documento = $cedula;
            $id_Dep=Departamento::where('nombre',$departamento)->value('id');  
            $DocPerDep->id_depar = $id_Dep;
            $DocPerDep->fecha_inicio =$fechaVinDep;
            $DocPerDep->save();

            //docente pertenece a grupo
            $DocPerGru= new DocentePerteneceGrupo;
            $DocPerGru->num_documento = $cedula;
            $id_Gru=Grupo::where('nombre',$nombreGrupo)->value('id'); 
            $DocPerGru->id_grupo = $id_Gru;
            $DocPerGru->fecha_inicio =$fechaVinGru;
            $DocPerGru->save();
            $registro=1;
            session(['registro' => $registro]);
        } 

        return redirect('registrar-docente');	
    }


    public function darDocentesPorGrupo($grupo){
        $id_Gru=Grupo::where('nombre',$grupo)->value('id');
        $cedulas=DocentePerteneceGrupo::where('id_grupo',$id_Gru)->get();
        $persons=[];

        foreach ($cedulas as $cedula) {
            $persona=Persona::where('num_documento',$cedula['num_documento'])->first();
            $nombre_completo=$persona['primer_nombre'].' '.$persona['segundo_nombre'].' '.$persona['primer_apellido'].' '.$persona['segundo_apellido'];
            $ced=$cedula['num_documento'];
            array_push($persons,[$nombre_completo,$ced] );
        }
        return $persons;
    }

    public function verDocente($cedula){ 
        $persona=Persona::where('num_documento',$cedula)->first();
        $depar_id=DocentePerteneceDepartamento::where('num_documento',$cedula)->value('id_depar');
        $departamento=Departamento::find($depar_id);
        $grupo_id=DocentePerteneceGrupo::where('num_documento',$cedula)->value('id_grupo');
        $grupo=Grupo::find($grupo_id);

        $informacion=$persona['primer_nombre'].'-'.$persona['segundo_nombre'].'-'.$persona['primer_apellido'].'-'.$persona['segundo_apellido'].'-'.$departamento['nombre'].'-'.$grupo['nombre'];
        session(['informacion'=>$informacion]);
        return redirect('ver-docente-vi');
    }

      public function verDirector($cedula){ 
        $matriz=[];
        $nom_gru="";
        $persona=Persona::where('num_documento',$cedula)->first();
        $depar_id=DocentePerteneceDepartamento::where('num_documento',$cedula)->value('id_depar');
        $departamento=Departamento::find($depar_id);
        $grupos=DocenteDirectorGrupo::where('num_documento',$cedula)->get();
            if(count($grupos)>0){
                foreach ($grupos as $g) {
                    $grupo=Grupo::find($g['id_grupo']);
                    $nom_gru.=$grupo['nombre'].'-';
                }   
            }
        $informacion=$persona['primer_nombre'].'-'.$persona['segundo_nombre'].'-'.$persona['primer_apellido'].'-'.$persona['segundo_apellido'].'-'.$departamento['nombre'];
        array_push($matriz,[$informacion,$nom_gru]);
        session(['matriz'=>$matriz]);
        return redirect('ver-director-vi');
    }

    public function verDirectorDelGrupo($grupo){
        $grupo=Grupo::where('nombre',$grupo)->first();
        $doc=DocenteDirectorGrupo::where('id_grupo',$grupo['id'])->value('num_documento');
        $docente=Persona::where('num_documento',$doc)->first();
        return $docente;
    }

    public function listarDocentesPorGruposDirector(){
       $grupos=session('grupos');
       $informacion=[]; 
       foreach ($grupos as $grupo) {
            $docPerGru=DocentePerteneceGrupo::All();
            foreach ($docPerGru as $dpg) {
                if ($dpg['id_grupo']===$grupo['id']) {
                    $persona=Persona::where('num_documento',$dpg['num_documento'])->first();
                    $datos=$persona['num_documento']."-".$persona['primer_nombre']."-".$persona['segundo_nombre']."-".$persona['primer_apellido']."-".$persona['segundo_apellido']."-".$grupo['nombre'];
                    array_push($informacion,$datos);
                }
            }
           
       }
       session(['DocentesGrupoDirector'=>$informacion]);
       return view('director/list-docente');
    }

    public function verDocenteModuloDirector($cedula){ 
        $persona=Persona::where('num_documento',$cedula)->first();
        $depar_id=DocentePerteneceDepartamento::where('num_documento',$cedula)->value('id_depar');
        $departamento=Departamento::find($depar_id);
        $grupo_id=DocentePerteneceGrupo::where('num_documento',$cedula)->value('id_grupo');
        $grupo=Grupo::find($grupo_id);

        $informacion=$persona['primer_nombre'].'-'.$persona['segundo_nombre'].'-'.$persona['primer_apellido'].'-'.$persona['segundo_apellido'].'-'.$departamento['nombre'].'-'.$grupo['nombre'];
        session(['informacionDocenteMDI'=>$informacion]);
        return redirect('ver-docente-director');
    }

    public function verPerfilDocente(){
        $docente=session('doc');
        $datos = Docente::select('docente.num_documento', 'persona.primer_nombre','persona.segundo_nombre','persona.primer_apellido','persona.segundo_apellido','persona.correo','docente.codigo','facultad.descripcion','departamento.nombre','persona.link_hoja_cvlac as cvlac','persona.enl_cod_orcid as arcid','persona.enlace_researchgate as rese','persona.enlace_google_academico as google')
                ->join('persona', 'docente.num_documento', '=', 'persona.num_documento')
                ->join('doc_pertenece_dep', 'persona.num_documento', '=', 'doc_pertenece_dep.num_documento')
                ->join('departamento', 'doc_pertenece_dep.id_depar', '=', 'departamento.id')
                ->join('facultad', 'departamento.id_facultad', '=', 'facultad.id')->where('docente.num_documento','=',$docente['num_documento'])
                ->first();
        session(['DatosDocente'=>$datos]);
        return redirect('perfil-docente');
    }

    public function editarPerfilDocente(){
        $doc=session('doc');
        $data= request()->all();
        $priNom=$data['PN'];
        $segNom=$data['SN'];
        $priApe=$data['PA'];
        $segApe=$data['SA'];
        $correo=$data['correo'];
        $codigo=$data['codigo'];        
        $perCVLAC=$data['perfilCVLAC'];
        $perARDID=$data['perfilARDID'];
        $perGATE=$data['perfilGATE'];
        $perGOOGLE=$data['perfilGOOGLE'];
        $registro=0;

        if(empty($priNom) || empty($segNom) ||empty($priApe) ||empty($segApe) ||empty($correo) ||empty($codigo) ||empty($perCVLAC) ||empty($perARDID) ||empty($perGATE) ||empty($perGOOGLE)){
            $registro=0;        
        }else{
            $persona=Persona::where('num_documento',$doc['num_documento'])->first();
            $persona->primer_nombre=$priNom;
            $persona->segundo_nombre=$segNom;
            $persona->primer_apellido=$priApe;
            $persona->segundo_apellido=$segApe;
            $persona->correo=$correo;
            $persona->link_hoja_cvlac=$perCVLAC;
            $persona->enl_cod_orcid=$perARDID;
            $persona->enlace_researchgate=$perGATE;
            $persona->enlace_google_academico=$perGOOGLE;
            $persona->save();

            $docente=Docente::where('num_documento',$doc['num_documento'])->first();
            $docente->codigo=$codigo;
            $docente->save();
            $registro=1; 
        } 
        session(['registro'=>$registro]);        
        return redirect('redireccionar-editar-perfil-docente'); 
    }
}

    
