<div class="tab-pane" id="ponentes" role="tabpanel" aria-labelledby="ponentes-tab">
    <form action="{{ url('/php/actosFormAccion.php') }}" method="POST" style="width: 450px;">
        @csrf
        <input type="hidden" id="Id_acto" name="Id_acto"/>
        <div class="form-group">
            <label class="form-label" for="Ponentes">Ponentes&nbsp;<span class="required" title="Campo requerido">*</span></label>
            <select class="form-control" id="Ponentes" name="Ponentes[]" required multiple size="24">
                @foreach ($usuariosPonentes as $reg)
                    @php
                        $selected = $reg->En_acto == 1 ? "selected" : "";
                    @endphp
                    <option value="{{ $reg->id }}" {{ $selected }}>{{ $reg->Nombre_completo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="ponentes">Guardar</button>
        <button type="button" class="btn btn-danger" onclick="volver()">Volver</button>
    </form>
</div>

