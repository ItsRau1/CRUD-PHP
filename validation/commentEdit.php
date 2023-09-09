<?php
    require("./isLogged.php");
    include_once("../database.php");

    global $connection;

    $id = $_POST["commentId"];
    $content = $_POST["content"];

    $sql = "UPDATE ruan_comment SET content = '$content' WHERE id = '$id'";

    if(mysqli_query($connection, $sql)){
        $_SESSION['message'] = "Comentario Editado com sucesso!";
        header("location:../index.php");
    } else {
        $_SESSION['message'] = "Falha ao Editar post! Tente novamente mais tarde.";
        header("location:../index.php");
    }
