<?php
    include_once("../database.php");
    session_start();
    global $connection;

    $user = $_SESSION['login'];
    $user_id = $user['id'];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $content = $_POST["content"];

    if(empty(trim($title))){
        $_SESSION['message'] = "Preencha o campo titulo!";
        header("Location: ../postCreate.php");
    }
    elseif(empty(trim($subtitle))){
        $_SESSION['message'] = "Preencha o campo sub-titulo!";
        header("Location: ../postCreate.php");
    }
    elseif(empty(trim($content))){
        $_SESSION['message'] = "Preencha o campo conteudo!";
        header("Location: ../postCreate.php");
    } else {
        $sql = "INSERT INTO ruan_post(title, sub_title, content, publisher_id) VALUES('$title', '$subtitle', '$content', $user_id)";
        if(mysqli_query($connection, $sql)){
            $_SESSION['message'] = "Post Criado com Sucesso!";
            header("Location: ../index.php");
        }
    }
?>