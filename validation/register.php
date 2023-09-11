<?php
    include_once("../database.php");
    global $connection;
    session_start();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $recoverQuestion = $_POST["question"];
    $recoverRes = $_POST["response"];

    if(empty(trim($name))){
        $_SESSION['message'] = "Preencha o campo nome!";
        header("Location: ../login.php");
    }
    elseif(empty(trim($email))){
        $_SESSION['message'] = "Preencha o campo e-mail!";
        header("Location: ../login.php");
    }
    elseif(empty(trim($password))){
        $_SESSION['message'] = "Preencha o campo senha!";
        header("Location: ../login.php");
    }
    elseif(empty(trim($recoverQuestion))){
        $_SESSION['message'] = "Selecione uma pergunta de segurança!";
        header("Location: ../login.php");
    }
    elseif(empty(trim($recoverRes))){
        $_SESSION['message'] = "Preencha o campo de resposta da pergunta de segurança!";
        header("Location: ../login.php");
    }
    else{
        $sql = "SELECT * FROM ruan_user";

        $preData = mysqli_query($connection, $sql);

        $data = mysqli_fetch_array($preData);

        if(array_search($name, $data, true)){
            $_SESSION['message'] = "Este nome de usuário já esta sendo utilizado!";
            header("Location: ../register.php");
        } elseif (array_search($email, $data, true)){
            $_SESSION['message'] = "Este e-mail já esta sendo utilizado!";
            header("Location: ../register.php");
        } else {
            $sql = "INSERT INTO ruan_user(name, email, password, question, response) VALUES('$name', '$email', '$password', '$recoverQuestion', '$recoverRes');";
            if(mysqli_query($connection, $sql)){
                $_SESSION['message'] = "Usuário criado com sucesso!";
                header("Location: ../login.php");
            }
        }
    }

?>
