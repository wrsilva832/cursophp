<?php
//onde os arquivos serão salvos
$pasta = "arquivos/";
$arquivo = $pasta.basename($_FILES[fileToUpload]["name"]);
//echo $arquivo;
$uploadOk = 1;
$tipoArquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
$msgUpload .= "";

if (isset($_POST['submit'])) {
    $check = getimagessize($_FILES["FileToUpload"]['tmp_name']);
    if ($check !== false){
        //echo "É uma imagem ".arquivo;
    }else{
        $msgUpload .= "Não é uma imagem!<br>";
        $uploadOk = 0;
    }

    //teste se o arquivo já existe na pasta
    if(file_exist($arquivo)){
        $msgUpload .= "Arquivo já existente tente renomear ou enviar outro arquivo<br>";
        $uploadOk = 0;
    }

    //Verifica o tamanho do arquivo
    if ($_FILES["fileToUpload"]["size"] >= 500000) {
        $msgUpload .= "Arquivo muito grandesupera o tamanho de 5000kb!<br>";
        $uploadOk = 0;
    }

    //verifica o tipo de imagem  permitido
    if ($tipoArquivo != "jpg" && $tipoArquivo != "jpeg" && $tipoArquivo != "png" && $tipoArquivo != "gif") {
        $msgUpload .= "Tipo de arquivo não permitido!<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0){
        $msgUpload .= "Desculpe, não será possivel fazer o upload.<br>";        
    }else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$arquivo)){
            //echo "Ok ao fazer o upload."            
        }else{
            $msgUpload .= "Desculpe, erro inseperado ao fazer o upload.";
        }
    }
    $msg = $msgUpload;
}

?>