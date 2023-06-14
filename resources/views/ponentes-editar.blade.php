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
        <h1 class="pb-2 border-bottom" style="text-align: left;">Gestión de archivos</h1>
        <div class="container" style="justify-content: center; align-items: center; width: 600px;">
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
                <ul class="nav nav-tabs" id="actosTab" style="width: 600px;" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="datos-tab" data-bs-toggle="tab" data-bs-target="#datos" type="button" role="tab" aria-controls="datos" aria-selected="true">Datos generales</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="archivos-tab" data-bs-toggle="tab" data-bs-target="#archivos" type="button" role="tab" aria-controls="archivos" aria-selected="false">Archivos subidos</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content clearfix formulario-datos" style="width: 576px;" id="actosTabContent">
                @include('partials.ponentes-form')
                @include('partials.ponentes-archivos')
            </div>
        </div>
    </div>

    @if ($acto)
        <script>
            const acto = @json($acto);
            document.getElementById("Id_acto").value = acto.Id_acto;
            document.getElementById("Fecha").value = acto.Fecha;
            document.getElementById("Hora").value = acto.Hora;
            document.getElementById("Titulo").value = acto.Titulo;
            document.getElementById("Descripcion_corta").value = acto.Descripcion_corta;
            document.getElementById("Descripcion_larga").value = acto.Descripcion_larga;
            document.getElementById("Num_asistentes").value = acto.Num_asistentes;
            document.getElementById("Id_tipo_acto").value = acto.Id_tipo_acto;
        </script>
    @endif



</body>
</html>
