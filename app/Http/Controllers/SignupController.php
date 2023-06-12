<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

    class SignupController extends Controller
    {
        public function register(Request $request)
        {
            //dd($request->all());

            $validatedData = $request->validate([
                'User' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'Nombre' => 'required',
                'Apellido1' => 'required',
                'Apellido2' => 'required',
                'password' => 'required',
            ]);

            // Crear un nuevo usuario en la base de datos
            $user = new User();
            $user->User = $request->User;
            $user->email = $request->email;
            $user->Nombre = $request->Nombre;
            $user->Apellido1 = $request->Apellido1;
            $user->Apellido2 = $request->Apellido2;
            $user->password = bcrypt($request->password);
            $user->save();

            // Redireccionar al inicio de sesión o a otra página de tu elección
            return redirect()->route('login')->with('message', 'Registro exitoso. Inicia sesión para continuar.');
        }
    }

