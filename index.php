<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
    include_once("database.php");

    global $connection;

    $user = $_SESSION['login'];

    $sql_get_posts = "SELECT * FROM ruan_post";
    $post_response = mysqli_query($connection, $sql_get_posts);

    $sql_get_users = "SELECT * FROM ruan_user";
    $user_response = mysqli_query($connection, $sql_get_users);
?>

<h1>Listando Posts</h1>

<?php 
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<h3>".$message."</h3>";

        unset($_SESSION['message']);
    }
?>

<?php
    while ($row = mysqli_fetch_assoc($post_response)) {
        echo "<div>";
            while ($publisher = mysqli_fetch_assoc($user_response)) { 
                if($publisher["id"] == $row["publisher_id"]) { 
                    echo "<h3><a href='profile.php?id=".$publisher["id"]."'>".$publisher["name"]."</a></h3>"; 
                } 
            };
            echo "<h3>".$row["title"]."</h3>";
            echo "<h4>".$row["sub_title"]."</h4>";
            echo "<p>".$row["content"]."</p>";
            if($row["publisher_id"] == $user['id'] OR $user["profile"] == true) {
                echo "<a href='postEdit.php?post_id=".$row["id"]."'> Editar </a>";
                echo "<a href='./validation/postDelete.php?post_id=".$row["id"]."' onclick=window.confirm(`Excluir?`) > Remover </a>";
            }
        echo "</div>";
    }
?>


    
<?php 
    require("./components/footer.php"); 
?>