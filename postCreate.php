<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
?>

<div class="main-index">
    <h1>Criar um novo Post</h1>
    <form action="./validation/postCreate.php" method="POST" class="form-box">
            <input title='Titulo da Postagem' tabindex="1" required type="text" name="title" id="title" placeholder="Insira o titulo de sua postagem" class="form-input">

            <input title='Sub-Titulo da Postagem' tabindex="2" required type="text" name="subtitle" id="subtitle" placeholder="Insira o sub-titulo de sua postagem" class="form-input">

            <input title='Conteúdo da Postagem' tabindex="3" required type="text" name="content" id="content" placeholder="Insira o conteudo de sua postagem" class="form-input">

            <input title='Publicar Postagem' tabindex="4" type="submit" value="Publicar" class="form-button">
    </form>
</div>
    
<?php 
    require("./components/footer.php"); 
?>