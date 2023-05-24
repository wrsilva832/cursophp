<?php
    session_start();
    include("conectar.php");
    $msg = "";
    $tpMsg = "danger";
    // Caso exista o id_admin na URL, faça:
    if (isset($_SESSION['id_admin'])) 
    {
        $id = $_SESSION['id_admin'];
        $sql = "SELECT * FROM admin WHERE id = $id";
        $res = conectar($sql);
        $row = $res->fetch_assoc();
        
        // Valida se clicou no enviar senha
        if(isset($_POST['current_password']))
        {
            $current_password = $_POST['current_password'];
            if($current_password == $row['senha'])
            {
                $new_password = $_POST['new_password'];
                $sql = "SELECT * FROM admin WHERE id = $id AND senha = '$current_password'";
                $res = conectar($sql);
                if($row = $res->fetch_assoc())
                {
                    if($current_password == $row['senha'])
                    {
                        if ($_POST['new_password'] == $_POST['confirm_password']) 
                        {
                            $new_password = $_POST['new_password'];
                            $sql = "UPDATE admin SET senha = '$new_password' WHERE id = $id; ";
                            conectar($sql);
                            $msg = "Senha atualizada com sucesso.";
                            $tpMsg = "success";
                        } else {
                            $msg = "Senhas divergentes.";
                        }
    
                    } else {
                        $msg = "Senha atual inválida";
                    }
                } 
            } else {
                $msg = "Senha atual incorreta !";
            }
        } 
    }
?>