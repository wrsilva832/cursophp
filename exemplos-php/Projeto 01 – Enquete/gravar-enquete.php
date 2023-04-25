<?php
include "conectar.php";
$enquete = $_GET['nome-enquete'];
$opcoes = $_GET['opcao'];

$sql = "insert into enquete(nome) values ('$enquete');";
conectar($sql);
$sql = "select id from enquete where nome = '$enquete';";
$retorno = conectar($sql);
$sql = $retorno->fetch_assoc();
$id = $sql['id'];
foreach($opcoes as $o){
    $sql = "insert into resposta(id_enquete,nome,quantidade) values ($id,'$o',0);";
    conectar($sql);
}
?>