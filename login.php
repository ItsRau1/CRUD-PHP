<?php require("./components/header.php") ?>

<div class="box-login">
    <div class="box-left">
    
    </div>
    
    <div class="box-right">
        <div class="box-text">
            <h1>
                Entrar
            </h1>
            <h2>
                Informe os dados de login
            </h2>

            <?php
                if(isset($_SESSION['message'])){
                    $message = $_SESSION['message'];
                    echo "<p class='message'>".$message."</p>";
            
                    unset($_SESSION['message']);
                }
            ?>
        </div>
        <form action="./validation/login.php" method="POST" class="form-box">
            <input required type="email" name="email" id="email" placeholder="Insira seu e-mail" class="form-input">
    
            <input required type="password" name="password" id="password" placeholder="Insira sua senha" class="form-input">
    
            <input type="submit" value="Entrar"  class="form-button">
        </form>
        <div class="box-links">
            <!-- <a href="#">Esqueceu sua senha?</a> -->
            <p>Ainda nao tem uma conta?<a href="./register.php"> Cadastre-se</a></p>
        </div>
    </div>
</div>



<?php 
    require("./components/footer.php") 
?>
