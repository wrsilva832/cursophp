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
                <th class="col-sm-1" style="text-align: center;">Ações</th>
            </tr>
            <?php
            include_once "conectar.php";

            if (isset($_SESSION['id_admin'])) {
                $id = $_SESSION['id_admin'];

                $sql = "SELECT * FROM tarefas WHERE id_tarefa = $id";

                $user_active = "";

                $res = conectar($sql);

                while ($row = $res->fetch_assoc()) {
                    $user_active = $row['id_tarefa'];
                    $nome = $row['nome'];
                    echo "  <tr>
                            <td>$nome</td>
                            
                            <td class='text-center'>
                                <a href='responder-enquete.php?id-tarefa=$user_active' class='btn btn-outline-primary btn-sm'>✒</a>
                                <a href='resultado-tarefa.php?id-tarefa=$user_active' class='btn btn-outline-primary btn-sm'>🗑</a>
                            </td>
    
                            </tr>";
                }
            }

            ?>
        </table>
    </div>
</body>
</html>
<!-- ok -->