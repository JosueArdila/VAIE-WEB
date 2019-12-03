<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\ReconocimientoColciencias;

class ReconocimientoController extends Controller
{
    public function listarReconocimientos(){
    	$reconocimientos = ReconocimientoColciencias::all();
		return $reconocimientos;
    }
}
