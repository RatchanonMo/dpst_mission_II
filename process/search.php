<?php
    include("../connect/connect.php");

    if(isset($_POST['search'])){
        $name = $_POST['name'];

        $sql = "SELECT * FROM dpst04 WHERE nick_name = '$name'";
        $query = mysqli_query($conn, $sql);

        $sql1 = "SELECT * FROM dpst05 WHERE nick_name = '$name'";
        $query1 = mysqli_query($conn, $sql1);

        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_array($query);
            header('location: ../detail.php?id='.$row['student_id']);
        }else if(mysqli_num_rows($query1) == 1){
            $row1 = mysqli_fetch_array($query1);
            header('location: ../detail.php?id='.$row1['student_id']);
        }

        
    }
?>