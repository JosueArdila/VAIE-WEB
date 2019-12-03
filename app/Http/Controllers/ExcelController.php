<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Docente;
use App\Models\DocenteDirectorGrupo;
use App\Models\Persona;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends Controller
{
    public function generarExcelGrupos(){
        $grupos=Grupo::All();
        $htmlString = "<table>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Cod. Colciencias</th>
                        </tr>
                        </thead>";
        
        foreach ($grupos as $grupo) {
          $estado="";
          if ($grupo['estado']===1) {
            $estado='activo';
          } else {
            $estado='inactivo';
          }  
         
        $htmlString .= "<tr>
                          <td>".$grupo['nombre']."</td>
                          <td>".$grupo['descripcion']."</td>
                          <td>".$estado."</td> 
                          <td>".$grupo['cod_colciencias']."</td> 
                        </tr> ";                   

        }
        $htmlString .= "</table>";               
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="grupos.xlsx"');
        $writer->save("php://output");
        exit;
    }

    public function generarExcelDocentes(){
       $docentes = Docente::select('docente.num_documento', 'persona.primer_nombre','persona.segundo_nombre','persona.primer_apellido','persona.segundo_apellido','grupo.nombre')
                ->join('persona', 'docente.num_documento', '=', 'persona.num_documento')
                ->join('doc_pertenece_gru','docente.num_documento','=','doc_pertenece_gru.num_documento')
                ->join('grupo','doc_pertenece_gru.id_grupo','=','grupo.id')
                ->get();

        $htmlString = "<table>
                        <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Grupo de Investigacion</th>
                        </tr>
                        </thead>";
        
        foreach ($docentes as $docente) {          
         
        $htmlString .= "<tr>
                          <td>".$docente['num_documento']."</td>
                          <td>".$docente['primer_nombre']."</td>
                          <td>".$docente['segundo_nombre']."</td> 
                          <td>".$docente['primer_apellido']."</td> 
                          <td>".$docente['segundo_apellido']."</td> 
                          <td>".$docente['nombre']."</td> 
                        </tr> ";           
        }

        $htmlString .= "</table>";               
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="docentes.xlsx"');
        $writer->save("php://output");
        exit;

    }

    public function generarExcelDirectores(){
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

         $htmlString = "<table>
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Primer Nombre</th>
                                    <th>Segundo Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Grupos que dirige</th>
                                </tr>
                            </thead>
                         ";
            for ($f=0; $f < count($matriz) ; $f++) { 
                $datos="";
                $grupos="";

                        for ($c=0; $c < count($matriz[$f]); $c++) { 
                         if($c===0){ 
                            $nombre=$matriz[$f][$c];
                            $datos=explode('-',$nombre);
                         }
                         if($c===1){
                            for ($d=0; $d <count($matriz[$f][$c]) ; $d++) { 
                                $grupos .= $matriz[$f][$c][$d].', ';
                            }

                         } 

                       }           
            
                $htmlString .="<tr>
                                <td>".$datos[4]."</td>
                                <td>".$datos[0]."</td>
                                <td>".$datos[1]."</td>
                                <td>".$datos[2]."</td>
                                <td>".$datos[3]."</td>
                                <td>".$grupos."</td>
                            </tr>" ;
             
            }
            

        $htmlString .= "</table>";              
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="directores.xlsx"');
        $writer->save("php://output");
        exit;
    }

    public function generarExcelGruposDirectores(){
        $grupos=session('grupos');
        $htmlString = "<table>
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Cod. Colciencias</th>
                        </tr>
                        </thead>";
        
        foreach ($grupos as $grupo) {
          $estado="";
          if ($grupo['estado']===1) {
            $estado='activo';
          } else {
            $estado='inactivo';
          }  
         
        $htmlString .= "<tr>
                          <td>".$grupo['nombre']."</td>
                          <td>".$grupo['descripcion']."</td>
                          <td>".$estado."</td> 
                          <td>".$grupo['cod_colciencias']."</td> 
                        </tr> ";                   

        }
        $htmlString .= "</table>";               
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="grupos del Director.xlsx"');
        $writer->save("php://output");
        exit;
    }

    public function generarExcelDocentesDirector(){
        $docentes =session('DocentesGrupoDirector');
        $htmlString = "<table>
                        <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Grupo de Investigacion</th>
                        </tr>
                        </thead>";
        
        foreach ($docentes as $docente) { 
        $datos=explode('-',$docente);        
         
        $htmlString .= "<tr>
                          <td>".$datos[0]."</td>
                          <td>".$datos[1]."</td>
                          <td>".$datos[2]."</td> 
                          <td>".$datos[3]."</td> 
                          <td>".$datos[4]."</td> 
                          <td>".$datos[5]."</td> 
                        </tr> ";           
        }

        $htmlString .= "</table>";               
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
        $spreadsheet = $reader->loadFromString($htmlString);

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="docentes.xlsx"');
        $writer->save("php://output");
        exit;

    }

}
