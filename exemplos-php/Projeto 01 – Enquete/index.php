<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lista de Enquetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Lista de Enquetes <a href="criar-enquete.php" 
        class="btn btn-secondary">Criar Nova Enquete</a></h2>
        <table class="rable table-striped">
            <tr>
                <th>Nome Enquete</th>
                <th class="col-sm-1">Responder</th>
                <th class="col-sm-1">Resultado</th>
                <th class="col-sm-1">Apagar</th>
            </tr>
            <?php
            include "conectar.php";
            $retorno = conectar("select * from enquete;");
            while ($linha = $retorno->fetch_assoc()) {
                $id = $linha['id'];
                $nome = $linha['nome'];
                echo "<tr>
        <td>$nome</td>
        <td class='text-center'><a href='responder-enquete.php?id-enquete=$id'
        class='btn btn-outline-primary btn-sm'>✒</a></td>
        <td class='text-center'><a href='resultado-enquete.php?id-enquete=$id'
        class='btn btn-outline-primary btn-sm'>📈</a></td>
        <td class='text-center'><a href='resultado-enquete.php?id-enquete=$id'
        class='btn btn-outline-primary btn-sm'>🗑</a></td>
        </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>