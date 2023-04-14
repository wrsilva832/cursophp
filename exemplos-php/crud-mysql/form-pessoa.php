<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Pessoa</title>
</head>

<body>
    <?php
    include 'conectar.php';
    include 'validar-cpf.php';
    $msgCpf = $id = $nome = $email = $cpf = $sexo = $escolaridade = $senha = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (array_key_exists('id', $_GET)) {
            $id = $_GET['id'];
            $pessoa = buscar($id);
            $nome = $pessoa['nome'];
            $email = $pessoa['email'];
            $cpf = $pessoa['cpf'];
            $sexo = $pessoa['sexo'];
            $escolaridade = $pessoa['escolaridade'];
            // $senha = $senha['senha'];
        }
        if (array_key_exists('apagar', $_GET)) {
            $apagar = $_GET['apagar'];
            $msg = apagar($apagar);
            echo $msg;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $msg = "";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $sexo = $_POST['sexo'];
        $escolaridade = $_POST['escolaridade'];
        $id = $_POST['id'];

        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);

        if (validarCpf($cpf)) {
            if ($id == '') {
                // aprovar inclusao da senha contece no alterar
                $senha = $_POST['senha'];
                $confirmar = $_POST['confirmar'];
                if ($senha == $confirmar) {
                    $msg = incluir($nome, $email, $cpf, $sexo, 
                    $escolaridade, $senha);
                } else {
                    $msg = "Senha não confere";
                }
            } else {
                $msg = alterar($id, $nome, $email, $cpf, $sexo, $escolaridade, $senha);
            }
        } else {
            $msgCpf = "CPF inválido!";
        }

        echo $msg;
    }

    ?>
    <form action="form-pessoa.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h1>Formulário de Pessoa</h1>
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required><br>
        E-mail: <br>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>
        CPF:<?php echo $msgCpf; ?> <br>
        <input type="text" name="cpf" value="<?php echo $cpf; ?>" required><br>
        Sexo: <br>
        <input type="radio" name="sexo" value="m" required <?php if ($sexo == "m") echo "checked"; ?>>Masculino<br>
        <input type="radio" name="sexo" value="f" required <?php if ($sexo == "f") echo "checked"; ?>>Feminino<br>
        <br>
        Escolaridade<br>
        <select name="escolaridade">
            <option value="Ensino Médio">Ensino Médio</option>
            <option value="Superior">Superior</option>
            <option <?php if($escolaridade == 'Incompleto')>value="Incompleto">Incompleto</option>
        </select>
        <br>
    <!-- senha nao pode aparecer quando for editar -->
    <!-- abre condição -->
    <!-- se existe a chave id -->
    <?php if (!array_key_exists('id', $_GET)) { ?>
        Senha: <br>
        <input type="password" name="senha"><br>
        Confirmar:<br>
        <input type="password" name="confirmar"><br>
    <?php } ?>
    <!-- fecha condicao -->
    <form>
        <br>
        <br>
        <input type="submit" value="Gravar">
        <a href="form-pessoa.php">
            <input type="button" value="Novo">
        </a>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Sexo</th>
            <th>Escolaridade</th>
            <!-- <th>Senha</th> -->
        </tr>
        <?php
        $dados = listar();
        while ($linha = $dados->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['email'] . "</td>";
            echo "<td>" . $linha['cpf'] . "</td>";
            echo "<td>" . $linha['sexo'] . "</td>";
            echo "<td>" . $linha['escolaridade'] . "</td>";
            // echo "<td>" . $senha['senha'] . "</td>"; --comentar pois a senha nao pode aparecer ao editar
            echo "<td><a href='form-pessoa.php?id=" . $linha['id'] . "'>Editar</a></td>";
            echo "<td><a onclick='return apagar(" . $linha['id'] . ");' href='form-pessoa.php?apagar=" . $linha['id'] . "'>Apagar</a></td>";
            echo "</tr>";
        }
        ?>
        <script>
            function apagar(id) {
                return confirm("Deseja Apagar o registro ID(" + id + ")?");
            }
        </script>
    </table>
</body>

</html>