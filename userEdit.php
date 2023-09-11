<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");

    include_once("database.php");

    global $connection;

    $id = $_GET["id"];

    $sql = "SELECT * FROM ruan_user WHERE id = $id";

    $response = mysqli_query($connection, $sql);
?>

<div class="main-index">
    <h1>Atualizar Perfil</h1>

    <?php
        while ($row = mysqli_fetch_assoc($response)) {
            echo "<form action='./validation/userEdit.php' method='POST' class='form-box'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input title='Nome do usuário' tabindex='1' required type='text' name='name' id='name' placeholder='Atualize o nome de usuário' value='" . $row["name"] . "' class='form-input'>";
                echo "<input title='Email do usuário' tabindex='2' required type='e-mail' name='email' id='email' placeholder='Atualize o e-mail de usuário' value='" . $row["email"] . "' class='form-input'>";
                echo "<input title='País do usuário' tabindex='3' type='text' name='country' id='country' placeholder='Atualize o País de usuário' value='" . $row["country"] . "' class='form-input'>";
                echo "<div class='form-input-radio'>";
                    echo "<input title='Gênero do usuário' tabindex='4' type='radio' name='gender' id='M' value='M'>";
                    echo "<label for='M'>Homem</label>";
                echo "</div>";
                echo "<div class='form-input-radio'>";
                    echo "<input title='Gênero do usuário' tabindex='4' type='radio' name='gender' id='F' value='F'>";
                    echo "<label for='F'>Mulher</label>";
                echo "</div>";
                echo "<input title='Música Favorita do usuário' tabindex='5' type='text' name='favorite_music' id='favorite_music' placeholder='Atualize a Música Favorita do usuário' value='" . $row["favorite_music"] . "' class='form-input'>";
                echo "<input title='Filme Favorito do usuário' tabindex='6' type='text' name='favorite_movie' id='favorite_movie' placeholder='Atualize o Filme Favorito do usuário' value='" . $row["favorite_movie"] . "' class='form-input'>";
                echo "<input title='Biografia do usuário' tabindex='7' type='text' name='biography' id='biography' placeholder='Atualize a Biografia do usuário' value='" . $row["biography"] . "' class='form-input'>";
                echo "<select title='Pergunta do usuário' tabindex='8' name='question' id='question' value='".$row["question"]."' class='form-select'>";
                    echo "<option title='Qual nome do seu primeiro animal de estimação?' value='animal'>Qual nome do seu primeiro animal de estimação?</option>";
                    echo "<option title='Qual o nome da primeira escola que frequentou?' value='school'>Qual o nome da primeira escola que frequentou?</option>";
                    echo "<option title='Qual foi seu apelido de infância?' value='surname'>Qual foi seu apelido de infância?</option>";
                echo "</select>";
                echo "<input title='Resposta para a pergunta do usuário' tabindex='9' required type='text' name='response' id='response' placeholder='Atualize a resposta' value='".$row["response"]."' class='form-input'>";
                echo "<input title='Atualizar Perfil do usuário' tabindex='10' type='submit' value='Atualizar Usuário' class='form-button'>";
            echo "</form>";
        }
    ?>
</div>
    
<?php 
    require("./components/footer.php"); 
?>
