<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");

    include_once("database.php");

    global $connection;

    $id = $_GET["id"];

    $sql = "SELECT * FROM ruan_user WHERE id = $id";

    $response = mysqli_query($connection, $sql);
?>

<h1>Atualizar Perfil</h1>

<?php
    while ($row = mysqli_fetch_assoc($response)) {
        echo "<form action='./validation/userEdit.php' method='POST'>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input required type='text' name='name' id='name' placeholder='Atualize o nome de usuário' value='" . $row["name"] . "'>";
            echo "<input required type='e-mail' name='email' id='email' placeholder='Atualize o e-mail de usuário' value='" . $row["email"] . "'>";
            echo "<select name='question' id='question' value='".$row["question"]."'>";
                echo "<option value='animal'>Qual nome do seu primeiro animal de estimação?</option>";
                echo "<option value='school'>Qual o nome da primeira escola que frequentou?</option>";
                echo "<option value='surname'>Qual foi seu apelido de infância?</option>";
            echo "</select>";
            echo "<input required type='text' name='response' id='response' placeholder='Atualize a resposta' value='".$row["response"]."'>";
            echo "<input type='submit' value='Atualizar Usuário'>";
        echo "</form>";
    }
?>
    
<?php 
    require("./components/footer.php"); 
?>