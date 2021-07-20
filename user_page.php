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
            <div style="margin:60px 60px 0px 60px">
                <div class="row">
                <div class="col-6 " >
                    <div class="container p-4" style="background:#eaa840;border-radius:10px">
                        <div class="row">
                            <div class="col-xl-4">
                                <i style="font-size:xxx-large" class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-6 " >
                        <div class="container p-4" style="background:white;border-radius:10px">
                            <h1 style="color:#42495b;font-weight:700">การจัดอันดับ</h1>
                            <hr>
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
                            
                            <div class="container mb-2 d-none d-xl-block d-md-block">
                                    <div class="row">
                                        <div class="col-2 align-self-center">
                                            <p align="center">
                                            <img src="./img/m4/square/<?php echo $row['number'] ?>.jpg" style="max-width:70%;border-radius:1000px" class="img-fluid d-none d-xl-block d-md-block">
                                            </p>    
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <h5 class="d-none d-xl-block d-md-block" align="left" style="color:#42495b;margin:0">
                                                น้อง<?php echo $row['nick_name'] ?>
                                            </h5>
                                            
                                            <p align="left" style="margin:0"><?php echo $row['first_name'] . " " . $row['last_name'] ?></p>
                                           
                                        </div>
                                        <div class="col-4 align-self-center">
                                        <h3 align="right" style="padding-right:20px;margin:0">
                                                        <span class="badge rounded-pill bg-light text-dark" style="font-weight:normal" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                                            <i style="color:#d63384" class="fas fa-heart"></i>&nbsp;
                                                            <?php echo $row['heart'] ?>
                                                        </span>
                                                    </h3>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="container mb-2 d-xl-none d-md-none">
                                    <div class="row">
                                        <div class="col-3 align-self-center">
                                            <p align="center">
                                            <img src="./img/m5/square/<?php echo $row['number'] ?>.jpg" style="border-radius:1000px" class="img-fluid" alt="">
                                            </p>
                                        </div>
                                        <div class="col-6 align-self-center">
                                            <p align="left" style="color:#42495b;margin:0;font-weight:700">
                                                พี่<?php echo $row['nick_name'] ?>
                                            </p>
                                            <p align="left" style="margin:0;font-size:70%"><?php echo $row['first_name'] . " " . $row['last_name'] ?></p>
                                           
                                        </div>
                                        <div class="col-2 align-self-center">
                                            <p align="right">
                                                <a href="./detail.php?id=<?php echo $row['student_id'] ?>" class="btn btn-light"><i class="fas fa-info"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        <?php } ?>
                    </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <?php include('./component/linkjs.php') ?>

</body>
</html>
