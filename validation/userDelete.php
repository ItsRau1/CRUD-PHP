<?php 
    require("./isLogged.php");
    include_once("../database.php");

    global $connection;

    $id = $_GET['id'];

    $sql = "DELETE FROM ruan_user WHERE id = $id";

    if(mysqli_query($connection, $sql)){
        $_SESSION['message'] = "Usuario excluido com sucesso!";
        header("location:../index.php");
    } else {
        $_SESSION['message'] = "Falha ao excluir usuario! Tente novamente mais tarde.";
        header("location:../index.php");
    }
?>