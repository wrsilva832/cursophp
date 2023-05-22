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
            if (isset($_SESSION['id_admin'])) {
                $id = $_SESSION['id_admin'];
                $sql = "SELECT * FROM tarefas WHERE id_tarefa = $id";
                $user_active = "";
                $result = conectar($sql);

                while ($row = $result->fetch_assoc()) {
                    $user_active = $row['id_tarefa'];
                    $id = $row['id'];
                    $nome = $row['nome'];
                    echo "  <tr>
                            <td>$nome</td>                            
                            <td class='text-center'>
                                <a href='admin.php?id-tarefa=$user_active&editar=$id' class='btn btn-outline-primary btn-sm'>✒</a>
                                <a href='admin.php?id-tarefa=$user_active&apagar=$id' class='btn btn-outline-primary btn-sm' onclick='return apagar()'>🗑</a>
                            </td>    
                            </tr>";
                }
            }
            ?>
        </table>
        <script>
            function apagar(){
            return confirm("Deseja realmente apagar?") ;   
            }
        </script>
    </div>
</body>
</html>
<!-- corrigir -->