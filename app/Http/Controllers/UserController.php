<?php

    namespace App\Http\Controllers;

    use DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;

    class UserController extends Controller {
        public function getAll()
        {
            $users = User::all();
            return view('users', compact('users'));
        }

        public function getById($id)
        {
            $user = User::find($id);
            return view('users.show', compact('user'));
        }

        public function getLista() {
            $users = DB::select("
                                 SELECT pe.id, pe.Nombre, pe.Apellido1, pe.Apellido2, pe.User, pe.Email, 
                                        pe.Password, pe.Id_tipo_usuario, tu.Descripcion Tipo_usuario, pe.Anonimo 
                                   FROM users pe 
                                   JOIN tipos_usuarios tu ON tu.Id_tipo_usuario = pe.Id_tipo_usuario 
                               ORDER BY Apellido1, Apellido2, Nombre, User");
            return $users;
        }

        public function insert(Request $request)
        {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('users.index');
        }

        public function update(Request $request, $id)
        {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('users.show', $id);
        }

        public function delete($id)
        {
            $user = User::find($id);
            $user->delete();

            return redirect()->route('users.index');
        }

        // public function index()
        // {
        //     $user = null;
        //     if (Auth::check()) {
        //         $id = Auth::id();
        //         $user = User::find($id);
        //     }
        //     return view('index', compact('user'));
        // }

    }
    
