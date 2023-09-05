<?php
    include "../database.php";
    global $connection;
    session_start();

    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty(trim($email))){
        $_SESSION['message'] = "Preencha o campo e-mail!";
        header("Location: ../login.php");
    }
    elseif(empty(trim($password))){
        $_SESSION['message'] = "Preencha o campo senha!";
        header("Location: ../login.php");
    }
    else{
        $sql = "SELECT * FROM ruan_user WHERE email = '$email' AND password = '$password'";

        $dataLoginDB = mysqli_query($connection, $sql);

        $dataLogin = mysqli_fetch_array($dataLoginDB);

        if($dataLogin['email'] == $email && $dataLogin['password'] == $password){
            $login = array("id" => $dataLogin['id'], "login" => $dataLogin['email'], "password" => $dataLogin['password'], "profile" => $dataLogin['is_admin'], "name" => $dataLogin['name']);

            $_SESSION['login'] = $login;

            header("location: ../index.php");
        }
        else {
            $_SESSION['message'] = "Login ou senha inválidos.";
            header("location: ../login.php");
        }
    }

?>
