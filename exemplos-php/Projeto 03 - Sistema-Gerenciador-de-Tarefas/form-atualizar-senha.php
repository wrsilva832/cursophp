<?php include 'atualizar-senha.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Atualizar senha</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>Atualizar senha</h2>
                <?php if ($msg != "") { ?>
                    <div class="alert alert-<?php echo $tpMsg; ?>">
                        <strong><?php echo $msg; ?></strong>
                    </div>
                <?php } ?>
                <form action="form-atualizar-senha.php" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="senha-atual">Senha atual:</label>
                        <input type="text" class="form-control" id="current_password" placeholder="Informe sua senha atual" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha">Nova senha:</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Informe sua nova senha" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmar">Confirmar Senha:</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirme sua senha" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Atualizar senha</button>
                    <a href="admin.php" class="btn btn-success">Voltar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>