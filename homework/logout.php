<?php
    //Mi ricollego alla sessione
    session_start();
    //Cancello i dati relativi alla sessione
    session_destroy();
    //Ritorno al login
    header("Location: login.php");
    exit;
?>