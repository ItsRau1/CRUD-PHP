<?php
    require("./isLogged.php");
    include_once("../database.php");

    global $connection;

    $id = $_POST["postId"];
    $title = $_POST["title"];
    $subTitle = $_POST["subtitle"];
    $content = $_POST["content"];

    $sql = "UPDATE ruan_post SET title = '$title', sub_title = '$subTitle', content = '$content' WHERE id = '$id'";

    if(mysqli_query($connection, $sql)){
        $_SESSION['message'] = "Post Editado com sucesso!";
        header("location:../index.php");
    } else {
        $_SESSION['message'] = "Falha ao Editar post! Tente novamente mais tarde.";
        header("location:../index.php");
    }