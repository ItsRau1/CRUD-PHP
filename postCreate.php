<?php 
    require("./components/header.php"); 
    require("./validation/isLogged.php");
?>

<form action="./validation/createPost.php" method="POST">
        <input required type="text" name="title" id="title" placeholder="Insira o titulo de sua postagem">

        <input required type="text" name="subtitle" id="subtitle" placeholder="Insira o sub-titulo de sua postagem">

        <input required type="text" name="content" id="content" placeholder="Insira o conteudo de sua postagem">

        <input type="submit" value="Publicar">
</form>

    
<?php 
    require("./components/footer.php"); 
?>