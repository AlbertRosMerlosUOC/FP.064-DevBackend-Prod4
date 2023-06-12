<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.includes')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Gestor de eventos DevBackend - Login</title>
</head>
<body>
    <main class="form-signin">
        <form class="formLogin" action="{{ route('login') }}" method="POST">
            @csrf
            <h1 class="mb-3">Login</h1>
            <div class="form-floating">
                <input type="text" class="form-control" name="email" id="floatingInput" placeholder="Correo electrónico">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="mt-3 form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Contraseña">
                <label for="floatingPassword">Contraseña</label>
            </div>

            <div class="mb-3" style="color: #FF0000;">
                @if(session('message'))
                    {{ session('message') }}
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Acceder</button>
            <p class="mt-3">¿No tienes usuario? Regístrate <a href="{{ route('signup') }}">aquí</a></p>
            <p class="mt-4 mb-3 text-muted"><span style="font-family: 'Shantell Sans';">DevBackend</span> &copy; 2023</p>
        </form>
    </main>
</body>
</html>


