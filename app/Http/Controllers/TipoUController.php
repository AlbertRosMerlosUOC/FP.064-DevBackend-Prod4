<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class TipoUController extends Controller {
        public function obtenerDescripcion($idTipoUsuario) {
            $tipoUsuario = TipoUsuario::find($idTipoUsuario);
            $descripcion = $tipoUsuario ? $tipoUsuario->Descripcion : null;
            return response()->json(['descripcion' => $descripcion]);
        }
    }
