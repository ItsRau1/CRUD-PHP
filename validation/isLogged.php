<?php 
    session_start();

    $user = $_SESSION['login'];

    if(!$user){
        header("location: ./login.php");
    }

?>