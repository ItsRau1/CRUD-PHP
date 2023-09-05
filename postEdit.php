<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");

    include_once("database.php");

    global $connection;

    $post_id = $_GET["post_id"];

    $sql = "SELECT * FROM ruan_post WHERE id = $post_id";

    $response = mysqli_query($connection, $sql);
?>

<h1>Atualizar cadastro</h1>

<?php
    while ($row = mysqli_fetch_assoc($response)) {
        echo "<form action='./validation/postEdit.php' method='POST'>";
            echo "<input type='hidden' name='postId' value='$post_id'>";
            echo "<input required type='text' name='title' id='title' placeholder='Atualize o titulo de sua postagem' value='" . $row["title"] . "'>";
            echo "<input required type='text' name='subtitle'id='subtitle' placeholder='Atualize o sub-titulo de sua postagem' value='" . $row["sub_title"] . "'>";
            echo "<input required type='text' name='content' id='content' placeholder='Insira o conteudo de sua postagem' value='" . $row["content"] . "'>";
            echo "<input type='submit' value='Atualizar post'>";
        echo "</form>";
    }
?>

    
<?php 
    require("./components/footer.php"); 
?>