<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Proyecto;
use App\Models\ProductoNuevoConocimiento;
use App\Models\TipoProductoNC;
use App\Models\Articulo;
use App\Models\Libro;
use App\Models\CapituloLibro;
use App\Models\DocenteProducto;


class ProductoController extends Controller
{
    public function registrarProducto(){
    	$data=Request()->all();
		$nombre=$data['nombre'];
		$descripcion=$data['descripcion'];
		$fecha=$data['fecha'];
		$linea=$data['linea'];
		$proyecto=$data['proyecto'];
		$tipoP=$data['tipoP'];
		$registro=0;

		if(empty($nombre) || empty($descripcion) ||  empty($fecha) || $linea==='Seleccione la linea de investigacion' || $proyecto==='Seleccione el proyecto' || $tipoP==='Seleccione el tipo de producto'){		

		}else{
			$tipoProNC=TipoProductoNC::where('nombre',$tipoP)->first();
			$id_pro=Proyecto::where('nombre',$proyecto)->value('id');

			$validar=Producto::where('titulo',$nombre)->first();

			if(empty($validar)){
				$producto = new Producto;
				$producto->id_proyecto=$id_pro;
				$producto->titulo=$nombre;
				$producto->descripcion=$descripcion;
				$producto->fecha_publicacion=$fecha;
				$producto->save();

				$id_prod=Producto::where('titulo',$nombre)->value('id_producto');

				$cedula=session('doc');
				$docPro= new DocenteProducto;
				$docPro->num_documento=$cedula['num_documento'];
				$docPro->id_produc=$id_prod;
				$docPro->save();

				$proNuevoCon=new ProductoNuevoConocimiento;
				$proNuevoCon->id_producto=$id_prod;
				$proNuevoCon->id_tipo_pnc=$tipoProNC['id'];
				$proNuevoCon->save();

				$id_proNC=ProductoNuevoConocimiento::where('id_producto',$id_prod)->value('id_producto');


				if($tipoProNC['nombre']==='CAPITULO DE LIBRO'){
					$isbn=$data['isbn'];
					$ambito=$data['ambito'];
					$edito=$data['edito'];
					$numPag=$data['numPag'];
					$nomLi=$data['nomLi'];


					$CapituloLibro = new CapituloLibro;
					$CapituloLibro->id_producto=$id_proNC;
					$CapituloLibro->isbn=$isbn;
					$CapituloLibro->ambito=$ambito;
					$CapituloLibro->editorial=$edito;
					$CapituloLibro->numero_paginas=$numPag;
					$CapituloLibro->nombre_libro=$nomLi;
					$CapituloLibro->save();

				} elseif ($tipoProNC['nombre']==='LIBRO') {
					$isbnL=$data['isbnL'];
					$ambitoL=$data['ambitoL'];
					$editoL=$data['editoL'];
					$numCap=$data['numCap'];
					$numPagL=$data['numPagL'];

					$Libro= new Libro;
					$Libro->id_producto=$id_proNC;
					$Libro->isbn=$isbnL;
					$Libro->ambito=$ambitoL;
					$Libro->editorial=$editoL;
					$Libro->nomero_capitulos=$numCap;
					$Libro->numero_paginas=$numPagL;
					$Libro->save();

				}else{
					$nombreR=$data['nombreR'];
					$isbnA=$data['isbnA'];
					$ambitoA=$data['ambitoA'];
					$tipoA=$data['tipoA'];
					$link=$data['link'];

					$articulo=new Articulo;
					$articulo->id_producto=$id_proNC;
					$articulo->tipo_articulo=$tipoA;
					$articulo->nombre_revista=$nombreR;
					$articulo->issn=$isbnA;
					$articulo->ambito_revista=$ambitoA;
					$articulo->link_articulo=$link;
					$articulo->save();
				}
				$registro=1;
			}else{
				$registro=2;
			}

		}
		session(['registro'=>$registro]);
		return redirect('registrar-producto');
    }
}
