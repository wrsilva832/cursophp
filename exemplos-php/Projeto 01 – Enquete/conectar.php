<!-- Conexão com o banco de dados -->
<?php
function conectar($sql){
    $id = "";
    $senha = "";

$hostweb = true; // false para usar localhost, true para usar no 000webhost
if($hostweb){
    $id = "xxx"; // id ou prefixo do 000webhost
    $senha = "xxx"; // senha do 000webhost
}

$servidor = "localhost";
$usuario = $id."root";
$banco = $id."mydb";

$con = new mysql($servidor, $usuario, $senha, $banco);

if($con->connect_error){
    die("Erro :".$con->connect_error");
}
return $con->query($sql);

}
?>