<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form de boas Vindas</title>
</head>
<body>
    <h1>Formulario usa method POST</h1>
    <form action="bem-vindo-post.php" method="post">
        Nome:<input type="text" name="nome"><br>
        E-mail:<input type="text" name="email"><br>
        Idade:<input type="text" name="Idade"><br>
        <input type="submit">
    </form>
    <h1>Formulario usa method GET</h1>
    <form action="bem-vindo-get.php" method="get">
        Nome:<input type="text" name="nome"><br>
        E-mail:<input type="text" name="email"><br>
        Idade:<input type="text" name="Idade"><br>
        <input type="submit">
    </form>
    <br>
    <a href="/curso-php/index.php">Voltar</a>
</body>
</html>