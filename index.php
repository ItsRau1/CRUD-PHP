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
<div class="main-index">
    <?php 
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            echo "<p class='message'>".$message."</p>";

            unset($_SESSION['message']);
        }
    ?>

    <div class="container-posts">
        <?php
            while ($row = mysqli_fetch_array($post_response)) {
                echo "<div class='box-post'>";
                    echo "<div class='post-header'>";
                        while ($publisher = mysqli_fetch_assoc($user_response)) { 
                            if($publisher["id"] == $row["publisher_id"]) { 
                                echo "<a  class='post-user' href='profile.php?id=".$publisher["id"]."'> <img src='./assets/profile.svg'/>".$publisher["name"]."</a>"; 
                            } 
                        }
                        $user_response = mysqli_query($connection, $sql_get_users);
                        if($row["publisher_id"] == $user['id'] OR $user["profile"] == true) {
                            echo "<div class='post-actions'>";
                                echo "<a class='post-edit' href='postEdit.php?post_id=".$row["id"]."'> Editar </a>";
                                echo "<a class='post-delete' href='./validation/postDelete.php?post_id=".$row["id"]."'> Remover </a>";
                            echo "</div>";
                        };
                    echo "</div>";
                    echo "<div class='post-content'>";
                        echo "<p class='post-title'>".$row["title"]."</p>";
                        echo "<p class='post-sub-title'>".$row["sub_title"]."</p>";
                        echo "<p class='post-text'>".$row["content"]."</p>";
                    echo "</div>";

                    echo "<form class='comment-form' action='./validation/createComment.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                        echo "<input class='comment-input' required type='text' name='comment' id='comment' placeholder='Comente a postagem'>";
                        echo "<input class='comment-button' type='submit' value='Comentar'>";
                    echo "</form>";
                    echo "<div class='comment-container'>";
                        while ($comment = mysqli_fetch_array($comment_response)) {
                            echo "<div class='comment-box'>";
                                if($comment["post_id"] == $row["id"]) {
                                    echo "<div class='comment-header'>";
                                        while ($publisher = mysqli_fetch_assoc($user_response)) { 
                                            if($publisher["id"] == $comment["publisher_id"]) { 
                                                echo "<a  class='comment-user' href='profile.php?id=".$publisher["id"]."'> <img src='./assets/profile-comment.svg'/>".$publisher["name"]."</a>"; 
                                            } 
                                        }
                                        $user_response = mysqli_query($connection, $sql_get_users);
                                        if($comment["publisher_id"] == $user['id'] OR $user["profile"] == true OR $row["publisher_id"] == $user['id']) {
                                            echo "<div class='post-actions'>";
                                                echo "<a class='post-edit' href='commentEdit.php?comment_id=".$comment["id"]."'> Editar </a>";
                                                echo "<button class='comment-delete' onClick=\"location.href='?deleteCommentId=".$comment['id']."'\"> Excluir </button>";
                                            echo "</div>";
                                        };
                                    echo "</div>";
                                    echo "<p class='comment-content'>".$comment["content"]."</p>";
                                }
                            echo "</div>";
                        }
                        $comment_response = mysqli_query($connection, $sql_get_comments);
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>


    
<?php 
    require("./components/footer.php"); 
?>