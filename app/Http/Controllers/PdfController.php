<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Docente;
use App\Models\Persona;
use App\Models\DocentePerteneceGrupo;
use App\Models\DocenteDirectorGrupo;


class PdfController extends Controller
{
    public function generarPdfGrupos(){

		$grupos =Grupo::All();
		$view = \View::make('vicerrectoria/grupoPdf',compact('grupos'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->download('grupos.pdf');
  	}

  	public function generarPdfDocentes(){
  		$docentes = Docente::select('docente.num_documento', 'persona.primer_nombre','persona.segundo_nombre','persona.primer_apellido','persona.segundo_apellido','grupo.nombre')
                ->join('persona', 'docente.num_documento', '=', 'persona.num_documento')
                ->join('doc_pertenece_gru','docente.num_documento','=','doc_pertenece_gru.num_documento')
                ->join('grupo','doc_pertenece_gru.id_grupo','=','grupo.id')
                ->get();
		$view = \View::make('vicerrectoria/docentePdf',compact('docentes'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->download('docentes.pdf');
  	}

  	public function generarPdfDirectores(){
  		$docentes = Docente::All();
  		$matriz=[];
  		foreach ($docentes as $docente) {
  		$grupos=DocenteDirectorGrupo::where('num_documento',$docente['num_documento'])->get();
  			if(count($grupos)>0){
               $nombres_grupos=[]; 
                foreach ($grupos as $g) {
                    $grupo=Grupo::find($g['id_grupo']);
                    array_push($nombres_grupos, $grupo['nombre']);
                }
            $datos=Persona::where('num_documento',$docente['num_documento'])->first();
            $nombre_completo=$datos['primer_nombre'].'-'.$datos['segundo_nombre'].'-'.$datos['primer_apellido'].'-'.$datos['segundo_apellido'].'-'.$datos['num_documento'];
            array_push($matriz,[$nombre_completo,$nombres_grupos]);  
            } 
  		}
  		$view = \View::make('vicerrectoria/directorPdf',compact('matriz'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->download('directores.pdf');
	}

  public function generarPdfGruposDirector(){
    $grupos =session('grupos');
    $view = \View::make('vicerrectoria/grupoPdf',compact('grupos'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->download('grupos del Director.pdf');
    }

    public function generarPdfDocentesDirector(){
    $docentes =session('DocentesGrupoDirector');
    $view = \View::make('director/docentePdf',compact('docentes'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->download('docentes.pdf');
    }

}
