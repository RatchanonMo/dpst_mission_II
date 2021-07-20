<?php
    session_start();
    include('./connect/connect.php');

    if(!isset($_SESSION['level'])){
        header('location: ./index.php');
    }

    $check5 = "SELECT * FROM dpst05 WHERE student_id = ". $_SESSION['student_id'];
    $m5 = mysqli_query($conn, $check5);

    if (mysqli_num_rows($m5) == 1) {
        $num = mysqli_fetch_array($m5);
        $heart = $num['heart'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>|| DPST MISSIONS ||</title>

    <?php include('./component/link.php')?>

</head>

<body>
    <?php include('./component/sidebar.php')?>
    <div class="page">
        <div class="page__wrapper">
            <?php include('./component/header.php') ?>
            <?php
                $student_id = $_GET['id'];

                $sql = "SELECT * FROM dpst04 WHERE student_id = '$student_id' ";
                $m4 = mysqli_query($conn, $sql);

                $sql1 = "SELECT * FROM dpst05 WHERE student_id = '$student_id' ";
                $m5 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($m4) == 1) {
                    $row = mysqli_fetch_array($m4);
                } else if (mysqli_num_rows($m5) == 1) {
                    $row = mysqli_fetch_array($m5);
                }

            ?>

            <div style="margin: 60px 60px 0px 60px">
                <div class="row">
                    <div class="col-xl-5 mb-4">
                        <div class="container p-xl-5 p-md-5 pt-3 pb-3 " style="background:white;border-radius:10px;">
                            <p align="center">
                                <img src="./img/<?php
                                    if($row['level'] == 4){
                                        echo "mm4/square/". $row['number']. ".jpg";
                                    }else if($row['level'] == 5){
                                        echo "m5/square/". $row['number']. ".jpg";
                                    }
                                ?>" style="border-radius:1000px;max-width:30%;">
                            </p>
                            <h2 class="mt-3" align="center" style="font-weight:700;color:#42495b;">
                                <?php 
                                    if($row['level'] == 4){
                                        echo "น้อง". $row['nick_name'];
                                    }else if($row['level'] == 5){
                                        echo "พี่". $row['nick_name'];
                                    }
                                ?>
                            </h2>
                            <h5 align="center" style="color:#42495b;">
                                <?php echo $row['first_name']. " ". $row['last_name'] ?>
                            </h5>
                            <h2 align="center" style="margin:0">
                                <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="
                                    <?php
                                        if($row['level'] == 4){
                                            echo "ได้รับหัวใจ";
                                        }else if($row['level'] == 5){
                                            echo "เหลือหัวใจ";
                                        }
                                    ?>
                                    <?php echo $row['heart'] ?> ดวง">
                                    <i style="color:
                                        <?php 
                                            if($row['level'] == 4){
                                                echo "#d63384";
                                            }else if($row['level'] == 5){
                                                echo "#eaa840";
                                            }
                                        ?>
                                    " class="fas fa-heart"></i>&nbsp;
                                    <?php echo $row['heart'] ?>
                                </span>
                                <a href="<?php echo $row['facebook'] ?>" target="_blank" class="btn btn-primary" style="border-radius:1000px;box-shadow: rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                
                            </h2>
                            <?php 
                                $sql1 = "SELECT * FROM heart WHERE s5_id = ". $_SESSION['student_id']. " AND s4_id = ". $row['student_id'];
                                $query1 = mysqli_query($conn, $sql1);
                                if($_SESSION['level'] == 5 && $row['level'] == 4 && mysqli_num_rows($query1) == 2 ){
                            ?>
                                <p align="center">
                                    <a href="" class="btn btn-danger disabled mt-2">ครบโควต้าแล้ว</a>
                                </p>
                            <?php } ?>
                            <?php
                                if($_SESSION['level'] == 5 && $row['level'] == 4 && mysqli_num_rows($query1) != 2 && $heart == 0){
                            ?>
                                <p align="center">
                                    <a href="" class="btn btn-danger disabled mt-2">หัวใจคุณหมดแล้ว</a>  
                                </p>
                            <?php } ?>
                            <?php
                                if($_SESSION['level'] == 5 && $row['level'] == 4 && mysqli_num_rows($query1) != 2 && $heart != 0){
                            ?>
                                <p align="center">
                                    <a class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['number']?>">ให้หัวใจ</a>
                                </p>
                            <?php } ?>
                            
                                
            
                            <!-- Modal -->
                            <div class="modal fade" id="modal<?php echo $row['number']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="color:black" class="modal-title" id="exampleModalLabel">ยืนยันการให้หัวใจ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./process/give_heart.php" method="post">
                                            <input type="text" class="d-none" name="s4_id" value="<?php echo $row['student_id'] ?>" >
                                            <label for="formFile" class="form-label">จำนวนหัวใจที่ต้องการให้น้อง<?php echo $row['nick_name'] ?></label>
                                            <?php if ($heart == 1 || mysqli_num_rows($query1) == 1) { ?>
                                                <input class="form-control form-control-lg" type="number" name="amount" value="1" min="1" max="1">
                                            <?php } else { ?>
                                                <input class="form-control form-control-lg" type="number" name="amount" value="1" min="1" max="2">
                                            <?php } ?>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</a>
                                        <input type="submit" name="submit" style="font-family:'Kanit'" class="btn btn-primary" value="ตกลง"></input>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 mb-4">
                        <div class="container p-3" style="background:white;border-radius:10px;text-align:center;">
                            <i style="font-size:xxx-large;color:#42495b" class="
                                <?php 
                                    if($row['level'] == 4){
                                        echo "fal fa-hands-heart";
                                    }else if($row['level'] == 5){
                                        echo "fal fa-hand-holding-heart";
                                    }
                                ?>
                            "></i>
                            <h3 style="color:#42495b;font-weight:700">
                                <?php
                                    if($row['level'] == 4){
                                        echo "ประวัติการใด้รับหัวใจ";
                                    }else if($row['level'] == 5){
                                        echo "ประวัติการให้หัวใจ";
                                    }
                                ?>
                            </h3>
                            <hr>
                            <?php
                                $sql = "SELECT * FROM heart WHERE s4_id = '$student_id' ";
                                $query = mysqli_query($conn, $sql);
                                $sql1 = "SELECT * FROM heart WHERE s5_id = '$student_id' ";
                                $query1 = mysqli_query($conn, $sql1);

                                if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_array($query)) {
                                    $query2 = mysqli_query($conn, "SELECT * FROM dpst05 WHERE student_id = " . $row['s5_id']);
                                    $num = mysqli_num_rows($query2);

                                    while ($result = mysqli_fetch_array($query2)) {

                            ?>
                                <div class="container mb-2 d-none d-xl-block d-md-block">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <p align="center">
                                            <img src="./img/m5/square/<?php echo $result['number'] ?>.jpg" style="max-width:70%;border-radius:1000px" class="img-fluid d-none d-xl-block d-md-block">
                                            </p>    
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <h5 class="d-none d-xl-block d-md-block" align="left" style="color:#42495b;margin:0">
                                                พี่<?php echo $result['nick_name'] ?>
                                            </h5>
                                            
                                            <p align="left" style="margin:0"><?php echo $result['first_name'] . " " . $result['last_name'] ?></p>
                                           
                                        </div>
                                        <div class="col-4 align-self-center">
                                            <p align="right">
                                                <a href="./detail.php?id=<?php echo $result['student_id'] ?>" class="btn btn-light"><i class="fas fa-info"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mb-2 d-xl-none d-md-none">
                                    <div class="row">
                                        <div class="col-3 align-self-center">
                                            <p align="center">
                                            <img src="./img/m5/square/<?php echo $result['number'] ?>.jpg" style="border-radius:1000px" class="img-fluid" alt="">
                                            </p>
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <p align="left" style="color:#42495b;margin:0;font-weight:700">
                                                พี่<?php echo $result['nick_name'] ?>
                                            </p>
                                            <p align="left" style="margin:0;font-size:70%"><?php echo $result['first_name'] . " " . $result['last_name'] ?></p>
                                           
                                        </div>
                                        <div class="col-2 align-self-center">
                                            <p align="right">
                                                <a href="./detail.php?id=<?php echo $result['student_id'] ?>" class="btn btn-light"><i class="fas fa-info"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php }?>

                            
                            <?php
                            if (mysqli_num_rows($query1) > 0) {
                                while ($row1 = mysqli_fetch_array($query1)) {
                                    $query3 = mysqli_query($conn, "SELECT * FROM dpst04 WHERE student_id = " . $row1['s4_id']);
                                    $num1 = mysqli_num_rows($query3);

                                    while ($result = mysqli_fetch_array($query3)) {

                            ?>
                                <div class="container mb-4 d-none d-xl-block d-md-block">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <img src="./img/mm4/square/<?php echo $result['number'] ?>.jpg" style="max-width:70%;border-radius:1000px" class="img-fluid">
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <h5 align="left" style="color:#42495b;margin:0">
                                                น้อง<?php echo $result['nick_name'] ?>
                                            </h5>
                                            <p align="left" style="margin:0"><?php echo $result['first_name'] . " " . $result['last_name'] ?></p>
                                            
                                        </div>
                                        <div class="col-4 align-self-center">
                                            <p align="right">
                                                <a href="./detail.php?id=<?php echo $result['student_id'] ?>" class="btn btn-light"><i class="fas fa-info"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mb-2 d-xl-none d-md-none">
                                    <div class="row">
                                        <div class="col-3 align-self-center">
                                            <p align="center">
                                            <img src="./img/mm4/square/<?php echo $result['number'] ?>.jpg" style="border-radius:1000px" class="img-fluid" alt="">
                                            </p>
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <p align="left" style="color:#42495b;margin:0;font-weight:700">
                                                น้อง<?php echo $result['nick_name'] ?>
                                            </p>
                                            <p align="left" style="margin:0;font-size:70%"><?php echo $result['first_name'] . " " . $result['last_name'] ?></p>
                                           
                                        </div>
                                        <div class="col-2 align-self-center">
                                            <p align="right">
                                                <a href="./detail.php?id=<?php echo $result['student_id'] ?>" class="btn btn-light"><i class="fas fa-info"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                    <?php }?>
                                <?php }?>
                            <?php }?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./component/linkjs.php') ?>

</body>

</html>