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
        <div class="page__wrapper"  >
            <?php include('./component/header.php') ?>
            <div style="margin: 80px 60px 60px 60px">
                <h1 style="font-weight:700;color:white" align="left">รายชื่อนักเรียน ม.4</h1>
                <div class="row">
                    <?php
                        $sql = "SELECT * FROM dpst04 ORDER BY number ASC";
                        $query = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_array($query)){
                    ?>
                    <div class="col-xl-3 col-md-4 col-sm-6 col-xs-6">
                        <div class="card mt-4 hvrbox">
                            <img src="./img/mm4/<?php echo $row['number'] ?>.jpg" class="card-img-top hvrbox-layer_bottom" style="border-radius:20px ">
                            <div class="hvrbox-layer_top ">
                                <div class="hvrbox-text">
                                    <a data-bs-toggle="tooltip" data-bs-placement="right" title="ได้รับหัวใจ <?php echo $row['heart'] ?> ดวง">
                                        <i style="font-size:70px;" class="fas fa-heart"></i>
                                        <h3 style="color:white"><?php echo $row['heart'] ?></h3>
                                    </a>
                                    <h5 style="color:#cecece" align="center" >น้อง<?php echo $row['nick_name'] ?></h5>
                                    <?php 
                                        if($_SESSION['level'] == '5'){
                                    ?>
                                        <?php 
                                            $sql1 = "SELECT * FROM heart WHERE s5_id = ". $_SESSION['student_id']. " AND s4_id = ". $row['student_id'];
                                            $query1 = mysqli_query($conn, $sql1);
                                            if(mysqli_num_rows($query1) == 2 ){
                                        ?>
                                            <a href="./detail.php?id=<?php echo $row['student_id'] ?>" class="btn btn-sm btn-secondary">รายละเอียด</a>
                                            <a href="" class="btn btn-sm btn-danger disabled mt-1">ครบโควต้าแล้ว</a>
                                        <?php } ?>
                                        <?php
                                            if(mysqli_num_rows($query1) != 2 && $heart == 0){
                                        ?>
                                            <a href="./detail.php?id=<?php echo $row['student_id'] ?>" class="btn btn-sm btn-secondary">รายละเอียด</a>
                                            <a href="" class="btn btn-sm btn-danger disabled mt-1">หัวใจคุณหมดแล้ว</a>  
                                        <?php } ?>
                                        <?php
                                            if(mysqli_num_rows($query1) != 2 && $heart != 0){
                                        ?>
                                            <div class="row">
                                                <div class="col-7 p-0" style="margin-right:3px">
                                                <p align="right">
                                                    <a class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['number']?>">ให้หัวใจ</a>
                                                    </p>
                                                </div>
                                                <div class="col-4 p-0" >
                                                <p align="left">
                                                    <a href="./detail.php?id=<?php echo $row['student_id'] ?>" class="btn btn-sm btn-secondary">&nbsp;<i class="fas fa-info"></i>&nbsp;</a>
                                                    </p>
                                                </div>
                                            </div> 
                                        <?php } ?>
                                    <?php } ?>
                                    <?php 
                                        if($_SESSION['level'] == '4'){
                                    ?>
                                        <a href="./detail.php?id=<?php echo $row['student_id'] ?>" class="btn btn-sm btn-secondary">รายละเอียด</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>          
                    </div>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    
    <?php include('./component/linkjs.php') ?>
    <?php
        if(isset($_SESSION['success'])){
    ?>
        <script>
            Swal.fire({
                title: 'เสร็จสิ้น!',
                text: 'คุณให้หัวใจเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor:'#198754'
            })
        </script>
    <?php }
        unset($_SESSION['success']);
    ?>
</body>
</html>
