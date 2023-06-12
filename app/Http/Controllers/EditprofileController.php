<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{
    public function update(Request $request)
{
    // Obtener el usuario autenticado
    $user = Auth::user();

    // Validar los datos del formulario
    $validatedData = $request->validate([
        'Nombre' => 'required',
        'Apellido1' => 'required',
        'Apellido2' => 'required',
        'Email' => 'required|email',
        'Password' => 'required',
    ]);

    $id_persona = $user->Id_persona;

    // Actualizar los datos del usuario
    $user->Nombre = $request->input('Nombre');
    $user->Apellido1 = $request->input('Apellido1');
    $user->Apellido2 = $request->input('Apellido2');
    $user->email = $request->input('Email');
    $user->password = $request->input('Password');
    //$user->password = Hash::make($request->input('Password'));
    // ...

    // Guardar los cambios en la base de datos
    $user->save();

    // Redireccionar a la página de perfil con un mensaje de éxito
    return redirect()->route('principal')->with('success', 'Perfil actualizado correctamente.');
}


}



