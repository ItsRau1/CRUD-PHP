<?php
    include_once("../database.php");
    require("./isLogged.php");
    global $connection;

    $user = $_SESSION['login'];
    $user_id = $user['id'];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $content = $_POST["content"];

    if(empty(trim($title))){
        $_SESSION['message'] = "Preencha o campo titulo!";
        header("Location: ../createPost.php");
    }
    elseif(empty(trim($subtitle))){
        $_SESSION['message'] = "Preencha o campo sub-titulo!";
        header("Location: ../createPost.php");
    }
    elseif(empty(trim($content))){
        $_SESSION['message'] = "Preencha o campo conteudo!";
        header("Location: ../createPost.php");
    } else {
        $sql = "INSERT INTO ruan_post(title, sub_title, content, publisher_id) VALUES('$title', '$subtitle', '$content', $user_id)";
        if(mysqli_query($connection, $sql)){
            $_SESSION['message'] = "Post Criado com Sucesso!";
            header("Location: ../index.php");
        }
    }
?>