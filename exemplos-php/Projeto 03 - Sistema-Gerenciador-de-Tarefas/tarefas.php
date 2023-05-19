<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Criar Tarefas <a href="index.php" class="btn btn-secondary">Voltar</a></h2>
        <?php
        if (isset($_GET['qt-opcoes'])) {
            include "form-nova-tarefa.php";
        } elseif (isset($_GET['nome-tarefa'])) {
            include "gravar-tarefa.php";
        } else {
            include "form-pre-nova-tarefa.php";
        }
        ?>
    </div>
</body>

</html>