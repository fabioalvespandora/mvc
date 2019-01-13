<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang="pt-br">
    <header>
        <meta charset="utf-8">
        <title>MT4</title>
        <link href="assets/bootstrap.min.css" rel="stylesheet"/>
        <link href="assets/style.css" rel="stylesheet"/>
    </header>
    <body>

        <?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method     = isset($_GET['method']) ? $_GET['method'] : null;
            if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="#">MT4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mt4-navbar">
            <li class="nav-item">
                <a class="nav-link" href="?controller=DispositivosController&method=listar">Etapa 1 - CRUD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Etapa 2 - SSH</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?controller=CriptoController&method=index">Etapa 3 - Criptografia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Etapa 4 - Hash</a>
            </li>
            </ul>
        </div>
        </div>
        </nav>
        



           <div class="container">
            <h1>MT4 Teste</h1><hr>
            Bem-vindo ao aplicativo para teste MT4! <br /><br />
            <a href="?controller=DispositivosController&method=listar" class="btn btn-success">Vamos Começar!</a>
           </div>
        <?php 
        }
        ?>

    <script src="assets/jquery.min.js"></script>
    <script src="assets/theme.js"></script>
    </body>
</html>