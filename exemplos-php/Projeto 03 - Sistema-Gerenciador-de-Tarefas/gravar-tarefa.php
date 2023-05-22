<?php
include ("conectar.php");
$sql = "insert into tarefa(nome) values ('$tarefa');";
conectar($sql);
$sql = "select id from tarefa where nome = '$tarefa';";
$retorno = conectar($sql);
$sql = $retorno->fetch_assoc();
$id = $sql['id'];
foreach($opcoes as $o){
    $sql = "insert into resposta(id_tarefa,nome) values ($id,'$o',0);";
    conectar($sql);
    $tpMsg = "success";
    $msg = "ok ao gravar"
}
// editar tarefas no banco...
if(isset($_GET['editar'])){
    $id = $_GET['editar'];
    $sql = "select * from tarefas where id_admin = $id_admin and id = $id";
    $resut = conectar($sql);
    if($linha = $resut->fetch_assoc()){
        $id = $row['id'];
        $nome = $linha['nome'];
    }
}

//apagar tarefas no banco....
if(isset($_GET['apagar'])){
    $id = $_GET['apagar'];
    $result = conectar($sql);
    $linha = $result->fetch_assoc();
    $sql = "sdelete from tarefas where id_admin = $id_admin and id = $id";
    conectar($sql);   
    $msg = "Ok ao apagar!";
    $tpMsg = "success";
}

$sql = "select * from tarefas where id_admin = $id_admin;";
$resut = conectar($sql);

?>