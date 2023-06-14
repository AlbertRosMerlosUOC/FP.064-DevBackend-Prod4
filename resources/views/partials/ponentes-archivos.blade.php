<div class="tab-pane" id="archivos" role="tabpanel" aria-labelledby="archivos-tab" style="width: 625px !important;">
    @csrf
    <input type="hidden" id="Id_acto" name="Id_acto"/>
    <div class="form-group">
        <label class="form-label" for="Archivo">Añadir nuevo archivo</label>
        <input class="form-control" type="file" placeholder="Adjuntar archivo" id="Archivo" name="Archivo" />
    </div>
    <br>
    <button type="button" class="btn btn-primary" onclick="volver()">Guardar</button>
    <button type="button" class="btn btn-danger" onclick="volver()">Volver</button>
</div>