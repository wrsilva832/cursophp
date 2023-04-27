<?php
// onde os arquivos seram salvos
$pasta = "arquivos/"
$arquivo = $pasta.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$tipoArquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false){
        echo "É uma imagem". $arfquivo;
    }else{
        echo "Não é uma imagem!";
        $uploadOk = 0;
    }
    // teste se o arquivo ja existe na pasta
if (file_exists($arquivo)) {
    echo "arquivo já existente renomear ou enviar outro.";
    $uploadOk = 0;
  }
  //limitar o tamanho do arquivo
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Arquivo muito grande.<br>";
    $uploadOk = 0;
  }
  // verifica o  tipo de arquivo permitido
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Tipo de arquivo não permitido. <br>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "OK ao fazer upload"
    } else {
      echo "Desculpe não será possivel fazer upload.";
    }
  }
}
?>