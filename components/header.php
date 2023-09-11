<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>M1 Lógica e Programação</title>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="shortcut icon" href="./assets/logo.svg" type="image/x-icon">
    </head>
    <body>
        <?php 
            session_start();

            if($_SESSION['login'] ?? false){
                if(!str_contains($_SERVER["REQUEST_URI"], "login.php") AND !str_contains($_SERVER["REQUEST_URI"], "register.php")){
                    $user = $_SESSION['login'];
                    echo "<div class='sideMenu-container'>";
                        echo "<a title='Menu Principal' href='./index.php'><img src='./assets/logo-text.svg' class='sideMenu-logo'/></a>";
                        echo "<a title='Criar Uma Postagem' href='./postCreate.php' class='sideMenu-link'>Criar um Post <img src='./assets/add.svg'/></a>";
                        echo "<div class='sideMenu-actions'>";
                            echo "<a title='Editar seu Perfil' href='./userEdit.php?id=".$user["id"]."'> <img src='./assets/profile-edit.svg' class='sideMenu-logo'/> </a>";
                        echo "</div>";
                    echo "</div>";
                };
            } elseif (!str_contains($_SERVER["REQUEST_URI"], "login.php") AND !str_contains($_SERVER["REQUEST_URI"], "register.php")) {
                header("location:./login.php");
            }
        ?>
        <div class="main-container">
