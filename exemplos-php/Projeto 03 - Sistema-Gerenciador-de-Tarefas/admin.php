<?php
$msg = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-03">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Cadastro de Tarefas</h2>
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3 mt-3">
                        <label for="nome" class="form-label"><strong>Escreva a Tarefa:</strong></label>
                        <input type="text" class="form-control" id="nome" name="nome"><br>
                        <button type="submit" class="btn btn-success" name="submit">Gravar</button>
                        <button type="submit" class="btn btn-secondary" name="submit">Nova Tarefa</button>
                        <a href="logoff.php" class="btn btn-link">Voltar</a>
                        
                </form>
                <?php
                if ($msg != "") {
                ?>
                    <br>
                    <div class="alert alert-<?php echo $tpMsg; ?> alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong> <?php echo $msg; ?></strong>
                    </div>
            </div>
        <?php } ?>
        </div>
        <?php
        include('listar-tarefa.php');
        ?>
    </div>
</body>

</html>