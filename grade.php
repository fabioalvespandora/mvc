
<div class="container">
    <h1 class="text-center">Dispositivos</h1>
    <hr>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Hostname</th>
                <th>IP</th>
                <th>Tipo</th>
                <th>Fabricante</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($dispositivos) {
                foreach ($dispositivos as $dispositivo) {
                    ?>
                    <tr>
                        <td><?php echo $dispositivo->hostname; ?></td>
                        <td><?php echo $dispositivo->ip; ?></td>
                        <td><?php echo $dispositivo->tipo; ?></td>
                        <td><?php echo $dispositivo->fabricante; ?></td>
                        <td>
                            <a href="?controller=DispositivosController&method=editar&id=<?php echo $dispositivo->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=DispositivosController&method=excluir&id=<?php echo $dispositivo->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                            <a href="Ssh.php" class="btn btn-warning btn-sm">Logar</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="text-center">
        <a href="?controller=DispositivosController&method=criar" class="btn btn-success btn-sm">Novo</a>
    </div>
</div>