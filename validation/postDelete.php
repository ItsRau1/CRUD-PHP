<?php 
    require("./isLogged.php");
    include_once("../database.php");

    global $connection;

    $post_id = $_GET['post_id'];

    $sql = "DELETE * FROM ruan_post WHERE id = $post_id";

    if(mysqli_query($connection, $sql)){
        $_SESSION['message'] = "Post excluido com sucesso!";
        header("location : ../index.php");
    } else {
        $_SESSION['message'] = "Falha ao excluir post! Tente novamente mais tarde.";
        header("location : ../index.php");
    }
?>