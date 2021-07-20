<?php
session_start();
include('../connect/connect.php');

if (isset($_POST['submit'])) {
    $student_id =  $_POST['username'];

    $sql = "SELECT * FROM dpst04 WHERE student_id = '$student_id' ";
    $m4 = mysqli_query($conn, $sql);

    $sql1 = "SELECT * FROM dpst05 WHERE student_id = '$student_id' ";
    $m5 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($m4) == 1) {
        $row4 = mysqli_fetch_array($m4);

        $_SESSION['number'] = $row4['number'];
        $_SESSION['student_id'] = $row4['student_id'];
        $_SESSION['first_name'] = $row4['first_name'];
        $_SESSION['last_name'] = $row4['last_name'];
        $_SESSION['nick_name'] = $row4['nick_name'];
        $_SESSION['level'] = $row4['level'];
        $_SESSION['facebook'] = $row4['facebook'];
        $_SESSION['heart'] = $row4['heart'];

        header('location:../detail.php?id='. $_SESSION['student_id']);

    } else if (mysqli_num_rows($m5) == 1) {

        $row5 = mysqli_fetch_array($m5);

        $_SESSION['number'] = $row5['number'];
        $_SESSION['student_id'] = $row5['student_id'];
        $_SESSION['first_name'] = $row5['first_name'];
        $_SESSION['last_name'] = $row5['last_name'];
        $_SESSION['nick_name'] = $row5['nick_name'];
        $_SESSION['level'] = $row5['level'];
        $_SESSION['facebook'] = $row5['facebook'];
        $_SESSION['heart'] = $row5['heart'];

        header('location:../student4.php');
    } else {
        $_SESSION['error'] = "เลขประจำตัวนักเรียนไม่ถูกต้อง";
        header('location: ../index.php');
    }
}
