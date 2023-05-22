<?php
    session_start();
    $msg = "";
    include 'validar-login.php';
    include 'conectar.php';

    if(isset($_POST['nome']) && $_GET['editar'] == "")
    {
        $id = $_SESSION['id_admin'];
        $nome = $_POST['nome'];
        $sql = "INSERT INTO tarefas(id_tarefa, nome) VALUES($id, '$nome')";
        conectar($sql);
        echo "<script>window.location.replace('./admin.php');</script>";
    }else{  
        if(isset($_GET['editar']))
        {
            $sql = "UPDATE tarefas SET nome = '$nome' where id = $id";
            $result = conectar($sql);
            $msg = "Gravado com Sucesso.";
            $tpMsg = "success";

        }   
    }       
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
                <div class="header">
                    <h2>Cadastro de Tarefas
                        <a href="atualizar-senha" class="btn btn-info ">Atualizar senha</a>
                        <a href="logout.php" class="btn btn-danger">Sair</a>
                    </h2>
                </div>
                <form action="admin.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="mb-3 mt-3">
                        <label for="nome" class="form-label"><strong>Escreva a Tarefa:</strong></label>
                        <input type="text" class="form-control" id="nome" name="nome"><br>
                        <button type="submit" class="btn btn-success" name="submit">Gravar</button>
                        <button type="reset" class="btn btn-secondary" name="reset">Nova Tarefa</button>
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
            if($_SESSION['id_admin'])
            {
                include 'tarefas.php';
            }
        ?>
    </div>
</body>
</html>
<!-- corrigir -->