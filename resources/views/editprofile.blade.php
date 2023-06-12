<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor de eventos DevBackend - Perfil</title>
    @include('partials.includes')
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
</head>
<body>
    @include('partials.header')
    @include('partials.svg')  
    <div class="container px-3 py-5">
        <h1 class="pb-2 border-bottom" style="text-align: left;">Editando el perfil del usuario: <b>{{ $user->User }}</b></h1>
        <div class="container" style="justify-content: center; align-items: center; width: 600px;">
            <div class="tab-content clearfix formulario-datos-completo" style="width: 576px;" id="PerfilContent">   
            <form action="{{ route('profile') }}" method="POST" style="width: 400px;">
                    @csrf
                    <div class="form-profile">
                    <input type="hidden" name="Id_persona" value="{{ $id_persona }}">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="Nombre" id="floatingNombre" placeholder="Nombre" value="{{ $user->Nombre }}" required>
                            <label for="floatingUser">Nombre</label>
                        </div>
                        <div class="mt-3 form-floating">
                            <input type="text" class="form-control" name="Apellido1" id="floatingApellido1" placeholder="Primer apellido" value="{{ $user->Apellido1 }}" required>
                            <label for="floatingApellido1">Primer apellido</label>
                        </div>
                        <div class="mt-3 form-floating">
                            <input type="text" class="form-control" name="Apellido2" id="floatingApellido2" placeholder="Segundo apellido" value="{{ $user->Apellido2 }}" required>
                            <label for="floatingApellido2">Segundo apellido</label>
                        </div>
                        <div class="mt-3 form-floating">
                            <input type="email" class="form-control" name="Email" id="floatingEmail" placeholder="E-mail" value="{{ $user->email }}">
                            <label for="floatingUser">E-mail</label>
                        </div>
                        <div class="mt-3 form-floating">
                            <div class="form-check" style="padding-top: 5px; padding-bottom: 5px;">
                                <input class="form-check-input" type="checkbox" id="Anonimo" name="Anonimo">
                                <label class="form-check-label" for="Anonimo"><b>No quiero aparecer en el listado público de asistentes a actos</b></label>
                            </div>
                        </div>
                        <div class="mt-3 form-floating">
                            <input class="form-control" type="password" placeholder="Cambiar contraseña" id="Password" name="Password">
                            <label for="Contraseña">Cambiar contraseña</label>
                        </div>
                        <div class="mt-3 form-floating">
                            <input class="form-control" type="password" placeholder="Confirma la contraseña" id="Confirm_Password" name="Confirm_Password">
                            <label for="Confirm_Password">Confirma la contraseña</label>
                        </div>
                        <div class="mb-3">
                            @if (!empty($message))
                                {{ $message }}
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update" value="update">Actualizar datos</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
