<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Redirect;
    //use Illuminate\Support\Facades\DB;

    class AuthController extends Controller
    {
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');
            //DB::enableQueryLog();
            
            if (Auth::attempt($credentials)) {
                $userId = Auth::id();
                $user = User::find($userId);
                $idTipoUsuario = $user->Id_tipo_usuario;
                return redirect()->route('principal', compact('idTipoUsuario'));
                // La autenticación fue exitosa
                //dd(DB::getQueryLog());
                
            } else {
                // La autenticación falló
                //dd(DB::getQueryLog());
                return back()->with('message', 'Credenciales inválidas');
            }
        }    
    }


