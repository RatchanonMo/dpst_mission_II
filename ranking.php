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
        <div class="page__wrapper" >
            <?php include('./component/header.php') ?>
            <div class="mb-3" >
            <div class="">
                <div style="margin: 60px 60px 0px 60px">
                    <h1 style="font-weight:700;" align="left">การจัดอันดับ</h1>
                    <div class="row">
                        <?php 
                            $sql = "SELECT * FROM dpst04 ORDER BY heart DESC";
                            $query = mysqli_query($conn,$sql);
                            $i = 0;

                            while($row = mysqli_fetch_array($query)){
                                $i++;
                        ?>
                            <?php 
                                if($i <= 3 && $row['heart'] != 0){
                            ?>
                                <div class="col-4 d-none d-md-block d-lg-block d-xl-block" style="text-align:center">
                                    <a href="./detail.php?id=<?php echo $row['student_id'] ?>" style="color:#18396f">
                                        <div class="container mb-2 mt-4 p-3 " style="background:white;border-radius:10px" >
                                            <p align="center">
                                                <img src="./img/mm4/square/<?php echo $row['number'] ?>.jpg" style="border-radius:1000px;max-width:40%" alt="">
                                            </p>
                                            <div class="mb-2" style="font-size:xx-large;color:
                                                    <?php 
                                                        if($i == 1){
                                                            echo "#FFD700";
                                                        }else if($i == 2){
                                                            echo "#aaa9ad";
                                                        }else if($i == 3){
                                                            echo "#cd7f32";
                                                        }
                                                    ?>
                                            ">
                                                <i class="fad fa-medal"></i>
                                            </div>
                                            <div class="mt-2" style="font-weight:700;font-size:xx-large;">น้อง<?php echo $row['nick_name'] ?></div>
                                            <div><?php echo $row['first_name']. " ". $row['last_name'] ?></div>
                                            <h3 class="mt-2" align="center">
                                                <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal;text-align:center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                                    <i style="color:#d63384" class="fas fa-heart"></i>&nbsp;
                                                    <?php echo $row['heart'] ?>
                                                </span>
                                            </h3>
                                        </div>
                                    </a>
                                </div>

                                
                                <a class="d-xl-none d-md-none" style="color:#42495b" href="./detail.php?id=<?php echo $row['student_id'] ?>">
                                <div class=" p-3 mb-2" style="background: white;border-radius:10px;color:#18396f">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-1 align-self-center" style="text-align:center">
                                                    <div style="font-weight: 700;margin:0;font-size:large;color:
                                                        <?php 
                                                        if($i == 1){
                                                            echo "#FFD700";
                                                        }else if($i == 2){
                                                            echo "#aaa9ad";
                                                        }else if($i == 3){
                                                            echo "#cd7f32";
                                                        }
                                                    ?>
                                                    ">
                                                <i class="fad fa-medal"></i>
                                                    
                                                </div>
                                                </div>
                                                <div class="col-4 align-self-center">
                                                    <img class="mb-2" src="./img/mm4/square/<?php echo $row['number'] ?>.jpg" style="border-radius:50px;max-width:85%;margin:auto">
                                                </div>
                                                <div class="col-9 align-self-center">
                                                    <div style="margin:0;font-weight:700;font-size:larger">
                                                        น้อง<?php echo $row['nick_name'] ?>
                                                    </div>
                                                    <div style="font-weight:normal;margin:0"><?php echo $row['first_name']. " ". $row['last_name'] ?></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            
                                               
                                                <div class="align-self-center" >
                                                    <h5 align="right" style="margin:0;padding-right:20px">
                                                        <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                                            <i style="color:#d63384" class="fas fa-heart"></i>&nbsp;
                                                            <?php echo $row['heart'] ?>
                                                        </span>
                                                    </h5>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                               
                            <?php }?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
            <div style="margin: 0px 60px 0px 60px;">
                <div class="" >
                    <?php 
                        $sql = "SELECT * FROM dpst04 ORDER BY heart DESC";
                        $query = mysqli_query($conn,$sql);
                        $i = 0;

                        while($row = mysqli_fetch_array($query)){
                            $i++;
                    ?>
                        <?php 
                            if($i > 3 && $row['heart'] != 0){
                        ?>
                            <a class="d-none d-xl-block d-md-block" style="color:#42495b" href="./detail.php?id=<?php echo $row['student_id'] ?>">
                                <div class="rank p-3 mb-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-1 align-self-center" style="text-align:center">
                                                    <div style="font-weight: 700;margin:0;font-size:x-large;"><?php echo $i ?></div>
                                                </div>
                                                <div class="col-2 align-self-center">
                                                    <img src="./img/mm4/square/<?php echo $row['number'] ?>.jpg" style="border-radius:50px;max-width:85%;margin:auto">
                                                </div>
                                                <div class="col-9 align-self-center">
                                                    <div style="margin:0;font-weight:700;font-size:larger">
                                                        น้อง<?php echo $row['nick_name'] ?>
                                                    </div>
                                                    <div style="font-weight:normal;margin:0"><?php echo $row['first_name']. " ". $row['last_name'] ?></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 ">
                                            <div class="row">
                                                <div class="col-9"></div>
                                                <div class="align-self-center" class="col-3">
                                                    <h3 align="right" style="padding-right:20px;margin:0">
                                                        <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                                            <i style="color:#d63384" class="fas fa-heart"></i>&nbsp;
                                                            <?php echo $row['heart'] ?>
                                                        </span>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="d-xl-none d-md-none" style="color:#42495b" href="./detail.php?id=<?php echo $row['student_id'] ?>">
                                <div class="rank p-3 mb-2">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-1 align-self-center" style="text-align:center">
                                                    <div style="font-weight: 700;margin:0;font-size:x-large;"><?php echo $i ?></div>
                                                </div>
                                                <div class="col-4 align-self-center">
                                                    <img class="mb-2" src="./img/mm4/square/<?php echo $row['number'] ?>.jpg" style="border-radius:50px;max-width:85%;margin:auto">
                                                </div>
                                                <div class="col-9 align-self-center">
                                                    <div style="margin:0;font-weight:700;font-size:larger">
                                                        น้อง<?php echo $row['nick_name'] ?>
                                                    </div>
                                                    <div style="font-weight:normal;margin:0"><?php echo $row['first_name']. " ". $row['last_name'] ?></div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            
                                               
                                                <div class="align-self-center" >
                                                    <h5 align="right" style="margin:0;padding-right:20px">
                                                        <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                                            <i style="color:#d63384" class="fas fa-heart"></i>&nbsp;
                                                            <?php echo $row['heart'] ?>
                                                        </span>
                                                    </h5>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('./component/linkjs.php') ?>

</body>
</html>
