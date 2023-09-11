<?php
    include_once("../database.php");

    global $connection;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $country = $_POST["country"];

    $gender = $_POST["gender"];
    $favorite_music = $_POST["favorite_music"];
    $favorite_movie = $_POST["favorite_movie"];
    $biography = $_POST["biography"];

    $question = $_POST["question"];
    $response = $_POST["response"];

    $sql = "UPDATE ruan_user SET name = '$name', email = '$email', country = '$country', gender = '$gender', favorite_music = '$favorite_music', favorite_movie = '$favorite_movie', biography = '$biography', question = '$question', response = '$response' WHERE id = '$id'";

    if(mysqli_query($connection, $sql)){
        $_SESSION['message'] = "Perfil Editado com sucesso!";
        header("location:../profile.php?id=$id");
    } else {
        $_SESSION['message'] = "Falha ao Editar perfil! Tente novamente mais tarde.";
        header("location:../profile.php?id=$id");
    }
