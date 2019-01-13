<div class="container">
    <form id="etapa3final">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Etapa 3 - Resultado</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Texto:</label>
                <input type="text" class="form-control col-sm-8" name="texto" id="texto" value="<?php
                echo isset($cesar->texto) ? $cesar->texto : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Cifra de Cesar:</label>
                <input type="text" class="form-control col-sm-8" name="cripto" id="cripto" value="<?= $cesar->cripto ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">AES256:</label>
                <input type="text" class="form-control col-sm-8" name="cripto" id="cripto" value="<?= $cesar->cripto ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Cripto3:</label>
                <input type="text" class="form-control col-sm-8" name="cripto" id="cripto" value="<?= $cesar->cripto ?>" />
            </div>
            <div class="card-footer">
                <button class="btn btn-secondary" type="reset">Limpar</button>
                <a class="btn btn-danger" href="?controller=CriptoController&method=index">Voltar</a>
            </div>
        </div>
    </form>
</div>