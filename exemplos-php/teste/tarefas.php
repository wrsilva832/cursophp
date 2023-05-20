<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <table class="table table-striped">
            <tr>
                <th>Lista de Tarefa</th>
                <th class="col-sm-1">Ações</th>
            </tr>
            <?php
            include_once "conectar.php";
            $retorno = conectar("select * from tarefas;");
            while ($linha = $retorno->fetch_assoc()) 
            {
                $id = $linha['id'];
                $nome = $linha['nome'];
                echo "  <tr>
                        <td>$nome</td>
                        <td class='text-center'><a href='responder-enquete.php?id-tarefa=$id' class='btn btn-outline-primary btn-sm'>✒</a></td>
                        <td class='text-center'><a href='resultado-tarefa.php?id-tarefa=$id' class='btn btn-outline-primary btn-sm'>🗑</a></td>
                        </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>