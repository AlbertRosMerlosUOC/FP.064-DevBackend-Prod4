<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor de eventos DevBackend - Administración de actos</title>
    @include('partials.includes')
</head>
<body>
    @include('partials.header')
    @include('partials.svg')
    <div class="container px-3 py-5">
        <h1 class="pb-2 border-bottom" style="text-align: left;">Nuevo acto</h1>
        <div class="container" style="justify-content: center; align-items: center; width: 600px;">
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
                <ul class="nav nav-tabs" style="width: 600px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#tab-1">Datos generales</a>
                    </li>
                </ul>
            </div>
            <div class="formulario-datos" style="width: 576px;">
                @include('partials.actos-form')
            </div>
        </div>
    </div>
</body>
</html>
