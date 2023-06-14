<div class="tab-pane show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
    @csrf
    <input type="hidden" id="Id_acto" name="Id_acto"/>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label class="form-label" for="Fecha">Fecha</label>
                <input class="form-control" type="date" placeholder="Fecha" id="Fecha" name="Fecha" readonly/>
            </div>
            <div class="col">
                <label class="form-label" for="Hora">Hora</label>
                <input class="form-control" type="time" placeholder="Hora" id="Hora" name="Hora" readonly/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label" for="Titulo">Titulo</label>
        <input class="form-control" type="text" placeholder="Titulo del acto" id="Titulo" name="Titulo" maxlength="50" readonly/>
    </div>
    <div class="form-group">
        <label class="form-label" for="Descripcion_corta">Descripción corta</label>
        <textarea class="form-control" placeholder="Descripción corta" rows="3" id="Descripcion_corta" name="Descripcion_corta" readonly maxlength="200" resize="none"></textarea>
    </div>
    <div class="form-group">
        <label class="form-label" for="Descripcion_corta">Descripción larga</label>
        <textarea class="form-control" placeholder="Descripción larga" rows="6" id="Descripcion_larga" name="Descripcion_larga" readonly maxlength="1000"></textarea>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col">
                <label class="form-label" for="Num_asistentes">Número de asistentes</label>
                <input class="form-control" type="number" placeholder="Número de asistentes" id="Num_asistentes" name="Num_asistentes" maxlength="3" min="1" readonly/>
            </div>
            <div class="col">
                <label class="form-label" for="Id_tipo_acto">Tipo de acto</label>
                <select class="form-control" id="Id_tipo_acto" name="Id_tipo_acto" disabled>
                    <option value=""></option>
                    @foreach ($tiposActos as $reg)
                        <option value="{{ $reg['Id_tipo_acto'] }}">{{ $reg['Descripcion'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <br>
    <button type="button" class="btn btn-danger" onclick="volver()">Volver</button>
</div>

<script>
    function volver() {
        window.location.href = "http://localhost:8000/ponentes";
    }
</script>
