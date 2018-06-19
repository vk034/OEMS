<?php
    session_start();
    if(isset($_SESSION['oems'])){
        session_unset($_SESSION['oems']);
        session_destroy();
        header('Location:index.php');
    }
?>
