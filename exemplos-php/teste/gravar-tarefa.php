<?php 
    include_once 'conectar.php';
    if(isset($_POST['nome']))
    {
        $sql = "SELECT id_tarefa nome FROM tarefas";
        $res = conectar($sql);
        $row = $res->fetch_assoc();
        $id = $row['id_tarefa'];
        $nome = $row['nome'];
        $sql = "INSERT INTO tarefas(id_enquete nome) VALUES($nome)";
    }
?>