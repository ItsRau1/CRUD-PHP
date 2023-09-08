<?php require("./components/header.php") ?>

<div class="box-login">
    <div class="box-left">
    
    </div>
    
    <div class="box-right">
        <div class="box-text">
            <h1>
                Registre-se
            </h1>
            <h2>
                Informe os dados para criar seu cadastro
            </h2>
        </div>

        <?php
            if(isset($_SESSION['message'])){
                $message = $_SESSION['message'];
                echo "<h3>".$message."</h3>";
        
                unset($_SESSION['message']);
            }
        ?>
    
        <form action="./validation/register.php" method="POST" class="form-box">
    
            <input required type="text" name="name" id="name" placeholder="Insira seu nome" class="form-input">
    
            <input required type="email" name="email" id="email" placeholder="Insira seu e-mail" class="form-input">
    
            <input required type="password" name="password" id="password" placeholder="Insira sua senha" class="form-input">
    
            <select name="question" id="question" class="form-select">
                <option value="animal">Qual nome do seu primeiro animal de estimação?</option>
                <option value="school">Qual o nome da primeira escola que frequentou?</option>
                <option value="surname">Qual foi seu apelido de infância?</option>
            </select>
    
            <input required type="text" name="response" id="response" placeholder="Insira a resposta" class="form-input">
    
    
            <input type="submit" value="Cadastrar" class="form-button">
        </form>

        <div class="box-links">
            <p>Voltar para a pagina de <a href="./login.php"> Login?</a></p>
        </div>
    </div>
</div>



<?php 
    require("./components/footer.php") 
?>
