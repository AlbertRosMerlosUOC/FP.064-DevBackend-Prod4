<?php
    use App\Models\User;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestor de eventos DevBackend</title>
        @include('partials.includes')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <main class="form-signin" style="max-width: 450px !important;">
            <h1 class="mb-3"><span style="font-family: 'Shantell Sans';"><b>DevBackend</b></span></h1>
            <div class="form-floating">
                <?php if (!empty($user)): ?>
                    ¡Bienvenid@ <b><?= $user->User; ?></b>!<br/>
                    Ya estás correctamente loginad@. Accede a la <a href="/principal">aplicación</a> o, si quieres salir, puedes hacer <a href="/php/logout.php">logout</a>
                <?php else: ?>
                    <p class="mt-3">¿Ya estás registrado? Inicia sesión <a href="/login">aquí</a></p>
                    <p class="mt-3">¿No tienes usuario? Regístrate <a href="/signup">aquí</a></p>
                    <p class="mt-3">¿Quieres ver nuestro calendario? Pincha <a href="/calendario">aquí</a></p>
                <?php endif; ?>
            </div>
        </main>
    </body>
</html>