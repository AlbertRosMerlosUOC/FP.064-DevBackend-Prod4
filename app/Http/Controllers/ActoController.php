<?php

    namespace App\Http\Controllers;

    use DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Acto;
    use App\Models\PersonaActo;
    use App\Models\TipoActo;

    class ActoController extends Controller {
        public function index() {
            $actos = Acto::all();
            return view('actos', compact('actos'));
        }

        public function getById($id)
        {
            $acto = Acto::find($id);
            return view('actos.show', compact('acto'));
        }

        public function getLista() {
            $actos = DB::select("
                                 SELECT ac.Id_acto, ac.Fecha, TIME_FORMAT(ac.Hora, '%H:%i') Hora, ac.Titulo, ac.Descripcion_corta, ac.Descripcion_larga, ac.Num_asistentes, ac.Id_tipo_acto, 
                                        (SELECT COUNT(*) FROM personas_actos pa WHERE pa.Id_acto = ac.Id_acto AND pa.Ponente = 0) Num_inscritos,
                                        ta.Descripcion Tipo_acto 
                                FROM actos ac 
                                JOIN tipo_acto ta ON ta.Id_tipo_acto = ac.Id_tipo_acto
                            ORDER BY ac.Fecha DESC, ac.Hora DESC");
            return $actos;
        }

        public function getListaCalendario($id) {
            $actos = DB::select("
                                 SELECT ac.Id_acto, ac.Fecha, TIME_FORMAT(ac.Hora, '%H:%i') Hora, ac.Titulo, ac.Descripcion_corta, ac.Descripcion_larga, 
                                        ac.Num_asistentes, ac.Id_tipo_acto, (SELECT COUNT(*) FROM personas_actos pa WHERE pa.Id_acto = ac.Id_acto AND pa.Ponente = 0 ) Num_inscritos, 
                                        (SELECT pa.Ponente FROM personas_actos pa WHERE pa.Id_persona = $id AND pa.Id_acto = ac.Id_acto) Rol,
                                        ta.Descripcion Tipo_acto 
                                FROM actos ac 
                                JOIN tipo_acto ta ON ta.Id_tipo_acto = ac.Id_tipo_acto
                            ORDER BY ac.Fecha DESC , ac.Hora DESC");
            return $actos;
        }

        public function getListaCalendarioInvitado() {
            $actos = DB::select("
                                 SELECT ac.Id_acto, ac.Fecha, TIME_FORMAT(ac.Hora, '%H:%i') Hora, ac.Titulo, ac.Descripcion_corta, ac.Descripcion_larga, 
                                        ac.Num_asistentes, ac.Id_tipo_acto, (SELECT COUNT(*) FROM personas_actos pa WHERE pa.Id_acto = ac.Id_acto AND pa.Ponente = 0 ) Num_inscritos, 
                                        (SELECT pa.Ponente FROM personas_actos pa WHERE pa.Id_persona = 0 AND pa.Id_acto = ac.Id_acto) Rol,
                                        ta.Descripcion Tipo_acto 
                                FROM actos ac 
                                JOIN tipo_acto ta ON ta.Id_tipo_acto = ac.Id_tipo_acto
                            ORDER BY ac.Fecha DESC , ac.Hora DESC");
            return $actos;
        }

        public function edit(Request $request)
        {
            $user = Auth::user();
            $id_persona = $user->id;
            $idTipoUsuario = $user->Id_tipo_usuario;
            $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
            $tiposActos = TipoActo::all();
            $action = 'update';
            $actionText = 'Guardar';
            $id = $request->Id_acto;

            $acto = DB::table('actos')->where('Id_acto', $request->Id_acto)->first();
            $usuariosPonentes = DB::select("
                                            SELECT pe.id, CONCAT(CONCAT_WS(' ', pe.Apellido1, pe.Apellido2), CONCAT(', ', pe.Nombre)) AS Nombre_completo,
                                                (SELECT COUNT(*) FROM personas_actos pa WHERE pa.Id_persona = pe.id AND pa.Id_acto = $id AND pa.Ponente = 1) En_acto
                                            FROM users pe
                                            WHERE pe.Id_tipo_usuario = 3
                                                AND pe.id NOT IN (SELECT px.Id_persona FROM personas_actos px WHERE px.Id_acto = $id AND px.Ponente = 0)
                                            ORDER BY 2
                                        ");
            $usuariosInscritos = DB::select("
                                            SELECT pe.id, CONCAT(CONCAT_WS(' ', pe.Apellido1, pe.Apellido2), CONCAT(', ', pe.Nombre)) AS Nombre_completo, pe.Anonimo
                                                FROM users pe JOIN personas_actos pa ON pe.id = pa.Id_persona
                                            WHERE pa.Id_acto = $id AND pa.Ponente = 0 
                                            ORDER BY 2");

            return view('actos-editar', compact('id_persona', 'tiposActos', 'idTipoUsuario', 'nombreUsuario', 'action', 'actionText', 'acto', 'usuariosPonentes', 'usuariosInscritos'));
        }

     
        public function insert(Request $request)
        {
            // Validar los datos del formulario
        $validatedData = $request->validate([
            'Fecha' => 'required',
            'Hora' => 'required',
            'Titulo' => 'required',
            'Descripcion_corta' => 'required',
            'Descripcion_larga' => 'required',
            'Num_asistentes' => 'required',
            'Id_tipo_acto' => 'required',
        ]);

            $acto = new Acto();
            $acto->Fecha = $request->input('Fecha');
            $acto->Hora = $request->input('Hora');
            $acto->Titulo = $request->input('Titulo');
            $acto->Descripcion_corta = $request->input('Descripcion_corta');
            $acto->Descripcion_larga = $request->input('Descripcion_larga');
            $acto->Num_asistentes = $request->input('Num_asistentes');
            $acto->Id_tipo_acto = $request->input('Id_tipo_acto');

            $acto->save();

            return redirect()->route('actos');
        }

        public function update(Request $request)
        {
            // Validar los datos del formulario
            $validatedData = $request->validate([
                'Fecha' => 'required',
                'Hora' => 'required',
                'Titulo' => 'required',
                'Descripcion_corta' => 'required',
                'Descripcion_larga' => 'required',
                'Num_asistentes' => 'required',
                'Id_tipo_acto' => 'required',
            ]);
        
            $acto = Acto::find($request->Id_acto);
            $acto->Fecha = $request->input('Fecha');
            $acto->Hora = $request->input('Hora');
            $acto->Titulo = $request->input('Titulo');
            $acto->Descripcion_corta = $request->input('Descripcion_corta');
            $acto->Descripcion_larga = $request->input('Descripcion_larga');
            $acto->Num_asistentes = $request->input('Num_asistentes');
            $acto->Id_tipo_acto = $request->input('Id_tipo_acto');
        
            $acto->save();
        
            return redirect()->route('actos', $request->Id_acto);
        }
        

        public function delete($id) {
            $acto = Acto::find($id);
            $acto->delete();

            return redirect()->route('actos');
        }

        public function deleteInscription($id) {
            $idActo = request('Id_acto');
            $idPersona = request('Id_persona');

            PersonaActo::where('Id_acto', $idActo)->where('Id_persona', $idPersona)->delete();

            return redirect()->back()->with('success', 'Inscripción eliminada correctamente');
        }

        // public function index()
        // {
        //     $user = null;
        //     if (Auth::check()) {
        //         $id = Auth::id();
        //         $user = Acto::find($id);
        //     }
        //     return view('index', compact('user'));
        // }

    }
    
