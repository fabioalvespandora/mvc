<div class="container">
    <form action="?controller=DispositivosController&<?php echo isset($dispositivo->id) ? "method=atualizar&id={$dispositivo->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Dispositivos</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Hostname:</label>
                <input type="text" class="form-control col-sm-8" name="hostname" id="hostname" value="<?php
                echo isset($dispositivo->hostname) ? $dispositivo->hostname : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">IP:</label>
                <input type="text" class="form-control col-sm-8" name="ip" id="ip" value="<?php
                echo isset($dispositivo->ip) ? $dispositivo->ip : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                <input type="text" class="form-control col-sm-8" name="tipo" id="tipo" value="<?php
                echo isset($dispositivo->tipo) ? $dispositivo->tipo : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Fabricante:</label>
                <input type="text" class="form-control col-sm-8" name="fabricante" id="fabricante" value="<?php
                echo isset($dispositivo->fabricante) ? $dispositivo->fabricante : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($dispositivo->id) ? $dispositivo->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary">Limpar</button>
                <a class="btn btn-danger" href="?controller=DispositivosController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>