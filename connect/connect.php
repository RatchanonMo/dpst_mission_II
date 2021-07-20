<?php 
    $conn = mysqli_connect('localhost','root','','dpst');

    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }

?>