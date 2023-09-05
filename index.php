<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
    include_once("database.php");

    global $connection;

    $user = $_SESSION['login'];

    $sql_get_posts = "SELECT * FROM ruan_post";
    $response = mysqli_query($connection, $sql_get_posts);
?>

<h1>Listando Posts</h1>

<?php
    while ($row = mysqli_fetch_assoc($response)) {
        echo "<div>";
            echo "<h3>".$row["title"]."</h3>";
            echo "<h4>".$row["sub_title"]."</h4>";
            echo "<p>".$row["content"]."</p>";
            if($row["publisher_id"] == $user['id'] OR $user["profile"] == true) {
                echo "<a href='postEdit.php?post_id=".$row["id"]."'> Editar </a>";
                echo "<a href='deleteStudent.php?student_id=".$row["id"]."' onclick=window.confirm(`Excluir?`) > Remover </a>";
            }
        echo "</div>";
    }
?>

    
<?php 
    require("./components/footer.php"); 
?>