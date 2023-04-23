<?php
$id = $_GET['id-enquete'];
$sql = "select * from enquete where id = $id;";
$resultado = conectar($sql);
$enquete = "";
$linha = $resultado->fetch_assoc();
$enquete = $linha['noma'];

$sql = "select * from resposta where id_enquete = $id;";
$resultado = conectar($sql);
?>
<!-- pagina 4 do word -->