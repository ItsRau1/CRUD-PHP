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
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> E-mail:</p>";
                echo "<h2>".$row["email"]."</h2>";
            echo "</div>";
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> Pais:</p>";
                if($row["country"] == NULL) {
                    if ($row["id"] == $user['id'] OR $user["profile"] == true) {
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='profile-update'>Que tal Atualizar sua informacoes pessoais?</a>";
                    } else {
                        echo "<h2 class='profile-not-defined'>Nao Definido</h2>";
                    }
                } else {
                    echo "<h2>".$row["country"]."</h2>";
                };
            echo "</div>";
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> Genero:</p>";
                if($row["gender"] == NULL) {
                    if ($row["id"] == $user['id'] OR $user["profile"] == true) {
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='profile-update'>Que tal Atualizar sua informacoes pessoais?</a>";
                    } else {
                        echo "<h2 class='profile-not-defined'>Nao Definido</h2>";
                    }
                } else {
                    if($row["gender"] == "F") {
                        echo "<h2> Mulher </h2>";
                    } elseif ($row["gender"] == "M") {
                        echo "<h2> Homem </h2>";
                    };
                };
            echo "</div>";
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> Musica Favorita:</p>";
                if($row["favorite_music"] == NULL) {
                    if ($row["id"] == $user['id'] OR $user["profile"] == true) {
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='profile-update'>Que tal Atualizar sua informacoes pessoais?</a>";
                    } else {
                        echo "<h2 class='profile-not-defined'>Nao Definido</h2>";
                    }
                } else {
                    echo "<h2>".$row["favorite_music"]."</h2>";
                };
            echo "</div>";
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> Filme Favorito:</p>";
                if($row["favorite_movie"] == NULL) {
                    if ($row["id"] == $user['id'] OR $user["profile"] == true) {
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='profile-update'>Que tal Atualizar sua informacoes pessoais?</a>";
                    } else {
                        echo "<h2 class='profile-not-defined'>Nao Definido</h2>";
                    }
                } else {
                    echo "<h2>".$row["favorite_movie"]."</h2>";
                };
            echo "</div>";
            echo "<div class='profile-info'>";
                echo "<p class='profile-label'> Biografia:</p>";
                if($row["biography"] == NULL) {
                    if ($row["id"] == $user['id'] OR $user["profile"] == true) {
                        echo "<a href='userEdit.php?id=".$row["id"]."' class='profile-update'>Que tal Atualizar sua informacoes pessoais?</a>";
                    } else {
                        echo "<h2 class='profile-not-defined'>Nao Definido</h2>";
                    }
                } else {
                    echo "<h2>".$row["biography"]."</h2>";
                };
            echo "</div>";





        echo "</div>";
    };
?>

</div>

<?php require("./components/footer.php"); ?>
