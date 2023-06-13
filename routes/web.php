<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TipoUController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\ActoController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Acto;
use App\Models\PersonaActo;
use App\Models\TipoUsuario;
use App\Models\TipoActo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Ruta de la página principal
Route::get('/principal', function () {
    $usidTipoUsuarioer = null;
    $idTipoUsuario = null;
    if (Auth::check()) {
        $userId = Auth::id();
        $user = User::find($userId);
        $idTipoUsuario = $user->Id_tipo_usuario;
        $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    }    
    if ($idTipoUsuario) {
        $tipoUsuario = TipoUsuario::find($idTipoUsuario);
        $descripcionTipoUsuario = $tipoUsuario ? $tipoUsuario->Descripcion : null;
    } else {
        $descripcionTipoUsuario = null;
    }
    return view('principal', compact('idTipoUsuario', 'descripcionTipoUsuario', 'nombreUsuario'));
})->name('principal');

// Ruta de la página principal
Route::get('/', function () {
    $user = null;
    if (Auth::check()) {
        $id = Auth::id();   
        $user = User::find($id);
    }    
    
    return view('index', compact('user'));
});    

// Rutas del login
Route::get('/login', function () {
    return view('login');
});    

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta del logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Rutas del signup
Route::post('/signup', [SignupController::class, 'register'])->name('register');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');    

// Ruta del perfil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Ruta de la edición del perfil
Route::get('/editprofile', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    return view('editprofile', compact('user', 'id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('editprofile');

Route::post('/profile', [EditProfileController::class, 'update'])->name('profile.update');

// Obtener la lista de tipos de acto
Route::get('/actos', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    $actos = ActoController::getLista();
    return view('actos', compact('actos','id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('actos');

// Ruta para crear un nuevo acto
Route::get('/actos-nuevo', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    $tiposActos = TipoActo::all();
    $action = "insert";
    $actionText = "Crear";
    return view('actos-nuevo', compact('tiposActos','id_persona', 'idTipoUsuario', 'nombreUsuario', 'action', 'actionText'));
})->name('actos-nuevo');

Route::post('/actos', [ActoController::class, 'insert'])->name('actos.insert');

Route::post('/actos-nuevo',  [ActoController::class, 'insert'])->name('actos.insert');

// Ruta para eliminar un acto
Route::delete('/actos/{id}', [ActoController::class, 'delete'])->name('actos.delete');

// Ruta para editar un acto
Route::get('/actos-editar', [ActoController::class, 'edit']) ->name('actos-editar');

Route::post('/actos', [ActoController::class, 'update'])->name('actos.update');

Route::post('/actos/deleteInscription/{id}', [ActoController::class, 'deleteInscription'])->name('actos.deleteInscription');

Route::get('/usuarios', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    $personas = UserController::getLista();
    return view('usuarios', compact('personas','id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('usuarios');

Route::get('/tipos-actos', function () {
    $user = Auth::user();
    $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
    $idTipoUsuario = $user->Id_tipo_usuario;
    $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
    $tiposActos = TipoActo::all();
    return view('tipos-actos', compact('tiposActos','id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('tipos-actos');

Route::get('/calendario', function () {
    $user = Auth::user();
    if ($user) {
        $id_persona = $user->id; // Obtén el ID de la persona asociado al usuario autenticado
        $idTipoUsuario = $user->Id_tipo_usuario;
        $nombreUsuario = $user->Nombre . ' ' . $user->Apellido1 . ' ' . $user->Apellido2;
        $actos = ActoController::getListaCalendario($id_persona);
    } else {
        $id_persona = null;
        $idTipoUsuario = null;
        $nombreUsuario = "Invitado";
        $actos = ActoController::getListaCalendarioInvitado();
    }
    return view('calendario', compact('actos','id_persona', 'idTipoUsuario', 'nombreUsuario'));
})->name('calendario');

Route::post('/actos/inscribir', [ActoController::class, 'inscripcionActo'])->name('acto.inscribir');

// WebService REST
Route::get('/rest/acto/getAll', [ActoController::class, 'restGetActos']);



