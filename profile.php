<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
    include_once("database.php");

    global $connection;

    $user = $_SESSION['login'];

    $id = $_GET["id"];

    $sql = "SELECT * FROM ruan_user WHERE id = $id";
    $response = mysqli_query($connection, $sql);
?>

<h1>Perfil de usuario</h1>

<?php 
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<h3>".$message."</h3>";

        unset($_SESSION['message']);
    }
?>

<?php 

    while ($row = mysqli_fetch_assoc($response)) {
        echo "<div>";
            echo "<h2>".$row["name"]."</h2>";
            echo "<h2>".$row["email"]."</h2>";
            if($row["id"] == $user['id'] OR $user["profile"] == true) {
                echo "<a href='userEdit.php?id=".$row["id"]."'> Editar Perfil </a>";
                echo "<a href='./validation/userDelete.php?id=".$row["id"]."'> Remover </a>";
            }
        echo "</div>";
    };
    require("./components/footer.php"); 
?>
