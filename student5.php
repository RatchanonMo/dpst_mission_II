<?php
    session_start();
    include('./connect/connect.php');

    if(!isset($_SESSION['level'])){
        header('location: ./index.php');
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
            <div style="margin: 80px 60px 60px 60px">
                <h1 style="font-weight:700" align="left">รายชื่อนักเรียน ม.5</h1>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM dpst05 ORDER BY number ASC";
                        $query = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-6">
                        <div class="card mt-4 hvrbox">
                            <img src="./img/m5/<?php echo $row['number'] ?>.jpg" class="card-img-top hvrbox-layer_bottom" style="border-radius:20px ">
                            <div class="hvrbox-layer_top">
                                <div class="hvrbox-text">
                                    <a data-bs-toggle="tooltip" data-bs-placement="right" title="เหลือหัวใจ <?php echo $row['heart'] ?> ดวง">
                                        <i style="font-size:70px;" class="fas fa-heart"></i>
                                        <h3 style="color:white"><?php echo $row['heart'] ?></h3>
                                    </a>
                                    <h5 style="color:#cecece" align="center">พี่<?php echo $row['nick_name'] ?></h5>
                                    <a href="./detail.php?id=<?php echo $row['student_id']?>" class="btn btn-sm btn-secondary">รายละเอียด</a>
                                </div>
                            </div>
                        </div>          
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('./component/linkjs.php') ?>

</body>
</html>
