<?php require("./components/header.php") ?>

<div class="box-left">

</div>

<div class="box-right">
    <h1>
        Entrar
    </h1>
    <h2>
        Informe os dados de login
    </h2>

    <form action="./validation/login.php" method="POST">
        <input required type="e-mail" name="email" id="email" placeholder="Insira seu e-mail">

        <input required type="password" name="password" id="password" placeholder="Insira sua senha">

        <input type="submit" value="Entrar">
    </form>
    <div>
        <p>Ainda nao tem uma conta?<a href="./register.php">Cadastre-se</a></p>
        <a href="#">Esqueceu sua senha?</a>
    </div>
</div>



<?php 

    session_start();

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<h3>".$message."</h3>";

        unset($_SESSION['message']);
    }
    
    require("./components/footer.php") 
?>
