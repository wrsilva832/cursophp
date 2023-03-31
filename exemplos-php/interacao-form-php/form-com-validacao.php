<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form de boas Vindas</title>
</head>
<body>
    <h1>Formulario usa method POST</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome:<input type="text" name="nome"><br>
        E-mail:<input type="text" name="email"><br>
        Idade:<input type="text" name="Idade"><br>
        Genero: 
        <input type="radio" name="genero" required value="masculino">Masculno
        <input type="radio" name="genero" required value="feminino">Feminino
        <input type="radio" name="genero" required value="outro">Outro

        <input type="submit">
    </form>
    <br>

    <?php

    $nome = $email = $idade = $genero = "";
    nomeErr = $emailErr = 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = teste_input($POST["nome"])
    if (empty($nome)){
        echo "Nome é obrigatório"
    };
    $email = $POST["email"]
    if (empty($email)){
        echo "Email é obrigatório"
    };

    $idade = $POST["idade"]
    if (empty($idade)){
        echo "Idade é obrigatório"
    };

    $genero = $POST["genero"]

    if(empty($POST[genero])){
        echo "Genero é obrigatório"
    };



function teste_input($dado){
    $dado = htmspecialchars($dado);
    $dado = trim($dado)
    $dado = strinpslashes($dado)

    return $dado


}

    echo "Nome: $nome <br>"
    echo "E-mail: $email <br>"
    echo "Idade: $idade <br>"
    echo "genero: $genero <br>"


    ?>
    <a href="/curso-php/index.php">Voltar</a>
</body>
</html>