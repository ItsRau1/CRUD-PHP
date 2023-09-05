<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
    include_once("database.php");

    global $connection;

    $user = $_SESSION['login'];

    $id = $_GET["id"];

    $sql = "SELECT * FROM ruan_user WHERE id = $id";
    $response = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($response)) {
        echo "<div>";
            echo "<h2>".$row["name"]."</h2>";
            echo "<h2>".$row["email"]."</h2>";
            if($row["id"] == $user['id'] OR $user["profile"] == true) {
                echo "<a href='userEdit.php?id=".$row["id"]."'> Editar Perfil </a>";
                echo "<a href='./validation/postDelete.php?id=".$row["id"]."' onclick=window.confirm(`Excluir?`) > Remover </a>";
            }
        echo "</div>";
    }
?>
