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
    </head>
    <body>
        <?php 
            session_start();

            if($_SESSION['login'] ?? false){
                if(!str_contains($_SERVER["REQUEST_URI"], "login.php") AND !str_contains($_SERVER["REQUEST_URI"], "register.php")){
                    echo "<div class='sideMenu-container'>";
                    echo "<a href='./postCreate.php'> Criar um Post </a>";
                    echo "</div>";
                };
            } elseif (!str_contains($_SERVER["REQUEST_URI"], "login.php")) {
                header("location:./login.php");
            }
        ?>
        <div class="main-container">