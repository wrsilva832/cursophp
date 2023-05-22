<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Portaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Lista de Entradas <a href="criar-enquete.php" 
        class="btn btn-secondary">Criar Nova Entrada</a></h2>
        <table class="rable table-striped">
            <tr>
                <th>Nome Entrada</th>
                
                <th class="col-sm-1">Apagar</th>
            </tr>
            <?php
            include "conectar.php";
            $retorno = conectar("select * from portaria;");
            while ($linha = $retorno->fetch_assoc()) {
                $id = $linha['id'];
                $nome = $linha['nome'];
                echo "<tr>
        <td>$nome</td>
        <td class='text-center'><a href='responder-enquete.php?id-enquete=$id'
        class='btn btn-outline-primary btn-sm'>✒</a></td>
        <td class='text-center'><a href='resultado-enquete.php?id-enquete=$id'
        class='btn btn-outline-primary btn-sm'>🗑</a></td>
        </tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>