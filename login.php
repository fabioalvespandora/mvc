<div class="container">
    <form action="?controller=SshController&method=logar" method="POST" id="loginform">
    <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>
        <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ex: root">
        <small id="emailHelp" class="form-text text-muted">Certifique-se de que o usuario existe realmente existe!.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" class="form-control" name="senha">
        <input type="hidden" name="ip" value="<?php if ( isset($_GET['ip'])) {
	echo $ip = $_GET['ip'];
} ?>">
    </div>
    <button type="submit" class="btn btn-primary">Logar</button>
    </form>
</div>