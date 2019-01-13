<div class="container" id="etapa3">

    <div class="card">
        <div class="btn-group">
            <button class="btn">Criptografar</button>
        </div>
        <div class="btn-group">
            <button class="btn">Descriptografar</button>
        </div>
        
    </div>
    <form action="?controller=CriptoController&method=criptografar" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Etapa 3 - Criptografia</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Texto:</label>
                <input type="text" class="form-control col-sm-8" name="texto" id="texto" value="<?php
                echo isset($dispositivo->hostname) ? $dispositivo->hostname : null;
                ?>" />
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Criptografar</button>
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="index.php">Cancelar e Voltar</a>
            </div>
        </div>
    </form>

    <form action="?controller=CriptoController&method=descriptografar" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Etapa 3 - Descriptografia</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Texto:</label>
                <input type="text" class="form-control col-sm-8" name="texto" id="texto" value="<?php
                echo isset($dispositivo->hostname) ? $dispositivo->hostname : null;
                ?>" />
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Criptografar</button>
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="index.php">Cancelar e Voltar</a>
            </div>
        </div>
    </form>
</div>