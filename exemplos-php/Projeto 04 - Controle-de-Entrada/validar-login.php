<?php 
    if(!isset($_SESSION['id_admin']))
    {
        echo "<script>window.location.replace('./index.php');</script>";
    }
    $id = $_SESSION['id_admin'];
?>