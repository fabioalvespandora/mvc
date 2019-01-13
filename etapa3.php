<div class="jumbotron">
    <div class="container" id="mainTabController">
        <h1 class="display-4">Etapa 3 - Criptografia</h1>
        <hr class="my-4">
        <div id="mainTabController" class="etapa3btns">
            <a class="btn btn-primary btn-lg" href="#" role="tab" newTag="Cripto" id="TabControlCripto">Criptografar</a>
            <a class="btn btn-primary btn-lg" href="#" role="tab" newTag="Descripto" id="TabControlDescripto">Descriptografar</a>
        </div>
        
    </div>
</div>

<div class="container" id="etapa3">
    <div id="mainContent">
        <form action="?controller=CriptoController&method=criptografar" method="post" id="Cripto" class="content-active disabled">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Etapa 3 - Criptografia</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Texto:</label>
                    <input type="text" class="form-control col-sm-8" name="texto" id="texto" value="" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Criptografar</button>
                    <button class="btn btn-secondary" type="reset">Limpar</button>
                </div>
            </div>
        </form>

        <form action="?controller=CriptoController&method=descriptografar" method="post" id="Descripto" class="content-hidden">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title">Etapa 3 - Descriptografia</span>
                </div>
                <div class="card-body">
                </div>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Texto:</label>
                    <input type="text" class="form-control col-sm-8" name="texto" id="texto" value="" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" type="submit">Descriptografar</button>
                    <button class="btn btn-secondary" type="reset">Limpar</button>
                </div>
            </div>
        </form>
    </div>
</div>