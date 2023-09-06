<?php 
    require("./components/header.php"); 
    require("./database.php");

    global $connection;

    $user = $_SESSION['login'];

    $sql_get_posts = "SELECT * FROM ruan_post";
    $post_response = mysqli_query($connection, $sql_get_posts);

    $sql_get_comments = "SELECT * FROM ruan_comment";
    $comment_response = mysqli_query($connection, $sql_get_comments);

    $sql_get_users = "SELECT * FROM ruan_user";
    $user_response = mysqli_query($connection, $sql_get_users);

    if($_GET){
        if(isset($_GET['deleteCommentId'])){
            DeleteComment($connection, $_GET['deleteCommentId']);
        }
    }

    function DeleteComment($conexaocaralho, $id) {
        $sql_delete_comment = "DELETE FROM ruan_comment WHERE id = $id";

        if(mysqli_query($conexaocaralho, $sql_delete_comment)) {
            header("location:index.php");
        } 
    }


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
    while ($row = mysqli_fetch_array($post_response)) {
        echo "<div>";
            while ($publisher = mysqli_fetch_assoc($user_response)) { 
                if($publisher["id"] == $row["publisher_id"]) { 
                    echo "<h3><a href='profile.php?id=".$publisher["id"]."'>".$publisher["name"]."</a></h3>"; 
                } 
            }
            $user_response = mysqli_query($connection, $sql_get_users);
            echo "<h3>".$row["title"]."</h3>";
            echo "<h4>".$row["sub_title"]."</h4>";
            echo "<p>".$row["content"]."</p>";
            if($row["publisher_id"] == $user['id'] OR $user["profile"] == true) {
                echo "<a href='postEdit.php?post_id=".$row["id"]."'> Editar </a>";
                echo "<a href='./validation/postDelete.php?post_id=".$row["id"]."'> Remover </a>";
            };
            echo "<form action='./validation/createComment.php' method='POST'>";
                echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                echo "<input required type='text' name='comment' id='comment' placeholder='Comente a postagem'>";
                echo "<input type='submit' value='Comentar'>";
            echo "</form>";
            while ($comment = mysqli_fetch_array($comment_response)) {
                if($comment["post_id"] == $row["id"]) {
                    echo "<p>".$comment["content"]."</p>";
                    if($comment["publisher_id"] == $user['id'] OR $user["profile"] == true OR $row["publisher_id"] == $user['id']) {
                        echo "<a href='postEdit.php?post_id=".$row["id"]."'> Editar </a>";
                        echo "<button onClick=\"location.href='?deleteCommentId=".$comment['id']."'\"> excluir </button>";
                    };
                }
            }
            $comment_response = mysqli_query($connection, $sql_get_comments);
        echo "</div>";
    }
?>


    
<?php 
    require("./components/footer.php"); 
?>