<?php
    session_start();
    unset($_SESSION['EmailDoUsuario']);
    unset($_SESSION['SenhaDoUsuario']);
    header("Location: LoginECadastroProfessor.php");
?>