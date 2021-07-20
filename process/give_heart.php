<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $s4_id = $_POST['s4_id'];
    $s5_id = $_SESSION['student_id'];
    $amount = $_POST['amount'];

    if ($amount == 1) {
        $insert = "INSERT INTO heart (h_id, s4_id, s5_id) VALUES (NULL, '$s4_id', '$s5_id')";
        $query = mysqli_query($conn, $insert);
    } else if ($amount > 1) {
        $insert1 = "INSERT INTO heart (h_id, s4_id, s5_id) VALUES (NULL, '$s4_id', '$s5_id')";
        $query1 = mysqli_query($conn, $insert1);
        $insert2 = "INSERT INTO heart (h_id, s4_id, s5_id) VALUES (NULL, '$s4_id', '$s5_id')";
        $query2 = mysqli_query($conn, $insert2);
    }

    $dec_heart = "UPDATE dpst05 SET heart = heart - '$amount' WHERE student_id = '$s5_id' ";
    $query3 = mysqli_query($conn, $dec_heart);
    $inc_heart = "UPDATE dpst04 SET heart = heart + '$amount' WHERE student_id = '$s4_id' ";
    $query4 = mysqli_query($conn, $inc_heart);

    $_SESSION['success'] = "1";

    header('location: ../student4.php');
}
