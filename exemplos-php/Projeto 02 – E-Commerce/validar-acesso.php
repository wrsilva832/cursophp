<?php
session_start();
if (!$_SESSION['acesso-restrito']){
    echo "<script>windows.location.replace('login.php');</script>";
}
?>