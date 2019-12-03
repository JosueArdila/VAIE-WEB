<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImpactoGeneral;
use App\Models\ImpactoDirecto;
use App\Models\Proyecto;
use App\Models\TipoFinanciacionProyecto;
use App\Models\DocenteDirigeProyecto;
use App\Models\ProyectoPorLinea;
use App\Models\Linea;
use App\Models\ProyectoFinu;
use App\Models\ProyectoExterno;
use App\Models\ProyectoInstitucional;

class ProyectoController extends Controller
{
	public function registrarProyecto(){
		$data=Request()->all();
		$nombre=$data['nombre'];
		$tipoPro=$data['tipoPro'];
		$descripcion=$data['descripcion'];
		$linea=$data['linea'];
		$impG=$data['impG'];
		$impD=$data['impD'];
		$fechaIPro=$data['fechaIPro'];
		$numCon=$data['numCon'];
		$monto=$data['monto'];
		$tipoF=$data['tipoF'];
		$registro="";

		if(empty($nombre) || empty($descripcion) || empty($fechaIPro) || empty($numCon) || empty($monto)){
			$registro=0;
		} elseif (STRCMP($tipoPro,'Seleccione el tipo de investigación')===0) {
			$registro=2;
		} elseif (STRCMP($impG,'Seleccione el impacto general')===0) {
			$registro=3;
		} elseif (STRCMP($impD,'Seleccione el impacto directo')===0) {
			$registro=4;
		} elseif (STRCMP($tipoF,'Seleccione el tipo de financiación')===0) {
			$registro=5;
		} else{
			$validar=Proyecto::where('nombre',$nombre)->first();
			if(empty($validar)){

				$id_TF=TipoFinanciacionProyecto::where('nombre',$tipoF)->value('id');
				$id_IG=ImpactoGeneral::where('nombre',$impG)->value('id');
				$id_ID=ImpactoDirecto::where('nombre',$impD)->value('id');
				$id_lin=Linea::where('nombre',$linea)->value('id');

				$proyecto= new Proyecto;
				$proyecto->id_tipo_finaciacion=$id_TF;
				$proyecto->id_impacto_general=$id_IG;
				$proyecto->id_impacto_directo=$id_ID;
				$proyecto->nombre=$nombre;
				$proyecto->descripcion=$descripcion;
				$proyecto->tipo_proyecto=$tipoPro;
				$proyecto->monto_financiacion=$monto;
				$proyecto->fecha_inicio=$fechaIPro;
				$proyecto->save();

				$id_Pro=Proyecto::where('nombre',$nombre)->value('id');
				$docente=session('doc'); 
				$docDirPro= new DocenteDirigeProyecto;
				$docDirPro->num_documento=$docente['num_documento'];
				$docDirPro->id_proy=$id_Pro;
				$docDirPro->fecha_inicio=$fechaIPro;
				$docDirPro->save();

				$proPorLinea= new ProyectoPorLinea;
				$proPorLinea->id_proy=$id_Pro;
				$proPorLinea->id_linea=$id_lin;
				$proPorLinea->save();

				if(STRCMP($tipoF,'PROYECTO FINU')===0){
					$FechaCon=$data['FechaCon'];
					$nomCon=$data['nomCon'];
					$proFi= new ProyectoFinu;
					$proFi->id_proyecto=$id_Pro;
					$proFi->ano_convocatoria=$FechaCon;
					$proFi->nombre_convocatoria=$nomCon;
					$proFi->save();

				} elseif (STRCMP($tipoF,'PROYECTO EXTERNO')===0) {
					$FechaCon=$data['FechaCon'];
					$nomCon=$data['nomCon'];
					$enPa=$data['enPa'];
					$enPar=$data['enPar'];

					$proExt= new ProyectoExterno;
					$proExt->id_proyecto=$id_Pro;
					$proExt->ano_convocatoria=$FechaCon;
					$proExt->nombre_convocatoria=$nomCon;
					$proExt->entidad_patronizadora=$id_Pro;
					$proExt->entidad_participantes=$FechaCon;
					$proExt->save();


				} else{
					$proI= new ProyectoInstitucional;
					$proI->id_proyecto=$id_Pro;
					$proI->save();

				}
			$registro=1;
				
			}else{
				$registro=6;
			}
		}
		session(['registro'=>$registro]);
		return redirect('registrar-proyecto');	

	}

    public function darImpGeneral(){
    	$imGe=ImpactoGeneral::All();
    	return $imGe;
    }

    public function darImpDirectos($impGen){
    	$idIG=ImpactoGeneral::where('nombre',$impGen)->value('id');
    	$imDi=ImpactoDirecto::where('id_general',$idIG)->get();
    	return $imDi;
    }

    public function darProyectosPorLinea($nombreLinea){
    	$proyectos="";
    	$proyectos=Proyecto::select('proyecto.nombre')
    	->join('proyecto_linea','proyecto.id','=','proyecto_linea.id_proy')
    	->join('linae_investigacion','proyecto_linea.id_linea','=','linae_investigacion.id')
    	->where('linae_investigacion.nombre','=',$nombreLinea)->get();
    	return $proyectos;    	
    }
}
