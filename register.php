<?php require("./components/header.php") ?>

<div class="box-left">

</div>

<div class="box-right">
    <h1>
        Registre-se
    </h1>
    <h2>
        Informe os dados para criar seu cadastro
    </h2>

    <form action="./validation/register.php" method="POST">

        <input required type="text" name="name" id="name" placeholder="Insira seu nome">

        <input required type="e-mail" name="email" id="email" placeholder="Insira seu e-mail">

        <input required type="password" name="password" id="password" placeholder="Insira sua senha">

        <select name="question" id="question">
            <option value="animal">Qual nome do seu primeiro animal de estimação?</option>
            <option value="school">Qual o nome da primeira escola que frequentou?</option>
            <option value="surname">Qual foi seu apelido de infância?</option>
        </select>

        <input required type="text" name="response" id="response" placeholder="Insira a resposta">


        <input type="submit" value="Cadastrar">
    </form>
</div>



<?php 

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        echo "<h3>".$message."</h3>";

        unset($_SESSION['message']);
    }

    require("./components/footer.php") 
?>
