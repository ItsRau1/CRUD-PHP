<?php
    include_once("../database.php");
    session_start();
    global $connection;

    $user = $_SESSION['login'];
    $user_id = $user['id'];
    $post_id = $_POST["id"];
    $comment = $_POST["comment"];

    if(empty(trim($comment))){
        $_SESSION['message'] = "Preencha o campo de conteudo do comentario!";
        header("Location: ../postCreate.php");
    } else {
        $sql = "INSERT INTO ruan_comment(content, publisher_id, post_id) VALUES('$comment', '$user_id', '$post_id')";
        if(mysqli_query($connection, $sql)){
            $_SESSION['message'] = "Comentario adicionado ao Post com sucesso!";
            header("Location: ../index.php");
        }
    }
?>