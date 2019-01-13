<h1>Resultado acima</h1>
<div class="container">
    <form action="?controller=SshController&method=comando" method="POST">
        <div class="form-group">
            <label for="comando">Digite o comando</label>
            <input type="text" name="comando">
        </div>
        <div class="form-group">
            <input type="hidden" value="<?= $ssh->ip ?>" name="ip">
            <input type="hidden" value="<?= $ssh->usuario ?>" name="usuario">
            <input type="hidden" value="<?= $ssh->senha ?>" name="senha">
        </div>
        <button type="submit" class="btn btn-success">Enviar Comando</button>    
    </form>
</div>