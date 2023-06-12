<?php
use App\Models\User;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Gestor de eventos DevBackend</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials.includes')
</head>
<body>
@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
    @include('partials.header')
    @include('partials.svg')
    <div class="container px-3 py-5" id="icon-grid">
        <h1 class="pb-2 border-bottom" style="text-align: left;">Menú principal de <b>{{$descripcionTipoUsuario}}</b></h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3 py-5" style="text-align: justify !important;">
            @if ($idTipoUsuario == 1)
                <div class="col d-flex align-items-start tarjeta-menu" onclick="window.location.href='actos'">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#calendar-plus"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Gestión de actos</h4>
                        <p>Pantalla de administración para la gestión de actos: altas, modificaciones y altas. Gestión de personas inscritas en los actos.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start tarjeta-menu" onclick="window.location.href='usuarios'">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#person-gear"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Gestión de usuarios</h4>
                        <p>Creación, modificación y eliminación de nuevos usuarios que pueden acceder a la aplicación. Gestión de sus tipologías de usuario.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start tarjeta-menu" onclick="window.location.href='tipos-actos'">
                    <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                        <use xlink:href="#db-gear"/>
                    </svg>
                    <div>
                        <h4 class="fw-bold mb-0">Gestión de tipos de actos</h4>
                        <p>Pantalla de administración para la gestión de las tipologías de actos disponibles en la aplicación.</p>
                    </div>
                </div>
            @endif
            <div class="col d-flex align-items-start tarjeta-menu" onclick="window.location.href='calendario'">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                    <use xlink:href="#calendar3"/>
                </svg>
                <div>
                    <h4 class="fw-bold mb-0">Calendario de actos</h4>
                    <p>Buscador de actos disponibles para la inscripción como asistente.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>