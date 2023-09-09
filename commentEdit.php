<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");

    include_once("database.php");

    global $connection;

    $comment_id = $_GET["comment_id"];

    $sql = "SELECT * FROM ruan_comment WHERE id = $comment_id";

    $response = mysqli_query($connection, $sql);
?>

<div class="main-index">
    <h1>Atualizar Comentario</h1>

    <?php
        while ($row = mysqli_fetch_assoc($response)) {
            echo "<form action='./validation/commentEdit.php' method='POST' class='form-box'>";
                echo "<input type='hidden' name='commentId' value='$comment_id'>";
                echo "<input required type='text' name='content' id='content' placeholder='Insira o conteudo de sua postagem' value='" . $row["content"] . "' class='form-input'>";
                echo "<input type='submit' value='Atualizar Comentario' class='form-button'>";
            echo "</form>";
        }
    ?>

</div>

    
<?php 
    require("./components/footer.php"); 
?>