<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class TipoAController extends Controller {
        public function obtenerDescripcion($idTipoActo) {
            $tipoActo = TipoActo::find($idTipoActo);
            $descripcion = $tipoActo ? $tipoActo->Descripcion : null;
            return response()->json(['descripcion' => $descripcion]);
        }
    }
