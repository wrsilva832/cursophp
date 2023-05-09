<?php
function conectar($sql){
    $id = "";
    $senha = "";

$hostweb = false; // false para usar localhost, true para usar no 000webhost
if($hostweb){
    $id = "id20602892_"; 
    $senha = "PDDiRq^TGi*^kWID4IBP"; 
}

$servidor = "localhost";
$usuario = $id."root";
$banco = $id."mydb";

$con = new mysqli($servidor, $usuario, $senha, $banco);

if($con->connect_error){
    die("Erro :".$con->connect_error);
}
return $con->query($sql);

}
?>