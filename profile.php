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

<div class="profile-container">
<?php 
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<h3>".$message."</h3>";

        unset($_SESSION['message']);
    }
?>

<?php 

    while ($row = mysqli_fetch_assoc($response)) {
        echo "<div class='profile-box'>";
            echo "<div class='profile-header'>";
                echo "<h1> <img src='./assets/profile.svg'/> ".$row["name"]."</h1>";
                if($row["id"] == $user['id'] OR $user["profile"] == true) {
                    echo "<div class='profile-actions'>";
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='post-edit'><h2> Editar Perfil </h2></a>";
                        echo "<a href='./validation/userDelete.php?id=".$row["id"]."' class='post-delete'><h2> Remover </h2></a>";
                    echo "</div>";
                }
            echo "</div>";
            echo "<h2>".$row["email"]."</h2>";
        echo "</div>";
    };
?>

</div>

<?php require("./components/footer.php"); ?>
