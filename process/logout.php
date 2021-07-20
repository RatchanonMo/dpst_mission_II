<?php
    session_destroy();

    unset($_SESSION['number']);
    unset($_SESSION['student_id']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['nick_name']);
    unset($_SESSION['level']);
    unset($_SESSION['facebook']);
    header('location: ../index.php');
?>